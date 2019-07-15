<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\Facades\Validator;

class StudentAuthController extends Controller
{
    public function studentAuth(Request $request){
    		$validator = \Validator::make($request->all(), [
            'Susername' => 'required|max:20',
            'Spassword' => 'required|min:5|max:20',
            ]);
            
            if ($validator->fails())
            {
                return response()->json(['errors' => $validator->errors()->all()]);
            }else{
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$studentID = $request->Susername;
        $user = $studentID;
    	$password = $request->Spassword;
        $ref = $database->getReference('students');
    	if($username = $ref->orderByChild('student_id')->equalTo($user + 0)->getValue()){
            $username = $ref->orderByChild('student_id')->equalTo($user + 0)->getValue();
        }else{
            return response()->json(['errors' => 'No such username exist!'], 200);
        }
     	if(!empty($username)){
     		foreach($username as $users){

        	}
     	}else{
     		$users = null;
     	}
        	

        
        if($users['student_id'] == $studentID){
            if(Hash::check($password, $users['password'])){
                if($users['role'] == 'Student'){
                    if($users['disable'] !== "1"){
                        $request->session()->put('student_id', $studentID);
                        $update = [
                            'id_'.$users['id'].'/status' => 1
                        ];
                        $ref->update($update);

                        return response()->json(['success' => 'Redirecting...'], 200);
                    }else{
                       return response()->json(['errors' => 'Your Account has been blocked'], 200);
                    }
                }else{
                    return response()->json(['errors' => 'No such username exist!'], 200);
                }
            }else{
                return response()->json(['errors' => 'Wrong Username or Password'], 200);
            }
        }else{
           return response()->json(['errors' => 'No such username exist!'], 200);
        }
    }
    	
    }

    public function logout(Request $request){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
          $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
        $database = $firebase->getDatabase();
        $id = $request->session()->get('student_id');
        $teacher = $id + 0;
        $ref = $database->getReference('students');
        $myid =  $ref->orderByChild('student_id')->equalTo($teacher)->getValue();
        if(!empty($myid)){
            foreach($myid as $refs){

            }
            $update = [
                        'id_'.$refs['id'].'/status' => 0
                    ];
            $ref->update($update);
        }

        $request->session()->forget('student_id');
        return redirect('/')->with('logout', 'Success');
    }
}
