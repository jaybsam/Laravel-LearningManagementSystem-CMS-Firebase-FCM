<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class IndexController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Admin/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();
    	$event = $database->getReference('events');
    	
    	$gets = $event->getValue();
        if(!empty($gets)){
            foreach($gets as $mygets){
            $get[] = $mygets;
            }
        }else{
            $get = null;
        }
    	

    	return view('home')->with('get', $get);
    }
}
