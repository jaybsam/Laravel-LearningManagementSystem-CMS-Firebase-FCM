<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;

class SectionController extends Controller
{
    public function section(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$session = session()->get('teacher_id');
    	$id = $session + 0;
    	$ref = $database->getReference('users');
    	$section = $database->getReference('section');
    	$sections = $section->getValue();
    	$myaccount = $ref->orderByChild('id_number')->equalTo($id)->getValue();
    	foreach($myaccount as $myaccounts){
    		$profile = $myaccounts;
    	}
    	return view('teacher.section')
    	->with('profile', $profile)
    	->with('sections', $sections);
    }

    public function addsection(Request $request){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		$firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$date = Carbon::now();
    	$time = date('Y-m-d H:i:s');
    	$ref = $database->getReference('section');
    	$section = $ref->getValue();
    	if(!empty($section)){
    		$sectionId = $ref->orderByChild('id')->limitToLast(1)->getValue();
    		foreach($sectionId as $IdSection){
    			$Sections = $IdSection;
    		}
    		$id = $Sections['id'] + 1;
    	}else{
    		$id = 1;
    	}
    	$ref->getChild('id_'.$id)->set([
    		'id' => $id,
    		'section' => $request->section,
    		'room' => $request->room,
    		'owner' => $request->owner,
    		'time' => $time,
    		'created_at' => $date
    	]);

    	return response()->json($request->all() + ['id' => $id, 'time' => $time, 'created_at' => $date]);

    }
}
