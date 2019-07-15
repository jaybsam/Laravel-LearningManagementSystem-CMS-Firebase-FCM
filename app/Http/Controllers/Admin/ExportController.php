<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ExportController extends Controller
{
    public function index(){
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
        return view('admin.export')->with('admins', $admins);
    }
    public function export(){
			$firebase_url = 'https://ikonek-71bcb.firebaseio.com';
			$database_secret = 'l0XeKYQHEZMgL2kbHl9oWtlLspWsdlpwzKnAwe8C';
    		$filename = date('Y-m-d H-i-s').'.json';
			// File location. It is inside backups folder, change if you use different approach
			$file_location = getcwd() . '/database/'.$filename;
			// Here using cUrl, making api request
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => $firebase_url . "/.json?format=export&auth=" . $database_secret,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET"
			));
			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);
			if ($err) {
			  // In case there is some errors, print them out
			  echo "cURL Error #:" . $err;
			} else {
			  // Else, write the response to file
			  $backup_file = fopen($file_location, 'wb');
			  fwrite($backup_file, $response);
			  fclose($backup_file);
			  echo 'File \'' . $filename . '\' successfully has been created.';

			}
			return response()->download($file_location, $filename);
		}

}
