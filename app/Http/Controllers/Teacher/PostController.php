<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index($schedule_id){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
           $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $database = $firebase->getDatabase();
            
             $session = session()->get('teacher_id');

            $id = $session + 0;
            $ref = $database->getReference('teachers');
            $schedule = $database->getReference('schedule')->getValue();
            $tschedule = $database->getReference('schedule')->orderByChild('teacher_id')->equalTo($id)->getValue();

            // new start
            
            $realsched = $database->getReference('schedule')->orderByChild('subject_id')->equalTo($schedule_id + 0)->getValue();
            if(!empty($realsched)){
                foreach($realsched as $psched){

                }
                $schedule_section_id = $psched['section_id'];
            }
            $subject_student = $database->getReference('students')->orderByChild('section_id')->equalTo($schedule_section_id + 0)->getValue();
            if(!empty($subject_student)){
                foreach($subject_student as $sub_student){
                    $my_student[] = $sub_student;
                }
            }else{
                $my_student = null;
            }
            // 


            if(!empty($tschedule)){
                foreach($tschedule as $getTotal){
                    $realTotal[] = $getTotal;
                }
                $totalLesson = count($realTotal);
            }else{
                $totalLesson = null;
            }

            $section = $database->getReference('section')->orderByChild('teacher_id')->equalTo($id)->getValue();
            $allschedule = $database->getReference('schedule')->orderByChild('teacher_id')->equalTo($id)->getValue();
            // print_r(sizeof($allschedule));
            // die();
            if(!empty($section)){
                foreach($section as $mysect){

                }
            }else{
                $mysect = null;
            }
            if(!empty($schedule)){
                foreach($schedule as $myschedule){
                    $sched[] = $myschedule;
                }
            }else{
                $sched = null;
            }
            // post
            $post = $database->getReference('post')->getValue();
            if(!empty($post)){
                foreach(array_reverse($post) as $thispost){
                    $mypost[] = $thispost;

           
                }
            }else{
                $mypost = null;
            }
            // end post
            $notification = $database->getReference('teacher-notification');
            $class = $database->getReference('class')->orderByChild('teacher_id')->equalTo($id)->getValue();
            $totalStudents = count($class);
            $subject = $database->getReference('subject')->getValue();
            $students = $database->getReference('students')->getValue();
            $search = $notification->orderByChild('touser')->equalTo($id)->limitToLast(4)->getValue();
            $notif1 = $notification->getValue();
            $notif2 = $notification->orderByChild('touser')->equalTo($id)->limitToLast(10)->getValue();

            if(!empty($subject)){
                foreach($subject as $mysubject){
                    $subjects[] = $mysubject;
                }
            }else{
                $subjects = null;
            }
            if(!empty($notif1)){
                foreach($notif1 as $notifs1){
                    $no1[] = $notifs1;
                }
            }else{
                $no1 = null;
            }
            if(!empty($class)){
                foreach($class as $classes){
                    
                }
            }else{
                $classes = null;
            }
            
            if(!empty($students)){
                foreach(array_reverse($students) as $student){
                    $mystudent[] = $student;
                }
            }else{
                $mystudent = null;
            }
            if(!empty($search)){
                foreach(array_reverse($search) as $notif){
                    $arryNotif[] = $notif;
                }
                
                $totalNotif = sizeof($search);
            }else{
                $arryNotif=null;
                $totalNotif=0;
            }
            if(!empty($notif2)){
                foreach(array_reverse($notif2) as $notifs2){
                    $no2[] = $notifs2;
                }
            }else{
                $no2 = null;
            }
            $mystudents = $database->getReference('students')->orderByChild('section_id')->equalTo($classes['section_id'])->getValue();
            
            $myaccount = $ref->orderByChild('teacher_id')->equalTo($id)->getValue();
            
            if(!empty($myaccount)){
                foreach($myaccount as $myaccounts){
                $profile = $myaccounts;
                }
                $update = [
                        'id_'.$profile['id'].'/status' => 1
                    ];
                        $ref->update($update);
                    }else{
                        $profile = null;
                    }
    		return view('teacher.post')
    		->with('profile', $profile)
            ->with('arryNotif', $arryNotif)
            ->with('totalNotif', $totalNotif)
            ->with('no2', $no2)
            ->with('mystudent', $mystudent)
            ->with('mysect', $mysect)
            ->with('classes', $classes)
            ->with('mystudents', $mystudents)
            ->with('totalStudents', $totalStudents)
            ->with('sched', $sched)
            ->with('mypost', $mypost)
            ->with('totalLesson', $totalLesson)
            ->with('schedule_id', $schedule_id)
            ->with('subjects', $subjects)
            ->with('my_student', $my_student);
    }

    public function store(Request $request){
    	if(session()->has('teacher_id')){
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
           $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $database = $firebase->getDatabase();
            
            $post = $database->getReference('post');
            $checkpost = $post->getValue();

            $sectionsubject = $request->input('subsec');
            $category = $request->input('category');
            $topic = $request->input('topic');
            $description = $request->input('description');
            $id = session()->get('teacher_id') + 0;
            $teacher = $database->getReference('teachers')->orderByChild('teacher_id')->equalTo($id)->getValue();
            if(!empty($teacher)){
                foreach($teacher as $myteacher){

                }
                $teacher_id = $myteacher['id'];
            }

            if($request->hasFile('file')){
                        $file = $request->file('file');
                        $name = $file->getClientOriginalName();
                        $file->move('images/storage/teacher/teacher_'.$teacher_id, $name);
                        $img_post = 'images/storage/teacher/teacher_'.$teacher_id.'/'.$name;
                        }
                        else{
                            $img_post = 0;
                        }
            if(!empty($checkpost)){
                foreach($checkpost as $mypost){

                }
                $post_id = $mypost['id'] + 1;
            }else{
                $post_id = 1;
            }
            // time
            $mytime = Carbon::now('Asia/Singapore');
                foreach($mytime as $yourtime){
                    $current_time[] = $yourtime;
                }
                $current_time = $mytime->date;


            $post->getChild('id_'.$post_id)->set([
                'id' => $post_id,
                'sectionsubject' => $sectionsubject + 0,
                'teacher_id' => $id,
                'category' => $category,
                'topic' => $topic,
                'description' => $description,
                'files' => $img_post,
                'onhold' => 0,
                'created_at' => $current_time
            ]);


            return redirect()->back();

    	}else{
    		return view('/');
    	}
    }
}
