@extends('layouts.dashboard.app')
@push('styles')
<style type="text/css">
	.line-body {
		text-align: center;
    	font-size: 50px;
    	font-weight: bold;
    	color: #f8f9fa;
	}
	.card-header {
		font-size: 20px;
		font-weight: bold;
		font-weight: bold;
	}
	.breadcrumb {
		background-color:#343a40;
	}
	.breadcrumb a {
		color: #f8f9fa;
	}
	
</style>
@endpush
@section('content')

<h2> Dashboard </h2>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Library</a></li>
          <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
      </nav>

       <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
				  <div class="card-header">Posts</div>
				  <div class="card-body">
				    <p class="line-body">{{ $posts }}</p>
				  </div>
				</div>

            </div>

            

            <div class="col-md-4">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
				  <div class="card-header">Tags</div>
				  <div class="card-body">
				    <p class="line-body">{{ $tags }}</p>
				  </div>
				</div>
            </div>

            <div class="col-md-4">

                 <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
				  <div class="card-header">Categories</div>
				  <div class="card-body">
				    <p class="line-body">{{ $categories }}</p>
				  </div>
				</div>
            </div>

        </div>
    </div>

@endsection
