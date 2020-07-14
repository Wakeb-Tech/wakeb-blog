@extends('layouts.dashboard.app')

@section('content')

    <div>
        <h2>Posts</h2>
    </div>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Posts</li>
        {{--<li class="breadcrumb-item active">Data</li>--}}
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <div class="row">

                    <div class="col-12">

                        <form action="">
                            <div class="row">

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                                    </div>
                                </div><!-- end of col -->

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                        <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Post</a>
                                        
                                
                                </div>
                            </div><!-- end of row -->

                        </form><!-- end of form -->

                    </div><!-- end of col 12 -->

                </div><!-- end of row -->

                <div class="row">
                    <div class="col-md-12">
                        @if ($posts->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($posts as $index=>$post)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{$post->selectLang(lang(), 'title')}}</td>
                                        <td>
                                           
                                                <a href="{{ route('dashboard.posts.edit', $post->slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                          
                                                <form method="post" action="{{ route('dashboard.posts.destroy', $post->slug) }}" style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> Delete</button>
                                                </form><!-- end of form -->

                                                <a href="{{ url('/dashboard/posts/publish', ['id' =>$post->id]) }}" class=" <?php if($post->is_published == true){echo 'btn btn-primary' ;} else { echo 'btn btn-danger'; } ?>"> <?php if($post->is_published == true){echo 'Published' ;} else { echo 'UnPublished'; } ?></a>
                                     
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            {{ $posts->appends(request()->query())->links() }}

                        @else
                            <h3 style="font-weight: 400;">Sorry no records found</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection