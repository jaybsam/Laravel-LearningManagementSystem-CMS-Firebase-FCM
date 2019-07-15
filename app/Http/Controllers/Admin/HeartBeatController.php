<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;

class HeartBeatController extends Controller
{
    public function beat($admin){
		    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
	            $firebase = (new Factory)
	            ->withServiceAccount($serviceAccount)
	            ->create();
	            $database = $firebase->getDatabase();

	            $heart = $database->getReference('heartbeat');
	            $checkheart = $heart->getValue();
    			// time
                $mytime = Carbon::now('Asia/Singapore');
                foreach($mytime as $yourtime){
                    $current_time[] = $yourtime;
                }
                $beat = $mytime->date;
                
                $checkuser = $heart->orderByChild('a_admin')->equalTo($admin)->getValue();
                if(!empty($checkuser)){
                	foreach($checkuser as $fetchID){

                	}
                	$upd = $fetchID['beat_id'];
                }else{
                	$upd = null;
                }

               
                if(empty($checkuser)){
                	if(!empty($checkheart)){
                		foreach($checkheart as $myheart){
                			
                		}
                		$id = $myheart['beat_id'] + 1;
                	}else{
                		$id = 1;
                	}
                	
                	$heart->getChild('id_'.$id)->set([
                		'beat_id' => $id,
                		'a_admin' => $admin,
                		'beat_time' => $beat
                	]);
                }else{
                	$update = [
                		'id_'.$upd.'/beat_time' => $beat
                	];
                	$heart->update($update);
                }
                return response()->json(['success' => 'Success heartbeat sent!']);
    }
}
