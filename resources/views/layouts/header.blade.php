<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <![endif]-->

       @yield('meta_title')
       @yield('meta_description')
       @yield('meta_keywords')

      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="">
      <meta name="author" content="URLarts">
      <title>{{@$title ? @$title : "Kennel Shop"}}</title>
      <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="stylesheet" href="{{URL::to('css/bootstrap.css?v='.rand())}}">

      
      <link rel="stylesheet" href="{{URL::to('css/style.css?v='.rand())}}">
      <link rel="stylesheet" href="{{URL::to('css/font-awesome.css?v='.rand())}}" type="text/css">
      <link href="{{URL::to('css/flaticon.css?v='.rand())}}" rel="stylesheet">
      <link rel="stylesheet" href="{{URL::to('css/et-line-fonts.css?v='.rand())}}" type="text/css">
      <link rel="stylesheet" href="{{URL::to('css/forest-menu.css?v='.rand())}}" type="text/css">
      <link href="{{URL::to('css/responsive-media.css?v='.rand())}}" rel="stylesheet">
      <link rel="stylesheet" id="color" href="{{URL::to('css/colors/defualt.css?v='.rand())}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      @yield('meta')
      @yield('style')
   </head>
   <body>
      <!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
      <div id="loader-wrapper">
         <div id="loader"></div>
         <div class="loader-section section-left"></div>
         <div class="loader-section section-right"></div>
      </div>
      <!-- =-=-=-=-=-=-= Light Header =-=-=-=-=-=-= -->
      <div class="colored-header">
         <!-- Top Bar -->
         <div class="header-top">
            <div class="container">
               <div class="row">
                  <!-- Header Top Left -->
                  <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
                     <ul class="listnone">
                        <li><a href="about.html"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>
                        <li><a href="faqs.html"><i class="fa fa-folder-open-o" aria-hidden="true"></i> FAQS</a></li>
                     </ul>
                  </div>
                  <!-- Header Top Right Social -->
                  <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
                     <div class="pull-right">
                        <ul class="listnone">
                            @auth
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-profile-male" aria-hidden="true"></i> 
                                    {{ auth()->user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                   <li>

                                   <a  href="javascript:void(0)"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                   </li>
                                    <li><a href="{{route('user.view.profile',['id'=>base64_encode(Auth::user()->id)])}}">User Profile</a></li>
                                    <li><a href="{{route('user.list.ads',['type'=>'active'])}}">Active Ads <span class="badge">{{Auth::user()->posts->where('expiry','>',date('Y-m-d H:i:s'))->where('status','publish')->count()}}</span></a></li>
                                    <li><a href="{{route('user.list.ads',['type'=>'expired'])}}">Expired Ads <span class="badge">{{Auth::user()->posts->where('expiry','<',date('Y-m-d H:i:s'))->count()}}</span></a></li>
                                    <li><a href="{{route('user.list.ads',['type'=>'draft'])}}">Draft Ads <span class="badge">{{Auth::user()->posts->where('status','draft')->count()}}</span></a></li>
                                </ul>
                            </li>
                            @else
                                <li><a href="{{route('login')}}"><i class="fa fa-sign-in"></i> Log in</a></li>
                                <li><a href="{{route('register')}}"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a></li>
                            @endauth
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Top Bar End -->
         <!-- Navigation Menu -->
         <nav id="menu-1" class="mega-menu">
               <!-- menu list items container -->
               <section class="menu-list-items">
                  <div class="container">
                     <div class="row">
                        <div class="col-lg-12 col-md-12">
                           <!-- menu logo -->
                           <ul class="menu-logo">
                              <li>
                                 <a href="{{route('/')}}">
                                    <img src="{{uploaded_asset(get_setting('system_logo'))}}" alt="logo"> 
                                 </a>
                              </li>
                           </ul>
                           <!-- menu links -->
                           <ul class="menu-links">
                              <!-- active class -->
                             <li><a href="contact.html" >Latest Ads </a></li>
                             <li><a href="contact.html">Trusted Sellers </a></li>
                             <li><a href="contact.html">Advertise With Us </a></li>
                             <li><a href="contact.html">Contact </a></li>
                             <li><a href="contact.html">How to Sell </a></li>
                           </ul>
                           <ul class="menu-search-bar">
                              <li>
                                 <a href="@auth {{route('user.store.post-ad')}} @else {{route('login')}} @endauth" class="btn btn-light"><i class="fa fa-plus" aria-hidden="true"></i> Post Free Ad</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </section>
            </nav>
      </div>
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="{{route('/')}}">Home Page</a></li>
                  <li><a href="javascript:void(0)">Pages</a></li>
                    @if(@$page)
                        <li><a class="active" href="#">{{ @$page }}</a></li>
                    @endif
                </ul>
            </div>
         </div>
      </div>