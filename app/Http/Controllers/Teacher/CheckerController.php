<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class CheckerController extends Controller
{
    public function section($id){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
			$firebase = (new Factory)
	    	->withServiceAccount($serviceAccount)
	    	->create();
	    	$database = $firebase->getDatabase();

	    	$section = $database->getReference('section');
	    	$check = $section->orderByChild('id')->equalTo($id + 0)->getValue();
	    	if(!empty($check)){
	    		foreach($check as $get){

	    		}
	    	}
	    	if($get['status'] == 'Close'){
	    		return response()->json(['close' => 'closed!']);
	    	}else if($get['status'] == 'Open'){
	    		return response()->json(['open' => 'opened!']);
	    	}

	    	
    }
}
