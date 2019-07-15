<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;

class AdminStudentUserController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
                  $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();
                $database = $firebase->getDatabase();
                $admin = $database->getReference('admin')->getValue();
                $student = $database->getReference('students')->getValue();
                if(!empty($student)){
                	foreach($student as $ourstudent){
                		$students[] = $ourstudent;
                	}
                	
                }else{
                	$students = null;
                }
                if(!empty($admin)){
                    foreach($admin as $admins){
                    }
                }
                return view('admin.students')->with('admins', $admins)->with('students', $students);
    }

    public function update(Request $request, $id){
        if(session()->has('email')){
        $account = $request->input('account');
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();

        $database = $firebase->getDatabase();
        $ref = $database->getReference('students');
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
                    'id_number' => $get['student_id'],
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
                    'id_number' => $get['student_id'],
                    'date' => $now,
                    'key' => 'deactivation',
                    'time' => $time
                ]);
        }
        return redirect('/admin/users/students')->with($alert, $msg);
        }else{
            return redirect('/admin/login');
        }
    }
}
