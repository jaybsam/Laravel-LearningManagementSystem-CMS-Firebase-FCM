<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AdminSubjectController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
          $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('users');
        $admin = $database->getReference('admin')->getValue();
        $sub = $database->getReference('subject')->getValue();

        if(!empty($sub)){
        	foreach(array_reverse($sub) as $subject){
        		$subjects[] = $subject;
        	}
        }
        if(!empty($admin)){
            foreach($admin as $admins){

            }
        }else{
            $admin = '';
        }
        return view('admin.subject', compact('subjects'))->with('admins', $admins);
    }

    public function create(Request $request){
    	

    	$name = $request->input('name');
        $level = $request->input('level');
    	$description = $request->input('description');

    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
          $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
        $database = $firebase->getDatabase();

        $sub = $database->getReference('subject');
        $notif = $database->getReference('admin-notification');
        $checkSub = $sub->getValue();
        $notification = $notif->orderByChild('id')->limitToLast(1)->getValue();
        $subject = $sub->orderByChild('id')->limitToLast(1)->getValue();
        $checkName = $sub->orderByChild('name')->equalTo($name)->getValue();

        if(!empty($checkName)){
        	return redirect('/admin/subject')->with('fail', $name.' subject already exist !')->withInput();
        }
            if(!empty($notification)){
                    foreach($notification as $NID){
                        $resultID = $NID;
                    }
                $id = $resultID['id'] + 1;
                }
                else
                {
                    $id = 1;
                }
        
        	if(!empty($checkSub)){
        		
        		$now = Carbon::now();
		    	date_default_timezone_set('Asia/Singapore');
		        $time = date('g:i A');
		        foreach($subject as $subjects){

		        }
        		$uid = $subjects['id'] + 1;
        		if($request->hasFile('file')){
		            $file = $request->file('file');
		            $img = $file->getClientOriginalName();
		            $file->move('images/storage/subject_'.$uid, $img);
		            $avatar = 'images/storage/subject_'.$uid.'/'.$img;
    			}
                $subject_id = $uid + 2000;
	    		$sub->getChild('sub_'.$uid)->set([
        			'id' => $uid,
                    'subject_id' => $subject_id,
        			'image' => $avatar,
        			'name' => $name,
                    'level' => $level,
        			'description' => $description,
                    'grading' => [
                        'id' => $uid,
                        'written' => 0,
                        'performance' => 0,
                        'quarterly' => 0,
                        'status' => 'Not Set'
                    ]
        		]);
        		$notif->getChild('notif_'.$id)->set([
	    			'id' => $id,
	    			'title' => 'Subject Creation',
	    			'message' => 'Created a',
	    			'firstname' => $name,
	    			'lastname' => $description,
	    			'icon' => 'fa-book',
	    			'role' => 'Subject',
	    			'id_number' => '',
	    			'date' => $now,
	    			'key' => 'subject',
	    			'time' => $time
	    		]);
	    		$alert = 'success';
       	 	}
        	else{
        		$uid = 1;
        		if($request->hasFile('file')){
		            $file = $request->file('file');
		            $img = $file->getClientOriginalName();
		            $file->move('images/storage/subject_'.$uid, $img);
		            $avatar = 'images/storage/subject_'.$uid.'/'.$img;
    			}
        		$now = Carbon::now();
		    	date_default_timezone_set('Asia/Singapore');
		        $time = date('g:i A');
                 $subject_id = $uid + 2000;
        		$sub->getChild('sub_'.$uid)->set([
        			'id' => $uid,
                    'subject_id' => $subject_id,
        			'image' => $avatar,
        			'name' => $name,
                    'level' => $level,
        			'description' => $description,
                    'grading' => [
                        'id' => $uid,
                        'written' => 0,
                        'performance' => 0,
                        'quarterly' => 0,
                        'status' => 'Not Set'
                    ]
        		]);
        		$notif->getChild('notif_'.$id)->set([
	    			'id' => $id,
	    			'title' => 'Subject Creation',
	    			'message' => 'Created a',
	    			'firstname' => $name,
	    			'lastname' => $description,
	    			'icon' => 'fa-book',
	    			'role' => 'Subject',
	    			'id_number' => '',
	    			'date' => $now,
	    			'key' => 'subject',
	    			'time' => $time
	    		]);
	    		$alert = 'success';
        	}
        
        return redirect('/admin/subject')->with($alert, 'Successfully created a '.$name.' subject.');

    }
}
