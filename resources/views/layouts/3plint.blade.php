<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ app()->getLocale() }}">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('appland/assets/img/favicon.png') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

@yield('title')
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app" style="background:#fff">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                    <img alt="Midone Tailwind HTML Admin Template"  src=" {{ asset('dist/images/troopa_logo.jpg') }} ">
                  
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-black transform -rotate-90"></i> </a>
            </div>


           


            <ul class="border-t border-theme-24 py-5 hidden">
            <li>
                        <a style="color:#000" href="/user" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="slack"></i> </div>
                            <div class="menu__title"> Dashboard</div>
                        </a>
                    </li>
                    <li>
                    <a style="color:#000" href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-feather="navigation"></i> </div>
                        <div class="menu__title"> Pilots <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                    </a>
                    <ul class="" style="background:#F1F5F8">
                        <li>
                            <a style="color:#000" href="/admin/pilots" class="menu">
                                <div class="menu__icon"> <i data-feather="users"></i> </div>
                                <div class="menu__title"> Pilots</div>
                            </a>
                        </li>
                        <li>
                            <a style="color:#000" href="/admin/online-status" class="menu">
                                <div class="menu__icon"> <i data-feather="bar-chart"></i> </div>
                                <div class="menu__title"> Online Status </div>
                            </a>
                        </li>
                     
                    </ul>
                </li>
                <li>
                        <a style="color:#000" href="/admin/customers" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="user-check"></i> </div>
                            <div class="menu__title"> Customers</div>
                        </a>
                    </li>

                    <li>
                        <a style="color:#000" href="orders" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="map"></i> </div>
                            <div class="menu__title"> Orders</div>
                        </a>
                    </li>

                    <li>
                        <a style="color:#000" href="#" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="map-pin"></i> </div>
                            <div class="menu__title"> Location</div>
                        </a>
                    </li>

                    <li>
                        <a style="color:#000" href="/admin/pilots/payments" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="slack"></i> </div>
                            <div class="menu__title"> Payment</div>
                        </a>
                    </li>

                

                    <li>
                        <a style="color:#000" href="/admin/accounts" class="menu menu--active">
                            <div class="menu__icon"> <i data-feather="key"></i> </div>
                            <div class="menu__title"> Accounts</div>
                        </a>
                    </li>

                   

                   
                    
                    <li>
                        <a style="color:#000" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="menu menu--active">
                            <div class="side-menu__icon"> <i data-feather="log-out"></i> </div>
                            <div class="side-menu__title"> Logout</div>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>

                   
               
               
               
                   
                   
               
        
            
             
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav" >
                <a  href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone Tailwind HTML Admin Template"  src=" {{ asset('dist/images/troopa_logo.jpg') }} ">
                  
                </a>
                <div class="side-nav__devider my-6" style="background:black"></div>
                <ul >
                    <li>
                        <a style="color:#000"  href="/3pl/dashboard" class="side-menu side-menu<?php if(Request::segment(2)==''){?>--active<?php }?>">
                            <div class="side-menu__icon"> <i style="font-size: 30px;" class="fi fi-rs-dashboard"></i> </div>
                            <div class="side-menu__title"> Dashboard</div>
                        </a>
                    </li>

                   

                    <li>
                                <a style="color:#000" href="javascript:;" class="side-menu side-menu<?php if(Request::segment(2)=='riders'){?>--active<?php }?><?php if(Request::segment(2)=='online status'){?>--active<?php }?><?php if(Request::segment(2)=='rider'){?>--active<?php }?>">
                                    <div class="side-menu__icon"><i style="font-size: 30px;" class="fi fi-rs-rugby-helmet"></i> </div>
                                    <div class="side-menu__title"> Riders <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                                </a>
                                <ul class="" style="background:#F1F5F8">
                                    <li>
                                        <a style="color:#000" href="/3pl/riders" class="side-menu">
                                            <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                                            <div class="side-menu__title">My Riders</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a style="color:#000" href="/3pl/online-status" class="side-menu side-menu">
                                            <div class="side-menu__icon"> <i data-feather="bar-chart"></i> </div>
                                            <div class="side-menu__title">Riders Status</div>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>
                    

                    <li>
                        <a style="color:#000" href="/3pl/trips" class="side-menu side-menu<?php if(Request::segment(2)=='trips'){?>--active<?php }?>">
                            <div class="side-menu__icon" > <i style="font-size: 30px;" class="fi fi-rs-biking"></i> </div>
                            <div class="side-menu__title">Trips</div>
                        </a>
                    </li>
                    
                    
                    <li>
                        <a style="color:#000" href="/3pl/payments" class="side-menu side-menu<?php if(Request::segment(2)=='payments'){?>--active<?php }?>">
                            <div class="side-menu__icon"> <i style="font-size: 30px;" class="fi fi-rs-money-bill-wave"></i></div>
                            <div class="side-menu__title">Payments</div>
                        </a>
                    </li>

                  

                  <li>
                        <a style="color:#000" href="/3pl/profile" class="side-menu side-menu<?php if(Request::segment(2)=='accounts'){?>--active<?php }?>">
                            <div class="side-menu__icon"> <i style="font-size: 30px;" class="fi fi-rs-user-gear"></i> </div>
                            <div class="side-menu__title">Profile</div>
                        </a>
                    </li>
                   
                   
                    <li>
                        <a style="color:#000" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"  class="side-menu side-menu">
                            <div class="side-menu__icon"> <i style="font-size: 30px;" data-feather="log-out"></i> </div>
                            <div class="side-menu__title"> Logout</div>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>

                    
                
                   
                  
                    <li class="side-nav__devider my-6" style="background:black"></li>
                   
                   
                   
                   
                   
                   
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
            @yield('content')
</div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
    </body>
</html>