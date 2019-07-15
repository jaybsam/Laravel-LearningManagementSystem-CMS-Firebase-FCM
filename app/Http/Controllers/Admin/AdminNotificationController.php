<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class AdminNotificationController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();
    	$notif = $database->getReference('admin-notification');
    	$admin = $database->getReference('admin')->getValue();
        if(!empty($admin)){
            foreach($admin as $admins)
            {
            }

        }else{
        	$admins = null;
        }
       

        $setNotif = $notif->orderByChild('id')->limitToLast(100)->getSnapshot()->getValue();
        if($notif->getValue() !== null){
            foreach(array_reverse($setNotif)as $setNotifs){
                $mynotif[] = $setNotifs;
            }
            $totalnotif = sizeof($mynotif);
        }
        
        return view('admin.notification')->with('admins', $admins)->with('setNotif', $setNotif)->with('mynotif', $mynotif)->with('totalnotif', $totalnotif);
    }
}
