<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Models\threepl;
use App\Models\User;
use App\Models\threepl_riders_right;
use App\Models\cash_remittance;
use Illuminate\Http\Request;
use Auth; 
use Illuminate\Support\Facades\Hash;

class thirdplController extends Controller
{
    //




    public function threeplpage(){

        return view('3pl');
    }


    public function dashboard(){

        $riders= DB::table('pilots')->where('companyCode',thirdplController::getcompanyCode(Auth::user()->id))->orderBy('id','desc')->get(); 
       
        $trips= DB::table('client_orders')
        ->select('client_orders.order_serial','client_orders.id','customers.fname','pilots.firstname','pilots.pilotID','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount','client_orders.delivery_status')
        ->join('customers','customers.id','=','client_orders.client_id')
         ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
        ->where('client_orders.rider_id','!=','nil')
        ->where('pilots.companyCode','=',thirdplController::bringCode(auth()->user()->id))
         ->orderBy('client_orders.id','desc')
         ->get();

         $totalearnings= DB::table('payments')->select('payments.amount','customers.fname','pilots.firstname','payments.created_at','payments.status','payments.order_id')
         ->join('customers','customers.id','=','payments.client_id')
         
         ->join('pilots','pilots.pilotID','=','payments.riderid') 
         ->where('pilots.companyCode', thirdplController::getcompanyCode(Auth::user()->id))
         ->where('payments.status',"ok")
         ->sum('amount'); 

     
     
     
        return view('3pl.index',['rider'=>$riders->count(),'trip'=>$trips->count(),'amountMade'=>number_format($totalearnings)]);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('3pl/login');
    }

    public function canceltrips($id){
        
        $rider= DB::table('pilots')->where('id',$id)->first(); 
       
       $orders= DB::table('client_orders')->select('client_orders.order_serial','client_orders.id','customers.fname','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount')->join('customers','customers.id','=','client_orders.client_id')->where('client_orders.rider_id', $rider->pilotID)->where('delivery_status',"decline")->get(); 
       
       return view('3pl.cancel_orders',['orders'=>$orders,'rider'=>$rider]);
  
       
   }

