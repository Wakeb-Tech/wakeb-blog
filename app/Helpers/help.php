<?php

use Carbon\Carbon ; 


if(!function_exists('setting'))
{
	function setting() {
		return \App\Setting::orderBy('id','desc')->first();
	}
}
if(!function_exists('lang'))
{
	function lang () {
		if(session()->has('lang')) {
			return session('lang');
		} else {
			session()->put('lang', setting()->main_lang);
			return setting()->main_lang;
		}
	}
}
if(!function_exists('direction'))
{
	function direction () {
		if(session()->has('lang')) {
			if(session('lang') == 'ar') {
				return 'rtl';
			} else {
				return 'ltr';
			}
		
		} else {
			return 'ltr';
		}
	}
}


if(!function_exists('niceFormate'))
{
	function niceFormate ($val) {
		return Carbon::parse($val)->diffForHumans();
	}
}