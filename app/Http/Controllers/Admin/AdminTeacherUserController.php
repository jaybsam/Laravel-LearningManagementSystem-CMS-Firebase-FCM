<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;


class AdminTeacherUserController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();
        $teacher = $database->getReference('teachers');
        $check = $teacher->getValue();
        $getID = $teacher->orderByChild('id')->LimitToLast(1)->getValue();
        if(!empty($check)){
            foreach($getID as $myid){
                
            }
            $id = $myid['teacher_id'];
        }
        else{
            $id = null;
        }

    	$ref = $database->getReference('teachers');
    	$teacher = $ref->orderByChild('role')->equalTo('Teacher')->getValue();
    	$admin = $database->getReference('admin')->getValue();
        if(!empty($admin)){
            foreach($admin as $account)
            {
             $admins = $account;
            }

        }
    	
    	return view('admin.teachers')
    	->with('teacher', $teacher)
    	->with('admins', $admins)
        ->with('id', $id);
    }

    public function update(Request $request, $id){
    	$account = $request->input('account');
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();
    	$ref = $database->getReference('teachers');
    	$get = $ref->getChild('id_'.$id)->getValue();
    	$notif = $database->getReference('admin-notification');
    	$updates = [
    		'id_'.$id.'/disable' => $account
    	];
    	$ref->update($updates);

    	$now = Carbon::now();
    	date_default_timezone_set('Asia/Singapore');
        $time = date('g:i A');

    	$notification = $database->getReference('admin-notification')->orderByChild('id')->limitToLast(1)->getValue();

    	if(!empty($notification)){
    		foreach($notification as $NID)
    		{
    			$resultID = $NID;
    		}
    		$uid = $resultID['id'] + 1;
    	}
    	if(empty($notification))
    	{
    		$uid = 1;
    	}
    	
    	//kimchi
    	
    	if($account == 0){
    		$msg = 'Activated '.$get['role'].' '.$get['firstname'];
    		$alert = 'success';
    		$notif->getChild('notif_'.$uid)->set([
	    			'id' => $uid,
	    			'title' => 'Released From Deactivation',
	    			'message' => 'Released',
	    			'firstname' => $get['firstname'],
	    			'lastname' => $get['lastname'],
	    			'icon' => 'fa-unlock',
	    			'role' => $get['role'],
	    			'id_number' => $get['teacher_id'],
	    			'date' => $now,
	    			'key' => 'activation',
	    			'time' => $time
	    		]);
    	}
    	else if($account == 1){
    		$msg = 'Deactivated '.$get['role'].' '.$get['firstname'];
    		$alert = 'error';
    		$notif->getChild('notif_'.$uid)->set([
	    			'id' => $uid,
	    			'title' => 'Account Deactivation',
	    			'message' => 'Deactivated the account of',
	    			'firstname' => $get['firstname'],
	    			'lastname' => $get['lastname'],
	    			'icon' => 'fa-lock',
	    			'role' => $get['role'],
	    			'id_number' => $get['teacher_id'],
	    			'date' => $now,
	    			'key' => 'deactivation',
	    			'time' => $time
	    		]);
    	}

    	return redirect('/admin/users/teachers')->with($alert, $msg);
    }
}