   public function deliveredorder($id){
        
    $rider= DB::table('pilots')->where('id',$id)->first(); 
   
   $orders= DB::table('client_orders')->select('client_orders.order_serial','client_orders.id','customers.fname','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount')->join('customers','customers.id','=','client_orders.client_id')->where('client_orders.rider_id', $rider->pilotID)->where('delivery_status',"delivered")->get(); 
   
   return view('3pl.delivery_orders',['orders'=>$orders,'rider'=>$rider]);

   
}

public function pilotpaymentdetail($id){
        
    $detail= DB::table('pilots')->where('id', $id)->first(); 
    
     $payments= DB::table('payments')->select('payments.amount','customers.fname','pilots.firstname','payments.created_at','payments.status','payments.order_id')
     ->join('customers','customers.id','=','payments.client_id')
     
     ->join('pilots','pilots.pilotID','=','payments.riderid') 
     ->where('payments.riderid', $detail->pilotID)
     ->where('payments.status',"ok")
     ->get(); 
     
     //////////// current_balance ////////////

    $balance= DB::table('current_balance')->where('rider_id',$detail->pilotID)->sum('balance'); 

    $totalearnings= DB::table('payments')->where('payments.status',"ok")->where('riderid',$detail->pilotID)->sum('amount');
        return view('3pl.allriderpayment',['rider'=>$detail,'payments'=>$payments,'totalearning'=>number_format($totalearnings),'balance'=>number_format($balance)]);


}



public function ridercardpaymentdetail($riderid){
        
    $pilot= DB::table('pilots')->where('pilotID', $riderid)->first(); 
   
   $cardearning= DB::table('payments')
 ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
 ->join('client_orders','client_orders.id','=','payments.order_id')
 ->join('customers','customers.id','=','client_orders.client_id')
 ->where('client_orders.payment_mode',"card")
   ->where('client_orders.rider_id',$riderid)
 ->where('payments.status',"ok")
 ->sum('client_orders.amount');
 
 $cardearninglist= DB::table('payments')
 ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
 ->join('client_orders','client_orders.id','=','payments.order_id')
 ->join('customers','customers.id','=','client_orders.client_id')
 ->where('client_orders.payment_mode',"card")
   ->where('client_orders.rider_id',$riderid)
 ->where('payments.status',"ok")
 ->get();
   
 return view('3pl.allridercardpayment',['rider'=>$pilot,'cardearnings'=>number_format($cardearning),'cardlists'=>$cardearninglist,'realPilotId'=>$pilot->id]);
 
   
   
}


public function pilotcashpaymentdetail($riderid){
        
    $pilot= DB::table('pilots')->where('pilotID', $riderid)->first(); 
   
   $cardearning= DB::table('payments')
 ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
 ->join('client_orders','client_orders.id','=','payments.order_id')
 ->join('customers','customers.id','=','client_orders.client_id')
 ->where('client_orders.payment_mode',"cash")
   ->where('client_orders.rider_id',$riderid)
 ->where('payments.status',"ok")
 ->sum('client_orders.amount');
 
 $cardearninglist= DB::table('payments')
 ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
 ->join('client_orders','client_orders.id','=','payments.order_id')
 ->join('customers','customers.id','=','client_orders.client_id')
 ->where('client_orders.payment_mode',"cash")
   ->where('client_orders.rider_id',$riderid)
 ->where('payments.status',"ok")
 ->get();
   
 return view('3pl.allridercashpayment',['rider'=>$pilot,'cardearnings'=>number_format($cardearning),'cardlists'=>$cardearninglist]);
   
   
   
   
}



public function remitcash(Request $request){

    $validator=$this->validate(request(),[
        'task'=>'required|string',
        ],
        [
            'task.required'=>'Select a cash payment you want to perform action on ',
           
            
            ]);

            if(count(request()->all()) > 0){
    switch ($request->input('task')) {
        case 'remit':

           
    
                  
            

            if(isset($_POST['allorders'])){


                if (is_array($_POST['allorders'])) {
                    foreach($_POST['allorders'] as $value){

                          $remittance = new cash_remittance();
                          $remittance->order_id=$value;
                          $remittance->rider_id=request()->input('riderid');
                          $remittance->save();


                       
                        
                    }

                 return redirect()->back()->withSuccess('cash payment remitted successfully');
                  

                 } 
                
                
           }else{


            return redirect()->back()->withErrors('Please scroll down and check the payment you want to remit ');
           }

                   
        

            break;
            
            
            
            
             case 'cancelRemit':

           
    
                  
            

            if(isset($_POST['allorders'])){


                if (is_array($_POST['allorders'])) {
                    foreach($_POST['allorders'] as $value){

                       DB::table('cash_remittance')->where('order_id',$value)->where('rider_id',request()->input('riderid'))->delete();

                       
                        
                    }

                 return redirect()->back()->withSuccess('You have cancelled remittance of a cash payment successfully');
                  

                 } 
                
                
           }else{


            return redirect()->back()->withErrors('Please scroll down and check the payment you want to cancel remit ');
           }

                   
        

            break;


       




}
}
}








public function remitcash2(){
    
    
    $validator=$this->validate(request(),[
           'allorders'=>'required|string',
           ],
           [
               'allorders.required'=>'Please select cash payment to remit',
              
               
               ]);
   
   $input =request()->all();
   
    if(count(request()->all()) > 0){
$condition = $input['allorders'];
foreach ($condition as $key => $condition) {
   $remittance = new cash_remittance();
  $remittance->order_id=$input['allorders'][$key];
  $remittance->rider_id=$input['riderid'];
  $remittance->save();

   }
 return redirect()->back()->withSuccess('Cash remittance succesful');
    }else{
        
               return redirect()->back()->withErrors('Please select cash payment to remit ');
               
        
    }  
}


public static function getOrderserial($id){

    $detail= DB::table('client_orders')->where('id', $id)->first(); 

 
    return  $detail->order_serial ;

}

   


    public function relogin(){

        return view('login');
    }


    public function riders(){

        $riders= DB::table('pilots')->where('companyCode',thirdplController::getcompanyCode(Auth::user()->id))->orderBy('id','desc')->get(); 
        return view('3pl.riders',['pilots'=>$riders]);

    }


    public function getcompanyCode($id){

        $riders= DB::table('3pl')->where('userID',$id)->first(); 
        return $riders->code;

    }


