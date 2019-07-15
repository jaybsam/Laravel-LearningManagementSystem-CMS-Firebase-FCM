<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ScheduleController extends Controller
{
    public function schedule(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$session = session()->get('teacher_id');

    	$id = $session + 0;
    	$ref = $database->getReference('users');
    	$subject = $database->getReference('subject');
    	$section = $database->getReference('section');
    	$schedule = $database->getReference('schedule');
    	$sections = $section->getValue();
    	$subjects = $subject->getValue();
    	$myaccount = $ref->orderByChild('id_number')->equalTo($id)->getValue();
    	$myschedule = $schedule->getValue();
    	foreach($myaccount as $myaccounts){
    		$profile = $myaccounts;
    	}
    	return view('teacher.schedule')
    	->with('myschedule', $myschedule)
    	->with('profile', $profile)
    	->with('subjects', $subjects)
    	->with('sections', $sections);
    }

    public function view($id){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$session = session()->get('teacher_id');

    	$uid = $session + 0;
    	$ref = $database->getReference('users');
    	$schedule = $database->getReference('schedule');
    	$mysched = $schedule->getChild('s'.$id)->getValue();
    	$myaccount = $ref->orderByChild('id_number')->equalTo($uid)->getValue();
    	foreach($myaccount as $myaccounts){
    		$profile = $myaccounts;
    	}
    	return view('teacher.scheduleview')
    	->with('profile', $profile)
    	->with('mysched', $mysched);
    }

    public function addSchedule(Request $request){
    	if(session()->has('teacher_id')){
    		$validator = \Validator::make($request->all(), [
            'class' => 'required',
            'subject' => 'required',
            'section' => 'required',
            'room' => 'required',
            'description' => 'required',
            'timestart' => 'required',
            'timeend' => 'required',
            'day' => 'required',
            'date' => 'required',
            'capacity' => 'required',
            'option' => 'required',
	        ]);
	        
	        if ($validator->fails())
	        {
	            return response()->json(['errors'=>$validator->errors()->all()]);
	        }else{


	        
    		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
			$firebase = (new Factory)
	    	->withServiceAccount($serviceAccount)
	    	->create();
	    	$database = $firebase->getDatabase();

	    	$schedule = $database->getReference('schedule');
	    	$checksched = $schedule->getValue();
	    	if(!empty($checksched)){
	    		$schedID = $schedule->orderByChild('id')->limitToLast(1)->getValue();
	    		foreach($schedID as $mySched){
	    			$newID = $mySched;
	    		}
	    		$id = $newID['id'] + 1;
	    	}else{
	    		$id = 1;
	    	}
	    	$classcode = $id + 1000;
	    	$schedMaterials = $schedule->getChild('s'.$id)
	    	->set([
	    		'id' => $id,
	    		'classcode' => $classcode,
	    		'class' => $request->class,
	    		'subject' => $request->subject,
	    		'section' => $request->section,
	    		'room' => $request->room,
	    		'description' => $request->description,
	    		'timestart' => $request->timestart,
	    		'timeend' => $request->timeend,
	    		'day' => $request->day,
	    		'date' => $request->date,
	    		'capacity' => $request->capacity,
	    		'option' => $request->option
	    	]);
	    	return response()->json($request->all() + ['id' => $id, 'classcode' => $classcode]);
	    	// return redirect('/mrhs/teacher/academics/schedule')->with('success', 'Set your new schedule!');
	    	}
    	}
    }
    public function deleteSchedule($id){
    		if(session()->has('teacher_id')){

	    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
			$firebase = (new Factory)
	    	->withServiceAccount($serviceAccount)
	    	->create();

	    	$database = $firebase->getDatabase();
	    	$ref = $database->getReference('schedule');
	    	$get = $ref->getChild('s'.$id)->getChild('id');
	    	$message = $ref->getChild('s'.$id)->getValue();
	    	$msg = 'Deleted Schedule with section '.$message['section'];
    		
    		$ref->getChild('s'.$id)->remove();
    		return response()->json($msg);


    	}else{
    		return redirect('/');
    	}
    }
}
