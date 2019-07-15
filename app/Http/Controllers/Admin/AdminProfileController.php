<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class AdminProfileController extends Controller
{
    public function profile(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
        $database = $firebase->getDatabase();

        $admin = $database->getReference('admin')->getValue();
        

        return redirect('admin.profile')
        ->with('admin', $admin);
    }
    public function accountsettings(){
        if(session()->has('email')){
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
          $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();

        $database = $firebase->getDatabase();
            $admin = $database->getReference('admin')->getValue();
        if(!empty($admin)){
            foreach($admin as $admins)
            {
            }

        }else{
            $admins = null;
        }
        return view('admin.accountsettings')->with('admins', $admins);
        }else{
            return redirect('/admin/login');
        }
    }
}