    public function riderdetail($id){
        
        
        $detail= DB::table('pilots')->where('id', $id)->first(); 
      
      $totalOnline= 0;
      /////////////////////// time online ///////////////////////////////////////////
$online= DB::table('rider_time_online')->where('rider_id', $detail->pilotID)->first();
if(!empty($online->online_time)){
$totalOnline.= Carbon::parse($online->online_time)->hour."hr ".Carbon::parse($online->online_time)->minute."min ".Carbon::parse($online->online_time)->second."secs ";
}


//////////// trips count ////////////
   
$trips= DB::table('client_orders')->where('rider_id',$detail->pilotID)->where('delivery_status','delivered')->get()->count(); 



///////////////////////// total earning /////////////////////
$totalearnings= DB::table('payments')->where('payments.status',"ok")->where('riderid',$detail->pilotID)->sum('amount');


/////////////// bonus //////////////////
    
$bonus= DB::table('rider_bonus')->where('rider_id',$detail->pilotID)->first(); 

if(!empty($bonus->riderbonus)){
  
  $bonuses=$bonus->riderbonus;
}else{
  
  $bonuses=0; 
}

      $transit= DB::table('client_orders') 
      ->where('rider_id',$detail->pilotID)
      ->where('delivery_status',"accepted")
      ->get();

    

      $cancelledtrips= DB::table('client_orders') 
      ->where('rider_id',$detail->pilotID)
      ->where('delivery_status',"decline")
      ->get();

      $alltrips= DB::table('client_orders') 
      ->where('rider_id',$detail->pilotID)
      ->where('delivery_status',"delivered")
      ->get();

      $userpayments= DB::table('payments') 
      ->select('pilots.firstname','pilots.lastname','customers.fname','customers.lname','customers.phone')
      ->join('customers','customers.id','=','payments.client_id')
      ->join('pilots','pilots.id','=','payments.riderid')
      ->where('payments.riderid',$detail->pilotID)->get();

      $cancelorders= DB::table('client_orders') 
      ->where('rider_id',$detail->pilotID)
      ->where('delivery_status',"decline")
      ->get(); 

      return view('3pl.rider-detail',['pilot'=>$detail,'transits'=>$transit,'trips'=>$alltrips,'payments'=>$userpayments,'allcancelled'=>$cancelledtrips,'totaltimeonline'=>$totalOnline,'alltrips'=>$trips,'totalearning'=>number_format($totalearnings),"bonus"=>$bonuses]);
  
  }

    

    public function signup(){

        return view('signup');

    }

    public function login(Request $request){

        $text="";

       // if(!empty(session('userId'))){

        //    return redirect('3pl/dashboard');
       // }else{

        if(!empty($request->input('user'))){

        $email = AdminController::encrypt_decrypt($request->input('user'),false);

        thirdplController::activateAccount($email);

        $text='Your account have been activated';


        }
        else if(Auth::check()){
            
            return redirect('3pl/dashboard');
            
        }
        return view('login',["msg"=>$text]);
   // }

    }


    

    public function loginnow(){

        $validator=$this->validate(request(),[

            'email'=>'required|string',
            'password'=>'required|string'
            ],
            [
                'email.required'=>'Please enter your email',
                'password.required'=>'Please enter your password'
                ]);

                if(count(request()->all()) > 0){

         $customer= DB::table('users')->join('3pl','3pl.userID','=','users.id')->where('users.email', request()->input('email'))->first();

         $emailcheck= DB::table('users')->where('email', request()->input('email'))->where('role',"3pl")->get(); 
         if($emailcheck->count()>0){

            if($customer->confirm_status=="0"){
              
                return redirect()->back()->withErrors('This account have not been activated. Check your inbox or Spam to access your activation link from Troopa ')->withInput($validator); 
       
            }else if($customer->confirm_status >0){

             $credentials=request()->only('email','password');

              if(Auth::attempt($credentials)){

                return redirect('3pl/dashboard');
                

              }else{

                return redirect()->back()->withErrors('Please be sure you are typing in the right passcode')->withInput($validator); 
       
              }

            }




         }else{


            return redirect()->back()->withErrors('Sorry! this email does not exist in our record')->withInput(); 
         }


                }
    }


    public function activateAccount($email){


        $update= DB::table('users')->join('3pl','3pl.userID','=','users.id')->where('users.email',$email)->update(['confirm_status' =>"1"]); 
                  
                

    }

    public function newaccount(){

        $validator=$this->validate(request(),[

            'firstname'=>'required|string',
            'lastname'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|string',
            'companyname'=>'required|string',
            'password'=>'required|string',
            'cpassword'=>'required|string',
            ],
            [
                'firstname.required'=>'Please enter your firstname',
                'lastname.required'=>'Please enter your lastname',
                'email.required'=>'Please enter your email',
                'phone.required'=>'Please enter your phone number',
                'companyname.required'=>'Please enter your company name',
                'password.required'=>'Please type in your password',
                'cpassword.required'=>'Please type in confirm password',
               
                ]);


                if(request()->input('password')!=request()->input('cpassword')){

                    return redirect()->back()->withErrors('Both passwords are not equal')->withInput();  
                }else{

////////////////////////////////// check if account altready exist /////////////////////

                $emailcheck= DB::table('users')->where('email', request()->input('email'))->where('role',"3pl")->get(); 
                if($emailcheck->count()>0){

                 return redirect()->back()->withErrors('Sorry! this email already exist')->withInput(); 

                }else{
                   $text="";
                    $code="3PL-".AdminController::firstTwo()."-".AdminController::SecondFour().AdminController::LastTwo();

/////////////////////////// create account ///////////////////////////////////////////////

                    $user = new User();
                    $user->name=request()->input('firstname')." ".request()->input('lastname');
                    $user->email=request()->input('email');
                    $user->password=Hash::make(request()->input('password'));
                    $user->role="3pl";
                    $user->adminroles="4";
                    $user->save();

                    



                    $hreepl = new threepl();
                    $hreepl->userID=$user->id; 
                    $hreepl->phone=request()->input('phone');
                    $hreepl->company="";
                    $hreepl->bankname="";
                    $hreepl->accountname="";
                    $hreepl->accountNumber="";
                    $hreepl->photourl="";
                    $hreepl->code= $code;
                    $hreepl->confirm_status="0";
                    if($hreepl->save()){

//////////////////////////// send account creation email ////////////////////////////////////////
                     $text.="Your 3PL account has been created successfully. Click the following link  to activate your account"." ";
                     $text.="https://troopa.org/3pl/login?user=".AdminController::encrypt_decrypt(request()->input('email'),true);

                     $msgs=$text;
                     MailController::new_threepl_account_email(request()->input('email'),$msgs,request()->input('lastname'));

                     return redirect()->back()->withSuccess('Account created successfully. A mail has been sent to you to activate your account.');


                    }


                }


                }

    }


    public function profile(){

        $profile= DB::table('users')->join('3pl','3pl.userID','=','users.id')->where('users.id',Auth::user()->id)->first(); 
         return view('3pl.profile',['profile'=>$profile]);

    }


    public function update_brand(){

       


        $profile= DB::table('3pl')->where('userID',Auth::user()->id)->first(); 

        if(empty($profile->photourl)){


            $file=request()->file('file');
            $original_name = strtolower(trim($file->getClientOriginalName()));
            $fileName =  time().rand(100,999).$original_name;
            $filePathdb = asset('/photos/'.$fileName);
            $filePath = 'photos';
            $file->move($filePath,$fileName);

             //////////////// update database with new information ///////
        DB::table('3pl')->where('userID', auth()->user()->id)
        ->update(['photourl' =>$filePathdb]);


        }

        else if(!empty($profile->photourl)){
     
    
        if(file_exists(public_path('photos/'.basename($profile->photourl)))){
     
            unlink(public_path('photos/'.basename($profile->photourl)));
      
          }


          $file=request()->file('file');
          $original_name = strtolower(trim($file->getClientOriginalName()));
          $fileName =  time().rand(100,999).$original_name;
          $filePathdb = asset('/photos/'.$fileName);
          $filePath = 'photos';
          $file->move($filePath,$fileName);

           //////////////// update database with new information ///////
      DB::table('3pl')->where('userID', auth()->user()->id)
      ->update(['photourl' =>$filePathdb]);

            
        }
       
        return redirect()->back()->withSuccess('Your profile photo has been changed succesfully');
    
    }


    public function bringCode($id){

        $code= DB::table('3pl')->where('userID', $id)->first();
        
        return  $code->code;


}




