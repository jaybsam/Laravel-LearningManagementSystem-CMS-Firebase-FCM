<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;

class AdminControllerAuth extends Controller
{
    public function index(Request $request){
    	$validator = \Validator::make($request->all(), [
            'username' => 'required|email|min:2|max:20',
            'password' => 'required|min:5|max:20',
	        ]);
	        
	        if ($validator->fails())
	        {
	            return response()->json(['errors' => $validator->errors()->all()]);
	        }else{
    	$email = $request->username;
    	$password = $request->password;
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
        $database = $firebase->getDatabase();

        $ref = $database->getReference('admin');

    	        $check1 = $ref->orderByChild('role')->equalTo('Admin')->getSnapshot()->getValue();
                foreach($check1 as $checked){

                }
                if($checked['email'] == $email){
                    if(Hash::check($password, $checked['password'])){
                        $request->session()->put('email', $email);
                        
                        return response()->json(['success' => 'Redirecting...']);
                    }
                    else{
                        return response()->json(['error' => 'Incorrect Password']);
                    }
                }
                else{
                    return response()->json(['error' => 'Wrong Username or Password']);
                }
            }
    	
        // if(){
        //     if(
        // }
    	// $auth = $firebase->getAuth();

    	// if($auth->verifyPassword($email, $password)){
    	// 	$request->session()->put('email', $email);	
    	// 	return redirect('/admin');
    	// }
    	// else{
    	// 	echo "failed login!";
    	// }

    	
  //   	$email = 'nevored@yahoo.com';
  //   	$password = 'qweqwe123';
		// try {
		//     $user = $auth->verifyPassword($email, $password);
		// } catch (Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
		//     echo $e->getMessage();
		// }

    	

    	// $all = $ref->orderByChild('age')->equalTo('18')->getValue();
    	// foreach($all as $alls){
    		
    	// 	$id = $ref->getChild('id_'.$alls['id'])->getChild('id');



    	// }
    }
    // public function createmaster(){
    //     $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
    //       $firebase = (new Factory)
    //     ->withServiceAccount($serviceAccount)
    //     ->create();

    //     $database = $firebase->getDatabase();

    //     $time = Carbon::now();
    //     $trialExpires = $time->addDays(1);

    //     $ref = $database->getReference('admin');
    //     $password = Hash::make('N09066805419');
    //     $password2 = Hash::make('N09356669388');
    //     $ref->getChild(1)->set([
    //         'id' => 1,
    //         'displayname' => 'Admin',
    //         'firstname' => 'Admin',
    //         'lastname' => 'Admin',
    //         'email' => 'admin@outlook.io',
    //         'username' => 'admin09066',
    //         'password' => $password,
    //         'secondpassword' => $password2,
    //         'role' => 'Admin',
    //         'status' => 0,
    //         'block' => 0,
    //         'attempt' => 0,
    //         'profile' => '',
    //         'created_at' => '2018-28-11'
    //     ]);
    //     echo "success";
    // }
    public function logout(Request $request){
    	$request->session()->forget('email');
    	return redirect('admin/login');
    }
}
