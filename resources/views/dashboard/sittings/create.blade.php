@extends('layouts.dashboard.app')

@section('content')

@php
    if($lang == 'ar') {
        \App::setLocale($lang);
    } else {
        \App::setLocale('en');
    }
@endphp
    <div>
        <h2>Posts</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">Posts</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form action="{{ route('dashboard.posts.store') }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    @php
                        if(\App::getLocale() == 'ar') {
                            echo '<input type="hidden" name="lang" value = "ar">';
                        } else {
                            echo '<input type="hidden" name="lang" value = "en">';
                        }
                    @endphp

                    <div  class="form-group">
                        <label>Body</label>  
                       {{--  <textarea name="body" class="form-control ckeditor">{{ old('body') }}</textarea> --}}
                        <textarea name="body" id="summernote" name="editordata" class="form-control ckeditor">{{ old('body') }}</textarea>
                        
                    </div>

                        <div class="form-group">
                            <label>Post Cover </label>
                            <input type="file" name="cover" class="form-control image">
                        </div>

                        <div class="form-group">
                            <label>Post image</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                      <div class="form-group">
                        <label>Tags</label>
                         <select class="form-control select2" name = 'tag_name[]' multiple >   
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->name }}" {{ old('tag_name') == $tag->name ? 'selected' : '' }}>{{ $tag->name}}</option>
                          @endforeach
                        </select> 
                     </div>

                     <div class="form-group">
                            <label>category</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection