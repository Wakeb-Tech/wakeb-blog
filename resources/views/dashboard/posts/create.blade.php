@extends('layouts.dashboard.app')

@section('content')

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
                        <label>Arabic Post Title </label>
                        <input type="text" name="title_ar"  class="form-control" value="{{ old('title_ar') }}">
                    </div>

                    <div class="form-group">
                        <label>English Post Title</label>
                        <input type="text" name="title_en"  class="form-control" value="{{ old('title_en') }}">
                    </div>

                    <div class="form-group">
                        <label>Arabic Short Description </label>
                        <input type="text" name="desc_ar"   class="form-control" value="{{ old('desc_ar') }}">
                    </div>

                    <div class="form-group">
                        <label>English Short Description</label>
                        <input type="text" name="desc_en"   class="form-control" value="{{ old('desc_en') }}">
                    </div>

                    <div  class="form-group">
                        <label>Arabic Body</label>  
                        <textarea name="body_ar" id="summernote"  class="form-control ckeditor">{{ old('body_ar') }}</textarea>
                        
                    </div>

                    <div  class="form-group">
                        <label>English Body</label>  
                        <textarea name="body_en" id="summernote1"  class="form-control ckeditor">{{ old('body_en') }}</textarea>
                        
                    </div>

                        <div class="form-group">
                            <label>Post Cover </label>
                            <input type="file" required name="cover" class="form-control image">
                        </div>

                        <div class="form-group">
                            <label>Post image</label>
                            <input type="file" required name="image" class="form-control image">
                        </div>

                      <div class="form-group">
                        <label>Tags</label>
                         <select class="form-control select2" required name = 'tag_name[]' multiple >   
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->name }}" {{ old('tag_name') == $tag->name ? 'selected' : '' }}>{{ $tag->name}}</option>
                          @endforeach
                        </select> 
                     </div>

                     <div class="form-group">
                            <label>category</label>
                            <select  required name="category_id" id="category" class="form-control">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name_en}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Post Slug </label>
                            <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                        </div>

                       

                        <div class="form-group">
                            <label>Post Keywords </label>
                            <input type="text" name="meta_keywords" placeholder="  ex ::واكب مجيب تويتلاب  wakeb tech مفيد"  class="form-control" value="{{ old('meta_keywords') }}">
                        </div>

                        <div class="form-group">
                            <label>Post Description </label>
                            <input type="text" name="meta_description"   class="form-control" value="{{ old('meta_description') }}">
                        </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection