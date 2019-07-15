<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminController extends Controller
{
    public function index(Request $request){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
        $admin = $database->getReference('admin')->getValue();
    	$ref = $database->getReference('recentuser');

        $student = $database->getReference('students');
        $teacher  = $database->getReference('teachers');
        $parent = $database->getReference('parents');
        $first = $student->orderByChild('created_at')->limitToLast(1)->getValue();
        $second = $teacher->orderByChild('created_at')->limitToLast(1)->getValue();
        $third = $parent->orderByChild('created_at')->limitToLast(1)->getValue();
        $daterecent = $ref->orderByChild('created_at')->limitToLast(1)->getValue();

    	$users = $ref->getValue();
    	$recentUsers = $ref->orderByChild('id')
    	->limitToLast(5)
    	->getValue();
        foreach($admin as $admins){

        }
        if(!empty($recentUsers)){
            foreach(array_reverse($recentUsers) as $recentUser){
            $recentU[] = $recentUser;
            }
            $Students = $student->orderByChild('role')
            ->equalTo('Student')->getValue();

            $Teachers = $teacher->orderByChild('role')
            ->equalTo('Teacher')->getValue();

            $Parents = $parent->orderByChild('role')
            ->equalTo('Parent')->getValue();
            
            
            $totalStudents = sizeof($Students);
            $totalTeachers = sizeof($Teachers);
            $totalParents = sizeof($Parents);
            $totalUsers = sizeof($recentUsers);

        }else{
            $recentU = '';
            $totalParents = '';
            $totalTeachers = '';
            $totalStudents = '';
            $totalUsers = '';
        }
    	
        if(!empty($first)){
                foreach($first as $myfirsts){
                $firsts = $myfirsts['created_at'];
               }
           }else{
                $firsts = null;
           }
           if(!empty($second)){
                foreach($second as $myseconds){
                $seconds = $myseconds['created_at'];
               }
           }else{
            $seconds = null;
           }
           if(!empty($third)){
                foreach($third as $mythirds){
                $thirds = $mythirds['created_at'];
               }
           }else{
            $thirds = null;
           }
           if(!empty($daterecent)){
            foreach($daterecent as $daterecents){
                $mydaterecents = $daterecents['created_at'];
               }
           }
  		// $grade = 11.30;

  		// if($grade >= 3 && $grade <= 10){
  		// 	$msg = '3 - 10';
  		// }
  		// else if($grade >= 11 && $grade <= 20){
  		// 	$msg = '11 - 20';
  		// }
    // 	print_r($msg);
    // 	die();
    	// $time = date("g:i a");
    	// $ip = $request->ip();



    	return view('admin.admin-dashboard', compact('recentU'))
    	->with('totalStudents', $totalStudents)
    	->with('totalTeachers', $totalTeachers)
    	->with('totalParents', $totalParents)
        ->with('totalUsers', $totalUsers)
        ->with('mydaterecents', $mydaterecents)
        ->with('firsts', $firsts)
        ->with('seconds', $seconds)
        ->with('thirds', $thirds)
        ->with('admins', $admins)
        ->with('users', $users);
    }

    public function profileIndex(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
          $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('users');
        $admin = $database->getReference('admin')->getValue();
        if(!empty($admin)){
            foreach($admin as $admins){

            }
        }else{
            $admin = '';
        }
        
        $notif = $database->getReference('admin-notification');
        $setNotif = $notif->orderByChild('id')->limitToLast(5)->getSnapshot()->getValue();
        if($notif->getValue() !== null){
            foreach(array_reverse($setNotif)as $setNotifs){
                $mynotif[] = $setNotifs;
            }
        
        }
        $users = $ref->getValue();
if($users !== null){
        if($setNotif !== null){
            $newNotif = $notif->getValue();
            $totalNotif = sizeof($newNotif);
        }
        else{
            $totalNotif = null;
        }
        $Students = $ref->orderByChild('role')
        ->equalTo('Student')->getValue();

        $Admins = $ref->orderByChild('role')
        ->equalTo('Admin')->getValue();

        $Teachers = $ref->orderByChild('role')
        ->equalTo('Teacher')->getValue();

        $Parents = $ref->orderByChild('role')
        ->equalTo('Parent')->getValue();

        
        $totalAdmin = sizeof($Admins);
        $totalUsers = sizeof($users);
        $totalStudents = sizeof($Students);
        $totalTeachers = sizeof($Teachers);
        $totalParents = sizeof($Parents);
}else{
        $totalAdmin = null;
        $totalUsers = null;
        $totalStudents = null;
        $totalTeachers = null;
        $totalParents = null;
}
        
       

        return view('admin.profile', compact('mynotif'))
        ->with('setNotif', $setNotif)
        ->with('totalStudents', $totalStudents)
        ->with('totalTeachers', $totalTeachers)
        ->with('totalParents', $totalParents)
        ->with('totalUsers', $totalUsers)
        ->with('totalNotif', $totalNotif)
        ->with('totalAdmin', $totalAdmin)
        ->with('admins', $admins);
    }

    public function adminIndex(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
          $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('teachers');
        $teachers = $ref->orderByChild('role')->equalTo('Teacher')->getValue();
        $adminPriviledge = $ref->orderByChild('role')->equalTo('Admin')->getValue();
        $admin = $database->getReference('admin')->getValue();
        if(!empty($admin)){
            foreach($admin as $admins){

            }
        }else{
            $admins = '';
        }
        
        return view('admin.admin')
        ->with('teachers', $teachers)
        ->with('adminPriviledge', $adminPriviledge)
        ->with('admins', $admins);
    }
}
