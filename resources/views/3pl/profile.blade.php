<?php   use \App\Http\Controllers\third3plController;
use Illuminate\Support\Str;  ?>
@extends('layouts.3plint')
@section('title')
    <title> 3PL | Profile  </title>
@endsection
@section('content')


                   <!-- BEGIN: Top Bar -->
                   <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">3PL</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="#" style="color:#FD8401" class="breadcrumb--active">Profile</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- BEGIN: Search -->
                    <div class="search hidden sm:block">
                        </div>
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                  
                 
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative" >
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                         </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20" >
                            <div class="dropdown-box__content box text-white" style="background:#fff">
                                <div class="p-4 border-b border-theme-8">
                                    <div class="font-medium " style="color:#000"> {{ ucwords(Auth::user()->name) }}</div>
                                    <div class="text-xs text-theme-9">Manage Account</div>
                                 </div>
                              
                                 <div class="p-2" style="color:#000">
                                    <a href="user/profile" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-200 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile</a>
                                    <a href="user/updatePassword" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-200 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Update Password</a>
                               
                                </div>
                                <div class="p-2 border-t border-theme-8" style="color:#000">
                                
                                    <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-gray-200 rounded-md"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>

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
                
                <h1 class="text-lg font-medium mr-auto mt-3" style="font-size:23px">
              Account Details
                    </h1><br/>


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



<div class="intro-y box px-5 pt-5 mt-5">
                    <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
                        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                                <?php if(empty($profile->photourl)){  ?>
                                    <img alt="brand logo" class="rounded-full" src="{{ asset('dist/images/img2.png') }}">
                                 

                                    <?php }else{?>

                                        <img alt="brand logo" class="rounded-full" src="{{ asset($profile->photourl) }}">
                             

                                        <?php }?>

                                        <div style="background-color:#FD8401" class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2" ><a href="javascript:;" data-toggle="modal" data-target="#medium-modal-size-preview"  > <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera w-4 h-4 text-white"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg></a> </div>
                   
                             </div>
                            <div class="ml-5">
                                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{ ucwords(Auth::user()->name) }}</div>
                                <div class="text-gray-600">{{$profile->code}}</div>
                                <div class="truncate sm:whitespace-normal flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail w-4 h-4 mr-2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> {{$profile->email}} </div>
                           
                            </div>

                            
                        </div>
                      
                     
                    </div>
                   </div>
<br/>

            

<div class="intro-y box py-10 sm:py-20">


                  
                    <div class="px-5 sm:px-20  border-gray-200 ">
                       <form method="POST" action="">
                       {{ csrf_field() }} 
                        <div class="grid grid-cols-12 gap-4 row-gap-5 ">
 
                            <div class="intro-y col-span-12 sm:col-span-6 mt-10">
                                <div class="mb-2"><b>Name</b></div>
                                <input disabled name="name" type="text" class="input w-full border flex-1" placeholder="name" value="{{ ucwords(Auth::user()->name) }}">
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6 mt-10">
                                <div class="mb-2"><b>Email</b></div>
                                <input disabled name="email" type="email" class="input w-full border flex-1" placeholder="email" value="{{$profile->email}}">
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6 mt-10">
                                <div class="mb-2"><b>Company Name</b></div>
                                <input name="companyname" type="text" class="input w-full border flex-1" placeholder="company" value="{{$profile->company}}">
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6 mt-10">
                                <div class="mb-2"><b>Phone</b></div>
                                <input name="phone" type="text" class="input w-full border flex-1" placeholder="phone" value="{{$profile->phone}}">
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6 mt-10">
                                <div class="mb-2"><b>Bank Name</b></div>
                                <input name="bankname" type="text" class="input w-full border flex-1" placeholder="Bank name" value="{{$profile->bankname}}">
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6 mt-10">
                                <div class="mb-2"><b>Account Name</b></div>
                                <input name="accountname" type="text" class="input w-full border flex-1" placeholder="Account name" value="{{$profile->accountname}}">
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6 mt-10">
                                <div class="mb-2"><b>Account Number</b></div>
                                <input name="accountnumber" type="text" class="input w-full border flex-1" placeholder="Account number" value="{{$profile->accountNumber}}">
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6 mt-10">
                                <div class="mb-2"><b style="color:#fff">rtgooy5</b></div>
                                <button type="submit" class="button box bg-theme-9 text-white  mr-2 flex items-center  ml-auto sm:ml-0">
                          Update</button>
      </div>

                          
                            
                           
                           
                          
                           
                         

                        
                        </div>

</form>

                    </div>
                 

                </div>





                <div class="modal" id="medium-modal-size-preview">
     <div class="modal__content p-10 "> 
         
     <h2 class="intro-y text-lg font-medium" style="font-weight:bolder;font-size:20px" >
Profile Photo
</h2>
     <form action="/3pl/changeimage" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} 
              
               
                <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
<br/><br/>

                                <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                                  
                                    <a href="" class="w-3/5 file__icon file__icon--image mx-auto">
                                        <div class="file__icon--image__preview image-fit">

                                        <?php if(empty($profile->photourl)){  ?>
                                    <img id="blah" alt="brand logo" class="rounded-full" src="{{ asset('dist/images/img2.png') }}">
                                 

                                    <?php }else{?>

                                        <img id="blah" alt="brand logo" class="rounded-full" src="{{ asset($profile->photourl) }}">
                             

                                        <?php }?>


                                         </div>
                                    </a>
                                    
    
                                </div>
<br/>
                                <input name="file" type="file" onchange="readURL(this);"   required/>
                            </div>     







<br/><br/>



        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                       
                        
                       <button type="submit" class="button box bg-theme-9 text-white  mr-2 flex items-center  ml-auto sm:ml-0">
                          Save</button>
      
                   
                   </div>
    
    

</form>

    
    
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
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200)
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

