<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;

class SubjectController extends Controller
{
    public function lessons(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $database = $firebase->getDatabase();
            $session = session()->get('teacher_id');

            $id = $session + 0;
            $ref = $database->getReference('teachers');

            // carbon time teacher
            $dt = Carbon::now();
            $date =  $dt->format('l, F d, Y'); 

            $schedule = $database->getReference('schedule')->getValue();
            $subject = $database->getReference('subject')->getValue();
            if(!empty($subject)){
            	foreach($subject as $mysubject){
            		$subjects[] = $mysubject;
            	}
            }else{
            	$subjects = null;
            }
            $sections = $database->getReference('section')->getValue();
            if(!empty($sections)){
                foreach($sections as $mysections){
                    $sectione[] = $mysections;
                }
            }else{
                $sectione = null;
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
            
            return view('teacher.lessons')->with('profile', $profile)
            ->with('arryNotif', $arryNotif)
            ->with('totalNotif', $totalNotif)
            ->with('no2', $no2)
            ->with('mystudent', $mystudent)
            ->with('mysect', $mysect)
            ->with('mystudents', $mystudents)
            ->with('totalStudents', $totalStudents)
            ->with('sched', $sched)
            ->with('subjects', $subjects)
            ->with('sectione', $sectione)
            ->with('date', $date);
    }
}
