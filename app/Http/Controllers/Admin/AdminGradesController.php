<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class AdminGradesController extends Controller
{
    public function gradingSystem(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$account = $database->getReference('admin');
    	$subject = $database->getReference('subject')->getValue();
    	if(!empty($subject)){
    		foreach($subject as $mysubjects){
    			$subjects[] = $mysubjects;
    		}
    	}else{
    		$subjects = null;
    	}
    	$admin = $account->getValue();

    	if(!empty($admin)){
    		foreach($admin as $admins){
    			
    		}
    	}else{	
    		$admin = null;
    	}
    	return view('admin.gradingsystem')->with('admins', $admins)->with('subjects', $subjects);
    }
    public function view($id){
    	
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$account = $database->getReference('admin');
    	$subject = $database->getReference('subject');
    	$view = $subject->getChild('sub_'.$id)->getValue();
    	$admin = $account->getValue();

    	if(!empty($admin)){
    		foreach($admin as $admins){
    			
    		}
    	}else{	
    		$admin = null;
    	}

    	return view('admin.viewgradingsystem')->with('view', $view)->with('admins', $admins);
    }
}
