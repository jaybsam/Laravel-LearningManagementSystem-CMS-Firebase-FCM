<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class StorageController extends Controller
{
    public function storage(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$admin = $database->getReference('admin')->getValue();

    	if(!empty($admin)){
    		foreach($admin as $admins){

    		}
    	}else{
            $admins = null;
        }
        return view('admin.storage')->with('admins', $admins);
    }
    public function store(Request $request){
    	if(session()->has('email')){
		    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
				  $firebase = (new Factory)
		    	->withServiceAccount($serviceAccount)
		    	->create();
		    	$database = $firebase->getDatabase();

		    	
    	}else{
    		return redirect('/admin/login');
    	}
    }
}
