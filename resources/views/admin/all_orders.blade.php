@extends('layouts.adminint')
<?php   use \App\Http\Controllers\AdminController; ?>
@section('title')
    <title> Admin | All orders  </title>
@endsection
@section('content')



                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Admin</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active" style="color:#FD8401">All Orders</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                   
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                 
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                         </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium"> {{ ucwords(Auth::user()->name) }}</div>
                                    <div class="text-xs text-theme-41">Manage Account</div>
                                 </div>
                              
                                 <div class="p-2">
                                    <a href="/user/profile" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile</a>
                                    <a href="/user/updatePassword" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Update Password</a>
                               
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->

                
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

                <h2 class="intro-y text-lg font-medium mt-10">
                 All Ride request 
                </h2>
                <br/>
                
                <form action="search-request" method="POST" >
                     {{ csrf_field() }}
                
                <table width="80%">
<tr>

                   
                        
                        <td >  
                        
                        
                        
                        
                      
         </td>
          <td >  
                        
         
          <div class="mt-0">
                            
                        <input type="text" name="serial" placeholder="enter package ID" class="input border mr-2" style="width:100%"/>
             
            
            
          </div>
</td>



<td>
         
         <button name="action" class="button box bg-theme-7 text-white mr-2 flex items-center  ml-auto sm:ml-0" >
         <i data-feather="search" class="w-4 h-4 mr-2"></i>  Search </button></td>

    <td><a href="/admin/waiting-list">
                                            <a href="/admin/waiting-list" class="button box bg-theme-6 text-white mr-2 flex items-center  ml-auto sm:ml-0" >
         <i data-feather="truck" class="w-4 h-4 mr-2"></i>({{$waiting}}) Requests on waiting list </a>    
         </a></td>                      
                   
</tr>

                     </table> </form>
                
               
<?php echo $orders->links(); ?>
               <br/> 
               
         
@foreach($orders as $order)


               <div class="intro-y box px-5 pt-5 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                           
                            <div class="ml-5">
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$order->order_serial}}</div>
                                <div class="text-gray-600">Package ID</div>
                               <br/>
                               <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="user" class="w-4 h-4 mr-2"></i> {{$order->fname}} </div>
                               <div  style="font-size:12px;color:#090">Client</div>
                               
                                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="user" class="w-4 h-4 mr-2"></i><u><a href="/admin/pilot/">{{$order->firstname}}</a></u> </div>
                               <div  style="font-size:12px;color:#FD8401">Rider</div>
                               <br/>
                                
                            </div>
                        </div>
                        <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
                            
                            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i style="color:#090" data-feather="map-pin" class="w-4 h-4 mr-2"></i> {{$order->pickup_location}} <input id="phoneNum" type="hidden"  value="houh" /></div>
                             <div style="padding-left:25px;font-size:12px" >Pickup location</div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i style="color:#FD8401" data-feather="map-pin" class="w-4 h-4 mr-2"></i> <span>{{$order->dropoff_location}}</span>  <input id="phoneNum" type="hidden"  value="jhjk" /></div>
                              <div  style="padding-left:25px;font-size:12px;#090">Dropoff location</div>
                             <br/>
                             <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="clock" class="w-4 h-4 mr-2"></i>{{$order->request_date}} {{$order->request_time}} </div>
                           <div  style="padding-left:25px;font-size:12px">Request time </div>
                           
                        </div>
                        <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-gray-200 pt-5 lg:pt-0">
                             <div class="text-center rounded-md w-20 py-3">
                                  <div class="font-semibold text-theme-1 text-lg">&#x20A6; {{$order->amount}}</div>
                                  
                                  <?php if($order->delivery_status !="decline"){ ?>
                                <div class="font-semibold text-theme-9 text-lg">{{$order->delivery_status}}</div>
                                <?php }else{?>
                                
                                 <div class="font-semibold text-theme-6 text-lg">{{$order->delivery_status}}</div>
                                <?php }?>
                                <div class="text-gray-600">Status</div>
                                
                               
                            </div>
                           
                           
                          
                        </div>
                    </div>
                  
                </div>

@endforeach



                     



                       
                <!-- BEGIN: Delete Confirmation Modal -->






                
            
@endsection



                              

