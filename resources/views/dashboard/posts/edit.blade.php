@extends('layouts.dashboard.app')

@section('content')

    <h2>Posts</h2>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">Posts</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.posts.update', $post->id) }}"   enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label>Post Arabic Title</label>
                        <input type="text" name="title_ar" class="form-control" value="{{ old('title_ar', $post->title_ar ) }}">
                    </div> 

                    <div class="form-group">
                        <label>Post English Title</label>
                        <input type="text" name="title_en" class="form-control" value="{{ old('title_en', $post->title_en ) }}">
                    </div>

                    <div class="form-group">
                        <label>Arabic Short Description</label>
                        <input type="text" name="desc_ar" class="form-control" value="{{ old('desc_ar', $post->desc_ar ) }}">
                    </div> 

                    <div class="form-group">
                        <label>English Short Description</label>
                        <input type="text" name="desc_en" class="form-control" value="{{ old('desc_en', $post->desc_en ) }}">
                    </div>

                     <div class="form-group">
                            <label>Arabic Body</label>
                             <textarea name="body_ar" id="summernote" class="form-control ckeditor">{{ $post->body_ar }}</textarea>
                     </div>

                     <div class="form-group">
                            <label>English Body</label>
                            <textarea name="body_en" id="summernote1" class="form-control ckeditor">{{ $post->body_en }}</textarea>
                     </div>

                      <div class="form-group">
                            <label>Categories</label>
                            <select name="category_id" class="form-control">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>

                         <div class="form-group">
                            <label>Post Slug </label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug', $post->slug) }}">
                        </div>

                        <div class="form-group">
                            <label>Post Keywords </label>
                            <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $post->meta_keywords ) }}">

                        </div>

                        <div class="form-group">
                            <label>Post Description </label>
                            <input type="text" name="meta_description" class="form-control" value="{{ old('meta_description', $post->meta_description ) }}">

                        </div>


                     <div class="form-group">
                            <label>Tags</label>
                            @php
                            $array = [];
                            foreach ($tag as $k) {
                                $array[]= $k->id;
                            }
                            
                             @endphp
                             <select name = 'tag_name[]' multiple  class="form-control select2">   
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->name }}" {{ in_array( $tag->id, $array ) ? 'selected' : '' }}>{{ $tag->name }}</option>
                              @endforeach
                            </select> 
                         </div>

                         <div class="form-group">
                            <label>Post image</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $post->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>


                        <div class="form-group">
                            <label>Cover Image</label>
                            <input type="file" name="cover" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ $post->cover_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection