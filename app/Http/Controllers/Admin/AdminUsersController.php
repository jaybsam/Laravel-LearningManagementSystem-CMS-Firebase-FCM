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
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class AdminUsersController extends Controller
{
    public function users(Request $request){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();
    	$ref = $database->getReference('users');
        $recent = $database->getReference('recentuser');
        $students = $database->getReference('students');
        $parents = $database->getReference('parents');
        $teachers = $database->getReference('teachers');
        $heartbeat = $database->getReference('heartbeat');
        
        //val
        $heart = $heartbeat->getValue();
        $studval = $students->getValue();
        $teachval = $teachers->getValue();
        $parenval = $parents->getValue();
        $getrecent = $recent->getValue();
       
    	$admin = $database->getReference('admin')->getValue();
        $mydata = $ref->orderByChild('id')->startAt(1)->getSnapshot()->getValue();

    	$notif = $database->getReference('admin-notification');
    	$student = $students->orderByChild('role')->equalTo('Student')->getValue();
    	$employee = $teachers->orderByChild('role')->equalTo('Teacher')->getValue();
    	$parent = $parents->orderByChild('role')->equalTo('Parent')->getValue();
    	$tadmin = $teachers->orderByChild('role')->equalTo('Admin')->getValue();
    	$setNotif = $notif->orderByChild('id')->limitToLast(5)->getSnapshot()->getValue();

    	// $pages = (object)$pages;
    	// $now = Carbon::now('Asia/Singapore');
     //    print_r($now);
     //    die();
    	//pagination success
    	// $page = $request->input('page', 1);
     //    $paginate = 5;
     //    $slice = array_slice($mydata, $paginate * ($page - 1), $paginate);
     //    $results = new Paginator($slice, count($mydata), $paginate);
        $datas = null;
    	// $datas = array_merge($studval, $teachval, $parenval);

    	// foreach($datas as $data){
    	// 	$realdata[] = $data;
    	// }
        if(!empty($heart)){
            foreach($heart as $myheart){
                $beat[] = $myheart;
            }
        }else{
            $beat = null;
        }
    	if(!empty($tadmin)){
            $totalAdmins = sizeof($tadmin);
        }
        else{
            $totalAdmins = null;
        }
        if(!empty($student)){
            $totalStudents = sizeof($student);
        }
        else{
            $totalStudents = null;
        }
        if(!empty($employee)){
            $totalTeachers = sizeof($employee);
        }
        else{
            $totalTeachers = null;
        }
        if(!empty($parent)){
            $totalParents = sizeof($parent);
        }
        else{
            $totalParents = null;
        }
    		
    		
    		
    		
    
        if(!empty($getrecent)){
            foreach($getrecent as $myrecent){
                $recents[] = $myrecent;
            }
        }else{
            $recents = null;
        }
    	if(!empty($admin)){
    		foreach($admin as $admins){

    		}
    	}else{
            $admins = null;
        }
    	$currentPage = LengthAwarePaginator::resolveCurrentPage();
    	$itemCollection = collect($mydata);
    	$perPage = 10;
    	$currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
    	$paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

    	$paginatedItems->setPath($request->url());
    	// $mydata[] = array();
    	// foreach($datas as $data){
    	// 	if($data["id"] == 1){
    	// 		$mydata[] = $data;
    	// 	}
    	// }
    	// $page = $this->paginate($ref, $perPage = 15, $page = null, $options = []);
    	if($notif->getValue() !== null){
    		foreach(array_reverse($setNotif)as $setNotifs){
    			$mynotif[] = $setNotifs;
    		}
    	}else{
            $mynotif = null;
        }


    		
    	

    	return view('admin.users',compact('mynotif', 'results'), ['items' => $paginatedItems])
    	->with('totalAdmins', $totalAdmins)
    	->with('totalTeachers', $totalTeachers)
    	->with('totalStudents', $totalStudents)
    	->with('totalParents', $totalParents)
    	->with('recents', $recents)
    	->with('student', $student)
    	->with('employee', $employee)
    	->with('parent', $parent)
    	->with('tadmin', $tadmin)
    	->with('admins', $admins)
        ->with('teachval', $teachval)
        ->with('parenval', $parenval)
        ->with('studval', $studval)
        ->with('beat', $beat);

    	// $json = json_encode($col_data);
    	// $key = $ref->push()->getKey();


			// $ref->getChild($key)
			//    			->set([
			//        'id' => '1',
			//        'name' => 'Joshua'
			//       	]);\
    	// return view('sample',compact('mydata'));
    }
    public function createTeacher(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
                  $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();
                $database = $firebase->getDatabase();
                $admin = $database->getReference('admin')->getValue();
                $teacher = $database->getReference('teachers');
                $check = $teacher->getValue();
                $myid = $teacher->orderByChild('teacher_id')->limitToLast(1)->getValue();
                if(!empty($check)){
                    foreach($myid as $teacherId){

                    }
                    $id = $teacherId['teacher_id'];
                }else{
                    $id = null;
                }
                if(!empty($admin)){
                    foreach($admin as $admins){
                    }
                }
                
        return view('admin.teachercreate')->with('admins', $admins)->with('id', $id);
    }
    public function createStudent(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
                  $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();
                $database = $firebase->getDatabase();
                $admin = $database->getReference('admin')->getValue();

                $student = $database->getReference('students');
                $check = $student->getValue();
                $myid = $student->orderByChild('student_id')->limitToLast(1)->getValue();
                if(!empty($check)){
                    foreach($myid as $studentId){

                    }
                    $id = $studentId['student_id'];
                }else{
                    $id = null;
                }


                if(!empty($admin)){
                    foreach($admin as $admins){
                    }
                }
        return view('admin.studentcreate')->with('admins', $admins)->with('id', $id);
    }
    public function createParent(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
                  $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();
                $database = $firebase->getDatabase();
                $admin = $database->getReference('admin')->getValue();

                $parent = $database->getReference('parents');
                $check = $parent->getValue();
                $myid = $parent->orderByChild('parent_id')->limitToLast(1)->getValue();
                if(!empty($check)){
                    foreach($myid as $parentId){

                    }
                    $id = $parentId['parent_id'];
                }else{
                    $id = null;
                }

                if(!empty($admin)){
                    foreach($admin as $admins){
                    }
                }
            return view('admin.parentcreate')->with('admins', $admins)->with('id', $id);
    }

    public function store(Request $request){
        if(session()->has('email')){
                
                $mytime = Carbon::now('Asia/Singapore');
                foreach($mytime as $yourtime){
                    $current_time[] = $yourtime;
                }
                $current_time = $mytime->date;
                
                $time = date('g:i A');
                $idnumber = $request->input('idnumber');
                $month = $request->input('month');
                $day = $request->input('day');
                $year = $request->input('year');
                $birthdate = $month.'-'.$day.'-'.$year;
                $firstname = $request->input('firstname');
                $lastname = $request->input('lastname');
                $password = $request->input('password');
                $address = $request->input('address');
                $contact = $request->input('contact');
                $gender = $request->input('gender');
                $role = $request->input('role');
                $age = $request->input('age');
                
                $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
                  $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();

                // querying
                $database = $firebase->getDatabase();
                $notification = $database->getReference('admin-notification');
                $teacher = $database->getReference('teachers');
                $student = $database->getReference('students');
                $parent = $database->getReference('parents');
                $recentUser = $database->getReference('recentuser');

                // checking
                $checkteach = $teacher->getValue();
                $checkstud = $student->getValue();
                $checkpar = $parent->getValue();
                $checknotif = $notification->getValue();
                $checkrecent = $recentUser->getValue();

                //notification
                if(!empty($checknotif)){
                    $notifid = $notification->orderByChild('id')->limitToLast(1)->getValue();
                    foreach($notifid as $mynotif){

                    }
                    $notificationID = $mynotif['id'] + 1;
                }else{
                    $notificationID = 1;
                }

                if(!empty($checkrecent)){
                    $myrecent = $recentUser->orderByChild('id')->limitToLast(1)->getValue();
                    foreach($myrecent as $myrecents){

                    }
                    $recentID = $myrecents['id'] + 1;
                }
                else{
                    $recentID = 1;
                }
                // create
                if($role == 'Teacher'){
                    if(!empty($checkteach)){
                        $myid = $teacher->orderByChild('id')->limitToLast(1)->getValue();
                        foreach($myid as $ids){

                        }
                        $uid = $ids['id'] + 1;
                        if($request->hasFile('file')){
                        $file = $request->file('file');
                        $name = $file->getClientOriginalName();
                        $file->move('images/storage/teacher/teacher_'.$uid, $name);
                        $avatar = 'images/storage/teacher/teacher_'.$uid.'/'.$name;
                        }else{
                        if($gender == 'Male'){
                                    $avatar = 'images/avatar/default-avatar-male.jpg';
                                    }
                        else if($gender == 'Female'){
                                    $avatar = 'images/avatar/default-avatar-female.jpg';
                                    }
                        }
                        $firstID = $idnumber + 0;
                        $teacher->getChild('id_'.$uid)->set([
                        'id' => $uid,
                        'teacher_id' => $firstID + 0,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'status' => 0,
                        'disable' => 0,
                        'adviser' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                        ]);
                    }else{

                        $uid = 1;
                        if($request->hasFile('file')){
                        $file = $request->file('file');
                        $name = $file->getClientOriginalName();
                         $file->move('images/storage/teacher/teacher_'.$uid, $name);
                        // mark
                        $avatar = 'images/storage/teacher/teacher_'.$uid.'/'.$name;
                        }else{
                        if($gender == 'Male'){
                                    $avatar = 'images/avatar/default-avatar-male.jpg';
                                    }
                        else if($gender == 'Female'){
                                    $avatar = 'images/avatar/default-avatar-female.jpg';
                                    }
                        }
                    
                        $firstID = $idnumber + $uid;
                        $teacher->getChild('id_'.$uid)->set([
                        'id' => $uid,
                        'teacher_id' => $firstID + 0,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'status' => 0,
                        'disable' => 0,
                        'adviser' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                        ]);
                    }
                     $recentUser->getChild('id_'.$recentID)->set([
                        'id' => $recentID,
                        'idnumber' => $firstID,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'status' => 0,
                        'disable' => 0,
                        'adviser' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                        ]);
                        $notification->getChild('notif_'.$notificationID)->set([
                        'id' => $notificationID,
                        'title' => 'Teacher Registration',
                        'message' => 'Created',
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'icon' => 'fa-user',
                        'role' => $role,
                        'id_number' => $firstID,
                        'date' => $current_time,
                        'key' => 'create',
                        'time' => $time,
                        'unread' => 1
                        ]);

               //redirect to teacher
                return redirect('/admin/users/teachers')->with('success', 'Created '.$role.' '.$firstname.' '.$lastname);

                }else if($role == 'Student'){
                    if(!empty($checkstud)){
                        $myid = $student->orderByChild('id')->limitToLast(1)->getValue();
                        foreach($myid as $ids){

                        }
                        $uid = $ids['id'] + 1;
                        if($request->hasFile('file')){
                        $file = $request->file('file');
                        $name = $file->getClientOriginalName();
                        // mark
                        $file->move('images/storage/student/student_'.$uid, $name);
                        $avatar = 'images/storage/student/student_'.$uid.'/'.$name;
                        }else{
                        if($gender == 'Male'){
                                    $avatar = 'images/avatar/default-avatar-male.jpg';
                                    }
                        else if($gender == 'Female'){
                                    $avatar = 'images/avatar/default-avatar-female.jpg';
                                    }
                        }
                        $firstID = $idnumber + 0;
                        $student->getChild('id_'.$uid)->set([
                        'id' => $uid,
                        'student_id' => $firstID + 0,
                        'section_id' => 0,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'position' => [
                            'president' => 0,
                            'vice_president' => 0,
                            'secretary' => 0
                        ],
                        'status' => 0,
                        'disable' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                    ]);
                    }else{
                        $uid = 1;
                        if($request->hasFile('file')){
                        $file = $request->file('file');
                        $name = $file->getClientOriginalName();
                        
                        $file->move('images/storage/student/student_'.$uid, $name);
                        $avatar = 'images/storage/student/student_'.$uid.'/'.$name;
                        }else{
                        if($gender == 'Male'){
                                    $avatar = 'images/avatar/default-avatar-male.jpg';
                                    }
                        else if($gender == 'Female'){
                                    $avatar = 'images/avatar/default-avatar-female.jpg';
                                    }
                        }
                        $firstID = $idnumber + $uid;
                        $student->getChild('id_'.$uid)->set([
                        'id' => $uid,
                        'student_id' => $firstID + 0,
                        'section_id' => 0,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'position' => [
                            'president' => 0,
                            'vice_president' => 0,
                            'secretary' => 0
                        ],
                        'status' => 0,
                        'disable' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                    ]);
                    }
                        $recentUser->getChild('id_'.$recentID)->set([
                        'id' => $recentID,
                        'idnumber' => $firstID,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'status' => 0,
                        'disable' => 0,
                        'adviser' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                        ]);
                    $notification->getChild('notif_'.$notificationID)->set([
                        'id' => $notificationID,
                        'title' => 'Student Registration',
                        'message' => 'Created',
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'icon' => 'fa-user-plus',
                        'role' => $role,
                        'id_number' => $firstID,
                        'date' => $current_time,
                        'key' => 'create',
                        'time' => $time,
                        'unread' => 1
                    ]);
                    //redirect students
                    return redirect('/admin/users/students')->with('success', 'Created '.$role.' '.$firstname.' '.$lastname);
                }else if($role == 'Parent'){
                     if(!empty($checkpar)){
                        $myid = $parent->orderByChild('id')->limitToLast(1)->getValue();
                        foreach($myid as $ids){

                        }
                        $uid = $ids['id'] + 1;
                         if($request->hasFile('file')){
                        $file = $request->file('file');
                        $name = $file->getClientOriginalName();
                        $file->move('images/storage/parent/parent_'.$uid, $name);
                        $avatar = 'images/storage/parent/parent_'.$uid.'/'.$name;
                        }else{
                        if($gender == 'Male'){
                                    $avatar = 'images/avatar/default-avatar-male.jpg';
                                    }
                        else if($gender == 'Female'){
                                    $avatar = 'images/avatar/default-avatar-female.jpg';
                                    }
                        }
                        $firstID = $idnumber + 0;
                        $parent->getChild('id_'.$uid)->set([
                        'id' => $uid,
                        'parent_id' => $firstID + 0,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'status' => 0,
                        'disable' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                    ]);
                    }else{
                        $uid = 1;
                         if($request->hasFile('file')){
                        $file = $request->file('file');
                        $name = $file->getClientOriginalName();
                         $file->move('images/storage/parent/parent_'.$uid, $name);
                        // $resize = Image::make($file->getRealPath());
                        // $resize->resize(200, 200);
                        // $resize->save(public_path('images/storage/user_'.$uid.'/' .$name));
                        $avatar = 'images/storage/parent/parent_'.$uid.'/'.$name;
                        }else{
                        if($gender == 'Male'){
                                    $avatar = 'images/avatar/default-avatar-male.jpg';
                                    }
                        else if($gender == 'Female'){
                                    $avatar = 'images/avatar/default-avatar-female.jpg';
                                    }
                        }
                        $firstID = $idnumber + $uid;
                        $parent->getChild('id_'.$uid)->set([
                        'id' => $uid,
                        'parent_id' => $firstID + 0,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'status' => 0,
                        'disable' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                    ]);
                        
                   
                    }
                     $notification->getChild('notif_'.$notificationID)->set([
                        'id' => $notificationID,
                        'title' => 'Parent Registration',
                        'message' => 'Created',
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'icon' => 'fa-users',
                        'role' => $role,
                        'id_number' => $firstID,
                        'date' => $current_time,
                        'key' => 'create',
                        'time' => $time,
                        'unread' => 1
                    ]);
                     $recentUser->getChild('id_'.$recentID)->set([
                        'id' => $recentID,
                        'idnumber' => $firstID,
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'password' => Hash::make($password),
                        'address' => $address,
                        'contact' => $contact,
                        'gender' => $gender,
                        'role' => $role,
                        'age' => $age,
                        'month' => $month,
                        'day' => $day,
                        'year' => $year,
                        'profile' => $avatar,
                        'status' => 0,
                        'disable' => 0,
                        'adviser' => 0,
                        'firstlogin' => 1,
                        'created_at' => $current_time
                        ]);
                    //redirect parents
                    return redirect('/admin/users/parents')->with('success', 'Created '.$role.' '.$firstname.' '.$lastname);
                }

        }else{
            return redirect('/admin/login');
        }
    }
    public function createUsersIndex(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$users = $database->getReference('users');
    	$admin = $database->getReference('admin')->getValue();
    	if(!empty($admin)){
    		foreach($admin as $admins){

    		}
    	}
    	$id = $users->orderByChild('id_number')->limitToLast(1)->getSnapshot()->getValue();

    	return view('admin.createuser')
    	->with('admins', $admins)
    	->with('id', $id);
    }
    public function createUsers(Request $request){
         if(session()->has('email')){
    	$current_time = now()->toDateTimeString();
    	$now = Carbon::now();
    	date_default_timezone_set('Asia/Singapore');
        $time = date('g:i A');
    	$idnumber = $request->input('idnumber');
    	$month = $request->input('month');
    	$day = $request->input('day');
    	$year = $request->input('year');
    	$birthdate = $month.'-'.$day.'-'.$year;
   		$firstname = $request->input('firstname');
   		$lastname = $request->input('lastname');
   		$password = $request->input('password');
   		$address = $request->input('address');
   		$contact = $request->input('contact');
   		$gender = $request->input('gender');
   		$role = $request->input('role');
   		$age = $request->input('age');
   	if($request->hasFile('file')){

   	}else{
   		if($gender == 'Male'){
	    			$avatar = 'images/avatar/default-avatar-male.jpg';
	    			}
	    else if($gender == 'Female'){
	    			$avatar = 'images/avatar/default-avatar-female.jpg';
	    			}
   	}
   		
   		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();

    	$users = $database->getReference('users');
    	
    	$notif = $database->getReference('admin-notification');
    	$checkUsers = $users->getValue();
    	$newIDnumber = $users->orderByChild('id_number')->limitToLast(1)->getSnapshot()->getValue();
    	$id = $users->orderByChild('id')->limitToLast(1)->getSnapshot()->getValue();

    	if(!empty($checkUsers)){
    		foreach($id as $ids){
    		$myid = $ids['id'];
    		}
    		foreach($newIDnumber as $newIDnumbers){

    		}
    	}
    		if(empty($checkUsers)){
	    		$uid = 1;
	    		$firstID = $idnumber + $uid;

	    		if($request->hasFile('file')){
		            $file = $request->file('file');
		            $name = $file->getClientOriginalName();
		            $file->move('images/storage/user_'.$uid, $name);
		            $avatar = 'images/storage/user_'.$uid.'/'.$name;
    			}
	    		$users->getChild('id_'.$uid)->set([
	    			'id' => $uid,
	    			'id_number' => $firstID,
	    			'firstname' => $firstname,
	    			'lastname' => $lastname,
	    			'password' => Hash::make($password),
	    			'address' => $address,
	    			'contact' => $contact,
	    			'gender' => $gender,
	    			'role' => $role,
	    			'age' => $age,
	    			'month' => $month,
	    			'day' => $day,
	    			'year' => $year,
	    			'birthdate' => $birthdate,
	    			'profile' => $avatar,
	    			'status' => 0,
	    			'disable' => 0,
	    			'created_at' => $current_time
	    		]);
	    		//account notif
	    		$notif->getChild('notif_'.$uid)->set([
	    			'id' => $uid,
	    			'title' => 'User Registration',
	    			'message' => 'Created',
	    			'firstname' => $firstname,
	    			'lastname' => $lastname,
	    			'icon' => 'fa-check',
	    			'role' => $role,
	    			'id_number' => $idnumber,
	    			'date' => $now,
	    			'key' => 'create',
	    			'time' => $time
	    		]);
    		}
	    	else{
	    		$uid = $myid + 1;
	    		$newestID = $newIDnumbers['id_number'] + 1;
	    		if($request->hasFile('file')){
		            $file = $request->file('file');
		            $name = $file->getClientOriginalName();
		            $file->move('images/storage/user_'.$uid, $name);
		            $avatar = 'images/storage/user_'.$uid.'/'.$name;
    			}
	    		$users->getChild('id_' .$uid)->set([
	    			'id' => $uid,
	    			'id_number' => $newestID,
	    			'firstname' => $firstname,
	    			'lastname' => $lastname,
	    			'password' => Hash::make($password),
	    			'address' => $address,
	    			'contact' => $contact,
	    			'gender' => $gender,
	    			'role' => $role,
	    			'age' => $age,
	    			'month' => $month,
	    			'day' => $day,
	    			'year' => $year,
	    			'birthdate' => $birthdate,
	    			'profile' => $avatar,
	    			'status' => 0,
	    			'disable' => 0,
	    			'created_at' => $current_time
	    		]);

	    		$notif->getChild('notif_'.$uid)->set([
	    			'id' => $uid,
	    			'title' => 'User Registration',
	    			'message' => 'Successfully Created',
	    			'firstname' => $firstname,
	    			'lastname' => $lastname,
	    			'icon' => 'fa-check',
	    			'role' => $role,
	    			'id_number' => $newestID,
	    			'date' => $now,
	    			'key' => 'create',
	    			'time' => $time
	    		]);
	    	}
		return redirect('admin/users')
		->with('success', "Created ".$role.' '.$firstname);
        }
    }


    public function getUpdate($id){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();
    	$ref = $database->getReference('users');
    	$users = $ref->getChild('id_'.$id)->getValue();

    	return view('admin.edituser', compact('users'));
    }

    public function Update(Request $request, $id){
        if(session()->has('email')){
    	$firstname = $request->input('firstname');
    	$lastname = $request->input('lastname');
    	$age = $request->input('age');
    	$month = $request->input('month');
    	$day = $request->input('day');  
    	$year = $request->input('year');
        $birthdate = $month.'-'.$day.'-'.$year;
    	$gender = $request->input('gender');
    	$contact = $request->input('contact');
    	$address = $request->input('address');
    	$password = $request->input('password');
    	$role = $request->input('role');
        $now = Carbon::now();
        date_default_timezone_set('Asia/Singapore');
        $time = date('g:i A');

        if($role == null){
            $role = 'Admin';
        }
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();
    	$ref = $database->getReference('users');
        $notif = $database->getReference('admin-notification');
        $info = $ref->getChild('id_'.$id)->getValue();

        if($request->hasFile('file')){
                    $file = $request->file('file');
                    $name = $file->getClientOriginalName();
                    $file->move('images/storage/user_'.$info['id'], $name);
                    $avatar = 'images/storage/user_'.$info['id'].'/'.$name;
        }else{
            $avatar = $info['profile'];
        }

        $newNotif = $notif->orderByChild('id')
        ->limitToLast(1)
        ->getValue();
        if(!empty($notif)){
            foreach($newNotif as $myid){
                $uid = $myid['id'] + 1;
            }
        }else{
            $uid = 1;
        }
        $notif->getChild('notif_'.$uid)->set([
                    'id' => $uid,
                    'title' => 'Updated a User '.$info['role'],
                    'message' => 'Successfully Updated',
                    'firstname' => $info['firstname'],
                    'lastname' => $info['lastname'],
                    'icon' => 'fa-edit',
                    'role' => $info['role'],
                    'id_number' => $info['id_number'],
                    'date' => $now,
                    'key' => 'update',
                    'time' => $time
                ]);

    	$post = [
                    'id_'.$id.'/firstname' => $firstname,
                    'id_'.$id.'/lastname' => $lastname,
                    'id_'.$id.'/password' => $password,
                    'id_'.$id.'/address' => $address,
                    'id_'.$id.'/contact' => $contact,
                    'id_'.$id.'/gender' => $gender,
                    'id_'.$id.'/role' => $role,
                    'id_'.$id.'/age' => $age,
                    'id_'.$id.'/month' => $month,
                    'id_'.$id.'/day' => $day,
                    'id_'.$id.'/year' => $year,
                    'id_'.$id.'/birthdate' => $birthdate,
                    'id_'.$id.'/profile' => $avatar,
    	];

        $ref->update($post);

        return redirect('/admin/users')->with('success', 'Updated '.$info['role'].' '.$info['firstname']);
        }
    }

    public function destroyUsers($id){
    	
    	if(session()->has('email')){
	    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
			$firebase = (new Factory)
	    	->withServiceAccount($serviceAccount)
	    	->create();

	    	$database = $firebase->getDatabase();
	    	$ref = $database->getReference('recentuser');
	    	$get = $ref->orderByChild('idnumber')->equalTo($id)->getValue();
            
            print_r($get);
            die();
	    	$message = $ref->getChild('id_'.$id)->getValue();
	    	$msg = 'Deleted '.$message['role'].' '.$message['firstname'];
    		
    		$remove = $ref->getChild('id_'.$id)->remove();
    		return redirect('admin/users')->with('error', $msg);
    	}else{
    		return redirect('/admin/login');
    	}
    	
    }

    public function adminPriviledge(Request $request, $id){
    	if(session()->has('email')){
    		$priviledge = $request->input('role');
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();
    	$ref = $database->getReference('teachers');
    	$notif = $database->getReference('admin-notification');
    	$updates = [
    		'id_'.$id.'/role' => $priviledge
    	];
    	$get = $ref->getChild('id_'.$id)->getValue();
    	$now = Carbon::now();
    	date_default_timezone_set('Asia/Singapore');
        $time = date('g:i A');

    	$ref->update($updates);
    	$notification = $database->getReference('admin-notification')->orderByChild('id')->limitToLast(1)->getValue();
    	foreach($notification as $NID)
    	{
    		$resultID = $NID;
    	}
    	
    	// unfinished
    	$uid = $resultID['id'] + 1;
    	$notif->getChild('notif_'.$uid)->set([
	    			'id' => $uid,
	    			'title' => 'Admin Priviledge',
	    			'message' => 'Grant Access to',
	    			'firstname' => $get['firstname'],
	    			'lastname' => $get['lastname'],
	    			'icon' => 'fa-star',
	    			'role' => $priviledge,
	    			'id_number' => $get['teacher_id'],
	    			'date' => $now,
	    			'key' => 'priviledge',
	    			'time' => $time
	    		]);

    	if($priviledge == 'Teacher'){
    		$msg = 'Demoted '.$get['firstname'].' to '.$priviledge;
    		$alert = 'error';
    		$notif->getChild('notif_'.$uid)->set([
	    			'id' => $uid,
	    			'title' => 'Removed Admin Priviledge',
	    			'message' => 'Removed Admin Access to',
	    			'firstname' => $get['firstname'],
	    			'lastname' => $get['lastname'],
	    			'icon' => 'fa-times',
	    			'role' => $get['role'],
	    			'id_number' => $get['teacher_id'],
	    			'date' => $now,
	    			'key' => 'demoted',
	    			'time' => $time
	    		]);
    	}
    	else if($priviledge == 'Admin'){
    		$msg = 'Promoted '.$get['firstname'].' to '.$priviledge;
    		$alert = 'success';
    		$notif->getChild('notif_'.$uid)->set([
	    			'id' => $uid,
	    			'title' => 'Grant Admin Priviledge',
	    			'message' => 'Grant Admin Priviledge Access to',
	    			'firstname' => $get['firstname'],
	    			'lastname' => $get['lastname'],
	    			'icon' => 'fa-key',
	    			'role' => $get['role'],
	    			'id_number' => $get['teacher_id'],
	    			'date' => $now,
	    			'key' => 'promoted',
	    			'time' => $time
	    		]);
    	}
    	
    		
    	return redirect('/admin/users/admin')->with($alert, $msg);
    	}
    }
}
