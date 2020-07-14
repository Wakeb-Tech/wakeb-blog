<!DOCTYPE html>
<html lang="{{ lang() }}">
  <head>
    

    

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--facebook open graph-->
    <meta name="og:type" content="{{ lang() == 'ar' ? 'مدونة' : 'Blog'}}">
    <meta name="og:site_name" content="{{ lang() == 'ar' ? setting()->sitename_ar : setting()->sitename_en}}">

    @yield('og-title')
    @yield('og-image')
    @yield('og-description')

    <!--SEO-->
    <meta name="author" content="wakeb Admin">
    @if (trim($__env->yieldContent('description')))
    <meta name="description" content="@yield('description')">
    @else
    <meta name="description" content="{{setting()->description}}">
    @endif
    @if (trim($__env->yieldContent('description')))
    <meta name="keywords" content="@yield('keywords')">
    @else
    <meta name="keywords" content="{{setting()->keywords}}">
    @endif
    
 <meta name="google-site-verification" content="Q2dTTBTr4cZzVYqNN5ft9t5IjjB8Df-M0SvIz084OiQ" />


    <title> @yield('title', lang() == 'ar' ? setting()->sitename_ar : setting()->sitename_en )</title>

    


     <!-- cairo font CSS-->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <!--favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ setting()->icon_path }}">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    
    @stack('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.style.css') }}">

    @if(lang() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.style.rtl.css') }}">
    @endif
    {!! setting()->googleAnalytics !!}
  </head>
  <body>
    <!-- loader-->
    @include('layouts.front.loader')
    <!-- Navbar-->
    @include('layouts.front.nav')
    
    
      @yield('content')

    <!-- Footer-->
  @include('layouts.front.footer')