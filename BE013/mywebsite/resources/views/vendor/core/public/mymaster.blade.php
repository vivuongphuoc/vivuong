<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <meta property="og:site_name" content="{{ $websiteTitle }}">
    <meta property="og:title" content="@yield('ogTitle')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::full() }}">
    <meta property="og:image" content="@yield('image')">

    <link href="{{ app()->isLocal() ? asset('css/public.css') : asset(elixir('css/public.css')) }}" rel="stylesheet">

    @include('core::public._feed-links')

    @yield('css')

    @include('core::public._google_analytics_code')

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://cdn.msf.org/sites/msf.org/files/favicon_0_0.ico">  
</head>

<body class="body-{{ $lang }} @yield('bodyClass') @if($navbar)has-navbar @endif">
    @include('core::public._google_tag_manager_code')
    @include('core::_navbar')
    <div class="site-container" id="main" role="main"></div>
    <header id="header">
          
      <div id="header-content">
         <div id="block-search-form" class="region-header-top block-search pull-right" role="search">      
            <form action="/" method="post" id="search-block-form" accept-charset="UTF-8">
            <h2 class="hidden">Search form</h2>               
            <input placeholder="Search" type="text" name="search_block_form" value="" size="15" maxlength="128" class="form-text" >
            <input type="submit" id="edit-submit" name="op" value="Search" class="form-submit">
            <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>                        
        </form>
        </div>
        <!-- /#block-search-form -->

        <div class="region-header-top block-sites pull-right">
          <h2 class="block-title-sites">MSF Sites</h2>
        </div>

        <div class="region-header-top social-icons pull-right">
          <ul>
           <li><a href="#"><img src="../images/master/facebook-icon.png" alt="" title=""></a></li>
           <li><a href="#"><img src="../images/master/twitter-icon.png" alt="" title=""></a></li>
           <li><a href="#"><img src="../images/master/linkedin-icon.png" alt="" title=""></a></li>
         </ul>
        </div>

        <div class="region-header-top block-language pull-right" >
          <ul >
            <li ><a href="#" class="language-link">Việt Nam</a></li>
            <li><a href="#" class="language-link">@section('lang-switcher')
                        @include('core::public._lang-switcher')
                    @show</a></li>                         
          </ul>
        </div>
        <a href="{{ TypiCMS::homeUrl() }}" title="Home" rel="home" id="logo">
          <img src="../images/master/logo-en.png" alt="Home">
        </a>
      </div>
      <!-- /#header-content -->

      <div id="navigation">
      <div id="main-menu" class="l-header__menu">
          <div class="menu-name-main-menu">
              <ul class="menu">   
                  <li class="dropdown"><a href="#">Main</a>
                  {!! Menus::render('main') !!}
                  </li>
                  
                  <li class="dropdown"><a href="#">footer</a>
                  {!! Menus::render('footer') !!}
                  </li>
              
                  <li class="dropdown"><a href="#">social</a>
                  {!! Menus::render('social') !!}
                  </li>
              </ul>
          </div>
      </div>
      
  </div>
  @include('core::public._alert')

        @yield('main')

        @section('site-footer')
        
        @show
    
    <script src="@if(app()->environment('production')){{ asset(elixir('js/public/components.min.js')) }}@else{{ asset('js/public/components.min.js') }}@endif"></script>
    <script src="@if(app()->environment('production')){{ asset(elixir('js/public/master.js')) }}@else{{ asset('js/public/master.js') }}@endif"></script>
    @if (Request::input('preview'))
    <script src="{{ asset('js/public/previewmode.js') }}"></script>
    @endif

    @yield('js')

</body>

</html>
