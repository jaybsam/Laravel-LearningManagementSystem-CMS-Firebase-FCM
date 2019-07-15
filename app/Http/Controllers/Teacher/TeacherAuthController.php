<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Illuminate\Support\Facades\Validator;

class TeacherAuthController extends Controller
{
    public function accesskey(Request $request){
        $validator = \Validator::make($request->all(), [
            'username' => 'required|min:6|max:20',
            'password' => 'required|min:5|max:20',
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
    	$teacherID = $request->username;
        $user = $teacherID + 0;
    	$password = $request->password;
        $ref = $database->getReference('teachers');
    	if($username = $ref->orderByChild('teacher_id')->equalTo($user)->getValue()){
            $username = $ref->orderByChild('teacher_id')->equalTo($user)->getValue();
        }else{
            return response()->json(['errors' => 'No such username exist!'], 200);
        }

        foreach($username as $users){

        }
    //  if($users['disable'] !== "1"){
    //     if($users['role'] == 'Teacher'){
    //         if($users['id_number'] == $teacherID){
    //          echo'success';
    //         if(Hash::check($password, $users['password'])){
    //             echo "success2";
    //         }else{
    //             return redirect()->back()->with('error', 'Wrong Username or password')->with('class', 'uk-active')->withInput($request->input());
    //         }
    //         }else{
    //            return redirect('/')->with('error', 'Wrong Username or password')->with('class', 'uk-active')->withInput($request->input());
    //         }
    //     }else{
    //         return redirect('/')->with('error', 'No such username exist.')->with('class', 'uk-active')->withInput($request->input());
    //     }
    // }else{
    //     return redirect()->back()->with('error', 'Your account has been blocked.')->with('class', 'uk-active')->withInput();
    // }
        

        if($users['teacher_id'] == $teacherID){
            if(Hash::check($password, $users['password'])){
                if($users['role'] == 'Teacher' || $users['role'] == 'Admin'){
                    if($users['disable'] !== "1"){
                        $request->session()->put('teacher_id', $teacherID);
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
        $id = $request->session()->get('teacher_id');
        $teacher = $id + 0;
        $ref = $database->getReference('teachers');
        $myid =  $ref->orderByChild('teacher_id')->equalTo($teacher)->getValue();
        if(!empty($myid)){
            foreach($myid as $refs){

            }
            $update = [
                        'id_'.$refs['id'].'/status' => 0
                    ];
            $ref->update($update);
        }

        $request->session()->forget('teacher_id');
        return redirect('/')->with('logout', 'Success');
    }
}
