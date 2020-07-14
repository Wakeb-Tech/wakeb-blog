@extends('layouts.front.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush

@section('content')
  
  <header class="header">
    <div class="container-fluid">
      <div class="header__shapes">
        <img src="{{ asset('images/shapes.svg') }}" width="100%" alt="wakeb blog">
      </div>
      <div class="header__head text-center">
        <h1>@lang('site.search_result') </h1>
      </div>
    </div>
  </header>

  <!-- Begin Blog Section -->
  <section class="blog">
    <div class="blog__wraper row mx-0 mx-sm-auto">
      <div class="col-12 col-sm-5 col-md-4 col-xl-3 px-0 px-sm-1">
       <div class="blog__popular list-unstyled">
        <div><h2 class="h4 text-uppercase">@lang('site.aticle_search')</h2></div>
        <form action="{{ url('posts/search') }}" method="post">

            @csrf
            @method('post')
          <div>
            <select required multiple id="selectCategory" name="category[]" data-placeholder="{{ lang() == 'ar' ? 'اختر القسم' : 'Select Category' }}">

                @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{ lang() == 'ar' ? $cat->name_ar : $cat->name_en }}</option>
                @endforeach
            </select>
          </div>
        <!-- <div class="pt-4"><h2 class="h4 text-uppercase mt-5">Search</h2></div> -->
          <div>
            <div class="search__post">
                <div class="input-group">
                  <input type="text" required class="form-control" name="search_text" placeholder="{{ lang() == 'ar' ? ' بحث ...' : 'Search..' }}">
                  <div class="input-group-prepend">
                    <span class="input-group-text btn__search">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                </div>
            </div>
          </div>
          <div class="input-group mt-3">
            <button type="submit" class="btn btn-category-search mx-auto px-4 py-2">Search</button>
          </div>
        </form>
      </div>
        
      </div>
      <div class="blog__posts--container col-12 col-sm-7 col-md-8 col-xl-9">
            @if(count($posts) > 0)
          <div class="row align-items-center mx-0 mx-sm-auto pr-sm-3">
            @foreach($posts as $post)
            <!-- Post 1 -->
            <div class="col-md-6 col-xl-4 mb-4 post px-sm-2 mx-auto">
              <div class="card blog__post mb-4 mb-xl-0">
                <a href="{{ url('posts' , ['id'=>$post->slug])}}"><img src="{{ $post->image_path }}" class="card-img-top" alt="post"></a>
                <div class="card-body">
                   <a href="{{ url('posts' , ['id'=>$post->slug])}}" class="post__title"><h5 class="card-title">{{$post->selectLang(lang(), 'title')}}</h5></a>
                  <a href="{{ url('posts' , ['id'=>$post->slug])}}" class="card-text">{{ substr( $post->selectLang(lang(), 'desc'), 0, 37)}}...</a>
                    <div>
                      @include('dashboard.partials._share_buttons' ,['post' => $post])

                    </div>
                    <div class="d-flex justify-content-between">
                      <span class="blog__post--date">{{ niceFormate($post->created_at) }}</span>
                      <a href="{{ url('posts' , ['id'=>$post->slug])}}"><img src="{{ asset('images/arrow.svg') }}" class="arrow" alt="wakeb"></a>
                      <a href="{{ url('category/'. $post->category->id .'/posts')}}" class="category">{{ lang() == 'ar' ? $post->category->name_ar : $post->category->name_en }}</a>
                    </div>
                </div>
              </div>
            </div>
          @endforeach
          </div> {{-- end row --}}
          <!-- Pagination -->
          <div class="d-flex justify-content-center">
            <ul class="pagination mt-3">
             {{ $posts->links() }}
            </ul>
          </div>
           @else
          <h1 class="alert" style="text-align: center;"> @lang('site.no_result_found')</h1>
          @endif
      </div>
    </div>
  </section> <!-- End Blog Section -->
  


  @endsection

  @push('js')
     <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
      $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
          loop: true,
          nav:true,
          margin: 10,
          responsiveClass: true,
          responsive: {
              0:{items:1},
              750:{items:2},
              992:{items:3}
          }
        });});
    </script>
  @endpush