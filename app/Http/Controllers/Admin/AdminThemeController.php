<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class AdminThemeController extends Controller
{
    public function theme(Request $request){
    	$theme = $request->input('hot');
    	$theme1 = $request->input('cold');
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/Firebase/Wekonek.json');
		  $firebase = (new Factory)
    	->withServiceAccount($serviceAccount)
    	->create();

    	$database = $firebase->getDatabase();

    	$ref = $database->getReference('theme');
    	
    	$msg = 'Theme Saved';
    	if($theme){
    		$ref->set([
    			'sidebarcolor' =>"linear-gradient(to bottom, #e50f68, #f77a10e6)",
    			'background' => "url(https://wallpapertag.com/wallpaper/full/c/c/b/143196-nature-background-hd-2304x1440-notebook.jpg)",
    			'navbarcolor' => "#5d515440",
    			'ucolor' => "#e34635e8",
    			'button' => "linear-gradient(to right, #e5195f, #ff5135)",
    			'alert' => "#e2134c"
    		]);
    	}
    	else if($theme1){
    			$ref->set([
    			'sidebarcolor' => "linear-gradient(to bottom, #124c9c, #0fa7ff)",
    			'background' => "url(http://1.bp.blogspot.com/-YpX1_pXkBCM/US5O6aPjGlI/AAAAAAAAT0c/yjygW2zepYs/s1600/Snow+Mountains+Wallpapers+2.jpg)",
    			'navbarcolor' => "#1f87f04a",
    			'ucolor' => "#124c9ce0",
    			'button' => "#0f7ae5",
    			'alert' => "rgb(33, 138, 234)"
    		]);
    	}


    	return redirect()->back()->with('success', $msg);
    }
}
