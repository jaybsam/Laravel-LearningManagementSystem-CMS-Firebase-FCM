<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;

class GradeController extends Controller
{
    public function grade($subject_id){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $database = $firebase->getDatabase();
            $session = session()->get('teacher_id');

            $id = $session + 0;
            $ref = $database->getReference('teachers');

            $gradeHeader = $database->getReference('gradeHeader')->orderByChild('subject_id')->equalTo($subject_id + 0)->getValue();
            if(!empty($gradeHeader)){
            	foreach($gradeHeader as $mygradeHead){
            		$highscore[] = $mygradeHead;
            	}
            	$totalww = $mygradeHead['ww1'] + $mygradeHead['ww2'] + $mygradeHead['ww3'] + $mygradeHead['ww4'] + $mygradeHead['ww5'] + $mygradeHead['ww6'] + $mygradeHead['ww7'] + $mygradeHead['ww8'] + $mygradeHead['ww9'] + $mygradeHead['ww10'];
            	$totalpt = $mygradeHead['pt1'] + $mygradeHead['pt2'] + $mygradeHead['pt3'] + $mygradeHead['pt4'] + $mygradeHead['pt5'] + $mygradeHead['pt6'] + $mygradeHead['pt7'] + $mygradeHead['pt8'] + $mygradeHead['pt9'] + $mygradeHead['pt10'];
            	$totalqa = $mygradeHead['qa1'];
            }else{
            	$highscore = null;
            	$totalww = null;
            	$totalpt = null;
            	$totalqa = null;
            }
            // students per section
            $realsched = $database->getReference('schedule')->orderByChild('subject_id')->equalTo($subject_id + 0)->getValue();
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
            // end limit

            $schedule = $database->getReference('schedule')->getValue();
            $tschedule = $database->getReference('schedule')->orderByChild('teacher_id')->equalTo($id)->getValue();
            if(!empty($tschedule)){
                foreach($tschedule as $getTotal){
                    $realTotal[] = $getTotal;
                }
                $totalLesson = count($realTotal);
            }else{
                $totalLesson = null;
            }
            $section = $database->getReference('section')->orderByChild('teacher_id')->equalTo($id)->getValue();
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

            $post = $database->getReference('post')->orderByChild('sectionsubject')->equalTo($mysect['section_id'] + 0)->getValue();
            if(!empty($post)){
                foreach(array_reverse($post) as $thispost){
                    $mypost[] = $thispost;

           
                }
            }else{
                $mypost = null;
            }
            $notification = $database->getReference('teacher-notification');
            $class = $database->getReference('class')->orderByChild('teacher_id')->equalTo($id)->getValue();
            $totalStudents = count($class);
            
            $students = $database->getReference('students')->getValue();
            $search = $notification->orderByChild('touser')->equalTo($id)->limitToLast(4)->getValue();
            $notif1 = $notification->getValue();
            $notif2 = $notification->orderByChild('touser')->equalTo($id)->limitToLast(10)->getValue();
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
                   return view('teacher.grades')->with('profile', $profile)
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
            ->with('totalLesson', $totalLesson)->with('subject_id', $subject_id)->with('highscore', $highscore)->with('totalww', $totalww)->with('totalpt', $totalpt)->with('totalqa', $totalqa)->with('my_student', $my_student);
    }

