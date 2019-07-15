<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Carbon\Carbon;


class ClassController extends Controller
{
    public function store($sid, $tid, $sec){
    	if(session()->has('teacher_id')){
    	
    		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $database = $firebase->getDatabase();
            $class = $database->getReference('class');
            $mystudent = $database->getReference('students');

            // grading
            $first = $database->getReference('firstgrading');
            $second = $database->getReference('secondgrading');
            $third = $database->getReference('thirdgrading');
            $fourth = $database->getReference('fourthgrading');

            $ssid = $sid + 0;
            $student = $database->getReference('students')->orderByChild('student_id')->equalTo($ssid)->getValue();
            $classID = $class->orderByChild('id')->limitToLast(1)->getValue();
            $classCheck = $class->getValue();
            if(!empty($student)){
            	foreach($student as $students){

            	}
            }else{
            	$students = null;
            }

            if(!empty($classCheck)){
            	foreach($classID as $myclass){

            	}
            	$id = $myclass['id'] + 1;
            }else{
            	$id = 1;
            }
            // time
            $mytime = Carbon::now('Asia/Singapore');
                foreach($mytime as $yourtime){
                    $current_time[] = $yourtime;
                }
                $current_time = $mytime->date;

            $class_id = $id + 4000;
            $schedule_id = $sec + 2000;
            $class->getChild('id_'.$id)->set([
            	'id' => $id,
            	'class_id' => $class_id,
                'schedule_id' => $schedule_id,
            	'teacher_id' => $tid + 0,
            	'student_id' => $sid + 0,
            	'section_id' => $sec + 0,
            	'time_stamp' => $current_time
            ]);
            $update = [
            	'id_'.$students['id'].'/section_id' => $sec + 0
            ];
            $mystudent->update($update);
            $first->getChild('id_'.$id)->set([
            	'id' => $id,
                'schedule_id' => $schedule_id,
            	'student_id' => $sid + 0,
            	'teacher_id' => $tid + 0,
            	'section_id' => $sec + 0
            ]);
            $second->getChild('id_'.$id)->set([
            	'id' => $id,
                'schedule_id' => $schedule_id,
            	'student_id' => $sid + 0,
            	'teacher_id' => $tid + 0,
            	'section_id' => $sec + 0
            ]);
            $third->getChild('id_'.$id)->set([
            	'id' => $id,
                'schedule_id' => $schedule_id,
            	'student_id' => $sid + 0,
            	'teacher_id' => $tid + 0,
            	'section_id' => $sec + 0
            ]);
            $fourth->getChild('id_'.$id)->set([
            	'id' => $id,
                'schedule_id' => $schedule_id,
            	'student_id' => $sid + 0,
            	'teacher_id' => $tid + 0,
            	'section_id' => $sec + 0
            ]);

            $totalclass = $database->getReference('class')->orderByChild('teacher_id')->equalTo($tid +  0)->getValue();
            $totalStudents = count($totalclass);

            $getSection = $database->getReference('section');
            $section = $database->getReference('section')->orderByChild('section_id')->equalTo($sec + 0)->getValue();
            if(!empty($section)){
            	foreach ($section as $key => $mysection) {
            		# code...
            	}
            	$section_id = $mysection['id'];
            }
            $update_section = [
            	'id_'.$section_id.'/students/studentsCount' => $totalStudents
            ];
            $getSection->update($update_section);

            // return 
            return response()->json(['students' => $students, 'totalStudents' => $totalStudents, 'section' => $mysection], 200);

    	}
    	else{
    		return redirect('/');
    	}
    }

    public function destroy($sid, $sec){
    	if(session()->has('teacher_id')){
    		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
            $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $database = $firebase->getDatabase();
            $student = $database->getReference('students');
            // grading
            $first = $database->getReference('firstgrading');
            $second = $database->getReference('secondgrading');
            $third = $database->getReference('thirdgrading');
            $fourth = $database->getReference('fourthgrading');

            $section = $database->getReference('section')->orderByChild('section_id')->equalTo($sec + 0)->getValue();
            $classes = $database->getReference('class');
            $students = $student->orderByChild('student_id')->equalTo($sid + 0)->getValue();
            $class = $database->getReference('class')->orderByChild('student_id')->equalTo($sid + 0)->getValue();
            if(!empty($class)){
            	foreach($class as $myclass){

            	}
            	$class_id = $myclass['id'];
            }
            if(!empty($section)){
                foreach($section as $mysection){

                }
            }else{
                $section = null;
            }
            if(!empty($students)){
            	foreach ($students as $key => $mystudent) {
            		# code...
            	}
            	$studentID = $mystudent['id'];
            }else{
            	$studentID = null;
            	$mystudent = null;
            }

           	$classes->getChild('id_'.$class_id)->remove();
            $first->getChild('id_'.$class_id)->remove();
            $second->getChild('id_'.$class_id)->remove();
            $third->getChild('id_'.$class_id)->remove();
            $fourth->getChild('id_'.$class_id)->remove();

           	$update = [
           		'id_'.$studentID.'/section_id' => 0
           	];
            
           	$student->update($update);
           	$totalclass = $database->getReference('class')->orderByChild('teacher_id')->equalTo(session()->get('teacher_id') + 0)->getValue();
            $totalStudents = count($totalclass);
           	return response()->json(['class' => $myclass, 'student' => $mystudent, 'id' => $studentID, 'totalStudents' => $totalStudents, 'section' => $mysection]);

    	}else{
    		return redirect('/');
    	}
    }
}
