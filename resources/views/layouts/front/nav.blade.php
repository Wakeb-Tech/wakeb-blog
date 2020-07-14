<nav class="navbar navbar-light py-3 px-0 px-sm-auto">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ setting()->logo_path }}" width="120" alt="wakeb comapny">
      </a>
      <button class="navbar__toggler" type="button"  data-target="#navbar__Wakeb" >
        <div class="mx-1">
          Menu
        </div>
        <div class="mx-1">
          <span class="bar bar1"></span>
          <span class="bar bar2"></span>
        </div>
      </button>
    
    </div>
  </nav>

  <div class="menu-content" id="menu-content">
    <!-- <span class="close-menu"><span>Menu</span> X</span> -->
    <div class="container-fluid menu-list">
          {{-- <ul class="dropdown-menu">
              <li><a href="{{ aurl('lang/ar') }}"><i class="fa fa-flag"></i>عربي</a></li>
              <li><a href="{{ aurl('lang/en') }}"><i class="fa fa-flag"></i>English</a></li>
            </ul>
 --}}
        <ul>
            <li>
               @if(lang() == 'ar')
              <a href="{{ url('lang/en') }}" class="mb-2 font-weight-normal">
              <i class="fas fa-language"></i>
              <span>English</span>
              </a>
              @else
              
              <a href="{{ url('lang/ar') }}" class="mb-2 font-weight-normal">
              <i class="fas fa-language"></i>
              <span>العربية</span>
              </a>
              @endif
            </li>
            <li class="active">
                <a href="http://wakeb.tech">@lang('site.wakeb_home')</a>
            </li>
            <li class="has-menu">
              <span>@lang('site.wakeb_products')<i class="fas fa-chevron-right fa-xs"></i></span>
              <div class="sub-menu">
                <a href="http://wakeb.tech/products/twittelab">@lang('site.twittelab')</a>
                <a href="http://wakeb.tech/products/mujib">@lang('site.mujib')</a>
                <a href="http://wakeb.tech/products/masbar">@lang('site.masbar')</a>
                <a href="http://wakeb.tech/products/nasih">@lang('site.nasih')</a>
                <a href="http://wakeb.tech/products/time-series-analysis">@lang('site.time_series') </a>
                <a href="http://wakeb.tech/products/image-analysis">@lang('site.image_analysis')</a>
                <a href="http://wakeb.tech/products/rased">@lang('site.rased')</a>
                <a href="http://wakeb.tech/products/smart-ads">@lang('site.smart_Ads')</a>
                <a href="http://wakeb.tech/products/dates-detector">@lang('site.dates_detector')</a>
                <a href="http://wakeb.tech/products/footfall-analysis">@lang('site.footfall_nalysis')</a>
              </div>
            </li>
            <li class="has-menu">
              <span>@lang('site.wakeb_services') <i class="fas fa-chevron-right fa-xs"></i></span>
              <div class="sub-menu">
                <a href="http://wakeb.tech/services/artificial-intelligence">@lang('site.artificial_intelligence')</a>
                <a href="http://wakeb.tech/services/business-intelligence">@lang('site.business_intelligence')</a>
                <a href="http://wakeb.tech/services/big-data">@lang('site.big_data')</a>
                <a href="http://wakeb.tech/services/predictive-analysis">@lang('site.predictive_analysis')</a>
                <a href="http://wakeb.tech/services/data-management">@lang('site.data_management')</a>
                <a href="http://wakeb.tech/services/internet-of-things">@lang('site.internet_of_things')</a>
              </div>
            </li>
            <li class="has-menu">
                <span>@lang('site.wakeb_solutions') <i class="fas fa-chevron-right fa-xs"></i></span>
                <div class="sub-menu">
                  
                </div>
            </li>
            <li>
                <a href="http://wakeb.tech/about">@lang('site.wakeb_about')</a>
            </li>
            <li>
                <a href="http://wakeb.tech/contact">@lang('site.wakeb_contact')</a>

            </li>
        </ul>
    </div>
  </div>