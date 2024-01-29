<?php   use \App\Http\Controllers\thirdplController; ?>
@extends('layouts.3plint')
@section('title')
    <title> 3PL | Dashboard  </title>
@endsection
@section('content')


                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">3PL</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active" style="color:#FD8401">Dashboard</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <div class="search hidden sm:block">
                        </div>
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                 
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                         </div>
                        
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                <br/>
               


@if($errors->any())
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6"> 
    
   
        <Ol>
      <li>  {{$errors->first()}}</li>
        </Ol>
    </div>

@endif

                @if(session('success'))
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> 
{{session('success')}}
    </div>
@endif
               

<div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Welcome! 
                                </h2>
                                <a href="" style="color:#FD8401" class="ml-auto flex text-theme-1"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw w-4 h-4 mr-3"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg> Reload Data </a>
                            </div>

                            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> This dashboard enable you to view the operations and financial status of riders under your fleet.
You can manage the performance of your fleet from here</div>
       
<div class="grid grid-cols-12 gap-6">


                <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">




                
                    <!-- BEGIN: General Report -->
                    <div class="col-span-12 mt-8">

                    <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                  <a href="/3pl/riders">  <div class="box p-5">
                                        <div class="flex">
                                            <i style="font-size: 30px;color:#FD8401" class="fi fi-rs-rugby-helmet"></i> 
                                            
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" >{{$rider}}</div>
                                        <div class="text-base text-gray-600 mt-1">Riders</div>
                                    </div>
</a>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                <a href="/3pl/trips">   <div class="box p-5">
                                        <div class="flex">
                                        <i style="font-size: 30px;color:#FD8401" class="fi fi-rs-biking"></i>
                                            
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$trip}}</div>
                                        <div class="text-base text-gray-600 mt-1">Trips</div>
                                    </div></a>

                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                <a href="/3pl/payments">     <div class="box p-5">
                                        <div class="flex">
                                             <i style="font-size: 30px;color:#FD8401" class="fi fi-rs-money-bill-wave"></i> 
                                           
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6" style="font-size:18px">&#x20A6; {{$amountMade}}</div>
                                        <div class="text-base text-gray-600 mt-1">Amount Made</div>
                                    </div></a>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                                <div class="report-box zoom-in">
                                <a href="/admin/orders">     <div class="box p-5">
                                        <div class="flex">
                                            <i style="font-size: 30px;color:#FD8401" class="fi fi-rs-marker"></i> 
                                        </div>
                                        <div class="font-bold leading-8 mt-6"style="font-size:20px">Realtime Track</div>
                                        <div class="text-base text-gray-600 mt-1" >Monitor Riders</div>
                                    </div></a>
                                </div>
                            </div>
                          
                        </div>
                       
                        

                        
                    </div>


                    
                    <!-- END: General Report -->
                    <!-- BEGIN: Sales Report -->
                
                    <!-- END: Sales Report -->
                    <!-- BEGIN: Weekly Top Seller -->
                  
                    <!-- END: Weekly Top Seller -->
                    <!-- BEGIN: Sales Report -->
                  
                    <!-- END: Sales Report -->
                   
                          
                    <!-- BEGIN: Weekly Best Sellers -->
                    

                  

                   
                    <!-- END: Weekly Best Sellers -->
                    <!-- BEGIN: General Report -->
                    
                    <!-- END: General Report -->
                    <!-- BEGIN: Weekly Top Seller -->
                   
                        <!-- END: Schedules -->
                    </div>
                </div>
            </div>   
                    <!-- END: Data List -->
                    <!-- BEGIN: Pagination -->
                
                    <!-- END: Pagination -->

                   
                </div>
                <!-- BEGIN: Delete Confirmation Modal -->
               
                <!-- END: Delete Confirmation Modal -->
            
@endsection

