@extends('layouts.dashboard.app')

@section('content')

    <h2>Sittings</h2>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">Sittings</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <form method="post" action="{{url('/dashboard/settingsave')}}"   enctype="multipart/form-data">
                    @csrf
                   

                    @include('dashboard.partials._errors')

                

                    <div class="form-group">
                        <label>Arabic Site Name</label>
                        <input type="text" name="sitename_ar" class="form-control" value="{{ old('sitename_ar', setting()->sitename_ar ) }}">
                    </div>
                    <div class="form-group">
                        <label>English Site Name</label>
                        <input type="text" name="sitename_en" class="form-control" value="{{ old('sitename_en', setting()->sitename_en ) }}">
                    </div>

                     <div class="form-group">
                        <label>keywords</label>
                        <textarea name="keywords" class="form-control ckeditor">{{ setting()->keywords }}</textarea>
                     </div>

                     <div class="form-group">
                        <label>description</label>
                        <textarea name="description" class="form-control ckeditor">{{ setting()->description }}</textarea>
                     </div>

                     <div class="form-group">
                            <label>Default Language</label>
                            <select name="main_lang" class="form-control">
                               
                                <option value="ar" {{ setting()->main_lang == 'ar' ? 'selected' : '' }}>Arabic</option>
                                <option value="en" {{ setting()->main_lang == 'en' ? 'selected' : '' }}>English</option>
                                
                            </select>
                        </div>

                     <div class="form-group">
                        <label>Google Analytics</label>
                        <textarea name="googleAnalytics" class="form-control ckeditor">{{ setting()->googleAnalytics }}</textarea>
                     </div>

                         <div class="form-group">
                            <label>Site logo</label>
                            <input type="file" name="logo" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ setting()->logo_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>


                        <div class="form-group">
                            <label>Site Icon</label>
                            <input type="file" name="icon" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ setting()->icon_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection