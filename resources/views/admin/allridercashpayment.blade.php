@extends('layouts.adminint')
<?php   use \App\Http\Controllers\AdminController; ?>
@section('title')
    <title> Admin | Rider Cash Payments  </title>
@endsection
@section('content')



                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Admin</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="/admin/pilot/{{$rider->id}}" class="breadcrumb--active" style="color:#FD8401">Rider</a> </div>
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
                   {{ucwords($rider->firstname)}} cash payment detail
                </h2>

               <br/> 
      <form method="POST" action="">  
       {{ csrf_field() }}
<table>
<tr>

                   <td><a href="/admin/pilot/{{$rider->id}}/payments"  class="button w-40 mr-2 flex items-center justify-center bg-theme-6 text-white"> <i data-feather="chevron-left" class="w-4 h-4 mr-2"></i> Go Back </a>             
</td> 

 <td><button  class="button w-40 mr-2 flex items-center justify-center bg-theme-7 text-white"> <i data-feather="credit-card" class="w-4 h-4 mr-2"></i> Remit Cash </button>             
</td>       


       
                        
                       




                          
                   
</tr>

<tr>

                   <td style="padding:10dp;color:#090;padding:10dp"><br/>            
</td>       

 
                          
                   
</tr>

                     </table>                  

<span style="padding:10dp;color:#090;padding:10dp">Total Cash Earning:N{{$cardearnings}}</span>
               
                       
                   <input name="riderid" type="hidden" value="{{$rider->id}}" />
                    <!-- BEGIN: Data List -->
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <div class="intro-y datatable-wrapper box p-5 mt-5">
                        
                    <table class="table table-report table-report--bordered display datatable w-full" style="font-size:14px;">
                        <thead>
                            <tr>
                            <th class="border-b-2 whitespace-no-wrap"> <input id='selectall' class="input border border-gray-500" type="checkbox" onClick="selectAll(this,'color')">
                                  </th>
                                <th class="border-b-2 whitespace-no-wrap">TRIP ID</th>
                                <th class="border-b-2 whitespace-no-wrap">AMOUNT</th>
                               
                                <th class="border-b-2 whitespace-no-wrap">PAID BY</th>
                                <th class="border-b-2 whitespace-no-wrap">PAID TO</th>
                                 <th class="border-b-2 whitespace-no-wrap">MODE</th>
                                  <th class="border-b-2 whitespace-no-wrap">REMIT</th>
                                <th class="border-b-2 whitespace-no-wrap">DATE</th>
                               
                               
                                <th class="border-b-2 whitespace-no-wrap">STATUS</th>
                               
                              
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($cardlists as $cardlist) 
                            <tr>
                           <td class="border-b">
                                <?php  if(AdminController::checkremittance($rider->id,$cardlist->id)<1){?>
                            <input name="allorders[]" class="input flex-none border border-gray-500" type="checkbox" value="{{$cardlist->id}}">
                            <?php }?>
</td>
                           
                                <td class="border-b">
                                <div class="font-medium whitespace-no-wrap">{{AdminController::getOrderserial($cardlist->id)}}</div>
                                  
                                </td>
                                <td class="border-b">
                                <div class="font-medium whitespace-no-wrap" >  {{number_format($cardlist->amount)}}</div>
                                  
                                </td>
                               
                                <td class="w-40 border-b">
                                {{ ucwords($cardlist->fname)}}
                                 </td>

                                 <td class="w-40 border-b">
                                {{ucwords($rider->firstname)}}
                                 </td>
                                 
                                 
                                   <td class="w-40 border-b">
                                {{ucwords($cardlist->payment_mode)}}
                                 </td>
                                 
                                   <td class="w-40 border-b">
                                       <?php  if(AdminController::checkremittance($rider->id,$cardlist->id)>0){?>
                               <img  src="{{ asset('dist/images/remit-img2.png')}}" width="20px" />
                               <?php }else{?>
                             <span style="color:#FF0000;font-size:20px">??</span>  
                               
                               <?php }?>
                                 </td>


                                 <td class="w-40 border-b">
                                  {{ ucwords($cardlist->request_date)}}
                                 </td>
                              
                                
                               

                                <td class="border-b w-5">
                                 {{ ucwords($cardlist->status)}}
                                </td>
                            </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
</form>  
                    </div>
                    <!-- END: Data List -->
                    <!-- BEGIN: Pagination -->
                   
                    <!-- END: Pagination -->
                </div>
                <!-- BEGIN: Delete Confirmation Modal -->





 




              
                <!-- END: Delete Confirmation Modal -->
            
@endsection

<script>
     function selectAll(source) {
    checkboxes = document.getElementsByName('allorders[]');
    for(var i in checkboxes)
        checkboxes[i].checked = source.checked;
}
</script>

