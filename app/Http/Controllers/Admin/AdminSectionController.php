<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class AdminSectionController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$admin = $database->getReference('admin')->getValue();
    	$section = $database->getReference('section')->orderByChild('id')->limitToFirst(1000)->getValue();
    	if(!empty($section)){
    		foreach($section as $mysections){
    			$sections[] = $mysections;
    		}
    	}
    	else{
    		$sections = null;
    	}
    	foreach($admin as $admins){

    	}
    	return view('admin.section')->with('admins', $admins)->with('sections', $sections);
    }

    public function create(Request $request){
    	if(session()->has('email')){
    		$validator = \Validator::make($request->all(), [
            'sectionname' => 'required|min:2|max:20',
            'description' => 'required|min:5|max:100',
            'level' => 'required',
            'room' => 'required|min:1|max:10',
            'capacity' => 'required|min:1|max:2',
            'status' => 'required',
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
	    	$create = $database->getReference('section');
	    	$check1 = $create->orderByChild('sectionName')->equalTo($request->sectionname)->getValue();
	    	$check2 = $create->orderByChild('room')->equalTo($request->room)->getValue();
	    	if(!empty($create->getValue())){
	    		$myid = $create->orderByChild('id')->limitToLast(1)->getValue();
	    		foreach($myid as $ids){

	    		}
	    		$id = $ids['id'] + 1;
	    	}else{
	    		$id = 1;
	    	}
	    	$count = 0;
	    	$section_id = $id + 1000;
		    	if(!empty($check1)){
		    		return response()->json(['errorName' => 'Section is already existing !']);
		    	}else{
		    		if(!empty($check2)){
		    			return response()->json(['errorRoom' => 'Room is already occupied by the other section !']);
		    		}else{
			    			$create->getChild('id_'.$id)->set([
				    		'id' => $id,
				    		'profile' => 0,
				    		'teacher_id' => 0,
				    		'section_id' => $section_id,
				    		'adviser' => 'Not yet assigned',
				    		'sectionName' => $request->sectionname,
				    		'description' => $request->description,
				    		'level' => $request->level,
				    		'room' => $request->room,
				    		'capacity' => $request->capacity,
				    		'students' => [
				    			'studentsCount' => $count
				    		],
				    		'status' => $request->status
				    	]);

				    	return response()->json($request->all() + ['id' => $id, 'count' => $count]);
		    		}
			    }
	    	}

    	}else{
    		return redirect('/admin/login');
    	}
    }
    public function update(Request $request, $id){
    	if(session()->has('email')){
    		$validator = \Validator::make($request->all(), [
            'updatename' => 'required|min:2|max:10',
            'updatedescription' => 'required|min:5|max:500',
            'updatelevel' => 'required',
            'updateroom' => 'required|min:1|max:10',
            'updatecapacity' => 'required',
            'updatestatus' => 'required',
	        ]);
	        
	        if ($validator->fails())
	        {
	            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
	        }else{
    		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
			$firebase = (new Factory)
	    	->withServiceAccount($serviceAccount)
	    	->create();
	    	$database = $firebase->getDatabase();
	    	$section = $database->getReference('section');
	    	$get = $section->orderByChild('id')->equalTo($id + 0)->getValue();
	    	if(!empty($get)){
	    		foreach($get as $sec){

	    		}
	    		$studentsCount = $sec['students']['studentsCount'];
	    		$capacity = $sec['capacity'];
	    	}
	    	if($request->updatecapacity < $studentsCount){
	    		return response()->json(['errorcapacity' => 'Capacity cannot be lesser than enrollees !']);
	    	}else{
	    		$update = [
	    		'id_'.$id.'/sectionName' => $request->updatename,
	    		'id_'.$id.'/description' => $request->updatedescription,
	    		'id_'.$id.'/level' => $request->updatelevel,
	    		'id_'.$id.'/room' => $request->updateroom,
	    		'id_'.$id.'/capacity' => $request->updatecapacity,
	    		'id_'.$id.'/status' => $request->updatestatus
	    	];
	    	$section->update($update);

	    	return response()->json($request->all() + ['id' => $id, 'count' => $studentsCount, 'capacity' => $capacity]);
	    	}
	    	
	    }
    	}else{
    		return redirect('/admin/login');
    	}
    }

    public function destroy($id){
    	if(session()->has('email')){
    		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
			$firebase = (new Factory)
	    	->withServiceAccount($serviceAccount)
	    	->create();
	    	$database = $firebase->getDatabase();
	    	$section = $database->getReference('section');
	    	$section->getChild('id_'.$id)->remove();
	    	$success = 'Successfully deleted section';
	    	return response()->json(['id' => $id, 'success' => $success]);
    	}
    	else{
    		return redirect('/admin/login');
    	}
    }
}
