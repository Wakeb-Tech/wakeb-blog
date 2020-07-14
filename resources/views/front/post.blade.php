@extends('layouts.front.app')

@section('title', lang() == 'ar' ? $post->title_ar : $post->title_en )

@section('og-title')
  <meta property="og:title" content="{{$post->selectLang(lang(), 'title')}}"/>
 @endsection

@section('og-description')
  <meta property="og:description" content="{{$post->meta_description}}"/>
 @endsection


 @section('description'){{$post->meta_description}}@endsection
 @section('keywords'){{$post->meta_keywords}}@endsection

@if(!empty($post->image_path))
    @section('og-image')
      <meta property="og:image" content="{{ $post->image_path }}">
     @endsection
@endif



@section('content')
  
  <header class="header mt-4">
    <div class="">
      <div class="header__shapes">
        <img src="{{ asset('images/shapes.svg') }}" width="100%" alt="wakeb">
      </div>
      <img src="{{ $post->cover_path }}" width="100%" alt="wakeb blog">
    </div>
  </header>

  <!-- Begin Post Section -->
  <main class="post">
    <div class="container">
      <div class="post__header text-center">
        <h1 class="post__head h2">{{$post->selectLang(lang(), 'title')}}</h1>
        <p class="post__subdesc mx-auto">{{$post->selectLang(lang(), 'desc')}}</p>
          <div class="post__social-media">
            @include('dashboard.partials._share_buttons' ,['post' => $post])
          </div>
      </div>
      <div class="post__body row">
        <div class="col-lg-12">
    {!! $post->selectLang(lang(), 'body') !!}
        </div>
        
        <div class="col-12">
          <div class="blog__tags d-flex justify-content-center mt-5 flex-wrap">
        
            @foreach($post->tags as $tag)
            <a href="{{ url('tag/'. $tag->id .'/posts')}}" class="tag">{{$tag->name}}</a>
            
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </main> <!-- End Post Section -->
  @endsection