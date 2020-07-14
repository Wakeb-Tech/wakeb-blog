<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SittingRequest;
use App\Setting;

class SettingController extends Controller
{
    public function setting()
    {
    	return view('dashboard.sittings.edit');
    }// end setting

     public function setting_save (SittingRequest $request) {

		   $setting = Setting::first();
		   $setting->sitename_ar = $request->sitename_ar ;
		   $setting->sitename_en = $request->sitename_en ;
		   $setting->main_lang   = $request->main_lang ;
		   $setting->description = $request->description ;
		   $setting->keywords    = $request->keywords;
		   $setting->googleAnalytics = $request->googleAnalytics;

     	 if($request->has('logo')) {
            $basename = Str::random();
            $file = $request->file('logo');
            $original = $basename . "." . $file->getClientOriginalExtension();
            $file->move("uploads/sittings", $original);
            $post->logo = $original ;

       	 }

       	 if($request->has('icon')) {
            $basename = Str::random();
            $file = $request->file('icon');
            $original = $basename . "." . $file->getClientOriginalExtension();
            $file->move("uploads/sittings", $original);
            $post->icon = $original ;
       	 }

    	 $setting->update();
         session()->put('lang', $setting->main_lang);
    	 session()->flash('success', 'Setting Updated successfully');
         return redirect(url('dashboard/settings'));

    }

}
