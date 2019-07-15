<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class StudentController extends Controller
{
    public function index(){
    	if(session()->has('student_id')){
            $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $database = $firebase->getDatabase();
            $session = session()->get('student_id');

            $id = $session;
            $ref = $database->getReference('students');
            $myaccount = $ref->orderByChild('student_id')->equalTo($id)->getValue();
            
            if(!empty($myaccount)){
                foreach($myaccount as $myaccounts){
                $profile = $myaccounts;
                }
                    }else{
                        $profile = null;
                    }
            
            return view('student.student-dashboard')->with('profile', $profile);
        }else{
            return redirect('/');
        }
    }
}
