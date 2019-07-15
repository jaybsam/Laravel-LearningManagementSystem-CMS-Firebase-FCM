<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class EventController extends Controller
{
    public function index(){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();
    	$database = $firebase->getDatabase();
    	$admin = $database->getReference('admin')->getValue();
    	$event = $database->getReference('events')->orderByChild('id')->limitToLast(1000)->getValue();
    	if(!empty($event)){
    		foreach(array_reverse($event) as $myevent){
    			$events[] = $myevent;
    		}
    	}else{
    		$events = null;
    	}
    	if(!empty($admin)){
    		foreach($admin as $admins){

    		}
    	}else{
            $admins = null;
        }
        return view('admin.events')->with('admins', $admins)->with('events', $events);
    }

    public function store(Request $request){
    	if(session()->has('email')){
    		
	        $cat = $request->input('cat');
	        $content = $request->input('hideme');
	        $shortcontent = $request->input('shortcontent');
	        $title = $request->input('title');
	        $tags = $request->input('tags');

	        
	       
    		$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
			  $firebase = (new Factory)
	    	->withServiceAccount($serviceAccount)
	    	->create();
	    	$database = $firebase->getDatabase();
	    	$events = $database->getReference('events');
	    	$check = $events->getValue();
	    	if(!empty($check)){
	    		$event = $events->orderByChild('id')->limitToLast(1)->getValue();
	    		foreach($event as $myevent){
	    			$id = $myevent['id'];
	    		}
	    		$uid = $id + 1;
	    	}else{
	    		$uid = 1;
	    	}
	    	if($request->hasFile('file')){
                        $file = $request->file('file');
                        $name = $file->getClientOriginalName();
                        $file->move('images/storage/events/event_'.$uid, $name);
                        $cover = 'images/storage/events/event_'.$uid.'/'.$name;
                        }

	    	$events->getChild('id_'.$uid)->set([
	    		'id' => $uid,
	    		'cover' => $cover,
	    		'category' => $cat,
	    		'shortcontent' => $shortcontent,
	    		'content' => $content,
	    		'title' => $title,
	    		'tags' => $tags
	    	]);

    		return redirect('/admin/events/events&program')->with('success', 'Successfully Created a new event.');
    	
    	}else{
    		return redirect('admin/login');
    	}
    }
}
