<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;

class AdminScheduleController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();



    	$database = $firebase->getDatabase();
    	$admin = $database->getReference('admin')->getValue();
    	$schedule = $database->getReference('section')->getValue();
        $teacher = $database->getReference('teachers')->getValue();

        
        if(!empty($teacher)){
            foreach($teacher as $myteacher){
                $teachers[] = $myteacher;
            }
        }else{
            $teachers = null;
        }
        if(!empty($schedule)){
            foreach($schedule as $myschedule){
            $realsched[] = $myschedule;
            }
        }
        else{
            $realsched = null;
        }
    	if(!empty($admin)){
            foreach($admin as $admins){

            }
        }else{
            $admin = null;
        }
    	
    	return view('admin.schedule')->with('admins', $admins)->with('realsched', $realsched)->with('teachers', $teachers);
    }
    public function manage($id){
        //   if(7.50 >= 7.00 && 8.50 <= 8.00){
        //     echo 'success';
        // }else{
        //     echo 'failed!';
        // }
        // die();
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    // grading ref
        // $schedule = $database->getReference('schedule');
        // $check2 = $schedule->orderByChild('start')->startAt(7.50)->getValue();
        // foreach($check2 as $time){
        //     if(7.00 <= $time['start'] && 9.00 >= $time['start']){
        //         echo 'conflict!<br>';
        //         $conf = 'conflict!<br>';
        //     }
        //     else if(7.00 <= $time['end'] && 9.00 >= $time['end']){
        //          echo 'conflict!<br>';
        //         $conf ='conflict!<br>';
        //     }
        //     else{
        //         echo 'success<br>';
        //     }
        //     print_r($time['start'].' - '.$time['end'].'<br>');
        // }
        // if(!empty($conf)){
        //     echo "failed !!!";
        // }else{
        //     echo "go!";
        // }
        // die();

    	$admin = $database->getReference('admin')->getValue();
    	$subject = $database->getReference('subject')->getValue();
    	$teacher = $database->getReference('teachers')->getValue();

        $section = $database->getReference('section');
        $child = $section->getChild('id_'.$id)->getValue();
        
    	$schedule = $database->getReference('schedule')->orderByChild('section_id')->equalTo($child['section_id'])->getValue();

    	if(!empty($schedule)){
            $totalsched = sizeof($schedule);
    		foreach($schedule as $myschedule){
    		$schedules[] = $myschedule;
    		}
    	}else{
    		$schedules = null;
            $totalsched = null;
    	}
    	if(!empty($teacher)){
			foreach($teacher as $myteacher){
			    		$teachers[] = $myteacher;
			    	}
    	}else{
    		$teachers = null;
    	}
    	if(!empty($subject)){
    		foreach($subject as $mysubject){
    		$subjects[] = $mysubject;
    		}
    	}
    	else{
    		$subjects = null;
    	}
    	
    	foreach($admin as $admins){

    	}
    	


    	return view('admin.manageschedule')
    	->with('child', $child)
    	->with('admins', $admins)
    	->with('subjects', $subjects)
    	->with('teachers', $teachers)
    	->with('schedules', $schedules)
    	->with('totalsched', $totalsched);
    }
    public function store(Request $request){
    	if(session()->has('email')){
    		$validator = \Validator::make($request->all(), [
            'section_id' => 'required',
            'subject' => 'required',
            'category' => 'required',
            'teacher' => 'required',
            'timestart' => 'required',
            'timeend' => 'required',
            'day' => 'required',
	        ]);
	        
	        if ($validator->fails())
	        {
	            return response()->json(['errors' => $validator->errors()->all()]);
	        }else{
	    		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
				$firebase = (new Factory)
		    	->withServiceAccount($serviceAccount)
		    	->create();
		    	$database = $firebase->getDatabase();
		    	$schedule = $database->getReference('schedule');
                $check1 = $schedule->orderByChild('subject_id')->equalTo($request->subject_id + 0)->getValue();
                $teachers =$database->getReference('teachers')->orderByChild('teacher_id')->equalTo($request->teacher + 0)->getValue();
                if(!empty($teachers)){
                    foreach($teachers as $teacher){

                    }
                    $teacher_name = $teacher['firstname'].' '.$teacher['lastname'];
                }else{
                    $teacher_name = null;
                }
		    	$check = $schedule->getValue();

		    	if(!empty($check)){
		    		$cc = $schedule->orderByChild('id')->limitToLast(1)->getValue();
		    		foreach($cc as $mysched){
		    			
		    		}
		    		$id = $mysched['id'] + 1;
		    	}
		    	else{
		    		$id = 1;
		    	}
                $sched_id = $request->section_id + 2000;

                $mysection = $schedule->orderByChild('section_id')->equalTo($request->section_id + 0)->getValue();


            if(!empty($check1) && !empty($mysection)){
                    return response()->json(['fail_subject' => 'Subject already exist!']);
                }else{
                    $check2 = $schedule->orderByChild('section_id')->equalTo($request->section_id + 0)->getValue();
                    $start = $request->timestart + 0;
                    $end = $request->timeend + 0;
                    if(!empty($check2)){
                        foreach($check2 as $time){
                        if($start <= $time['start'] && $end >= $time['start']){
                            $checksched = 'failed';
                        }
                        else if($start <= $time['end'] && $end >= $time['end']){
                            $checksched = 'failed';
                        }
                        else{
                           $succ = 'success!';
                        }
                    }
                }else{
                    $checksched = null;
                }

                    if(!empty($checksched) && !empty($mysection)){
                        return response()->json(['conflict' => 'Schedule Conflict !']);
                    }else{
                        $schedule->getChild('id_'.$id)->set([
                            'id' => $id,
                            'schedule_id' => $sched_id,
                            'section_id' => $request->section_id + 0,
                            'subject_id' => $request->subject_id + 0,
                            'teacher_id' => $request->teacher + 0,
                            'subject' => $request->subject,
                            'category' => $request->category,
                            'instructor' => $teacher_name,
                            'start' => $request->timestart + 0,
                            'end' => $request->timeend + 0,
                            'day' => $request->day
                        ]);
                        return response()->json($request->all() + ['id' => $id, 'teacher_name' => $teacher_name, 'time' => $time]);
                    }
                   
                 
		    	
		    }

            
            }
    	}else{
    		return redirect('/admin/login');
    	}
    }

    public function editAdviser(Request $request){
        if(session()->has('email')){
                $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
                $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();
                $database = $firebase->getDatabase();
                $user = $database->getReference('teachers');
                $section = $database->getReference('section');
                $teacherNotif = $database->getReference('teacher-notification');
                $check1 = $teacherNotif->orderByChild('id')->limitToLast(1)->getValue();
                if(!empty($check1)){
                    foreach($check1 as $tnotif){
                        $TID = $tnotif['notification_id'] + 1;
                    }
                    
                }else{
                    $TID = 1;
                }
                $name = $user->getChild('id_'.$request->id)->getValue();
                // time
                $mytime = Carbon::now('Asia/Singapore');
                foreach($mytime as $yourtime){
                    $current_time[] = $yourtime;
                }
                $current_time = $mytime->date;
                // endtime
                $update = [
                    'id_'.$request->id1.'/profile' => $name['profile'],
                    'id_'.$request->id1.'/teacher_id' => $name['teacher_id'],
                    'id_'.$request->id1.'/adviser' => $name['firstname'].' '.$name['lastname']
                ];
                $teacherupdate = [
                    'id_'.$request->id.'/adviser' => 1
                ];
                $key1 = $teacherNotif->push()->getKey();
                $teacherNotif->getChild($key1)->set([
                    'notification_id' => $TID,
                    'fromuser' => 'Admin',
                    'touser' => $name['teacher_id'],
                    'title' => 'Advisory Class',
                    'message' => 'Please check your designated advisory class',
                    'type' => 'advisory',
                    'time_stamp' => $current_time
                ]);

                $section->update($update);
                $user->update($teacherupdate);
                
                return response()->json($request->all() + ['profile' => $name['profile'], 'adviser' => $name['firstname'].' '.$name['lastname'], 'teacher_id' => $name['teacher_id']]);
        }else{
            return redirect('/admin/login');
        }
    }
    public function unsetAdviser(Request $request){
        if(session()->has('email')){
                $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
                $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->create();
                $database = $firebase->getDatabase();
                $user = $database->getReference('teachers');
                $section = $database->getReference('section');
                $name = $section->getChild('id_'.$request->id)->getValue();
                $newid = $name['teacher_id'] - 100000;
                $myuser = $user->orderByChild('teacher_id')->equalTo($name['teacher_id'])->getValue();
                if(!empty($myuser)){
                    foreach($myuser as $users){

                    }
                    $profile = $users['profile'];
                    $firstname = $users['firstname'];
                    $lastname = $users['lastname'];
                    $teacher_id = $users['teacher_id'];
                    $uid = $users['id'];
                }
                
                $update = [
                    'id_'.$request->id.'/profile' => 0,
                    'id_'.$request->id.'/teacher_id' => 0,
                    'id_'.$request->id.'/adviser' => 'Not yet assigned'
                ];

                $teacherupdate = [
                    'id_'.$newid.'/adviser' => 0
                ];

                $section->update($update);
                $user->update($teacherupdate);

                return response()->json($request->all() + ['profile' => $profile, 'firstname' => $firstname, 'lastname' => $lastname, 'teacher_id' => $teacher_id, 'uid' => $uid]);
        }else{
            return redirect('/admin/login');
        }
    }
}