    public function store(Request $request, $subject_id){
    	if(session()->has('teacher_id')){
    		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $database = $firebase->getDatabase();
            $session = session()->get('teacher_id');
            $teacher_id = $session + 0;
            // inputs
            $summative = $request->input('summative');
            $highscore = $request->input('highscore');
            $cols = $request->input('cols');


            $ref = $database->getReference('gradeHeader');
            $getID = $ref->orderByChild('subject_id')->equalTo($subject_id + 0)->getValue();

            $check = $ref->getValue();
           if(!empty($getID)){
           		foreach($getID as $updateGrade){

           		}
           		$new_id = $updateGrade['id'];
           		if($summative == 'ww'){
           			$update = [
           				'id_'.$new_id.'/ww'.$cols => $highscore
           			];
           		}else if($summative == 'pt'){
           			$update = [
           				'id_'.$new_id.'/pt'.$cols => $highscore
           			];
           		}else if($summative == 'qa'){
           			$update = [
           				'id_'.$new_id.'/qa'.$cols => $highscore
           			];
           		}

           		$ref->update($update);


           }else{
	           	if(!empty($check)){
	            	$get = $ref->orderByChild('id')->limitToLast(1)->getValue();
	            	foreach($get as $myid){

	            	}
	            	$id = $myid['id'] + 1;
	            }else{
	            	$id = 1;
	            }

	            if($summative == 'ww'){
	            	if($cols == 1)
	            	$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww2' => 0,
	            	'ww3' => 0,
	            	'ww4' => 0,
	            	'ww5' => 0,
	            	'ww6' => 0,
	            	'ww7' => 0,
	            	'ww8' => 0,
	            	'ww9' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
	            else if($cols == 2)	
	            	$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww1' => 0,
	            	'ww3' => 0,
	            	'ww4' => 0,
	            	'ww5' => 0,
	            	'ww6' => 0,
	            	'ww7' => 0,
	            	'ww8' => 0,
	            	'ww9' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            	else if($cols == 3)
            		$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww1' => 0,
	            	'ww2' => 0,
	            	'ww4' => 0,
	            	'ww5' => 0,
	            	'ww6' => 0,
	            	'ww7' => 0,
	            	'ww8' => 0,
	            	'ww9' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            	else if($cols == 4)
            		$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww2' => 0,
	            	'ww3' => 0,
	            	'ww1' => 0,
	            	'ww5' => 0,
	            	'ww6' => 0,
	            	'ww7' => 0,
	            	'ww8' => 0,
	            	'ww9' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            	else if($cols == 5)
            		$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww2' => 0,
	            	'ww3' => 0,
	            	'ww1' => 0,
	            	'ww4' => 0,
	            	'ww6' => 0,
	            	'ww7' => 0,
	            	'ww8' => 0,
	            	'ww9' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            	else if($cols == 6)
            		$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww2' => 0,
	            	'ww3' => 0,
	            	'ww1' => 0,
	            	'ww5' => 0,
	            	'ww4' => 0,
	            	'ww7' => 0,
	            	'ww8' => 0,
	            	'ww9' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            	else if($cols == 7)
            		$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww2' => 0,
	            	'ww3' => 0,
	            	'ww1' => 0,
	            	'ww5' => 0,
	            	'ww6' => 0,
	            	'ww4' => 0,
	            	'ww8' => 0,
	            	'ww9' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            	else if($cols == 8)
            		$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww2' => 0,
	            	'ww3' => 0,
	            	'ww1' => 0,
	            	'ww5' => 0,
	            	'ww6' => 0,
	            	'ww7' => 0,
	            	'ww4' => 0,
	            	'ww9' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            	else if($cols == 9)
            		$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww2' => 0,
	            	'ww3' => 0,
	            	'ww1' => 0,
	            	'ww5' => 0,
	            	'ww6' => 0,
	            	'ww7' => 0,
	            	'ww8' => 0,
	            	'ww4' => 0,
	            	'ww10' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            	else if($cols == 10)
            		$ref->getChild('id_'.$id)->set([
	            	'id' => $id,
	            	'subject_id' => $subject_id + 0,
	            	'teacher_id' => $teacher_id,
	            	'quarter' => 1,
	            	'ww'.$cols => $highscore,
	            	'ww2' => 0,
	            	'ww3' => 0,
	            	'ww1' => 0,
	            	'ww5' => 0,
	            	'ww6' => 0,
	            	'ww7' => 0,
	            	'ww8' => 0,
	            	'ww9' => 0,
	            	'ww4' => 0,
	            	'pt1' => 0,
	            	'pt2' => 0,
	            	'pt3' => 0,
	            	'pt4' => 0,
	            	'pt5' => 0,
	            	'pt6' => 0,
	            	'pt7' => 0,
	            	'pt8' => 0,
	            	'pt9' => 0,
	            	'pt10' => 0,
	            	'qa1' => 0   	
            	]);
            }else if($summative == 'pt'){
            	if($cols == 1)
            	$ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt2' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 2)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 3)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt2' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 4)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt3' => 0,
	            'pt2' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 5)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt2' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 6)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt2' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 7)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt2' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 8)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt2' => 0,
	            'pt9' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 9)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt2' => 0,
	            'pt10' => 0,
	            'qa1' => 0
	            ]);
	            else if($cols == 10)
	            $ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt'.$cols => $highscore,
	            'pt1' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt2' => 0,
	            'qa1' => 0
            ]);
            }else if($summative == 'qa'){
            	$ref->getChild('id_'.$id)->set([
            	'id' => $id,
	            'subject_id' => $subject_id + 0,
	            'teacher_id' => $teacher_id,
	            'quarter' => 1,
	            'ww4' => 0,
	            'ww2' => 0,
	            'ww3' => 0,
	            'ww1' => 0,
	            'ww5' => 0,
	            'ww6' => 0,
	            'ww7' => 0,
	            'ww8' => 0,
	            'ww9' => 0,
	            'ww4' => 0,
	            'pt1' => 0,
	            'pt2' => 0,
	            'pt3' => 0,
	            'pt4' => 0,
	            'pt5' => 0,
	            'pt6' => 0,
	            'pt7' => 0,
	            'pt8' => 0,
	            'pt9' => 0,
	            'pt2' => 0,
	            'qa1'.$cols => $highscore
            ]);
            }
           }
            
            
            
            
            return redirect()->back();

    	}else{
    		return view('/');
    	}
    }
    public function firstgrading(Request $request){
    		
    }
}