    public function postprofile(){

        $validator=$this->validate(request(),[

            'companyname'=>'required|string',
            'phone'=>'required|string',
            'bankname'=>'required|string',
            'accountname'=>'required|string',
            'accountnumber'=>'required|string'
            ],
            [
                'companyname.required'=>'Please enter your company name',
                'phone.required'=>'Please enter your phone number',
                'bankname.required'=>'Please enter your bank name',
                'accountname.required'=>'Please enter your account name',
                'accountnumber.required'=>'Please enter your account number',
               
                ]);

                DB::table('3pl')->where('userID', auth()->user()->id)->update(['company' =>request()->input('companyname'),'phone' =>request()->input('phone'),'bankname' =>request()->input('bankname'),'accountname' =>request()->input('accountname'),'accountnumber' =>request()->input('accountnumber')]);

                return redirect()->back()->withSuccess('Your profille has been updated succesfully');
    

    }

    public function checkremittance($rider,$orderid){

        $remit= DB::table('cash_remittance')->where('rider_id', $rider)->where('order_id', $orderid)->get();
        
        return  $remit->count();


}



public function performaction(Request $request){

    $validator=$this->validate(request(),[
        'task'=>'required|string',
        ],
        [
            'task.required'=>'Select atleast a rider you want to perform action on ',
           
            
            ]);

            if(count(request()->all()) > 0){
    switch ($request->input('task')) {
        case 'restrict':

           
    
                  
            

            if(isset($_POST['allpilots'])){


                if (is_array($_POST['allpilots'])) {
                    foreach($_POST['allpilots'] as $value){

                        $riderCount= DB::table('3pl_riders_right')->where('rider_id', $value)->get()->count(); 

                        if($riderCount>0){

                                //////////////// update database with new information ///////
      DB::table('3pl_riders_right')->where('rider_id', $value)
      ->update(['status' =>$request->input('task')]);


                        }else{
                          $threepl_riders_right = new threepl_riders_right();
                         
                          $threepl_riders_right->rider_id=$value;
                           $threepl_riders_right->status=$request->input('task');
                           $threepl_riders_right->code=thirdplController::bringCode(auth()->user()->id);
                          $threepl_riders_right->save();

                        }
                       
                        
                    }

                 return redirect()->back()->withSuccess('Riders have been restricted successfully');
                  

                 } 
                
                
           }else{


            return redirect()->back()->withErrors('Please scroll down and check the rider you want to perform action on ');
           }

                   
        

            break;
            
            
            
            
             case 'delete':

           
    
                  
            

            if(isset($_POST['allpilots'])){


                if (is_array($_POST['allpilots'])) {
                    foreach($_POST['allpilots'] as $value){
                    
                     $riders= DB::table('pilots')->where('id',$value)->first(); 
                     
                       if(!empty($riders->picture)){
                       
                        if(file_exists(public_path('photos/'.basename($riders->picture)))){
 
                             unlink(public_path('photos/'.basename($riders->picture)));
  
      }
      
      
                     
                       
                       }
                       

                     
                   DB::table('pilots')->where('id',$value)->delete();
                   DB::table('3pl_riders_right')->where('rider_id',$value)->delete();
                       
                        
                    }

                 return redirect()->back()->withSuccess('You have deleted a rider successfully');
                  

                 } 
                
                
           }else{


            return redirect()->back()->withErrors('Please scroll down and check the rider to delete ');
           }

                   
        

            break;
            
            
            
             case 'authorize':

           if(isset($_POST['allpilots'])){


                if (is_array($_POST['allpilots'])) {
                    foreach($_POST['allpilots'] as $value){


                        $riderCount= DB::table('3pl_riders_right')->where('rider_id', $value)->get()->count(); 

                        if($riderCount>0){

                                //////////////// update database with new information ///////
      DB::table('3pl_riders_right')->where('rider_id', $value)
      ->update(['status' =>$request->input('task')]);

                        }else{
                       $threepl_riders_right = new threepl_riders_right();
                         
                          $threepl_riders_right->rider_id=$value;
                           $threepl_riders_right->status=$request->input('task');
                           $threepl_riders_right->code=thirdplController::bringCode(auth()->user()->id);
                          $threepl_riders_right->save();
                        }  
                        
                    }

                 return redirect()->back()->withSuccess('You have performed authorize action  successfully');
                  

                 } 
                
                
           }else{


            return redirect()->back()->withErrors('Please scroll down and check the payment you want to cancel remit ');
           }

                   
        

            break;


       




}
}
}


 
public function withdrawhistory($riderid){
        
    $pilot= DB::table('pilots')->where('pilotID', $riderid)->first(); 
    
    $withdrawals= DB::table('withdrawticket')->where('rider_id', $riderid)->get(); 
     
    return view('3pl.all_rider_withdrawal_history',['rider'=>$pilot,'withdrawals'=>$withdrawals]);
   
   
}

public static function checkRight($id){

    $status="";

    $rights= DB::table('3pl_riders_right')->where('rider_id', $id)->first();
    
    if(!empty($rights->status)){

       if($rights->status=="restrict") {
        $status.="<i style=\"font-size:20px;color:#FF0000\" class=\"fi fi-rs-shield-exclamation\"></i>   ";

       }
       if($rights->status=="authorize") {
        $status.="<i style=\"font-size:20px;color:#060\" class=\"fi fi-rs-badge-check\"></i>   ";

       }
    }

 return $status;
}

public function allorders(){
        
    $emptyrider= DB::table('client_orders')->where('rider_id',"nil")->get()->count(); 
    
    
    
   
   $ordersx= DB::table('client_orders')
   ->select('client_orders.order_serial','client_orders.id','customers.fname','pilots.firstname','pilots.pilotID','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount','client_orders.delivery_status')
   ->join('customers','customers.id','=','client_orders.client_id')
    ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
   ->where('client_orders.rider_id','!=','nil')
   ->where('pilots.companyCode','=',thirdplController::bringCode(auth()->user()->id))
    ->orderBy('client_orders.id','desc')
    ->paginate(4);
     
    
   
  return view('3pl.all_orders',['orders'=>$ordersx,'waiting'=>$emptyrider]);

   
}


public function requestsearch(Request $request){
        
    $emptyrider= DB::table('client_orders')->where('rider_id',"nil")->get()->count(); 
    $orders= DB::table('client_orders')
   ->select('client_orders.order_serial','client_orders.id','customers.fname','pilots.firstname','pilots.pilotID','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount','client_orders.delivery_status')
   ->join('customers','customers.id','=','client_orders.client_id')
    ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
    ->where('pilots.companyCode','=',thirdplController::bringCode(auth()->user()->id))
   ->where('client_orders.order_serial',$request->serial)
   ->paginate(4);

   $status="Trip with ".$request->serial." package ID";
   
   return view('3pl.all_orders',['orders'=>$orders,'waiting'=>$emptyrider,'status'=>$status]);
   
   
}


public function filterstatus(Request $request){
        
    $emptyrider= DB::table('client_orders')->where('rider_id',"nil")->get()->count(); 
    $orders= DB::table('client_orders')
   ->select('client_orders.order_serial','client_orders.id','customers.fname','pilots.firstname','pilots.pilotID','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount','client_orders.delivery_status')
   ->join('customers','customers.id','=','client_orders.client_id')
    ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
    ->where('pilots.companyCode','=',thirdplController::bringCode(auth()->user()->id))
   ->where('client_orders.delivery_status',$request->input('task'))
   ->paginate(4);

   $status="All ".$request->input('task')." trips";
   
   return view('3pl.all_orders',['orders'=>$orders,'waiting'=>$emptyrider,'status'=>$status]);
   
   
}

public function filtertrip(){
    
    $validator=$this->validate(request(),[
            'dates'=>'required|string',
                    ],
            [
            'dates.required'=>'please select date range',
           
             ]);

             if(count(request()->all()) > 0){

                $splits=explode("-",request()->input('dates'));
                
                
                 
                  
    $emptyrider= DB::table('client_orders')->where('rider_id',"nil")->get()->count(); 
    $orders= DB::table('client_orders')
   ->select('client_orders.order_serial','client_orders.id','customers.fname','pilots.firstname','pilots.pilotID','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount','client_orders.delivery_status')
   ->join('customers','customers.id','=','client_orders.client_id')
    ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
    ->where('pilots.companyCode','=',thirdplController::bringCode(auth()->user()->id))
   ->whereDate('client_orders.created_at','>=',date('Y-m-d', strtotime($splits[0])))
   ->whereDate('client_orders.created_at','<=',date('Y-m-d', strtotime($splits[1])))
   ->paginate(4);
   $status="Trip request from ".$splits[0]."to ".$splits[1];
   return view('3pl.all_orders',['orders'=>$orders,'waiting'=>$emptyrider,'status'=>$status]);   
                 
           
        
            
            
            }
    
    
    
}




public function thirdPartyPaymentdetail(){
        
   // $detail= DB::table('pilots')->where('id', $id)->first(); 
    
     $payments= DB::table('payments')->select('payments.amount','customers.fname','pilots.firstname','payments.created_at','payments.status','payments.order_id')
     ->join('customers','customers.id','=','payments.client_id')
     
     ->join('pilots','pilots.pilotID','=','payments.riderid') 
     ->where('pilots.companyCode', thirdplController::getcompanyCode(Auth::user()->id))
     ->where('payments.status',"ok")
     ->get(); 
     
     //////////// current_balance ////////////

    //$balance= DB::table('current_balance')->where('rider_id',$detail->pilotID)->sum('balance'); 

    $totalearnings= DB::table('payments')->select('payments.amount','customers.fname','pilots.firstname','payments.created_at','payments.status','payments.order_id')
    ->join('customers','customers.id','=','payments.client_id')
    
    ->join('pilots','pilots.pilotID','=','payments.riderid') 
    ->where('pilots.companyCode', thirdplController::getcompanyCode(Auth::user()->id))
    ->where('payments.status',"ok")
    ->sum('amount'); 


   // $totalearnings= DB::table('payments')->where('payments.status',"ok")->where('riderid',$detail->pilotID)->sum('amount');
    
    //return view('3pl.all3plriderpayment',['rider'=>$detail,'payments'=>$payments,'totalearning'=>number_format($totalearnings),'balance'=>number_format($balance)]);
    return view('3pl.all3plriderpayment',['payments'=>$payments,'totalearning'=>number_format($totalearnings)]);


}

public function thirdPartycashpaymentdetail(){
        
   
   
    $cardearning= DB::table('payments')
  ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.payment_mode','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
  ->join('client_orders','client_orders.id','=','payments.order_id')
  ->join('customers','customers.id','=','client_orders.client_id')
  ->leftjoin('pilots','pilots.pilotID','=','client_orders.rider_id')
  ->where('client_orders.payment_mode',"cash")
  ->where('pilots.companyCode',thirdplController::getcompanyCode(Auth::user()->id))
  ->where('payments.status',"ok")
  ->sum('payments.amount');
  
  $cardearninglist= DB::table('payments')
  ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname','pilots.firstname')
  ->join('client_orders','client_orders.id','=','payments.order_id')
  ->join('customers','customers.id','=','client_orders.client_id')
  ->leftjoin('pilots','pilots.pilotID','=','client_orders.rider_id')
  ->where('client_orders.payment_mode',"cash")
  ->where('pilots.companyCode',thirdplController::getcompanyCode(Auth::user()->id))
  ->where('payments.status',"ok")
  ->get();
    
  return view('3pl.all3plcashpayment',['cardearnings'=>number_format($cardearning),'cardlists'=>$cardearninglist]);
    
    
    
    
 }


public function thirdPartycardpaymentdetail(){
        
   
   
    $cardearning= DB::table('payments')
    ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.payment_mode','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
    ->join('client_orders','client_orders.id','=','payments.order_id')
    ->join('customers','customers.id','=','client_orders.client_id')
    ->leftjoin('pilots','pilots.pilotID','=','client_orders.rider_id')
    ->where('client_orders.payment_mode',"card")
    ->where('pilots.companyCode',thirdplController::getcompanyCode(Auth::user()->id))
    ->where('payments.status',"ok")
    ->sum('payments.amount');
    
    $cardearninglist= DB::table('payments')
    ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname','pilots.firstname')
    ->join('client_orders','client_orders.id','=','payments.order_id')
    ->join('customers','customers.id','=','client_orders.client_id')
    ->leftjoin('pilots','pilots.pilotID','=','client_orders.rider_id')
    ->where('client_orders.payment_mode',"card")
    ->where('pilots.companyCode',thirdplController::getcompanyCode(Auth::user()->id))
    ->where('payments.status',"ok")
    ->get();
   
 return view('3pl.all3plcardpayment',['cardearnings'=>number_format($cardearning),'cardlists'=>$cardearninglist]);
   
   
   
   
}

}
