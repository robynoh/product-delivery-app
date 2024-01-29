<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Models\lists;
use App\Models\contactlist;
use App\Models\autosendlist;
use App\Models\platform_earning;
use App\Models\withdrawticket;
use App\Models\all_process_track;
use App\Models\riderbalance;
use App\Models\client_alert_msg;
use App\Models\autosend;
use App\Models\rider_status_pin;
use App\Models\messagingid;
use App\Models\consumers;
use App\Models\support_issue;
use App\Models\forgotpass;
use App\Models\cash_remittance;
use App\Models\clientmessageid;
use App\Models\payments;
use App\Models\tempdistance;
use App\Models\senderid;
use App\Models\rider_time_online;
use App\Models\rider_progress_track;
use App\Models\pilot;
use App\Models\order_alert_msg;
use App\Models\trips_order_decline;
use App\Models\adminRole;
use App\Models\account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    
    
    
        
    private static $database;

// public function __construct()
// {
//     $this->database = \App\Services\FirebaseService::connect();
// }




    public function index()
    {
        $pilots= DB::table('pilots')->get(); 
        $customers= DB::table('customers')->get(); 
        $orders= DB::table('client_orders')->get();
        //$id= DB::table('senderids')->get(); 
       // $conlist= DB::table('contactlist')->get(); 
        //$auto= DB::table('lists')
       // ->select('lists.id','lists.name','lists.userID','autosend.id','autosend.listID','autosend.created_at','autosend.sendtype')
       // ->join('autosend','autosend.listID','=','lists.id')
       // ->get();
        return view('admin.index',['pilots'=>$pilots,'customers'=>$customers,'orders'=>$orders]);

    }


    public function pilots()
    {
        $pilots= DB::table('pilots')->orderBy('id','desc')->get(); 
        return view('admin.pilots',['pilots'=>$pilots]);

    }

    public function postnewpilot(){

        $company_name="";
        $company_code="";

        $validator=$this->validate(request(),[

            'fullname'=>'required|string',
            'email'=>'required|string',
            'phone'=>'required|string',
            'address'=>'required|string',
            '3pl'=>'required|string',
            'machine_manufacture'=>'required|string',
            'engine_size'=>'required|string',
            'license_plate'=>'required|string',
            'driver_license'=>'required|string',
            'bike_color'=>'required|string',
            'driver_license'=>'required|string',
            'expiry_date'=>'required|string',
            'vpermit'=>'required|string',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'driver_license_pic' => 'required|image|mimes:jpeg,png,jpg|max:2048',
             'bank_name'=>'required|string',
             'account_name'=>'required|string',
             'account_number'=>'required|string',
         
            ],
            [
                'fullname.required'=>'Please type in rider fullname',
                'email.required'=>'Enter rider email',
                'phone.required'=>'Please enter rider phone number',
                'address.required'=>'Please enter rider home address',
                '3pl.required'=>'Please choose if rider is from 3PL',
                'machine_manufacture.required'=>'Please enter the name of the machine manufacturer',
                'engine_size.required'=>'Please enter the engine size',
                'license_plate.required'=>'Please enter license plate',
                'bike_color.required'=>'Please bike color',
                'driver_license.required'=>'Please enter rider driver license',
                'expiry_date.required'=>'Please enter license expiry date',
                'vpermit.required'=>'Please indicate wether rider have a valid permit or not',
                'profile_photo.required'=>'Please upload profile photo for this rider',
                'driver_license_pic.required'=>'Please upload driver license image',
                'bank_name.required'=>'Enter rider bank name',
                'account_name.required'=>'Enter rider account name',
                'account_number.required'=>'Enter rider account number',
                  
                
                ]);

         if(request()->input('3pl')=="yes"){

      $company_name=request()->input('company_name');
      $company_code=request()->input('company_code');


         }
               
        if(request()->input('valid_permit')=="yes"){
       
            $file1=request()->file('profile_photo');
            $file2=request()->file('driver_license_pic');
            $file3=request()->file('permit_pic');
     
            //rename files
            $extension1 = $file1->getClientOriginalExtension(); 
            $extension2 = $file2->getClientOriginalExtension(); 
            $extension3 = $file3->getClientOriginalExtension(); 
     
            $fileName1 = rand(11111, 99999) . '.' . $extension1; 
            $fileName2 = rand(11111, 99999) . '.' . $extension2;
            $fileName3 = rand(11111, 99999) . '.' . $extension3;
         
          //////// move files to upload folder ////////////////
          
          $filePathdb1 = asset('/photos/'. $fileName1);
          $filePathdb2 = asset('/photos/'. $fileName2);
          $filePathdb3 = asset('/photos/'. $fileName3);
     
          $filePath = 'photos';
          $file1->move($filePath,$fileName1);
          $file2->move($filePath,$fileName2);
          $file3->move($filePath,$fileName3);
          
        $pilot = new pilot();
        $pilot->firstname=request()->input('fullname');
        $pilot->lastname="";
        $pilot->email=request()->input('email');
        $pilot->phone=request()->input('phone');
        $pilot->address=request()->input('address');
        $pilot->third_delivery=request()->input('3pl');
        $pilot->machine_manufacture=request()->input('machine_manufacture');
        $pilot->engine_size=request()->input('engine_size');
        $pilot->license_plate=request()->input('license_plate');
        $pilot->bike_color=request()->input('bike_color');
        $pilot->driver_license=request()->input('driver_license');
        $pilot->expiry_date=request()->input('expiry_date');
        $pilot->valid_permit=request()->input('vpermit');
        $pilot->bankName=request()->input('bank_name');
        $pilot->accountName=request()->input('account_name');
        $pilot->accountNumber=request()->input('account_number');
        $pilot->company=$company_name;
        $pilot->companyCode=$company_code;
        $pilot->picture=$filePathdb1;
        $pilot->driver_license_pic=$filePathdb2;
        $pilot->permit_pic=$filePathdb3;
        $pilot->status=0;
        $pilot->pilotID=$this->random_number_with_dupe();
        $pilot->online_status=0;
        $pilot->verification_code= $this->confirmation_code();
        $pilot->verification_status=0;
         $pilot->available_status=0;
        if($pilot->save()){

            return redirect()->back()->withSuccess('New rider added successfully');
        }

               }else{
            
             $file1=request()->file('profile_photo');
            $file2=request()->file('driver_license_pic');
           
            //rename files
            $extension1 = $file1->getClientOriginalExtension(); 
            $extension2 = $file2->getClientOriginalExtension(); 
           
     
            $fileName1 = rand(11111, 99999) . '.' . $extension1; 
            $fileName2 = rand(11111, 99999) . '.' . $extension2;
          
         
          //////// move files to upload folder ////////////////
          
          $filePathdb1 = asset('/photos/'. $fileName1);
          $filePathdb2 = asset('/photos/'. $fileName2);
         
     
          $filePath = 'photos';
          $file1->move($filePath,$fileName1);
          $file2->move($filePath,$fileName2);
         
          
         $pilot = new pilot();
        $pilot->firstname=request()->input('fullname');
        $pilot->lastname="";
        $pilot->email=request()->input('email');
        $pilot->phone=request()->input('phone');
        $pilot->address=request()->input('address');
        $pilot->third_delivery=request()->input('3pl');
        $pilot->machine_manufacture=request()->input('machine_manufacture');
        $pilot->engine_size=request()->input('engine_size');
        $pilot->license_plate=request()->input('license_plate');
        $pilot->bike_color=request()->input('bike_color');
        $pilot->driver_license=request()->input('driver_license');
        $pilot->expiry_date=request()->input('expiry_date');
        $pilot->valid_permit=request()->input('vpermit');
        $pilot->bankName=request()->input('bank_name');
        $pilot->accountName=request()->input('account_name');
        $pilot->accountNumber=request()->input('account_number');
        $pilot->company=$company_name;
        $pilot->companyCode=$company_code;
        $pilot->picture=$filePathdb1;
        $pilot->driver_license_pic=$filePathdb2;
        $pilot->permit_pic="";
        $pilot->status=0;
        $pilot->pilotID=$this->random_number_with_dupe();
        $pilot->online_status=0;
        $pilot->verification_code= $this->confirmation_code();
        $pilot->verification_status=0;
         $pilot->available_status=0;
        if($pilot->save()){

            return redirect()->back()->withSuccess('New rider added successfully');
        }
               }    
           
         }
            

        
    

    public function newpilot(){

        return view('admin.new_rider');
    }

    public static function pulluserdetail($id)
    {
       
       $users= DB::table('users')->where('id', $id)->first(); 
       return response()->json($users);
           
      
    }
    
    public static function pullallcustomeruserdetail($id)
    {
       
       $users= DB::table('customers')->where('id', $id)->first(); 
       return response()->json($users);
           
      
    }

    public static function pullaccountdetail($id)
    {
       
       $users= DB::table('users')->where('id', $id)->first(); 
       return response()->json($users);
           
      
    }
    
    public static function sendotp($id)
    {
       $response=array();
       
       ///// pull rider id //////
       
       $pilot= DB::table('pilots')->where('phone', $id)->first(); 
       
       if(!empty($pilot->phone)){
       
       $otp=AdminController::confirmation_code();
       
       ////// update rider verification code /////////
       
       DB::table('pilots')->where('id',$pilot->id)->update(['verification_code' =>$otp]);
       
       AdminController::sendverificationcode($pilot->id);
       
       
           
        $response['error'] = false;  
        $response['message'] = 'otp sent';  
           
       }else{
           
           $response['error'] = false;  
        $response['message'] = 'otp not sent. number does not exist in our riders contact list';   
       }
       
       return response()->json($response);
           
      
    }
    
     public static  function sendverifypass($phone,$otp){ 

       $str = ltrim($phone, '+');
      
       $msg=urlencode($otp);
$curl = curl_init();
$data = array("api_key" => "TLn4cMf5MyLxd6AhD18W84QUwHJXj5NYjtQPXISLRVRywDAlD9wCseVY6r2Dbi", "to" => urlencode($str),  "from" => "TROOPA",
"sms" => $msg,  "type" => "plain",  "channel" => "generic" );

$post_data = json_encode($data);

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.ng.termii.com/api/sms/send",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => $post_data,
CURLOPT_HTTPHEADER => array(
"Content-Type: application/json"
),
));

$response = curl_exec($curl);

curl_close($curl);











    }
    
    
    
    public function getdrivingparam($riderlongitude,$riderlatitude,$pickuplongitude,$pickuplatitude){
        
         $response=array();
    
     $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($pickuplatitude).','.trim($pickuplongitude).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       $response['address']= $data->results[0]->formatted_address;
     }
     else
     {
       $response['address']= "something went wrong";
     }
     
       return response()->json($response);  
    
}
    


    
    
    public function passrestphone($phone){
        
        $response=array();
         $otp=AdminController::confirmation_code();
         
         $client= DB::table('customers')->where('phone', $phone)->get(); 
         if($client->count() > 0){
             
              $password = new forgotpass();
            $password->phone=$phone;
             $password->verify_code=$otp;
              $password->verify_status=0;
            $password->save();
            if($password->save()){
                
             AdminController::sendverifypass("+234".$phone,$otp);
                
            $response["status"]="OK"  ;
            $response["message"]="a password reset otp has been sent to phone number" ;
            $response["id"]=$password->id;
                
                
            }
             
             
             
         }else{
           $response["status"]="FAILED"  ;
            $response["message"]="this phone number was not found in our record"  ;
             
         }
        return response()->json($response);  
        
    }
    
    
    public function passrestphone2($phone){
        
        $response=array();
         $otp=AdminController::confirmation_code();
         
         $client= DB::table('pilots')->where('phone', $phone)->get(); 
         if($client->count() > 0){
             
              $password = new forgotpass();
            $password->phone=$phone;
             $password->verify_code=$otp;
              $password->verify_status=0;
            $password->save();
            if($password->save()){
                
             AdminController::sendverifypass($phone,$otp);
                
            $response["status"]="OK"  ;
            $response["message"]="a password reset otp has been sent to phone number"  ;
            $response["id"]=$password->id;
                
                
            }
             
             
             
         }else{
           $response["status"]="FAILED"  ;
            $response["message"]="this phone number was not found in our record"  ;
             
         }
        return response()->json($response);  
        
    } 
    
    public function changepass($otp,$pass,$id){
        
         $response=array();
         
         $password=AdminController::encrypt_decrypt($pass, true);
        
         $client= DB::table('forgotpassword')->where('id', $id)->first(); 
         if($client->verify_code==$otp){
             
            $update= DB::table('customers')->where('phone',$client->phone)->update(['password' =>$password]);  
             $update= DB::table('forgotpassword')->where('id',$id)->update(['verify_status' =>1]);  
            
              $response["status"]="OK"  ;
            $response["message"]="password update successful."  ;
             
         }else{
              $response["status"]="FAILED"  ;
            $response["message"]="this otp does not match"  ;
             
         }
        return response()->json($response);  
        
    }
    
    
     public function changepassrider($otp,$pass,$id){
        
         $response=array();
         
         $password=AdminController::encrypt_decrypt($pass, true);
        
         $client= DB::table('forgotpassword')->where('id', $id)->first(); 
         if($client->verify_code==$otp){
             
            $update= DB::table('pilots')->where('phone',$client->phone)->update(['password' =>$password]);  
             $update= DB::table('forgotpassword')->where('id',$id)->update(['verify_status' =>1]);  
            
              $response["status"]="OK"  ;
            $response["message"]="password update successful."  ;
             
         }else{
              $response["status"]="FAILED"  ;
            $response["message"]="this otp does not match"  ;
             
         }
        return response()->json($response);  
        
    }
    
    public function allclientorder($rider){
        
         $clientrequests= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','customers.picture','customers.fname','customers.lname')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.rider_id',$rider)
      ->get(); 
      
       if($clientrequests->count() >0){
           
           foreach( $clientrequests as  $clientrequestx){
           
          
      $response['requests'][]=$clientrequestx;
       $response['count']=$clientrequests->count();
        $response["error"]="false";
          $response["message"]="success";
           }
           
           
       }
       else{
           
            $response['count']=$clientrequests->count();
        $response["error"]="false";
         $response["message"]="success";
       }
        
      return response()->json($response);     
        
    }
    
    
    
    public function  calculatetripcost($pickupaddress,$destinationaddress){
       
       $response=array();

 $origin      = str_replace(' ','+',$pickupaddress);
 $destination = str_replace(' ','+',$destinationaddress);
 $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
 $price=0;
 $url = "https://maps.googleapis.com/maps/api/directions/json?origin=".$origin.",IL&destination=" .$destination. "&sensor=false&key=".$key;
 $jsonfile = file_get_contents($url);
 $jsondata = json_decode($jsonfile);
 
  $distance=str_replace('km', '', $jsondata->routes[0]->legs[0]->distance->text); 
  $distance= (int) $distance; 
     if($distance<3){
          $response['price']=500; 
           $response['dist']=$jsondata->routes[0]->legs[0]->distance->text; 
             $response['duration']=$jsondata->routes[0]->legs[0]->duration->text; 
           
          $response['status']="OK"; 
          
         
     }
     else if($distance>3){
         
      $response['price']= AdminController::farecount($distance); 
       $response['status']="OK"; 
         $response['dist']=$jsondata->routes[0]->legs[0]->distance->text; 
             $response['duration']=$jsondata->routes[0]->legs[0]->duration->text; 
      
         
         
     }
  
  return response()->json($response);  
  
      } 
    
    
   public static function farecount($distance){
       
       $dist=$distance-3;
       $fare=0;
       if($dist<=2){
         $fare=500+200;   
           
       }
       if($dist>2 && $dist <=3){
           
           $fare=700+200;    
       }
       
     if($dist>3 && $dist <=4){
           
           $fare=900+200;    
       }
       
    
     if($dist>4 && $dist <=5){
           
           $fare=1300+200;    
       }
    
     if($dist>5 && $dist <=6){
           
           $fare=1000+300;    
       }
       
   
      if($dist>6 && $dist <=7){
           
           $fare=1300+200;    
       }
       
        if($dist>7 && $dist <=8){
           
           $fare=1500+300;    
       }
       
        if($dist>8 && $dist <=9){
           
           $fare=1800+200;    
       }
      if($dist>9 && $dist <=10){
           
           $fare=2000+200;    
       }
    if($dist>10 && $dist <=11){
           
           $fare=2200+200;    
       }
    if($dist>11 && $dist <=12){
           
           $fare=2200+200;    
       }
    if($dist>12 && $dist <=13){
           
           $fare=2400+200;    
       }
     if($dist>13 && $dist <=14){
           
           $fare=2600+200;    
       }
    if($dist>14 && $dist <=15){
           
           $fare=2800+200;    
       }
    if($dist>15 && $dist <=16){
           
           $fare=3000+200;    
       }
    if($dist>16 && $dist <=17){
           
           $fare=3200+200;    
       }
    if($dist>17 && $dist <=18){
           
           $fare=3400+200;    
       }
    if($dist>18 && $dist <=19){
           
           $fare=3600+200;    
       }
      if($dist>19 && $dist <=20){
           
           $fare=3800+200;    
       }
        if($dist>20 && $dist <=21){
           
           $fare=4000+200;    
       }
     if($dist>21 && $dist <=22){
           
           $fare=4200+200;    
       }
       
       if($dist>22 && $dist <=23){
           
           $fare=4400+200;    
       }
       
        if($dist>23 && $dist <=24){
           
           $fare=4600+200;    
       }
        if($dist>24 && $dist <=25){
           
           $fare=4400+200;    
       }
        if($dist>25 && $dist <=26){
           
           $fare=4600+200;    
       }
       
       if($dist>26 && $dist <=27){
           
           $fare=4800+200;    
       }
       if($dist>27 && $dist <=28){
           
           $fare=4800+200;    
       }
       
       if($dist>28 && $dist <=29){
           
           $fare=4800+200;    
       }
         if($dist>29 && $dist <=30){
           
           $fare=5000+200;    
       }
       
        if($dist>30 && $dist <=31){
           
           $fare=5200+200;    
       }
       
        if($dist>31 && $dist <=32){
           
           $fare=5400+200;    
       }
       
        if($dist>32 && $dist <=33){
           
           $fare=5600+200;    
       }
        if($dist>33 && $dist <=34){
           
           $fare=5800+200;    
       }
       
        if($dist>34 && $dist <=35){
           
           $fare=6000+200;    
       }
       
        if($dist>35 && $dist <=36){
           
           $fare=6200+200;    
       }
       
        if($dist>36 && $dist <=37){
           
           $fare=6400+200;    
       }
       
        if($dist>37 && $dist <=38){
           
           $fare=6600+200;    
       }
       
        if($dist>38 && $dist <=39){
           
           $fare=6800+200;    
       }
       
        if($dist>39 && $dist <=40){
           
           $fare=7000+200;    
       }
        if($dist>40 && $dist <=41){
           
           $fare=7200+200;    
       }
        if($dist>41 && $dist <=42){
           
           $fare=7400+200;    
       }
       
        if($dist>42 && $dist <=43){
           
           $fare=7600+200;    
       }
        if($dist>43 && $dist <=44){
           
           $fare=7800+200;    
       }
       if($dist>44 && $dist <=45){
           
           $fare=8000+200;    
       }
       if($dist>45 && $dist <=46){
           
           $fare=8200+200;    
       }
       if($dist>46 && $dist <=47){
           
           $fare=8400+200;    
       }
       
       if($dist>47 && $dist <=48){
           
           $fare=8600+200;    
       }
       if($dist>48 && $dist <=49){
           
           $fare=8800+200;    
       }
       if($dist>49 && $dist <=50){
           
           $fare=9000+200;    
       }
       if($dist>50 ){
           
           $fare=10000;    
       }
       return $fare;
       
   } 
   
   
   
   
    
   
    
    public function pickuprequest($riderid)
    {
        
        
        
      
        
        
        //  $customerorders= DB::table('client_orders')
        //  ->where('rider_id',$rider_id)
        //  ->where('treat_status',"new")
        //  ->get();
         
       $response=array();
       
       //////////////////////// how many new orders ///////////////////
       
    //   $customerorders->count();
        
    //     if($customerorders->count()>0){
            
    //      foreach($customerorders as  $customerorder){
             
             
    //      }  
            
            
            
    //     }
       
    //   $allorders=array();
       
    //   ///// pull rider id //////
       
    //   $customer_rider_id="";
    //   $customer_rider_status="";
       
    //   $customer_lname="";
    //   $customer_fname="";
    //     $customer_picture="";
    //      $customer_rider_time="";
    
    


       
     
     
      
    
    
     $clientrequest= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','customers.picture','customers.fname','customers.lname')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.treat_status','NEW')
      ->where('client_orders.rider_id',$riderid)
      ->get(); 
    
    
    
    
       
          $response['error'] = false; 
         $response['count'] = $clientrequest->count(); 
        
         
         
         if($clientrequest->count()>0 && $clientrequest->count()<2){
             
             
             
            $clientrequestx= DB::table('client_orders')
     ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.package_type','client_orders.duration','client_orders.client_id','client_orders.amount','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.pickup_contact','client_orders.created_at','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','customers.picture','customers.fname','customers.lname')
       ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.treat_status','NEW')
      ->where('client_orders.rider_id',$riderid)
      ->first();  
             
             
           $response['order_id'] = $clientrequestx->id; 
          $response['client_name'] = $clientrequestx->fname; 
         $response['pickup_location'] =$clientrequestx->pickup_location; 
         $response['dropoff_location'] =$clientrequestx->dropoff_location; 
         $response['package_type'] =$clientrequestx->package_type;
         $response['payment_type'] =$clientrequestx->payment_type; 
          $response['payment_mode'] =$clientrequestx->payment_mode;
         $response['picture'] =$clientrequestx->picture; 
         $response['distance'] =$clientrequestx->distance; 
         $response['duration'] =$clientrequestx->duration; 
         $response['pickup_contact'] =$clientrequestx->pickup_contact; 
         $response['dropoff_contact'] =$clientrequestx->dropoff_contact; 
         $response['pickup_contact_name'] =$clientrequestx->pickup_contact_name; 
         $response['dropoff_contact_name'] =$clientrequestx->dropoff_contact_name; 
          $response['order_id'] =$clientrequestx->id; 
         $response['status'] =$clientrequestx->delivery_status;
          $response['client_id'] =$clientrequestx->client_id;
       //    $response['rider_id'] =$clientrequestx->rider_id;
         $response['amount'] =$clientrequestx->amount;
          $response['time'] =Carbon::parse($clientrequestx->created_at)->diffForHumans();
         
             
             
         }
         
         if($clientrequest->count() > 1){
             
             
              $cusrider= DB::table('customer_rider')
      ->select('customer_rider.id','customer_rider.status','customer_rider.created_at','customers.lname','customers.fname','customers.picture')
      ->join('customers','customers.id','=','customer_rider.customer_id')
      ->where('customer_rider.riderid', $riderid)
      ->where('customer_rider.status','NEW')
      ->first(); 
      
          $customer_rider_id= $cusrider->id;
          $customer_rider_status= $cusrider->status;
          $customer_lname=$cusrider->lname;
          $customer_fname=$cusrider->fname;
          $customer_picture=$cusrider->picture;
          $customer_rider_time=Carbon::parse($cusrider->created_at)->diffForHumans();
          
      
          $response['client_name'] = $cusrider->fname." ".$cusrider->lname; 
          $response['picture'] =$cusrider->picture; 
            $response['time'] =Carbon::parse($cusrider->created_at)->diffForHumans(); 
             
             
             
             
             
         }
       
       
    //     $pilots= DB::table('client_orders')->where('customer_rider_id',$customer_rider_id)->get();
       
      
       
    //     foreach($pilots as $pilot){
         
    //   $response['orders'][]=$pilot;
      
           
    //     }
        
         
       
      return response()->json($response);
           
      
    }
    
    
    
    
     public function singlerecentrequest($riderid)
    {
        
        
        
      
        
        
        //  $customerorders= DB::table('client_orders')
        //  ->where('rider_id',$rider_id)
        //  ->where('treat_status',"new")
        //  ->get();
         
       $response=array();
       
       //////////////////////// how many new orders ///////////////////
       
    //   $customerorders->count();
        
    //     if($customerorders->count()>0){
            
    //      foreach($customerorders as  $customerorder){
             
             
    //      }  
            
            
            
    //     }
       
    //   $allorders=array();
       
    //   ///// pull rider id //////
       
    //   $customer_rider_id="";
    //   $customer_rider_status="";
       
    //   $customer_lname="";
    //   $customer_fname="";
    //     $customer_picture="";
    //      $customer_rider_time="";
    
    


       
     
     
      
    
    
     $clientrequest= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','customers.picture','customers.fname','customers.lname')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.treat_status','NEW')
      ->where('client_orders.rider_id',$riderid)
      ->get(); 
    
    
    
    
       
          $response['error'] = false; 
         $response['count'] = $clientrequest->count(); 
        
         
         
         if($clientrequest->count()>0 && $clientrequest->count()<2){
             
             
             
            $clientrequestx= DB::table('client_orders')
     ->select('client_orders.id','client_orders.pickup_location','client_orders.pickuplon','client_orders.pickuplat','client_orders.dropoff_location','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.duration','client_orders.client_id','client_orders.amount','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.pickup_contact','client_orders.created_at','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','customers.picture','customers.fname','customers.lname')
       ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.treat_status','NEW')
      ->where('client_orders.rider_id',$riderid)
      ->first();  
             
             
           $response['order_id'] = $clientrequestx->id; 
          $response['client_name'] = $clientrequestx->fname; 
         $response['pickup_location'] =$clientrequestx->pickup_location; 
           $response['pickuplon'] =$clientrequestx->pickuplon; 
           $response['pickuplat'] =$clientrequestx->pickuplat; 
         $response['dropoff_location'] =$clientrequestx->dropoff_location; 
         $response['package_type'] =$clientrequestx->package_type;
         $response['payment_type'] =$clientrequestx->payment_type; 
          $response['payment_mode'] =$clientrequestx->payment_mode;
         $response['picture'] =$clientrequestx->picture; 
         $response['distance'] =$clientrequestx->distance; 
         $response['duration'] =$clientrequestx->duration; 
         $response['pickup_contact'] =$clientrequestx->pickup_contact; 
         $response['dropoff_contact'] =$clientrequestx->dropoff_contact; 
         $response['pickup_contact_name'] =$clientrequestx->pickup_contact_name; 
         $response['dropoff_contact_name'] =$clientrequestx->dropoff_contact_name; 
          $response['dropoff_coordinates'] =json_decode($clientrequestx->dropoff_coordinates); 
          $response['order_id'] =$clientrequestx->id; 
         $response['status'] =$clientrequestx->delivery_status;
          $response['client_id'] =$clientrequestx->client_id;
       //    $response['rider_id'] =$clientrequestx->rider_id;
         $response['amount'] =$clientrequestx->amount;
          $response['time'] =Carbon::parse($clientrequestx->created_at)->diffForHumans();
         
             
             
         }
         
         if($clientrequest->count() > 1){
             
             
              $cusrider= DB::table('customer_rider')
      ->select('customer_rider.id','customer_rider.status','customer_rider.created_at','customers.lname','customers.fname','customers.picture')
      ->join('customers','customers.id','=','customer_rider.customer_id')
      ->where('customer_rider.riderid', $riderid)
      ->where('customer_rider.status','NEW')
      ->first(); 
      
          $customer_rider_id= $cusrider->id;
          $customer_rider_status= $cusrider->status;
          $customer_lname=$cusrider->lname;
          $customer_fname=$cusrider->fname;
          $customer_picture=$cusrider->picture;
          $customer_rider_time=Carbon::parse($cusrider->created_at)->diffForHumans();
          
      
          $response['client_name'] = $cusrider->fname." ".$cusrider->lname; 
          $response['picture'] =$cusrider->picture; 
            $response['time'] =Carbon::parse($cusrider->created_at)->diffForHumans(); 
             
             
             
             
             
         }
       
       
    //     $pilots= DB::table('client_orders')->where('customer_rider_id',$customer_rider_id)->get();
       
      
       
    //     foreach($pilots as $pilot){
         
    //   $response['orders'][]=$pilot;
      
           
    //     }
        
         
       
      return response()->json($response);
           
      
    }
    
    public function allriderrequest($riderid){
         $response=array();
         
         $requestsCount= DB::table('client_orders')
       ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.rider_id','client_orders.rider_contact','client_orders.order_code','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','pilots.firstname','client_orders.order_serial','client_orders.amount','client_orders.payment_mode','client_orders.request_date','client_orders.request_time','client_orders.dropoff_location_format','client_orders.pickup_location_format')
       ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
      ->where('client_orders.rider_id',$riderid)
       ->orderBy('client_orders.id','desc')
      ->get()->count();
      
      if($requestsCount>0){
         
          $requests= DB::table('client_orders')
       ->select('client_orders.id','client_orders.pickup_location','client_orders.pickuplon','client_orders.pickuplat','client_orders.dropoff_location','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.rider_id','client_orders.rider_contact','client_orders.order_code','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','pilots.firstname','client_orders.order_serial','client_orders.amount','client_orders.payment_mode','client_orders.request_date','client_orders.request_time','client_orders.dropoff_location_format','client_orders.pickup_location_format')
       ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
      ->where('client_orders.rider_id',$riderid)
       ->orderBy('client_orders.id','desc')
      ->get();
      
      foreach($requests as $requesta){
         
      // $response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff_contact"=>$requesta->dropoff_contact,"dropoff_contact_name"=>$requesta->dropoff_contact_name,"dropoff_location"=>$requesta->dropoff_location,"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"riderId"=>$requesta->rider_id,"rider_contact"=>$requesta->rider_contact,"verification_code"=>$requesta->order_code,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"bonus"=>AdminController::checkBonus($id),"isPaid"=>AdminController::checkIfpaid($requesta->id)];
        $response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff"=>[AdminController::dropoff($requesta->dropoff_contact,$requesta->dropoff_contact_name,$requesta->dropoff_location_format)],"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"dropoff_coordinates"=>$requesta->dropoff_coordinates,"pickuplon"=>$requesta->pickuplon,"pickuplat"=>$requesta->pickuplat];
    
      
           
        }
        
        $response['message'] ="order information"; 
      }else{
        $response['message'] ="empty record";   
          
      }
        
       return response()->json($response);  
    }
    
     public function riderrequest($id,$deliveryStatus,$page){
        $response=array();
       
        $bonus= DB::table('client_bonus')->where('id',$id)->first(); 
        
        if($page=="all"){
            
            $requests= DB::table('client_orders')
       ->select('client_orders.id','client_orders.pickup_location','client_orders.pickuplon','client_orders.pickuplat','client_orders.dropoff_location','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.rider_id','client_orders.rider_contact','client_orders.order_code','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','pilots.firstname','client_orders.order_serial','client_orders.amount','client_orders.payment_mode','client_orders.request_date','client_orders.request_time','client_orders.dropoff_location_format','client_orders.pickup_location_format')
       ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
      ->where('client_orders.client_id',$id)
      ->where('client_orders.delivery_status',$deliveryStatus)
       ->orderBy('client_orders.id','desc')
      ->get();
      
      foreach($requests as $requesta){
         
      // $response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff_contact"=>$requesta->dropoff_contact,"dropoff_contact_name"=>$requesta->dropoff_contact_name,"dropoff_location"=>$requesta->dropoff_location,"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"riderId"=>$requesta->rider_id,"rider_contact"=>$requesta->rider_contact,"verification_code"=>$requesta->order_code,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"bonus"=>AdminController::checkBonus($id),"isPaid"=>AdminController::checkIfpaid($requesta->id)];
        $response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickuplon"=>$requesta->pickuplon,"pickuplat"=>$requesta->pickuplat,"dropoff_coordinates"=>$requesta->dropoff_coordinates,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff"=>[AdminController::dropoff($requesta->dropoff_contact,$requesta->dropoff_contact_name,$requesta->dropoff_location_format)],"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"rider"=>[AdminController::rider($requesta->rider_id)],"verification_code"=>$requesta->order_code,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"bonus"=>AdminController::checkBonus($id),"isPaid"=>AdminController::checkIfpaid($requesta->id)];
    
      
           
        }
            
            
        } if($page!="all"&& $deliveryStatus!="all"){
        
      $requestxs= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.pickuplon','client_orders.pickuplat','client_orders.dropoff_location','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.rider_id','client_orders.rider_contact','client_orders.order_code','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','pilots.firstname','client_orders.order_serial','client_orders.amount','client_orders.payment_mode','client_orders.request_date','client_orders.request_time','client_orders.dropoff_location_format','client_orders.pickup_location_format')
          ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
      ->where('client_orders.client_id',$id)
      ->where('client_orders.delivery_status',$deliveryStatus)
       ->orderBy('client_orders.id','desc')
      ->paginate($page);
      
       foreach($requestxs as $requesta){
           
             //$response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff_contact"=>$requesta->dropoff_contact,"dropoff_contact_name"=>$requesta->dropoff_contact_name,"dropoff_location"=>$requesta->dropoff_location,"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"riderId"=>$requesta->rider_id,"rider_contact"=>$requesta->rider_contact,"verification_code"=>$requesta->order_code,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"bonus"=>AdminController::checkBonus($id),"isPaid"=>AdminController::checkIfpaid($requesta->id)];
               $response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickuplon"=>$requesta->pickuplon,"pickuplat"=>$requesta->pickuplat,"dropoff_coordinates"=>$requesta->dropoff_coordinates,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff"=>[AdminController::dropoff($requesta->dropoff_contact,$requesta->dropoff_contact_name,$requesta->dropoff_location_format)],"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"rider"=>[AdminController::rider($requesta->rider_id)],"verification_code"=>$requesta->order_code,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"bonus"=>AdminController::checkBonus($id),"isPaid"=>AdminController::checkIfpaid($requesta->id)];
    
         
     // $response['requests'][]=$requestx;
      
           
        }
        }
     if($deliveryStatus=="all" && $page!="all"){
            
            $requestxs= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.pickuplon','client_orders.pickuplat','client_orders.dropoff_location','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.rider_id','client_orders.rider_contact','client_orders.order_code','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','pilots.firstname','client_orders.order_serial','client_orders.amount','client_orders.payment_mode','client_orders.request_date','client_orders.request_time','client_orders.dropoff_location_format','client_orders.pickup_location_format')
          ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
      ->where('client_orders.client_id',$id)
       ->orderBy('client_orders.id','desc')
      ->paginate($page);
      
       foreach($requestxs as $requesta){
         
       //$response['requests'][]=$requestx;
       
        // $response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff_contact"=>$requesta->dropoff_contact,"dropoff_contact_name"=>$requesta->dropoff_contact_name,"dropoff_location"=>$requesta->dropoff_location,"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"riderId"=>$requesta->rider_id,"rider_contact"=>$requesta->rider_contact,"verification_code"=>$requesta->order_code,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"bonus"=>AdminController::checkBonus($id),"isPaid"=>AdminController::checkIfpaid($requesta->id)];
                 $response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickuplon"=>$requesta->pickuplon,"pickuplat"=>$requesta->pickuplat,"dropoff_coordinates"=>$requesta->dropoff_coordinates,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff"=>[AdminController::dropoff($requesta->dropoff_contact,$requesta->dropoff_contact_name,$requesta->dropoff_location_format)],"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"rider"=>[AdminController::rider($requesta->rider_id)],"verification_code"=>$requesta->order_code,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"bonus"=>AdminController::checkBonus($id),"isPaid"=>AdminController::checkIfpaid($requesta->id)];
    
     
           
        }
            
            
            
        }
        
        if($deliveryStatus==="all" && $page==="all"){
            
             $requestas= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.pickuplon','client_orders.pickuplat','client_orders.dropoff_location','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.rider_id','client_orders.rider_contact','client_orders.order_code','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','pilots.firstname','client_orders.order_serial','client_orders.amount','client_orders.payment_mode','client_orders.request_date','client_orders.request_time','client_orders.dropoff_location_format','client_orders.pickup_location_format')
       ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
      ->where('client_orders.client_id',$id)
       ->orderBy('client_orders.id','desc')
      ->get();
      
       foreach($requestas as $requesta){
         
            $response['requests'][]=["packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"pickuplon"=>$requesta->pickuplon,"pickuplat"=>$requesta->pickuplat,"dropoff_coordinates"=>$requesta->dropoff_coordinates,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"dropoff"=>[AdminController::dropoff($requesta->dropoff_contact,$requesta->dropoff_contact_name,$requesta->dropoff_location_format)],"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"rider"=>[AdminController::rider($requesta->rider_id)],"verification_code"=>$requesta->order_code,"date_created"=>$requesta->request_date,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"bonus"=>AdminController::checkBonus($id),"isPaid"=>AdminController::checkIfpaid($requesta->id)];
       }
            
       

            
        }
        
           return response()->json($response);
        
    }
    
    public function checkIfpaid($order_id){
        
        $value="";
        
          $payments= DB::table('payments')->where('order_id',$order_id)->first();
          if(isset($payments->status) && $payments->status=="ok"){
              
               $value="true";
          }else{
               $value="false";
              
          }
          
          return $value;
        
    }
    
    
     public function checkBonus($id){
        
        $value="";
        
          $bonus= DB::table('client_bonus')->where('client_id',$id)->first();
          if(isset($bonus->bonus)){
              
               $value=$bonus->bonus;
          }else{
               $value="0.0";
              
          }
          
          return $value;
        
    }
    
     public function recentrequest($riderid){
        
         $response=array();
         
        
         $requests= DB::table('client_orders')
     ->select('client_orders.id','client_orders.order_serial','client_orders.pickup_location','client_orders.pickup_location_format','client_orders.pickuplon','client_orders.pickuplat','client_orders.dropoff_location','client_orders.dropoff_location_format','client_orders.request_date','client_orders.request_time','client_orders.dropoff_coordinates','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.delivery_status','client_orders.payment_type','client_orders.payment_mode','client_orders.pickup_contact','client_orders.amount','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','customers.picture','customers.fname','customers.lname')
       ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.treat_status','NEW')
      ->where('client_orders.rider_id',$riderid)
      ->get();
      
         foreach( $requests as  $requesta){
             
            
            //$response['requests'][]=$request;
            $response['requests'][]=["id"=>$requesta->id,"packageid"=>$requesta->order_serial,"pickup_location"=>$requesta->pickup_location,"dropoff_location"=>$requesta->dropoff_location,"dropoff_contact"=>$requesta->dropoff_contact,"dropoff_contact_name"=>$requesta->dropoff_contact_name,"package_type"=>$requesta->package_type,"pickup_contact"=>$requesta->pickup_contact,"pickup_contact_name"=>$requesta->pickup_contact_name,"duration"=>$requesta->duration,"distance"=>$requesta->distance,"delivery_status"=>$requesta->delivery_status,"amount"=>$requesta->amount,"dropoff"=>[AdminController::dropoff($requesta->dropoff_contact,$requesta->dropoff_contact_name,$requesta->dropoff_location_format)],"delivery_fee"=>$requesta->amount,"trip_status"=>$requesta->delivery_status,"payment_type"=>$requesta->payment_type,"payment_mode"=>$requesta->payment_mode,"created_at"=>$requesta->request_date,"picture"=>$requesta->picture,"fname"=>$requesta->fname,"date_time"=>$requesta->request_time,"pickup_location_formatted"=>$requesta->pickup_location_format,"dropoff_location_formatted"=>$requesta->pickup_location_format,"dropoff_coordinates"=>json_decode($requesta->dropoff_coordinates),"pickuplon"=>$requesta->pickuplon,"pickuplat"=>$requesta->pickuplat];
    
             
             
         }
          $response['error'] = false; 
          $response['count'] = $requests->count();
          return response()->json($response);
        
    }
    
    
    
    public function updateorder($orderid){
        
         $response=array();
         
        
         $orders= DB::table('client_orders')->where('id', $orderid)->get(); 
         foreach( $orders as  $order){
             
             if($order->delivery_status !="accepted"){
                 
                  $update= DB::table('client_orders')->where('id',$orderid)->update(['delivery_status' =>"accepted"]); 
                  
                  $message="Troopa rider has accepted your delivery request";
                  
                   AdminController::sendClientNotification($order->client_id,$message,$order->order_serial,"accepted","","1",$order->rider_id);
                  
                 // AdminController::sendClientNotification($order->client_id,"Troopa rider has accepted your delivery request");
                 
                 $track= DB::table('all_process_track')->where('order_id', $orderid)->get(); 
                 
                 if($track->count()<1){
                  
                  $all_process_track = new all_process_track();
                            $all_process_track->approach=0;
                            $all_process_track->arrive_pickup=0;
                            $all_process_track->start_delivery=0;
                            $all_process_track->approach_delivery=0;
                            $all_process_track->arrive_delivery=0;
                            $all_process_track->order_id=$orderid;
			                $all_process_track->save();
			                
                 }     
                  
                  
             }
             
       
      
             
             
         }
          $response['error'] = false;  
          return response()->json($response);
        
    }
    
    public function sendClientNotification($clientid,$message,$packageid,$tripstatus,$verificationcode,$notificationid,$riderid){
        
        
            
			 $title="Delivery Request";
			 AdminController::sendPushNotification($title,$message,AdminController::getClientToken($clientid),$packageid,$tripstatus,$verificationcode,$notificationid,$riderid);
			 
			  AdminController::insert_client_alert_msg($clientid,$message,$packageid);
    }
    
    
      public function getClientToken($clientid){
         $fcmid="";
         $token= DB::table('clientMessaging')->where('client_id', $clientid)->first();
          if(!empty($token)){
             
            $fcmid=$token->fcmid; 
         }else{
             
             $fcmid="nil"; 
         }
         
         return  $fcmid;
        
        
        
    }
    
     public function insert_client_alert_msg($client,$message,$packageid){
        
            $clientalert = new client_alert_msg();
            $clientalert->msg=$message;
            $clientalert->client_id=$client;
            $clientalert->packageid=$packageid;
            $clientalert->read_status=1;
            $clientalert->save();  
        
        
        
    }
    
    
    public function arrivalcheck($orderid){
          $response=array();
          $orderstracks= DB::table('rider_progress_track')->where('order_id', $orderid)->where('pickup_location_status', 1)->get(); 
         
         $response['error']="false";
         $response['count']= $orderstracks->count();
         return response()->json($response);
    }
    
    
     public function deliverycheck($orderid){
          $response=array();
          $orderstracks= DB::table('rider_progress_track')->where('order_id', $orderid)->where('dropoff_location_status', 1)->get(); 
         
         $response['error']="false";
         $response['count']= $orderstracks->count();
         return response()->json($response);
    }
    
     public function arrivalpaycheck($orderid,$riderid){
          $response=array();
          //$orderstracks= DB::table('rider_progress_track')->where('order_id', $orderid)->where('pickup_location_status', 1)->get(); 
          
          $orderstracks= DB::table('payments')->where('order_id', $orderid)->where('riderid',$riderid)->where('status',"ok")->get();
         
         $response['error']="false";
         $response['count']= $orderstracks->count();
         return response()->json($response);
    }
    
    
    
    public function loginnow($phone,$password){
        
          $response=array();
          
          $encodePass=$this->encrypt_decrypt($password,true);
          
          $users= DB::table('customers')->where('phone', $phone)->where('password', $encodePass)->get(); 
          if($users->count()>0){
              
              foreach($users as  $user){
              
               $response['fullname']=$user->fname;
               $response['email']=$user->email;
               $response['client_id']=$user->id;
               $response['phone']=$user->phone;
               
              }
              
        $response['status']="OK";
        $response['message']="succesful";
          }
          else{
              
            $response['status']="FAILED";
        $response['message']="account does not exist";  
          }
       
         return response()->json($response);
    }
    
    
    
    public function registerclient($phone,$email,$vendor,$fullname,$password){
        
        $response=array();
        
         $orderstrack= DB::table('customers')->where('phone', $phone)->get(); 
         
         if($orderstrack->count()>0){
             
            $response['status']="FAILED";
            $response['message']="this phone number already exist in our record";
             
         }
        else{
         $consumers = new consumers();
         $consumers->fname=$fullname;
          $consumers->lname="";
        $consumers->phone=$phone;
        $consumers->email=$email;
        $consumers->vendor=$vendor;
         $consumers->password=$this->encrypt_decrypt($password,true);
         $consumers->verification_code="";
         $consumers->verification_status=0;
        $consumers->picture="";
        if($consumers->save()){
            
            $response['status']="OK";
            $response['message']="account succesfully registered!";
            
        }
        }  
         return response()->json($response)->header('Content-Type', 'text/plain');;
        
    }
    
     public function registerrider(Request $request)
    {
         $text="";
         $response=array();
        
        $validator = Validator::make(request()->all(), [
       'email' => 'required',
        'phone' => 'required',
         'address' => 'required',
          '3delivery' => 'required',
           'password' => 'required',
            'name' => 'required',
             'machine_manufacture' => 'required',
              'engine_size' => 'required',
               'license_plate' => 'required',
                'bike_color' => 'required',
                 'driver_license' => 'required',
                  'expiry_date' => 'required',
                   'valid_permit' => 'required',
                    'bankName' => 'required',
                     'accountName' => 'required',
                      'accountNumber' => 'required',
                       'company' => 'required',
                        'companyCode' => 'required',
                         'picture' => 'required',
                         'driver_license_pic' => 'required',
                          
         ]);
         
         if ($validator->fails()) {
             
             
              $response['status']="something went wrong";
            $response['message']=$validator->errors();
            
   
       }else{
        
        
         $pilot_id=AdminController::firstTwo()."-".AdminController::SecondFour().AdminController::LastTwo();
        // $encodePass=$this->encrypt_decrypt($password,true);
        
      if($request->hasFile('picture')){
          
          if($request->input('valid_permit')=="yes"){
       
       $file1=$request->file('picture');
       $file2=$request->file('driver_license_pic');
       $file3=$request->file('permit_pic');

       //rename files
       $extension1 = $file1->getClientOriginalExtension(); 
       $extension2 = $file2->getClientOriginalExtension(); 
       $extension3 = $file3->getClientOriginalExtension(); 

       $fileName1 = rand(11111, 99999) . '.' . $extension1; 
       $fileName2 = rand(11111, 99999) . '.' . $extension2;
       $fileName3 = rand(11111, 99999) . '.' . $extension3;
    
     //////// move files to upload folder ////////////////
     
     $filePathdb1 = asset('/photos/'. $fileName1);
     $filePathdb2 = asset('/photos/'. $fileName2);
     $filePathdb3 = asset('/photos/'. $fileName3);

     $filePath = 'photos';
     $file1->move($filePath,$fileName1);
     $file2->move($filePath,$fileName2);
     $file3->move($filePath,$fileName3);
     
   $pilot = new pilot();
   $pilot->firstname=$request->input('name');
   $pilot->lastname="";
   $pilot->email=$request->input('email');
   $pilot->phone=$request->input('phone');
   $pilot->address=$request->input('address');
   $pilot->third_delivery=$request->input('3delivery');
   $pilot->password=AdminController::encrypt_decrypt($request->input('password'),true);
   $pilot->machine_manufacture=$request->input('machine_manufacture');
   $pilot->engine_size=$request->input('engine_size');
   $pilot->license_plate=$request->input('license_plate');
   $pilot->bike_color=$request->input('bike_color');
   $pilot->driver_license=$request->input('driver_license');
   $pilot->expiry_date=$request->input('expiry_date');
   $pilot->valid_permit=$request->input('valid_permit');
   $pilot->bankName=$request->input('bankName');
   $pilot->accountName=$request->input('accountName');
   $pilot->accountNumber=$request->input('accountNumber');
    $pilot->company=$request->input('company');
   $pilot->companyCode=$request->input('companyCode');
   $pilot->picture=$filePathdb1;
   $pilot->driver_license_pic=$filePathdb2;
   $pilot->permit_pic=$filePathdb3;
   $pilot->status=0;
   $pilot->pilotID=$pilot_id;
   $pilot->online_status=0;
   $pilot->verification_code= $this->confirmation_code();
   $pilot->verification_status=0;
   $pilot->available_status=0;

       if($pilot->save()){
           
           $text.="Hi there!";
            $text.="We are very happy to welcome you on board with Troopa!";
             $text.="You have joined thousands of riders who are already getting pickup requests from customers and making earnings daily";
                    

                     $msgs=$text;
                     MailController::basic_email($request->input('email'),$msgs);

        $response['status']="ok";
            $response['message']="Account created successfully!";
            
            
            
            
       
       }
       else{
      
       
        $response['status']="something went wrong";
            $response['message']="something went wrong";

           
       }
       
          }else{
       
        $file1=$request->file('picture');
       $file2=$request->file('driver_license_pic');
      
       //rename files
       $extension1 = $file1->getClientOriginalExtension(); 
       $extension2 = $file2->getClientOriginalExtension(); 
      

       $fileName1 = rand(11111, 99999) . '.' . $extension1; 
       $fileName2 = rand(11111, 99999) . '.' . $extension2;
     
    
     //////// move files to upload folder ////////////////
     
     $filePathdb1 = asset('/photos/'. $fileName1);
     $filePathdb2 = asset('/photos/'. $fileName2);
    

     $filePath = 'photos';
     $file1->move($filePath,$fileName1);
     $file2->move($filePath,$fileName2);
    
     
    $pilot = new pilot();
   $pilot->firstname=$request->input('name');
   $pilot->lastname="";
   $pilot->email=$request->input('email');
   $pilot->phone=$request->input('phone');
   $pilot->address=$request->input('address');
   $pilot->third_delivery=$request->input('3delivery');
    $pilot->password=AdminController::encrypt_decrypt($request->input('password'),true);
   $pilot->machine_manufacture=$request->input('machine_manufacture');
   $pilot->engine_size=$request->input('engine_size');
   $pilot->license_plate=$request->input('license_plate');
   $pilot->bike_color=$request->input('bike_color');
   $pilot->driver_license=$request->input('driver_license');
   $pilot->expiry_date=$request->input('expiry_date');
   $pilot->valid_permit=$request->input('valid_permit');
   $pilot->bankName=$request->input('bankName');
   $pilot->accountName=$request->input('accountName');
   $pilot->accountNumber=$request->input('accountNumber');
   $pilot->company=$request->input('company');
   $pilot->companyCode=$request->input('companyCode');
   $pilot->picture=$filePathdb1;
   $pilot->driver_license_pic=$filePathdb2;
   $pilot->permit_pic="";
   $pilot->status=0;
   $pilot->pilotID=$pilot_id;
   $pilot->online_status=0;
   $pilot->verification_code= $this->confirmation_code();
   $pilot->verification_status=0;
   $pilot->available_status=0;
   
  if($pilot->save()){
      
       $text.="Hi there!"." ";
            $text.="we are very happy to welcome you on board with Troopa!"." ";
             $text.="You have joined thousands of riders who are already getting pickup requests from customers and making earnings daily";
                    

                     $msgs=$text;
                     MailController::basic_email($request->input('email'),$msgs);

        $response['status']="ok";
            $response['message']="Account created successfully!";
            
       
       }
       else{
      
       
        $response['status']="something went wrong";
            $response['message']="something went wrong";
            

           
       }
          }    
      
    }
       }  
      return response()->json($response);       
      
    }
    
     public static function checkexist($id)
    {
       $response=array();
       
       $pilots= DB::table('pilots')->where('phone', $id)->get(); 
       if($pilots->count()==0){
           
        $response['error'] = true;  
        $response['message'] = 'This Mobile number is not in our record';  
           
       }else{
       
        $response['error'] = false;  
        $response['message'] = 'This Mobile number is registered';  
       }
       
       return response()->json($response);
           
      
    }
    
    
    public static function updatedeliveryprocess($orderid){
        
        $response=array();
        
        $date=date('Y-m-dTH:i:s');
        
         $trips= DB::table('rider_progress_track')->where('order_id', $orderid)->get(); 
         if($trips->count()>0){
             
              DB::table("rider_progress_track")->where('order_id', $orderid)
                    ->update([
                        
                        'dropoff_location_status' =>1,
                       
                ]);
                
                
                  $orders= DB::table('client_orders')
      ->select('client_orders.pickup_contact','customers.fname','pilots.firstname','pilots.pilotID')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
      ->where('client_orders.id',$orderid)
      ->get(); 
             
         foreach($orders as $order){
             
          
                AdminController::sendclientsmsdelivery($order->fname,$order->firstname,$order->pilotID,$order->pickup_contact);
                
                  }
                 
                 
             
             
             
             
  $response['message'] = 'performed'; 
       
         }
         else{
             
              $response['message'] = 'performed';  
             
        
        
             
         }
         
          return response()->json($response);
        
        
    }
    
    
//   public function confirmdelivery($clintid,$riderid,$amount,$orderid,$code){
       
//         $response=array();
       
//      $order= DB::table('client_orders')->where('id', $orderid)->first(); 
     
//      if(!empty($order->order_code) && $order->order_code==$code ){
         
         
         
         
//                             $payments = new payments();
//                             $payments->client_id=$clintid;
//                             $payments->amount=$amount;
//                             $payments->riderid=$riderid;
//                             $payments->order_id=$orderid;
//                             $payments->paymentid="1";
//                             $payments->status="ok";
// 			                if($payments->save()){
         
         
         
                
//                             $updateorder1=DB::table('client_orders')->where('id', $orderid)->where('rider_id', $riderid)
//                             ->update(['delivery_status' =>'delivered','treat_status' =>'old']);
                            
//                              $updateorder2=DB::table('customer_rider')->where('order_id', $orderid)->where('riderid', $riderid)
//                             ->update(['status' =>'old']);
                            
                            
                            
//                              AdminController::statusUpdate2($riderid,"online");  
//                              AdminController::shareearning($amount,$riderid,"cash",$clintid,$orderid);
                             
//                               if($updateorder1){
                  
//                  $response['error'] = false;  
//                  $response['message'] = 'delivery confirmed';   
                  
//               }
//               else{
                  
//                  $response['error'] = true;  
//                  $response['message'] = 'not valid';  
                  
//               }
               
// 			                }
         
          
             
         
         
         
         
//      }
     
//       else if($order->order_code != $code){
                  
//                  $response['error'] = true;  
//                  $response['message'] = 'The delivery code you entered does not match';  
                  
//               }
     
//         return response()->json($response);
       
//   } 




public function confirmdelivery($clintid,$riderid,$amount,$orderid,$code){
       
        $response=array();
       
    
     $paymode="";
     $order= DB::table('client_orders')->where('id', $orderid)->first();
     
      $paymode=$order->payment_mode;
      
     
     
     if(!empty($order->order_code) && $order->order_code==$code ){
          
         
         
         $checkpay= DB::table('payments')->where('order_id', $orderid)->where('riderid',$riderid)->where('flutterwave_status',"success")->where('flutterwave_success',"success")->first(); 
         
                            if(empty($checkpay)){
							
														
							$payments = new payments();
                            $payments->client_id=$clintid;
                            $payments->amount=$amount;
                            $payments->riderid=$riderid;
                            $payments->order_id=$orderid;
                            $payments->paymentid="1";
							$payments->flutterwave_status="cash-success";
							$payments->flutterwave_success="cash-success";
							$payments->flutterwave_transaction_id="cash-success";
							$payments->tx_ref="cash-success";
                            $payments->status="ok";
			                if($payments->save()){
         
         
         
                
                            $updateorder1=DB::table('client_orders')->where('id', $orderid)->where('rider_id', $riderid)
                            ->update(['delivery_status' =>'delivered','treat_status' =>'old']);
                            
                             $updateorder2=DB::table('customer_rider')->where('order_id', $orderid)->where('riderid', $riderid)
                            ->update(['status' =>'old']);
                            
                            
                            
                             AdminController::statusUpdate2($riderid,"online");  
                             AdminController::shareearning($amount,$riderid,$paymode,$clintid,$orderid);
                             
                              $message="Troopa rider has delivered package to ".$order->dropoff_contact_name." successfully";
                              
                              
                             AdminController::sendClientNotification($order->client_id,$message,$order->order_serial,"delivered"," ","2",$order->rider_id);
                  
                 $response['error'] = false;  
                 $response['message'] = 'delivery confirmed';   
                  
              
              
               
			                }
         
          }else{
		  
		  
		  
		  
		   $updateorder1=DB::table('client_orders')->where('id', $orderid)->where('rider_id', $riderid)
                            ->update(['delivery_status' =>'delivered','treat_status' =>'old']);
                            
                             $updateorder2=DB::table('customer_rider')->where('order_id', $orderid)->where('riderid', $riderid)
                            ->update(['status' =>'old']);
                            
                            
                            
                             AdminController::statusUpdate2($riderid,"online");  
                             AdminController::shareearning($checkpay->amount,$riderid,$paymode,$clintid,$orderid);
                             
                             $message="Troopa rider has delivered package to".$order->dropoff_contact_name."successfully";
                             
                             
                             
                             AdminController::sendClientNotification($order->client_id,$message,$order->order_serial,"delivered","","1",$order->rider_id);
                             
                             
                 
                            $response['error'] = false;  
                            $response['message'] = 'delivery confirmed';   
                  
            
             
		  
		  
		  }
             
         
         
         
         
     }
     
      else if($order->order_code != $code){
                  
                 $response['error'] = true;  
                 $response['message'] = 'The delivery code you entered does not match';  
                  
              }
     
        return response()->json($response);
       
   } 







    
   public static function updelprocess($orderid){
        
        $response=array();
        
        $date=date('Y-m-dTH:i:s');
        
         $trips= DB::table('rider_progress_track')->where('order_id', $orderid)->get(); 
         if($trips->count()<1){
             
            $rider_progress_track = new rider_progress_track();
            $rider_progress_track->pickup_location_status=1;
            $rider_progress_track->dropoff_location_status=0;
             $rider_progress_track->order_pay_status=0;
             $rider_progress_track->order_id=$orderid;
             if($rider_progress_track->save()){
              
                  $orders= DB::table('client_orders')
      ->select('client_orders.pickup_contact','customers.fname','client_orders.package_type','client_orders.client_id','client_orders.dropoff_contact_name','client_orders.created_at','pilots.firstname','client_orders.rider_id','pilots.pilotID')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
      ->where('client_orders.id',$orderid)
      ->get(); 
             
         foreach($orders as $order){
             
             $orderCode=AdminController::confirmation_code();
             
              $message="Hi ".$order->fname.",Troopa rider has pickup your package (".$order->package_type.") to be sent to ".$order->dropoff_contact_name.". your pickup code is  ".$orderCode;
                 
             
              
              
              AdminController::sendClientNotification($order->client_id,$message,$order->order_serial,"accepted",$orderCode,"2","");
              AdminController::insert_client_alert_msg($order->client_id,$message);
               
              
                DB::table('client_orders')->where('id', $orderid)->update(['order_code' => $orderCode]);

             
             
             
             
          
              //  AdminController::sendclientsms($order->fname,$order->firstname,$order->pilotID,$order->pickup_contact,$message);
                  }
                 
                 
             }
             
             
             
  $response['message'] = 'performed'; 
       
         }
         else{
             
              $response['message'] = 'performed';  
             
        
        
             
         }
         
          return response()->json($response);
        
        
    }
    
    
     public static  function sendclientsms($clientname,$ridername,$riderid,$pickup_contact,$message){ 


        $str = ltrim($pickup_contact, '+');
        $msg=urlencode($message);
		$curl = curl_init();
$data = array("api_key" => "TLn4cMf5MyLxd6AhD18W84QUwHJXj5NYjtQPXISLRVRywDAlD9wCseVY6r2Dbi", "to" => urlencode($str),  "from" => "TROOPA",
"sms" => $msg,  "type" => "plain",  "channel" => "generic" );

$post_data = json_encode($data);

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.ng.termii.com/api/sms/send",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => $post_data,
CURLOPT_HTTPHEADER => array(
"Content-Type: application/json"
),
));

$response = curl_exec($curl);

curl_close($curl);


    }
    
    
     public static  function sendclientsmsdelivery($clientname,$ridername,$riderid,$pickup_contact){ 


        $message="";
         $message.="Hi ".$clientname.",";
         $message.=$ridername."(".$riderid.")just got to your package delivery location ";
        $msg=urlencode($message);
         $str = ltrim($pickup_contact, '+');
         
		
		
		 	$curl = curl_init();
$data = array("api_key" => "TLn4cMf5MyLxd6AhD18W84QUwHJXj5NYjtQPXISLRVRywDAlD9wCseVY6r2Dbi", "to" => urlencode($str),  "from" => "TROOPA",
"sms" => $msg,  "type" => "plain",  "channel" => "generic" );

$post_data = json_encode($data);

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.ng.termii.com/api/sms/send",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => $post_data,
CURLOPT_HTTPHEADER => array(
"Content-Type: application/json"
),
));

$response = curl_exec($curl);

curl_close($curl);


    }
    
    
    public static function ifemailexist($phone)
    {
       $response=array();
       
        $pilots= DB::table('pilots')->where('phone',$phone)->get(); 
       if($pilots->count()>0){
           
        $response['error'] ="exist";  
        $response['message'] = 'This Mobile number already exist';  
           
       }else{
       
        $response['error'] = "not-exist";  
        $response['message'] = 'This mobile number doest not respond';  
       }
       
      return response()->json($response);
           
      
    }
    
    
   public static function phonevalidate($phone){
       
       
       
        $response=array();
       
        $pilots= DB::table('pilots')->where('phone',$phone)->get(); 
       if($pilots->count()>0){
           
        $response['status'] ="exist";  
        $response['message'] = 'This Mobile number already exist';  
           
       }else{
       
        $response['status'] = "new";  
        $response['message'] = 'This mobile number is a new one';  
       }
       
      return response()->json($response);
           
       
       
       
   }
   
   
    public static function emailvalidate($email){
       
       
       
        $response=array();
       
        $pilots= DB::table('pilots')->where('email',$email)->get(); 
       if($pilots->count()>0){
           
        $response['status'] ="exist";  
        $response['message'] = 'This email already exist';  
           
       }else{
       
        $response['status'] = "new";  
        $response['message'] = 'This email is a new one';  
       }
       
      return response()->json($response);
           
       
       
       
   }
   
   
    
     public static function go_online_status($riderid)
    {
       $response=array();
       
       $update= DB::table('pilots')->where('pilotID',$riderid)->update(['online_status' =>1]); 
       if($update){
           
        $response['message'] = 'online';  
           
       }else{
       
        
        $response['message'] = 'something went wrong';  
       }
       
      return response()->json($response);
           
      
    }
    
    
    public static function declineorder($orderid,$reason){
            $response=array();
          
           $trips_order_decline = new trips_order_decline();
            $trips_order_decline->order_id=$orderid;
            $trips_order_decline->decline_reason=$reason;
           if($trips_order_decline->save()){
               
               $update= DB::table('client_orders')->where('id',$orderid)->update(['delivery_status' =>"decline",'treat_status' =>"old"]); 
               $response['error'] ='false';  
               
           }
           
             $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
           
           AdminController::reAssignRider($detail->client_id,$detail->rider_id,$detail->pickup_location,$orderid);
           
            $update= DB::table('pilots')->where('pilotID',$detail->rider_id)->update(['available_status' =>"online"]);
           //////////////////////////////////// reassign to another rider ///////////////////////////////////////////////////////////
        
         return response()->json($response);
        
    }
    
    
    
    public function checkdistance($rideraddress,$pickupaddress)
  {
      
      
      
      $origin =str_replace(' ','+',$rideraddress);
 $destination =str_replace(' ','+',$pickupaddress);
 $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
 $price=0;
 $url ="https://maps.googleapis.com/maps/api/directions/json?origin=".$origin."&destination=".$destination."&key=".$key;
 
 $jsonfile = file_get_contents($url);
 $jsondata = json_decode($jsonfile);
 
$distances=str_replace('km', '',$jsondata->routes[0]->legs[0]->distance->text); 
  
 return  $distance= (int) $distances; 
 
//     $origin      =$rideraddress;
//  $destination = $pickupaddress;
//  $key="AIzaSyARVQnTNKvSr3d9qyGIjRqgqFhrhXlyMPc";
//  $price=0;
//  $url = "https://maps.googleapis.com/maps/api/directions/json?origin=".urlencode($origin).",IL&destination=" . urlencode( $destination) . "&sensor=false&key=".$key;
//  $jsonfile = file_get_contents($url);
//  $jsondata = json_decode($jsonfile);
 
//   $distances=str_replace('km', '', $jsondata->routes[0]->legs[0]->distance->text); 
//  return  $distance= (int) $distances; 
   
  }
    
    
    public function reAssignRider($clientid,$riderid,$pickupaddress,$orderid) 
{
      $response=array();
     
    $city="";
    $state="";
     $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
     
     $ridername="";
     $riderid="";
     $ridercontact="";
     
     
     //Formatted address
        $formattedAddr = str_replace(' ','+',$pickupaddress);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key='.$key); 
        $output1 = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        // $latitude  = $output1->results[0]->geometry->location->lat; 
        // $longitude = $output1->results[0]->geometry->location->lng;
        
        $addressComponents = $output1->results[0]->address_components;
            foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'administrative_area_level_2'){
                    //Return the zipcode
                    $city=$addrComp->long_name;
                }
        
      
    
}

                     foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'administrative_area_level_1'){
                    //Return the zipcode
                    $state=$addrComp->long_name;
                }
        
      
    
}

   $database = \App\Services\FirebaseService::connect();
   
  $riders=$database->getReference('RiderLocation')->getValue();
  
   if(!empty($riders)){
  
  foreach($riders as $rider){
      
    
      if($city=="Yenegoa"){
          
          $city2="Yenagoa";
      }else{
           $city2=$city;
          
      }
       
       
      if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$input['pickup_location']) < 50 && $rider['riderid'] !=$riderid){
           
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$clientid;
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$pickupaddress);
             $tempdistance->save();
             
           
           
      }
       
       
       
      
       
       
  }
  
  
               $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first(); 
        
   if($filterdistance){
       
       
       
          $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact=$filterdistance->phone;
                            $rider_orders->rider_id=$filterdistance->pilotID;
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->save();
          
          
          
                  
         
       
            // $response["status"]="OK"  ;
            // $response["ridername"]= $filterdistance->firstname;
            //  $response["riderid"]= $filterdistance->pilotID;
            // $response["phone"]=$filterdistance->phone;
   }
           DB::table('tempdistance')->where('client_id',$clientid)->delete();
   }else{
       
       
       
        $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->save();
       
       
       
   }
   //return response()->json($response);   
}
    
    
    
    
      public static function otppairing($phone,$otp)
    {
       $response=array();
       
       $pilot= DB::table('pilots')->where('phone',$phone)->first(); 
       
       if($pilot->verification_code==$otp){
           
           
             DB::table('pilots')->where('id', $pilot->id)->update(['verification_status' =>1]);

         $response['error'] = false;  
        $response['message'] = 'otp match succesfully';  
        $response['name'] =  $pilot->firstname;  
        $response['picture'] =$pilot->picture;
        $response['phone'] = $pilot->phone;  
        $response['email'] =$pilot->email;
        $response['status'] = $pilot->status;  
        $response['date'] = Carbon::parse($pilot->created_at)->diffForHumans();  
        $response['online_status'] = $pilot->online_status;  
        $response['verification_status'] = $pilot->verification_status;  
        $response['machine_manufacture'] = $pilot->machine_manufacture; 
        $response['license_plate'] = $pilot->license_plate; 
        $response['engine_size'] = $pilot->engine_size; 
        $response['riderid'] = $pilot->pilotID; 
        $response['address'] = $pilot->address;
        $response['bank_name'] = $pilot->bankName;
        $response['account_name'] = $pilot->accountName;
        $response['account_number'] = $pilot->accountNumber;
        $response['bike_color'] = $pilot->bike_color;
        
           
       }
       else if($pilot->verification_code!=$otp){
           
         $response['error'] = true;  
        $response['message'] = 'otp dont match';
 
           
       }
       
       
       
       return response()->json($response);
           
      
    }
    
    

    public function postaccounts()
    {
        $validator=$this->validate(request(),[
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'cpassword'=>'required|string',
            'acctype'=>'required|string',
           
            ],
            [
            'name.required'=>'Please enter name ',
            'email.required'=>'Please enter email ',
            'password.required'=>'Please enter password ',
            'acctype.required'=>'Please choose account type ',
             ]);

             if(count(request()->all()) > 0){

               
                if(request()->input('cpassword')!=request()->input('password')){

                    return redirect()->back()->withErrors('Confirm password and password are not the same. Please ensure they are equal'); 
                }
                else{

                    $encodePass=$this->encrypt_decrypt(request()->input('password'), true);
                    $date=Carbon::now()->toDateString();
                    $account = new account();
                    $account->name=request()->input('name');
                    $account->email=request()->input('email');
                    $account->password= Hash::make(request()->input('password'));
                    $account->email_verified_at= $date;
                    $account->role='admin';
                    $account->adminroles=request()->input('acctype');
                    $account->two_factor_secret='';
                    $account->two_factor_recovery_codes='';
                    $account->remember_token='';
                    if($account->save()){


                        return redirect()->back()->withSuccess('new user uploaded succesfully');
    
                     }

                }

                
                
                 
                
            
            
            
            }

    }


    public static function encrypt_decrypt ($data, $encrypt) {
        if ($encrypt == true) {
            $output = base64_encode (convert_uuencode ($data));
        } else {
            $output = convert_uudecode (base64_decode ($data));
        }
        return $output;
        
        
        
    }


    public function  editaccounts()
 {

   if(empty(request()->input('password')) && empty(request()->input('cpassword'))){


    $validator=$this->validate(request(),[
        'name'=>'required|string',
        'email'=>'required|string',
        'acctype'=>'required|string',
        ],
        [
            'name.required'=>'Enter your name ',
            'email.required'=>'Enter your email',
            'acctype.required'=>'Enter role of this account',
              
            
            ]);

                $updateprofile=DB::table('users')->where('id',request()->input('user'))->update(['name' =>request()->input('name'),'email' =>request()->input('email'),'name' =>request()->input('name'),'adminroles' =>request()->input('acctype')]);
    
               return redirect()->back()->withSuccess('account Updated successfully');

            

    
     
   }
   
   if(!empty(request()->input('password'))&& empty(request()->input('cpassword'))){

    return redirect()->back()->withErrors('Please ensure you enter a confirm password');
   }
   
   if(request()->input('cpassword')!=request()->input('password')){

    return redirect()->back()->withErrors('Password is not the same as the confirm password');
   }

   if(!empty(request()->input('cpassword')) &&  !empty(request()->input('password'))){

    $validator=$this->validate(request(),[
        'name'=>'required|string',
        'email'=>'required|string',
        'acctype'=>'required|string',
        ],
        [
            'name.required'=>'Enter your name ',
            'email.required'=>'Enter your email',
            'acctype.required'=>'Enter role of this account',
              
            
            ]);

          

                $updateprofile=DB::table('users')->where('id',request()->input('user'))->update(['name' =>request()->input('name'),'email' =>request()->input('email'),'adminroles' =>request()->input('acctype'),'password' =>Hash::make(request()->input('password'))]);
    
               return redirect()->back()->withSuccess('account Updated successfully');

            
   }
 }
 
 
 
 public function assignwaitingorder(){
     
     $pickuplocation="";
     $clientid="";
     
    //   $validator=$this->validate(request(),[
    //         'waitingrequests'=>'required|string',
    //         ],
    //         [
    //             'waitingrequests.required'=>'Hi, ensure you tick atleast one rider request to reassign rider',
               
                
    //             ]);
     if(empty(request()->input('waitingrequests'))){
         
         return redirect()->back()->withErrors('Hi, ensure you tick atleast one rider request to reassign rider '); 
         
     }
   
     
    if(count(request()->all()) > 0){
        
         if (is_array($_POST['waitingrequests'])) {
             
            /////////////////////// get pickup location /////////////////
            
             foreach($_POST['waitingrequests'] as $value){

             $order= DB::table('client_orders')->where('id',$value)->first();
             $pickuplocation=$order->pickup_location; 
             $clientid=$order->client_id;           
                            
                        }
                        
                        
            $city="";
    $state="";
   
     $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
     
    
     $ridercontact="";
     
    
     //Formatted address
        $formattedAddr = str_replace(' ','+',$pickuplocation);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key='.$key); 
        $output1 = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        // $latitude  = $output1->results[0]->geometry->location->lat; 
        // $longitude = $output1->results[0]->geometry->location->lng;
        
        $addressComponents = $output1->results[0]->address_components;
            foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'administrative_area_level_2'){
                    //Return the zipcode
                    $city=$addrComp->long_name;
                }
        
      
    
}

                     foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'administrative_area_level_1'){
                    //Return the zipcode
                    $state=$addrComp->long_name;
                }
        
      
    
}            
                         
                        
                        
                     $database = \App\Services\FirebaseService::connect();
   
  $riders=$database->getReference('RiderLocation')->getValue();
  
   if(!empty($riders)){
       
      
       
    $i = 0;
  
  foreach($riders as $rider){
      
      
    
      if($city=="Yenegoa"){
          
          $city2="Yenagoa";
      }else{
           $city2=$city;
          
      }
      
    // echo $rider['riderid']; echo $rider['availability']; echo $rider['onlinestatus']; echo $rider['state']; echo $rider['city']; echo FirebaseController::riderDownOnlineStatus($rider['riderid']);
       
      if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$pickuplocation) < 50 && FirebaseController::riderDownOnlineStatus($rider['riderid'])=="online"){
     
        
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$clientid;
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$pickuplocation);
             $tempdistance->save();
             
           
           
      }
       
       
       
      $i++; 
       
       
  }
//   $a=$i-1;
   
  
  if($i>0){
      
    
               $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first(); 
                    
                   
        
   if(!empty($filterdistance->pilotID)){
       
     
        foreach($_POST['waitingrequests'] as $value){

               DB::table('client_orders')->where('id', $value)->update(['rider_contact' =>$filterdistance->phone,"rider_id"=>$filterdistance->pilotID]);
                           
                            
                        }
                  
         
       FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");	
	  DB::table('tempdistance')->where('client_id',$clientid)->delete();
	  
	     return redirect()->back()->withSuccess('Rider assigned to request successfully successfully');
                  
                   
	                    
            
   }else{
       
       return redirect()->back()->withErrors('There are no riders available in this location yet');
             
        
       
       
   }
   
   	 
          
           
  }else{
      
      
      return redirect()->back()->withErrors('There are no riders available in this location yet');
                            
      
  }
   }else{
       
     return redirect()->back()->withErrors('There are no riders available in this location yet');
                               
       
        
            
   }           
          
        
        
        
         }else{
             
             
         }
        
        
    }
 }
 
 
 
 public function locationtrack()
    {
         
        return view('admin.real_time_track');

    }

   

    public function allaccounts()
    {
        $allaccount= DB::table('users')->get(); 
        return view('admin.users',['users'=> $allaccount]);

    }
    public function deletepilot($id)
    {

        $resources = DB::delete('delete from pilots where id='.$id);
        return redirect()->back()->withSuccess('Pilot deleted successfully');

    }
    
     public function deleteallcustomers($id)
    {

        $resources = DB::delete('delete from customers where id='.$id);
        return redirect()->back()->withSuccess('User deleted successfully');

    }

    public function deleteaccount($id)
    {

        $resources = DB::delete('delete from users where id='.$id);
        return redirect()->back()->withSuccess('Account deleted successfully');

    }

    public function customers()
    {
        $allcustomers= DB::table('customers')->get(); 
        return view('admin.customers',['customers'=>$allcustomers]);

    }



    public function customerorders()
    {
        $allorders= DB::table('orders') 
        ->select('orders.fromLoc','orders.toLoc','orders.amount','orders.remark','orders.created_at','customers.fname','customers.lname','customers.phone','pilots.firstname','pilots.lastname','orders.id')
        ->join('customers','customers.id','=','orders.custid')
        ->join('pilots','pilots.id','=','orders.riderid')
        ->get();
        return view('admin.customerorders',['orders'=>$allorders]);

    }

    public function assignorders($id)
    {

        $xpilot= DB::table('orders')
        ->where('id',$id)
        ->first(); 

        $activepilots= DB::table('pilots')
        ->where('status',1)
        ->where('online_status',1)
        ->where('id','!=', $xpilot->riderid)
        ->get(); 

        $allorders= DB::table('orders') 
        ->select('orders.fromLoc','orders.toLoc','orders.amount','orders.remark','orders.created_at','customers.fname','customers.lname','customers.phone','customers.email','customers.picture','pilots.firstname','pilots.lastname','orders.id')
        ->join('customers','customers.id','=','orders.custid')
        ->join('pilots','pilots.id','=','orders.riderid')
        ->where('orders.id',$id)
        ->first();
        return view('admin.order-detail',['order'=>$allorders,'pilots'=>$activepilots]);

    }
    


    public function onlinestatus()
    {
        $pilots= DB::table('pilots')->get(); 
        $onlines= DB::table('pilots')->where('online_status',1)->get();
        $offlines= DB::table('pilots')->where('online_status',0)->get();
        return view('admin.online-status',['pilots'=>$pilots,'online'=>$onlines,'offline'=>$offlines]);

    }

    public function postassignorders(){

      

        if(isset($_POST['allpilots'])){

            if(is_array($_POST['allpilots'])){

   if(count($_POST['allpilots'])>1){
                return redirect()->back()->withErrors('Please choose only one pilot');
   }else{   

    foreach($_POST['allpilots'] as $value){

    DB::table('orders')->where('id', request()->input('orderid'))
    ->update([
        
        'riderid' =>$value,
       
]);
    }
return redirect()->back()->withSuccess('You have assigned a new pilot to this trip succesfully');  


   }

            }
        }else{

            return redirect()->back()->withErrors('You have not selected the pilot you want to re-assign to this trip ');
          	
            

        }

    }

    public function createnewpilot()
    {

        $validator=$this->validate(request(),[
                
          //  'file' => 'required|mimes:jpg,jpeg,png',
            'fname'=>'required|string',
            'lname'=>'required|string', 
            'email'=>'required|string', 
            'phone'=>'required|string', 
           
        ],[
            'fname.required'=>'Type in the pilots first name ',
            'lname.required'=>'Type in the pilots lastname ',
            'email.required'=>'Type in the pilots email ',
            'phone.required'=>'Type in the pilots phone ',
           // 'file.required'=>'Upload a picture with jpeg or png format',
               
            ]
         
         );

         if(count(request()->all()) > 0){


            if(empty(request()->file('file'))){



            
              
              $filePathdb = asset('/dist/images/img2.png');
              
             
              
            $pilot = new pilot();
            $pilot->firstname=request()->input('fname');
            $pilot->lastname=request()->input('lname');
            $pilot->picture=$filePathdb;
            $pilot->phone=request()->input('phone');
            $pilot->email=request()->input('email');
            $pilot->status=0;
            $pilot->pilotID=$this->random_number_with_dupe();
            $pilot->online_status=0;
            $pilot->verification_code="";
            $pilot->verification_status=0;
            $pilot->save();

            $AdminController::sendverificationcode($pilot->id);
    
           return redirect()->back()->withSuccess('New pilot added successfully');




            }else{

            $file=request()->file('file');
            $extension = $file->getClientOriginalExtension(); 
            $fileName = rand(11111, 99999) . '.' . $extension; 
         
          //////// move file to upload folder ////////////////
          
          $filePathdb = asset('/photos/'.$fileName);
          $filePath = 'photos';
          $file->move($filePath,$fileName);
          
        $pilot = new pilot();
        $pilot->firstname=request()->input('fname');
        $pilot->lastname=request()->input('lname');
        $pilot->picture=$filePathdb;
        $pilot->phone=request()->input('phone');
        $pilot->email=request()->input('email');
        $pilot->status=0;
        $pilot->pilotID=$this->random_number_with_dupe();
        $pilot->online_status=0;
        $pilot->verification_code=$this->confirmation_code();
        $pilot->verification_status=0;
        $pilot->save();

        $AdminController::sendverificationcode($pilot->id);

       return redirect()->back()->withSuccess('New pilot added successfully');

            }

         }

    }


   public  function random_number_with_dupe($len = 6, $dup = 1, $sort = false) {
        if ($dup < 1) {
            throw new InvalidArgumentException('Second argument is < 1');
        }        
    
        $num = range(0,9);
        shuffle($num);
    
        $num = array_slice($num, 0, ($len-$dup)+1);
    
        if ($dup > 0) {
            $k = array_rand($num, 1);
            for ($i=0; $i<($dup-1); $i++) {
                $num[] = $num[$k];
            }
        }
    
        if ($sort) {
            sort($num);
        }
    
        return implode('', $num);
    }


    public static function confirmation_code($len = 4, $dup = 1, $sort = false) {
        if ($dup < 1) {
            throw new InvalidArgumentException('Second argument is < 1');
        }        
    
        $num = range(0,9);
        shuffle($num);
    
        $num = array_slice($num, 0, ($len-$dup)+1);
    
        if ($dup > 0) {
            $k = array_rand($num, 1);
            for ($i=0; $i<($dup-1); $i++) {
                $num[] = $num[$k];
            }
        }
    
        if ($sort) {
            sort($num);
        }
    
        return implode('', $num);
    }

    public static  function sendverificationcode($pilotid){ 


        $vericode= DB::table('pilots')->where('id',$pilotid)->first(); 
        $msg=urlencode($vericode->verification_code);
        $num= ltrim($vericode->phone, '+');
        
       
       
     $curl = curl_init();
$data = array("api_key" => "TLn4cMf5MyLxd6AhD18W84QUwHJXj5NYjtQPXISLRVRywDAlD9wCseVY6r2Dbi", "to" => urlencode("$num"),  "from" => "TROOPA",
"sms" => $msg,  "type" => "plain",  "channel" => "generic" );

$post_data = json_encode($data);

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.ng.termii.com/api/sms/send",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => $post_data,
CURLOPT_HTTPHEADER => array(
"Content-Type: application/json"
),
));

$response = curl_exec($curl);

curl_close($curl);


    }



    public static function pullpilot($id)
    {
       
       $detail= DB::table('pilots')->where('id', $id)->first(); 
       return response()->json($detail);
           
      
    }
    
     



    public function performaction(Request $request){

        $validator=$this->validate(request(),[
            'task'=>'required|string',
            ],
            [
                'task.required'=>'Select an action you want to perform ',
               
                
                ]);

                if(count(request()->all()) > 0){
        switch ($request->input('task')) {
            case 'verify':

               
        
                      
                
    
                if(isset($_POST['allpilots'])){


                    if (is_array($_POST['allpilots'])) {
                        foreach($_POST['allpilots'] as $value){

                            DB::table('pilots')->where('id', $value)
                            ->update(['status' =>'1']);

                           
                            
                        }
   
                     return redirect()->back()->withSuccess('You have performed a verification action successfully');
                      
   
                     } 
                     else{

                        DB::table('pilots')->where('id', $_POST['allpilots'])
                        ->update(['status' =>'1']);

                        return redirect()->back()->withSuccess('You have performed a verification action successfully');
                   

                         }


                    
               }else{
    
    
                return redirect()->back()->withErrors('Please scroll down and check the pilots you want to perfom action on ');
               }
    
                       
            
    
                break;
    
            case 'restrict':
                
                if(isset($_POST['allpilots'])){

                    if(is_array($_POST['allpilots'])) {
                        foreach($_POST['allpilots'] as $value){

                            DB::table('pilots')->where('id', $value)
                            ->update(['status' =>'2']);

                        return redirect()->back()->withSuccess('Pilots have been restricted.');


                        }
                    }
                    else{

                        DB::table('pilots')->where('id', $_POST['allpilots'])
                            ->update(['status' =>'2']);

                        return redirect()->back()->withSuccess('A Pilot have been restricted.');

                    }

                   
                   
               }else{
    
    
                return redirect()->back()->withErrors('Please scroll down and check the pilots you want to perfom action on ');
           
               }
    
    
                break;

    
                case 'onhold':
                    
                    if(isset($_POST['allpilots'])){
    
                        if(is_array($_POST['allpilots'])) {
                            foreach($_POST['allpilots'] as $value){
    
                                DB::table('pilots')->where('id',$value)
                                ->update(['status' =>'3']);
    
                            return redirect()->back()->withSuccess('Pilots have been placed on hold.');
    
    
                            }
                        }
                        else{
    
                            DB::table('pilots')->where('id', $_POST['allpilots'])
                                ->update(['status' =>'3']);
    
                            return redirect()->back()->withSuccess('A Pilot have been restricted.');
    
                        }
    
                       
                       
                   }else{
        
        
                    return redirect()->back()->withErrors('Please scroll down and check the pilots you want to perfom action on ');
               
                   }
        
        
                    break;

    
                    case 'delete':
                        
                        if(isset($_POST['allpilots'])){
        
                            if(is_array($_POST['allpilots'])) {
                                foreach($_POST['allpilots'] as $value){

                                     ///// remove the existing file from folder /////////
   
                                           $existFile=""; 
   
                                           $info= DB::table('pilots')->where('id',$value)->first(); 
                                           $existFile.=$info->picture; 
                               
                        
   
     
                         if(file_exists(public_path('photos/'.basename($existFile)))){
     
                             unlink(public_path('photos/'.basename($existFile)));
                       
                           }
        
                                    DB::table('pilots')->where('id',$value)->delete();
        
                                return redirect()->back()->withSuccess('Pilots have been deleted.');
        
        
                                }
                            }
                            else{
        
                                 ///// remove the existing file from folder /////////
   
                                 $existFile=""; 
   
                                 $info= DB::table('pilots')->where('id',$_POST['allpilots'])->first(); 
                                 $existFile.=$info->picture; 
                     
              


               if(file_exists(public_path('photos/'.basename($existFile)))){

                   unlink(public_path('photos/'.basename($existFile)));
             
                 }

                          DB::table('pilots')->where('id',$_POST['allpilots'])->delete();

                      return redirect()->back()->withSuccess('Pilots have been deleted.');

        
                            }
        
                           
                           
                       }else{
            
            
                        return redirect()->back()->withErrors('Please scroll down and check the pilots you want to perfom action on ');
                   
                       }
            
            
                        break;
    
            
        }}
    }



    public function pilotdetail($id){
        
        
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

        return view('admin.pilot-detail',['pilot'=>$detail,'transits'=>$transit,'trips'=>$alltrips,'payments'=>$userpayments,'allcancelled'=>$cancelledtrips,'totaltimeonline'=>$totalOnline,'alltrips'=>$trips,'totalearning'=>number_format($totalearnings),"bonus"=>$bonuses]);
    
    }
    
    
    public function canceltrips($id){
        
         $rider= DB::table('pilots')->where('id',$id)->first(); 
        
        $orders= DB::table('client_orders')->select('client_orders.order_serial','client_orders.id','customers.fname','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount')->join('customers','customers.id','=','client_orders.client_id')->where('client_orders.rider_id', $rider->pilotID)->where('delivery_status',"decline")->get(); 
        
        return view('admin.cancel_orders',['orders'=>$orders,'rider'=>$rider]);
   
        
    }
    
    public function declinereason($id){
        
         $decline= DB::table('trips_order_decline')->where('order_id',$id)->first(); 
         return $decline->decline_reason;
   
        
    }
    
     public function deliveredorder($id){
        
         $rider= DB::table('pilots')->where('id',$id)->first(); 
        
        $orders= DB::table('client_orders')->select('client_orders.order_serial','client_orders.id','customers.fname','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount')->join('customers','customers.id','=','client_orders.client_id')->where('client_orders.rider_id', $rider->pilotID)->where('delivery_status',"delivered")->get(); 
        
        return view('admin.delivery_orders',['orders'=>$orders,'rider'=>$rider]);
   
        
    }
    
    
     public static function getPilotid($id){
        
         $rider= DB::table('pilots')->where('pilotID',$id)->first(); 
        
        return $rider->id;
        
    }
    
    
    public function requestsearch(Request $request){
        
         $emptyrider= DB::table('client_orders')->where('rider_id',"nil")->get()->count(); 
         $orders= DB::table('client_orders')
        ->select('client_orders.order_serial','client_orders.id','customers.fname','pilots.firstname','pilots.pilotID','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount','client_orders.delivery_status')
        ->join('customers','customers.id','=','client_orders.client_id')
         ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
        ->where('client_orders.order_serial',$request->serial)
        ->paginate(4);
        
        return view('admin.all_orders',['orders'=>$orders,'waiting'=>$emptyrider]);
        
        
    }
    
     public function allorders(){
        
         $emptyrider= DB::table('client_orders')->where('rider_id',"nil")->get()->count(); 
         
         
         
        
        $ordersx= DB::table('client_orders')
        ->select('client_orders.order_serial','client_orders.id','customers.fname','pilots.firstname','pilots.pilotID','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount','client_orders.delivery_status')
        ->join('customers','customers.id','=','client_orders.client_id')
         ->join('pilots','pilots.pilotID','=','client_orders.rider_id')
        ->where('client_orders.rider_id','!=','nil')
         ->orderBy('client_orders.id','desc')
         ->paginate(4);
          
         
        
       return view('admin.all_orders',['orders'=>$ordersx,'waiting'=>$emptyrider]);
   
        
    }
    
    
    public function waitinglist(){
        
          $orders= DB::table('client_orders')
        ->select('client_orders.order_serial','client_orders.id','customers.fname','client_orders.pickup_location','client_orders.dropoff_location','client_orders.request_date','client_orders.request_time','client_orders.amount','client_orders.delivery_status')
        ->join('customers','customers.id','=','client_orders.client_id')
        ->where('client_orders.rider_id',"nil")
          ->paginate(4);
       
       return view('admin.all_waiting_orders',['orders'=>$orders]);
        
        
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
             return view('admin.allriderpayment',['rider'=>$detail,'payments'=>$payments,'totalearning'=>number_format($totalearnings),'balance'=>number_format($balance)]);
   
 
    }
    
    
     public static function getOrderserial($id){
         
         $serial="";

        $detail= DB::table('client_orders')->where('id', $id)->first(); 
        
        if(!empty($detail->order_serial)){
            
          $serial=$detail->order_serial;   
            
        }

     
        return  $serial ;
    
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
        
      return view('admin.allridercashpayment',['rider'=>$pilot,'cardearnings'=>number_format($cardearning),'cardlists'=>$cardearninglist]);
        
        
        
        
    }
    
    
    public function withdrawhistory($riderid){
        
         $pilot= DB::table('pilots')->where('pilotID', $riderid)->first(); 
         
         $withdrawals= DB::table('withdrawticket')->where('rider_id', $riderid)->get(); 
          
         return view('admin.all_rider_withdrawal_history',['rider'=>$pilot,'withdrawals'=>$withdrawals]);
        
        
    }
    
    
    public function pilotcardpaymentdetail($riderid){
        
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
        
      return view('admin.allridercardpayment',['rider'=>$pilot,'cardearnings'=>number_format($cardearning),'cardlists'=>$cardearninglist]);
      
        
        
    }



    public function customerdetail($id){

        $detail= DB::table('customers')->where('id', $id)->first(); 
         $trips= DB::table('client_orders')->where('client_id', $id)->where('delivery_status',"delivered")->get(); 

     
        $userpayments= DB::table('payments') 
        ->select('payments.amount','client_orders.dropoff_location','client_orders.pickup_location','client_orders.request_time','client_orders.request_date','payments.created_at','payments.riderid','pilots.firstname')
        ->join('client_orders','client_orders.id','=','payments.order_id')
         ->join('pilots','pilots.pilotID','=','payments.riderid')
        ->where('payments.client_id',$id)->get();

       

        return view('admin.customer-detail',['customer'=>$detail,'payments'=>$userpayments,'trips'=>$trips]);
    
    }





    public function editpilot(){

        //1.validate data
           
        $validator=$this->validate(request(),[
           'fname'=>'required|string',
           'lname'=>'required|string',
           'email'=>'required|string',
           'phone'=>'required|string',
          
          
           ]);
   
               if(count(request()->all()) > 0){
   
                  
   
   
                   if(empty(request()->file('file'))){
   
                    
                         
                DB::table('pilots')
                ->where('id',request()->input('user'))
                ->update(['firstname' => request()->input('fname'),'lastname'=>request()->input('lname'),'email' => request()->input('email'), 'phone' => request()->input('phone')]);
               
                    
                   
                       return redirect()->back()->withSuccess('Update succesful.');
                   
                   }
                   else{ 
   
   
   
   
   
                         ///// remove the existing file from folder /////////
   
                         $existFile=""; 
   
                         $info= DB::table('pilots')->where('id',request()->input('user'))->first(); 
                         $existFile.=$info->picture; 
                               
                        
                          
     
                         if(file_exists(public_path('photos/'.basename($existFile)))){
     
                             unlink(public_path('photos/'.basename($existFile)));
                       
                           }
                        
                       
                         //////// move file to upload folder ////////////////
                  
                 $file=request()->file('file');
                 $extension = $file->getClientOriginalExtension(); 
                 $fileName = rand(11111, 99999) . '.' . $extension; 
              
               //////// move file to upload folder ////////////////
               
               $filePathdb = asset('/photos/'.$fileName);
               $filePath = 'photos';
               $file->move($filePath,$fileName);
        
                     
     
                 //////////////// update database with new information ///////
     
                 DB::table('pilots')
                 ->where('id',request()->input('user'))
                 ->update(['firstname' => request()->input('fname'),'lastname'=>request()->input('lname'),'picture' =>$filePathdb,'email' => request()->input('email'), 'phone' => request()->input('phone')]);
                
                          
     
                return redirect()->back()->withSuccess('Update succesful.');
                       
                  
               
                   }}
   
   }








    public function list()
    {
        $list= DB::table('lists')->get(); 
        return view('admin.list',['lists'=>$list]);

    }



    public function senderid()
    {
        $idxx= DB::table('senderids')->get(); 
        return view('admin.senderid',['ids'=>$idxx]);

    }

    public static function showusername($id)
    {
        $count=0;
        $list= DB::table('users')->where('id', $id)->first(); 
       
        return  ucwords($list->name);
    }

    public function sentMessages()
    {

       // $list= DB::table('lists')
       // ->where('id', $id)
       // ->first(); 

        $message= DB::table('sendmsg')
       ->orderBy('created_at','desc')
       ->paginate(10); 
       return view('admin.sent_messages',['smss'=>$message]);


    }




    public function userlist(){

        $user= DB::table('users')->get(); 
        return view('admin.userlist',['users'=>$user]);

    }
    
    
    
    
    
//      public function statusUpdate2($riderid,$status){
 
  
  
//   if($status=="online"){
  
//   $checkOrder= DB::table('client_orders')
//      ->where('rider_id',$riderid)
//      ->where('delivery_status',"new")
// 	 ->orWhere('delivery_status',"accepted")
//      ->get();
	 
// 	 if($checkOrder->count()<1){

//         $updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>$status]);
	
// 		}

// else{


//  $updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>"offline"]);
	


// }		
// 		}else{
		
// 		$updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>$status]);
	
// }		
// //	return response()->json($response);	
        

//     }
    
    
    
  public function statusUpdate2($riderid,$status){
 
  
  
  if($status=="online"){
  
  $accepted= DB::table('client_orders')
     ->where('rider_id',$riderid)
	 ->Where('delivery_status',"accepted")
     ->get();
     
      $new= DB::table('client_orders')
     ->where('rider_id',$riderid)
     ->where('delivery_status',"new")
	 ->get();

	 
	 if($accepted->count()<1 && $new->count()<1){

        $updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>$status]);
	
		}

else{


 $updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>"offline"]);
	


}		
		}else{
		
		$updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>$status]);
	
}		
//	return response()->json($response);	
        

    }  
    
    
    
    public function statusUpdate($riderid,$status){
 
  $response=array();
  
  if($status=="online"){
  
     $accepted= DB::table('client_orders')
     ->where('rider_id',$riderid)
	 ->Where('delivery_status',"accepted")
     ->get();
     
      $new= DB::table('client_orders')
     ->where('rider_id',$riderid)
     ->where('delivery_status',"new")
	 ->get();
     
     
	
	 if( $accepted->count()<1 && $new->count()<1){
	     

        $updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>$status]);
		if($updaterid){
		$response['updated']="true";
		}else{
		$response['updated']="false";
		}
		}

else{


 $updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>"offline"]);
		if($updaterid){
		$response['updated']="true";
		}else{
		$response['updated']="false";
		}


}		
		}else{
		
		$updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>$status]);
		if($updaterid){
		$response['updated']="true";
		}else{
		$response['updated']="false";
		}
}		
	return response()->json($response);	
        

    }
    
    
    
    
    
    
//      public function statusUpdate($riderid,$status){
 
//   $response=array();

//         $updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>$status]);
// 		if($updaterid){
// 		$response['updated']="true";
// 		}else{
// 		$response['updated']="false";
// 		}				
						
// 	return response()->json($response);	
        

//     }
    
    public function riderDownOnlineStatus($riderid){
 
 
         $online= DB::table('pilots')->where('pilotID', $riderid)->first(); 
			
						
	return $online->available_status;
        

    }
    

    public function smsdetail($id)
    {
        $smsdetail= DB::table('sendmsg')->where('id',$id)->first(); 
        return view('admin.smsdetail',['smsx'=>$smsdetail]);

    }


    public function listDetail($id,$type)
    {
       $month=Carbon::now()->format('M');
       $day=Carbon::now()->format('d');
       $tomorrow=Carbon::now()->addHours(24)->format('d');

        $list= DB::table('lists')
        ->where('id', $id)
        ->first(); 

         $contactlist= DB::table('contactlist')
         ->where('listID', $id)
         ->get(); 

         $anniversary= DB::table('anniversary')
         ->where('listID', $id)
         ->get(); 

         $anniversarylist= DB::table('anniversarylist')
         ->where('listID', $id)
         ->get(); 

         $todayBirth= DB::table('contactlist')
         ->where('listID',$id)
         ->where('birthMonth',$month)
         ->where('birthDay',$day)
         ->get();

         $tomorrowBirth= DB::table('contactlist')
         ->where('listID',$id)
         ->where('birthMonth',$month)
         ->where('birthDay',$tomorrow)
         ->get();

         
         if($type=='birthday'){

            return view('admin.listDetail',['lists'=>$list,'birthcount'=>$todayBirth,'tomorrowbirthcount'=>$tomorrowBirth],['contactlists'=>$contactlist]);
          
        }else{
    
            return view('admin.otherAnniversary',['lists'=>$list,'anniversaries'=>$anniversary],['contactlists'=>$anniversarylist]);
         
    
    
    
          }
    }

    public static function listAnniversary($id)
 {
    
    $anns= DB::table('anniversary')->where('listID', $id)->get(); 
    return $anns;
        
   
 }

 public function anniversaryexc($list,$ann,$annid){

    $month=Carbon::now()->format('M');
    $day=Carbon::now()->format('d');
    $tomorrow=Carbon::now()->addHours(24)->format('d');

    $listsx= DB::table('lists')
     ->where('id', $list)
     ->first();
     
     $todayAnn= DB::table('anniversarylist')
     ->where('listID',$list)
     ->where('annmonth',$month)
     ->where('annday',$day)
     ->get();

     $tomorrowAnn= DB::table('anniversarylist')
     ->where('listID',$list)
     ->where('annmonth',$month)
     ->where('annday',$tomorrow)
     ->get();

     $monthAnn= DB::table('anniversarylist')
     ->where('listID',$list)
     ->get();

     return view('admin.anniversaryEx',['lists'=>$listsx,'todayanniversary'=>$todayAnn],['tomorrowanniversary'=>$tomorrowAnn,'monthanniversary'=>$monthAnn,'anns'=>$ann,'annids'=>$annid]);
 
}



public function todayannivlist($listID,$ann,$annid)
{

   $month=Carbon::now()->format('M');
   $day=Carbon::now()->format('d');
  

    $list= DB::table('lists')
    ->where('id', $listID)
    ->first(); 

    $annlist=  DB::table('anniversarylist')
    ->where('anniversary', $ann)
    ->where('annmonth', $month)
    ->where('annday', $day)
    ->where('listID', $listID)
    ->get();
     
  
     return view('admin.todayAnniversary',['lists'=>$list,'contactlists'=>$annlist,'anns'=>$ann,'annids'=>$annid]);

}

public function anniversaryByMonth($id,$ann,$annid)
{

    $list= DB::table('lists')
    ->where('id', $id)
    ->first(); 

     $contactlist= DB::table('anniversarylist')
     ->where('listID', $id)
     ->where('anniversary',$ann)
     ->get(); 

   return view('admin.anniversaryByMonths',['lists'=>$list,'anns'=>$ann,'annids'=>$annid],['contactlists'=>$contactlist]);


}

public function annmonthExtract($month,$listID,$ann,$annid)
    {

        $list= DB::table('lists')
        ->where('id', $listID)
       ->first(); 

       $contactlist= DB::table('anniversarylist')
       ->where('annmonth', $month)
       ->where('listID', $listID)
       ->where('anniversary', $ann)
        ->get(); 

      
      return view('admin.annextractMonth',['lists'=>$list,'month'=>$month,'anns'=>$ann,'annids'=>$annid],['contactlists'=>$contactlist]);


    }


public static function pullsenderid()
    {
          
        $senderids= DB::table('senderids')
        ->where('userID',auth()->user()->id)
        ->where('status',2)
        ->get();
         return $senderids;
        

    }

public static function annpermonth($listID,$month,$ann)
{

    $listrows= DB::table('anniversarylist')
    ->where('listID', $listID)
    ->where('annmonth', $month)
    ->where('anniversary',$ann)
    ->get(); 

    
    return $listrows;


}

public static function fullmonth($month)
{
    $fullmonth="";
    if($month=='Jan'){

    $fullmonth="January";

    }

    if($month=='Feb'){

        $fullmonth="February";

        }


    if($month=='Mar'){

            $fullmonth="March";
    
            }

    if($month=='Apr'){

                $fullmonth="April";
        
                }

    if($month=='May'){

                    $fullmonth="May";
            
                    }

    if($month=='Jun'){

                        $fullmonth=="June";
                
                        }

     if($month=='Jul'){

                            $fullmonth="July";
                    
                            }

    if($month=='Aug'){

                                $fullmonth="August";
                        
                                }

    if($month=='Sep'){

                                    $fullmonth="September";
                            
                                    }

    if($month=='Oct'){

                                        $fullmonth="October";
                                
                                        }

    if($month=='Nov'){

                                            $fullmonth="November";
                                    
                                            }

    if($month=='Dec'){

                                                $fullmonth="December";
                                        
                                                }

    
    return $fullmonth;


}




public static function autostatus($id)
{
    $output="";
    $listrows= DB::table('autosend')
    ->where('listID', $id)
    ->first();

    if(isset($listrows)){
   

    $output.=1;

   
}
else{

    $output.="";  
}
    return $output;

}



public function tomorrowannivlist($listID,$ann,$annid)
    {

       $month=Carbon::now()->format('M');
       $tomorrow=Carbon::now()->addHours(24)->format('d');
      

        $list= DB::table('lists')
        ->where('id', $listID)
        ->first(); 

        $annlist=  DB::table('anniversarylist')
        ->where('anniversary', $ann)
        ->where('annmonth', $month)
        ->where('annday', $tomorrow)
        ->where('listID', $listID)
        ->get();
         
      
         return view('admin.tomorrowAnniversary',['lists'=>$list,'contactlists'=>$annlist,'anns'=>$ann,'annids'=>$annid]);

    }

 public static function anniversaryCount($anniversary,$list)
 {

     $rows= DB::table('anniversarylist')
     ->where('anniversary', $anniversary)
     ->where('listID', $list)
     ->get(); 

     
     return $rows->count();


 }


    public function multiplecontact($id)
{
    
$input =request()->all();  
$condition = $input['firstname'];
foreach ($condition as $key => $condition) {
    $contactlist = new contactlist();
                            $contactlist->firstName=$input['firstname'][$key];
                            $contactlist->lastName=$input['lastname'][$key];
                            $contactlist->birthMonth=$input['birthmonth'][$key];
                            $contactlist->birthDay=$input['birthday'][$key];
                            $contactlist->phone=$input['phone'][$key];
                            $contactlist->remarks=$input['remark'][$key];
                            $contactlist->listID=$id;
                            $contactlist->save();

    }


    return redirect()->back()->withSuccess('Contacts added succesfully.');
        
   
}

    public function todayBirthday($id)
    {
        $month=Carbon::now()->format('M');
       $day=Carbon::now()->format('d');
       $tomorrow=Carbon::now()->addHours(24)->format('d');

        $list= DB::table('lists')
        ->where('id', $id)
        ->first(); 

         $contactlist= DB::table('contactlist')
         ->where('listID', $id)
         ->where('birthMonth', $month)
         ->where('birthDay', $day)
         ->get();

         
      return view('admin.todayBirthday',['lists'=>$list],['contactlists'=>$contactlist]);

    }

    public function tomorrowBirthday($id)
    {

        $month=Carbon::now()->format('M');
        $tomorrow=Carbon::now()->addHours(24)->format('d');

        $list= DB::table('lists')
        ->where('id', $id)
        ->first(); 

         $contactlist=  DB::table('contactlist')
         ->where('listID', $id)
         ->where('birthMonth', $month)
         ->where('birthDay', $tomorrow)
         ->get();

        return view('admin.tomorrowBirthday',['lists'=>$list],['contactlists'=>$contactlist]);

    }


    public function autosendtype(Request $request)
{

if($request->input('autotype')=="1"){

    $list= DB::table('lists')->where('userID', auth()->user()->id)->get(); 
    return view('admin.scheduler',['lists'=>$list]);

}
if($request->input('autotype')=="2"){
    $list= DB::table('lists')->where('userID', auth()->user()->id)->get(); 
    
    return view('admin.multiplemessage',['lists'=>$list]);
}
        
   
}

    public function scheduleList()
    {
        $list= DB::table('lists')
        ->select('lists.id','lists.name','lists.userID','autosend.id','autosend.listID','autosend.created_at','autosend.sendtype')
        ->join('autosend','autosend.listID','=','lists.id')
        ->get();
        return view('admin.autoscheduleList',['lists'=>$list]);

    }

    public function multipleupdate($id)
    {
          
        $senderid= DB::table('autosend')->where('listID',AdminController::getListIdFromAutosend($id))->first();
         $lists= DB::table('autosend_list')->where('listID',AdminController::getListIdFromAutosend($id))->get(); 
        // $contactlist= DB::table('contactlist')->where('listID',UserController::getListIdFromAutosend($id))->get(); 
            
         return view('admin.updateschedulemultiple',['lists'=>$lists,'sender'=>$senderid]);
        

        

    }

    public function createList()
    {

        $lists = new lists();
        $lists->name=request()->input('title');
        $lists->type=request()->input('type');
        $lists->userID=auth()->user()->id;
        $lists->save();
        return redirect()->back()->withSuccess('New list created successfully');

    }

       public function listcontacts($id,$type)
    {
        $list= DB::table('lists')->where('id', $id)->first(); 
        

        if($type=='birthday'){
            $contactlist= DB::table('contactlist')->where('listID', $id)->get();
           
            return view('admin.list_contacts',['lists'=>$list],['contactlists'=>$contactlist]);
        }
        else if($type=='other'){

            $contactlist= DB::table('anniversarylist')->where('listID', $id)->get();
            return view('admin.list_contacts_other',['lists'=>$list],['contactlists'=>$contactlist]);
      
        }
       
    }

    public function autosms(Request $request){
        switch ($request->input('action')) {
            case 'activate':

                $validator=$this->validate(request(),[
                    'senderid'=>'required|string',
                    'message'=>'required|string',
                    'time'=>'required|string',
                    ],
                    [
                        'senderid.required'=>'.Please type in name you  want celebrants to see as the sender ',
                        'message.required'=>'.Please enter message you want to send',
                        'time.required'=>'.Please choose the time you want the message to be sent',
                          
                        
                        ]);
        
                        if(count(request()->all()) > 0){
                
    
                if(isset($_POST['listid'])){


                    if (is_array($_POST['listid'])) {
                        foreach($_POST['listid'] as $value){

                        $autosend = new autosend();
                        $autosend->userID=auth()->user()->id;
                        $autosend->listID=$value;
                        $autosend->senderID=request()->input('senderid');
                        $autosend->message=request()->input('message');
                        $autosend->sendtime=request()->input('time');
                        $autosend->sendtype='single';
                            if($autosend->save()){



                                $list= DB::table('contactlist')
                                ->where('listID', $value)
                                ->get(); 

                             foreach($list as $row){

                            $autosendlist = new autosendlist();
                            $autosendlist->userID=auth()->user()->id;
                            $autosendlist->listID=$value;
                            $autosendlist->senderID=request()->input('senderid');
                            $autosendlist->msg=request()->input('message');
                            $autosendlist->reciever=$row->phone;
                            $autosendlist->reciever_name=ucwords($row->firstName).' '.ucwords($row->lastName);
                            $autosendlist->birthDay=$row->birthDay;
                            $autosendlist->birthMonth=$row->birthMonth;
                            $autosendlist->send_time=request()->input('time');
                            $autosendlist->save();
                            
                        
                        }

                        return redirect()->back()->withSuccess('Auto send SMS has been activated for list successfuly.');
                           
                        }
                        }
   
                       
   
                     } else {

                        $autosend = new autosend();
                        $autosend->userID=auth()->user()->id;
                        $autosend->listID=$value;
                        $autosend->senderID=request()->input('senderid');
                        $autosend->message=request()->input('message');
                        $autosend->sendtime=request()->input('time');
                        $autosend->sendtype='single';
                        if($autosend->save()){



                            $list= DB::table('contactlist')
                            ->where('listID', $value)
                            ->get(); 

                         foreach($list as $row){

                        $autosendlist = new autosendlist();
                        $autosendlist->userID=auth()->user()->id;
                        $autosendlist->listID=$value;
                        $autosendlist->senderID=request()->input('senderid');
                        $autosendlist->msg=request()->input('message');
                        $autosendlist->reciever=$row->phone;
                        $autosendlist->reciever_name=ucwords($row->firstName);
                        $autosendlist->birthDay=$row->birthDay;
                        $autosendlist->birthMonth=$row->birthMonth;
                        $autosendlist->send_time=request()->input('time');
                        $autosendlist->save();
                        
                    
                    }

                    return redirect()->back()->withSuccess('Auto send SMS has been activated for list successfuly.');
                       
                    }  }


                    
               }else{
    
    
                return redirect()->back()->withErrors('Please scroll down and check the list you want to automate ')->withInput();
               }
    
                       
            }
    
                break;
    
            case 'deactivate':
                
                if(isset($_POST['listid'])){

                    if(is_array($_POST['listid'])) {
                        foreach($_POST['listid'] as $value){

                        DB::table('autosend_list')->where('listID',$value)->delete();
                        DB::table('autosend')->where('listID',$value)->delete();

                        return redirect()->back()->withSuccess('list deactivated succesfuly.');


                        }
                    }else{

                        DB::table('autosend_list')->where('listID',$value)->delete();
                        DB::table('autosend')->where('listID',$value)->delete();
                        return redirect()->back()->withSuccess('list deactivated succesfuly.');

                    }

                   
                   
               }else{
    
    
               return redirect()->back()->withErrors('Please scroll down and check the list you want to deactivate ')->withInput();
             
               }
    
    
                break;
    
            
        }
    }




    public function celebByMonth($id)
    {

        $list= DB::table('lists')
        ->where('id', $id)
        ->first(); 

         $contactlist= DB::table('contactlist')
         ->where('listID', $id)
         ->get(); 
        return view('admin.celebrantsByMonths',['lists'=>$list],['contactlists'=>$contactlist]);


    }

    public function monthExtract($month,$listID)
    {

        $list= DB::table('lists')
        ->where('id', $listID)
       ->first(); 

       $contactlist= DB::table('contactlist')
       ->where('birthMonth', $month)
       ->where('listID', $listID)
        ->get(); 

      
      return view('admin.extractMonth',['lists'=>$list,'months'=>$month],['contactlists'=>$contactlist]);


    }

    public function smsallcontact($id,$type)
    {
        $list= DB::table('lists')->where('id', $id)->first(); 
        if($type=='other'){

            $contactlistx= DB::table('anniversarylist')->where('listID',$id)->get(); 
            return view('admin.smsallcontactsother',['lists'=>$list,'contactlists'=> $contactlistx]);
        }

        if($type=='birthday'){
            $contactlistx= DB::table('contactlist')->where('listID',$id)->get(); 
            return view('admin.smsallcontacts',['lists'=>$list,'contactlists'=> $contactlistx]);

        }
        
       
       

    }


    public function multipleprocessmsg($id){



        $input =request()->all();  
        $condition = $input['contactid'];
        foreach ($condition as $key => $condition) {
           
            $autosendlist = new autosendlist();
            $autosendlist->userID=auth()->user()->id;
            $autosendlist->listID=$id;
            $autosendlist->senderID=$input['senderid'];
            $autosendlist->msg=$input['msg'][$key];
            $autosendlist->reciever=$input['phone'][$key];
            $autosendlist->reciever_name=ucwords($input['firstname'][$key]).' '.ucwords($input['lastname'][$key]);
            $autosendlist->birthDay=$input['birthday'][$key];
            $autosendlist->birthMonth=$input['birthmonth'][$key];
            $autosendlist->send_time=$input['sendtime'][$key];
            $autosendlist->save();

        
            }

            $autosend = new autosend();
            $autosend->userID=auth()->user()->id;
            $autosend->listID=$id;
            $autosend->senderID=$input['senderid'];
            $autosend->message="multiple";
            $autosend->sendtime=$input['sendtime'][$key];
            $autosend->sendtype='multiple';
            $autosend->save();
        
           
            return redirect('admin/done_list/'.$id);

    }

    public static function getListIdFromAutosend($id)
    {
        $list= DB::table('autosend')->where('id',$id)->first(); 
        return $list->listID;

    }

    public function singleupdate($id)
    {
          

         $list= DB::table('autosend')->where('id',$id)->first(); 
         $contactlist= DB::table('contactlist')->where('listID',AdminController::getListIdFromAutosend($id))->get(); 
            
       return view('admin.updateschedule',['list'=>$list,'contactlist'=>$contactlist]);
        

        

    }


    public function todaytask()
    {
        $month=Carbon::now()->format('M');
       $day=Carbon::now()->format('d');
      

         $contactlist= DB::table('contactlist')
         ->where('birthMonth', $month)
         ->where('birthDay', $day)
         ->get();

         
      return view('admin.todaytask',['contactlists'=>$contactlist]);

    }

    public static function pulllistdetail($id)
 {
    
    $list= DB::table('lists')->where('id', $id)->first(); 
    return  $list->name;
        
   
 }

 public static function pulllistauthor($id)
 {
    
    $list= DB::table('lists')->where('id', $id)->first(); 
    $users= DB::table('users')->where('id', $list->userID)->first();
    return  $users->name;
        
   
 }


    

    public function scheduleupdate($id,$id2)
    {
            if($id2=='single'){

             $list= DB::table('autosend')->where('id',$id)->first(); 
            $contactlist= DB::table('contactlist')->where('listID',AdminController::getListIdFromAutosend($id))->get(); 
            return redirect('admin/singleupdate/'.$id);
        
        
        } 
        if($id2=='multiple'){

            $list= DB::table('autosend_list')->where('listID',AdminController::getListIdFromAutosend($id))->get(); 
           
           return redirect('admin/multipleupdate/'.$id);

        }

    }

    
    public function scheduleupdate2($id)
    {
        $validator=$this->validate(request(),[
            'senderid'=>'required|string',
            'message'=>'required|string',
            'time'=>'required|string',
            ],
            [
                'senderid.required'=>'.Please type in name you  want celebrants to see as the sender ',
                'message.required'=>'.Please enter message you want to send',
                'time.required'=>'.Please choose the time you want the message to be sent',
                  
                
                ]);
                if(count(request()->all()) > 0){

                DB::table('autosend')->where('id', $id)->update([
                    
                    'senderID' => request()->input('senderid'),
                    'message' => request()->input('message'),
                    'sendtime' => request()->input('time')
                
                
                ]);

                $auto=DB::table('autosend')->where('id',$id)->first(); 

                DB::table('autosend_list')->where('listID', $auto->listID)->update([
                    
                    'senderID' => request()->input('senderid'),
                    'msg' => request()->input('message'),
                    'send_time' => request()->input('time')
                ]);

                return redirect()->back()->withSuccess('Update sucessful.');
          
                }
          

    }

    public function multipleupdateinfo(){

        $input =request()->all();  
        $condition = $input['contact'];
        foreach ($condition as $key => $condition) {

            DB::table('autosend_list')->where('id', $input['contact'][$key])
            ->update(['msg' =>$input['msg'][$key], 'send_time' =>$input['sendtime'][$key]]);
        }

        return redirect()->back()->withSuccess('Infomation updated succesfully.');

    }

    



    public function donelist($id)
    {
        
        return view('admin.donelist',['list'=>$id]);

    }

    public function processsenderid(){

       
        if(count(request()->all()) > 0){
       

        if(isset($_POST['ids'])){

            if (is_array($_POST['ids'])) {

            foreach($_POST['ids'] as $value){
                DB::table('senderids')->where('id', $value)
                ->update(['status' =>request()->input('status')]);
        }

        return redirect()->back()->withSuccess('sender ID updated successfuly.');
                      

    }else{

        DB::table('senderids')->where('id', $value)
        ->update(['status' =>request()->input('status')]);

        return redirect()->back()->withSuccess('sender ID updated successfuly.');
                      

    }     

           


            
       }else{


        return redirect()->back()->withErrors('Please scroll down and check atleast one sender ID to process ')->withInput();
       }

    }
}



public function insertname($name){

    $senderid = new senderid();
    $senderid->userID=auth()->user()->id;
    $senderid->status=0;
    $senderid->name=$name;
    if($senderid->save()){

        echo"good";
    }


}


  public function checkdistance2($rideraddress,$pickupaddress)
  {
    $origin =str_replace(' ','+',$rideraddress);
 $destination =str_replace(' ','+',$pickupaddress);
 $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
 $price=0;
 $url ="https://maps.googleapis.com/maps/api/directions/json?origin=".$origin."&destination=".$destination."&key=".$key;
 
 $jsonfile = file_get_contents($url);
 $jsondata = json_decode($jsonfile);
 
$distances=str_replace('km', '',$jsondata->routes[0]->legs[0]->distance->text); 
  
 return  $distance= (int) $distances; 
 
 
   
  }
  
  
   public function firstTwo()
{

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersNumber = strlen($characters);
    $codeLength = 2;

    $code = '';

    while (strlen($code) < 2) {
        $position = rand(0, $charactersNumber - 1);
        $character = $characters[$position];
        $code = $code.$character;
    }

   

    return $code;

}


public function SecondFour()
{

    $characters = '0123456789';
    $charactersNumber = strlen($characters);
    $codeLength = 4;

    $code = '';

    while (strlen($code) < 4) {
        $position = rand(0, $charactersNumber - 1);
        $character = $characters[$position];
        $code = $code.$character;
    }


    return $code;

}

public function LastTwo()
{

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersNumber = strlen($characters);
    $codeLength = 2;

    $code = '';

    while (strlen($code) < 2) {
        $position = rand(0, $charactersNumber - 1);
        $character = $characters[$position];
        $code = $code.$character;
    }

   

    return $code;

}

public function ridercashpayment($riderid){
    
     $response=array();
    
     $cashpayments= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
       ->where('payments.status',"ok")
        ->where('client_orders.rider_id',$riderid)
      ->get(); 
    if( $cashpayments){
        
        foreach($cashpayments as $cashpayment){
        
        $response['requests'][]=$cashpayment;
        $response['message']="ok";
         $response['count']=$cashpayments->count();
        }
        
        
    }
    
    return response()->json($response); 
    
}

public function ridercardpayment($riderid){
    
     $response=array();
     
     $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
      
	   $response['totalCardEarning']="N".number_format($cashearning);
    
       $cardpayments= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
      ->where('client_orders.rider_id',$riderid)
      ->get(); 
      
    if( $cardpayments){
        
        foreach($cardpayments as $cardpayment){
        
        $response['requests'][]=$cardpayment;
        $response['message']="ok";
         $response['count']=$cardpayments->count();
        }
        
        
    }
    
    return response()->json($response); 
    
}



public function pulledconfirmed($riderid){
    
     $response=array();
    
     $pulledconfirmeds= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','customers.fname')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.delivery_status',"delivered")
       ->where('client_orders.rider_id',$riderid)
      ->get(); 
      
    if($pulledconfirmeds){
        
        foreach($pulledconfirmeds as $confirmed){
        
        $response['requests'][]=$confirmed;
        $response['status']="ok";
         $response['count']=$pulledconfirmeds->count();
          $response['message']="List pulled succesfully"; 
        }
        
        
    }
    else{
        
        $response['status']="ok";
         $response['message']="There is no record to display"; 
    }
    
    return response()->json($response); 
    
}



public function pulldeclined($riderid){
    
     $response=array();
    
     $pulldeclineds= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','customers.fname')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.delivery_status',"decline")
       ->where('client_orders.rider_id',$riderid)
      ->get(); 
      
    if($pulldeclineds){
        
        foreach($pulldeclineds as $declined){
        
        $response['requests'][]=$declined;
        $response['status']="ok";
         $response['count']=$pulldeclineds->count();
          $response['message']="List pulled succesfully"; 
        }
        
        
    }
     else{
        
        $response['status']="ok";
         $response['message']="There is no record to display"; 
    }
    
    return response()->json($response); 
    
}



public function riderstat($riderid){

     $response=array();
     $responseTwo=array();
     $calcbonus=0;
	 
	 
	 //////////////////////////////////////////// time online ///////////////////////////////
	// Carbon\Carbon::parse($calllog['delivery_date'])
	  $online2= DB::table('rider_time_online')->where('rider_id',$riderid)->get(); 
	  
	  if($online2->count()>0){
	  $online= DB::table('rider_time_online')->where('rider_id',$riderid)->first(); 
// 	  Carbon::parse($online->online_time)->minute;
// 	  Carbon::parse($online->online_time)->hour;
	  
	  $totalOnline= Carbon::parse($online->online_time)->hour."hr".Carbon::parse($online->online_time)->minute."min".Carbon::parse($online->online_time)->second."secs";
	   $response['totalTimeOnline']=$totalOnline;
	  }else{
	  
	   $response['totalTimeOnline']="0hr0min0sec";
	  }
	 //////////// trips count ////////////
	 
	  $trips= DB::table('client_orders')->where('rider_id',$riderid)->where('delivery_status','delivered')->get()->count(); 
	  
	  $response['totalTrips']=number_format($trips);
	  
	  /////////////// bonus //////////////////
	  
	  $bonus= DB::table('rider_bonus')->where('rider_id',$riderid)->first(); 
	  
	  if(!empty($bonus->riderbonus)){
	  
	   $response['riderBonus']=number_format($bonus->riderbonus);
	    $calcbonus=$bonus->riderbonus;
	  
	  }else{
	      
	      $response['riderBonus']=number_format(0000); 
	       $calcbonus=0;
	  }
	  
/////////////////////////// total card earning //////////////////////////////
     $cardearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
	    ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
	  
	   $response['riderCardEarning']=number_format($cardearning);
	   
	   
	   
	   
	    //////////////////////////// current balance /////////////////
       
	  $cbalance= DB::table('current_balance')->where('rider_id',$riderid)->first(); 
	  
	  if(!empty($cbalance->balance)){
	  
	   $response['currentBalance']=number_format($cbalance->balance);
	    $response['currentBalanceValue']=$cbalance->balance;
	  
	  }else{
	      
	      $response['currentBalance']=number_format(0.0);
	       $response['currentBalanceValue']=0;
	       //$calcbonus=0;
	  }
	  
	  
	   /////////////// platform charge //////////////////
	  
	   $platformearning= DB::table('platformearning')
     ->where('rider_id',$riderid)
     ->sum('platform_earning');
	  
	   $response['platformEarning']=number_format($platformearning);
       
      
	   
	  
	  
	  ///////////////////////////// total cash earning ////////////////////////////////
	  
     $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
      
	   $response['riderCashEarning']=number_format($cashearning);
	  
	   /////////////// rider earnings //////////////////
	  
	   $totalearnings= DB::table('platformearning')
     ->where('rider_id',$riderid)
     ->sum('riderearning');
	  
	   $response['riderEarnings']=number_format($totalearnings);
	   //////////// order count ////////////
	 
	   $ordercount= DB::table('client_orders')->where('rider_id',$riderid)->where('delivery_status',"!=","accepted")->where('delivery_status',"!=","new")->get()->count(); 
	  $response['riderOrderCount']=number_format($ordercount);
	  
	   //$current_balance= $totalearnings-$calcbonus;
	   //$response['currentBalance']="N".number_format($current_balance);
	   
	   
	   ///////////Vendors charge //////////////////////////////////////
	   //// check if rider is a 3pl rider ///////////////////////
	   
	    $pilot= DB::table('pilots')->where('pilotID',$riderid)->first();
	    if(!empty($pilot->third_delivery) && $pilot->third_delivery !="false"){
	        
	       $thirddelcheck= DB::table('3pl_riders_right')->where('rider_id',AdminController::getriderid($riderid))->where('status',"authorize")->get()->count(); 
	       if($thirddelcheck >0){
	           
	           
	           $response['vendorEarning']=number_format($cashearning+$cardearning); 
	           
	       }else{
	           
	           $response['vendorEarning']=null;   
	       }
	        
	    }else{
	        
	         $response['vendorEarning']=null;  
	        
	    }
	   

      $responseTwo['status']="ok";
      $responseTwo['message']="rider state";
       $responseTwo['stat'][]= $response;
       
      
	 

      return response()->json($responseTwo); 



}


public function easyLogin($phone,$password){
    $response=array();
    /////////////////////// check wether phone is verified ///////////////////////
     $trips= DB::table('pilots')->where('phone',$phone)->get()->count(); 
     if($trips>0){
         
         $pilot= DB::table('pilots')->where('phone',$phone)->first(); 
         
         if($pilot->verification_status==1){
             
             
             if($pilot->password==AdminController::encrypt_decrypt($password,true)){
                 
                   
        $getpin= DB::table('rider_pin_store')->where('riderID',$pilot->pilotID)->first(); 
                 
                
        
        $response['name'] =  $pilot->firstname;  
        $response['picture'] =$pilot->picture;
        $response['phone'] = $pilot->phone;  
        $response['email'] =$pilot->email;
        $response['status'] = $pilot->status;  
        $response['date'] = Carbon::parse($pilot->created_at)->diffForHumans();  
        $response['online_status'] = $pilot->online_status;  
        $response['verification_status'] = $pilot->verification_status;  
        $response['machine_manufacture'] = $pilot->machine_manufacture; 
        $response['license_plate'] = $pilot->license_plate; 
        $response['engine_size'] = $pilot->engine_size; 
        $response['riderid'] = $pilot->pilotID; 
        $response['address'] = $pilot->address;
        $response['bank_name'] = $pilot->bankName;
        $response['account_name'] = $pilot->accountName;
        $response['account_number'] = $pilot->accountNumber;
        $response['bike_color'] = $pilot->bike_color;
        $response['third_delivery'] = $pilot->third_delivery;
        $response['companyCode'] = $pilot->companyCode;
         $response['pin'] = $getpin->pin;
        $response['error']="false";
        $response['message']="logged in succesfully";   
                 
                 
                 
             }else{
                 
            $response['error']="true";
            $response['message']="Password not correct";   
                 
             }
             
             
             
             
             
             
         }else{
             
            $response['error']="true";
            $response['message']="This number is yet to be verified";  
             
         }
         
         
         
         
     }else{
         
         $response['error']="true";
        $response['message']="Phone number does not exist";
       
         
         
         
     }
     
    return response()->json($response);  
    
}


public function ridercashpaymentweeksort($riderid){
    
     $response=array();
     
     
      $weeklycashcount= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
       ->whereDate('client_orders.created_at','>=',Carbon::now()->startOfWeek())
       ->whereDate('client_orders.created_at','<=',Carbon::now()->endOfWeek())
	  ->get()->count();
     
     
     
       $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
       ->whereDate('client_orders.created_at','>=',Carbon::now()->startOfWeek())
       ->whereDate('client_orders.created_at','<=',Carbon::now()->endOfWeek())
	  ->sum('client_orders.amount');
      
	   $response['total_amount']=number_format($cashearning);
     
     
   
       $cardpayments= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
      ->where('payments.status',"ok")
      ->where('client_orders.rider_id',$riderid)
      ->whereDate('client_orders.created_at','>=',Carbon::now()->startOfWeek())
       ->whereDate('client_orders.created_at','<=',Carbon::now()->endOfWeek())
      ->get(); 
      
    if( $weeklycashcount>0){
        
        foreach($cardpayments as $cardpayment){
        
        //$response['requests'][]=$cardpayment;
        $response['requests'][]=["id"=>$cardpayment->id,"pickup_location"=>$cardpayment->pickup_location,"dropoff_location"=>$cardpayment->dropoff_location,"pickup_location_format"=>$cardpayment->pickup_location_format,"dropoff_location_format"=>$cardpayment->dropoff_location_format,"package_type"=>strtolower($cardpayment->package_type),"duration"=>$cardpayment->duration,"distance"=>$cardpayment->distance,"payment_type"=>$cardpayment->payment_type,"payment_mode"=>$cardpayment->payment_mode,"amount"=>$cardpayment->amount,"pickup_contact"=>$cardpayment->pickup_contact,"dropoff_contact"=>$cardpayment->dropoff_contact,"pickup_contact_name"=>$cardpayment->pickup_contact_name,"dropoff_contact_name"=>$cardpayment->dropoff_contact_name,"delivery_status"=>$cardpayment->delivery_status,"created_at"=>$cardpayment->created_at,"order_serial"=>$cardpayment->order_serial,"request_date"=>$cardpayment->request_date,"request_time"=>$cardpayment->request_time,"status"=>$cardpayment->status,"fname"=>$cardpayment->fname];
  
        $response['message']="ok";
         $response['count']=$cardpayments->count();
        }
        
        
    }
    
    if($weeklycashcount<1){
        
       $response['requests']=$cardpayments; 
        $response['count']=$cardpayments->count();
    }
    
    return response()->json($response); 
    
}

public function ridercashpaymentmonthsort($riderid){
    
     $response=array();
     
 $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
        ->whereMonth('client_orders.created_at',date('m'))
      ->whereYear('client_orders.created_at',date('Y'))
	  ->sum('client_orders.amount');
      
	   $response['monthlyCash']="N".number_format($cashearning);
   
       $cardpayments= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
      ->where('payments.status',"ok")
      ->where('client_orders.rider_id',$riderid)
      ->whereMonth('client_orders.created_at',date('m'))
      ->whereYear('client_orders.created_at',date('Y'))
      ->get(); 
      
    if( $cardpayments){
        
        foreach($cardpayments as $cardpayment){
        
        $response['requests'][]=$cardpayment;
        $response['message']="ok";
         $response['count']=$cardpayments->count();
        }
        
        
    }
    
    return response()->json($response); 
    
}

public function ridercashpaymentdaysort($riderid,$day,$month,$year){
    
     $response=array();
     
    $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
      ->whereDay('client_orders.created_at',$day)
      ->whereMonth('client_orders.created_at',$month)
      ->whereYear('client_orders.created_at',$year)
	  ->sum('client_orders.amount');
      
	   $response['dailyCash']="N".number_format($cashearning);
   
       $cardpayments= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
      ->where('payments.status',"ok")
      ->where('client_orders.rider_id',$riderid)
       ->whereDay('client_orders.created_at',$day)
      ->whereMonth('client_orders.created_at',$month)
      ->whereYear('client_orders.created_at',$year)
      ->get(); 
      
    if( $cardpayments){
        
        foreach($cardpayments as $cardpayment){
        
        $response['requests'][]=$cardpayment;
        $response['message']="ok";
         $response['count']=$cardpayments->count();
        }
        
        
    }
    
    return response()->json($response); 
    
}


public function ridercardpaymentweeksort($riderid){
    
     $response=array();
     
      $weeklycardcount= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
       ->whereDate('client_orders.created_at','>=',Carbon::now()->startOfWeek())
       ->whereDate('client_orders.created_at','<=',Carbon::now()->endOfWeek())
	  ->get()->count();
     
     
     
       $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
       ->whereDate('client_orders.created_at','>=',Carbon::now()->startOfWeek())
       ->whereDate('client_orders.created_at','<=',Carbon::now()->endOfWeek())
	  ->sum('client_orders.amount');
      
	   $response['total_amount']=number_format($cashearning);
     
     
   
       $cardpayments= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
      ->where('client_orders.rider_id',$riderid)
      ->whereDate('client_orders.created_at','>=',Carbon::now()->startOfWeek())
       ->whereDate('client_orders.created_at','<=',Carbon::now()->endOfWeek())
      ->get(); 
      
    if( $weeklycardcount>0){
        
        foreach($cardpayments as $cardpayment){
        
        //$response['requests'][]=$cardpayment
         $response['requests'][]=["id"=>$cardpayment->id,"pickup_location"=>$cardpayment->pickup_location,"dropoff_location"=>$cardpayment->dropoff_location,"pickup_location_format"=>$cardpayment->pickup_location_format,"dropoff_location_format"=>$cardpayment->dropoff_location_format,"package_type"=>strtolower($cardpayment->package_type),"duration"=>$cardpayment->duration,"distance"=>$cardpayment->distance,"payment_type"=>$cardpayment->payment_type,"payment_mode"=>$cardpayment->payment_mode,"amount"=>$cardpayment->amount,"pickup_contact"=>$cardpayment->pickup_contact,"dropoff_contact"=>$cardpayment->dropoff_contact,"pickup_contact_name"=>$cardpayment->pickup_contact_name,"dropoff_contact_name"=>$cardpayment->dropoff_contact_name,"delivery_status"=>$cardpayment->delivery_status,"created_at"=>$cardpayment->created_at,"order_serial"=>$cardpayment->order_serial,"request_date"=>$cardpayment->request_date,"request_time"=>$cardpayment->request_time,"status"=>$cardpayment->status,"fname"=>$cardpayment->fname];
  
        $response['message']="ok";
         $response['count']=$cardpayments->count();
        }
        
        
    }
    
    if($weeklycardcount<1){
        
        $response['requests']=$cardpayments;  
        
    }
    
    return response()->json($response); 
    
}


public function ridercardpaymentdaysort($riderid,$day,$month,$year){
    
     $response=array();
     
    $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
      ->whereDay('client_orders.created_at',$day)
      ->whereMonth('client_orders.created_at',$month)
      ->whereYear('client_orders.created_at',$year)
	  ->sum('client_orders.amount');
      
	   $response['dailyCard']=number_format($cashearning);
   
       $cardpayments= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
      ->where('client_orders.rider_id',$riderid)
       ->whereDay('client_orders.created_at',$day)
      ->whereMonth('client_orders.created_at',$month)
      ->whereYear('client_orders.created_at',$year)
      ->get(); 
      
    if( $cardpayments){
        
        foreach($cardpayments as $cardpayment){
        
        $response['requests'][]=$cardpayment;
        $response['message']="ok";
         $response['count']=$cardpayments->count();
        }
        
        
    }
    
    return response()->json($response); 
    
}


public function ridercardpaymentmonthsort($riderid){
    
     $response=array();
     
 $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
	   ->where('client_orders.rider_id',$riderid)
      ->where('payments.status',"ok")
        ->whereMonth('client_orders.created_at',date('m'))
      ->whereYear('client_orders.created_at',date('Y'))
	  ->sum('client_orders.amount');
      
	   $response['monthlyCard']="N".number_format($cashearning);
   
       $cardpayments= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
      ->where('client_orders.rider_id',$riderid)
      ->whereMonth('client_orders.created_at',date('m'))
      ->whereYear('client_orders.created_at',date('Y'))
      ->get(); 
      
    if( $cardpayments){
        
        foreach($cardpayments as $cardpayment){
        
        $response['requests'][]=$cardpayment;
        $response['message']="ok";
         $response['count']=$cardpayments->count();
        }
        
        
    }
    
    return response()->json($response); 
    
}


public function time_online($riderid,$timeinseconds){
    
    $response=array();
     $timeonlinecount= DB::table('rider_time_online')->where('rider_id', $riderid)->get(); 
     
     if($timeonlinecount->count()<1){
          $rider_time_online = new rider_time_online();
            $rider_time_online->rider_id=$riderid;
            $rider_time_online->online_time=$timeinseconds;
             $rider_time_online->save();
             
              $response['status']="ok";
             
             
         
     }else{
         
         
         
          $timeonline= DB::table('rider_time_online')->where('rider_id', $riderid)->first(); 
          
          $date =$timeonline->online_time;
          $newDate = date('H:i:s', strtotime($date.' +5 seconds'));
          $update= DB::table('rider_time_online')->where('rider_id',$riderid)->update(['online_time' => $newDate]); 
     
        $response['status']="ok";
     
    
     }
     
      return response()->json($response); 
    
}

public function dropoff($dropoff_contact,$dropoff_contact_name,$dropoff_location){
        
        $dropoff=array();
        
          //$dropoff['dropoff'][]=["dropoff_location"=>$dropoff_location,"dropoff_name"=>$dropoff_contact_name,"dropoff_contact"=>$dropoff_contact];
          
          
           $dropoff["dropoff_location"]=  $dropoff_location;
          $dropoff["dropoff_name"]=  $dropoff_contact_name;
          $dropoff["dropoff_contact"]= $dropoff_contact;
          
          
          return  $dropoff;
        
    }
    
    public function rider($riderid){
        
        $rider=array();
        $pilot= DB::table('pilots')->where('pilotID', $riderid)->first(); 
		
           $rider["ridername"]=  $pilot->firstname;
          $rider["riderid"]=  $pilot->pilotID;
          $rider["phone"]= $pilot->phone;
         $rider["picture"]= $pilot->picture;
          $rider["machine_manufactue"]= $pilot->machine_manufacture;
           $rider["engine_size"]= $pilot->engine_size;
            $rider["license_plate"]= $pilot->license_plate;
             $rider["bike_color"]= $pilot->bike_color;
             $rider["driver_license"]= $pilot->driver_license;
          
          return $rider;
        
    }
    
      public function weeklyEarning($riderid){
    
     $response=array();
     $response2=array();
	 
	  
     ////////////////////////////////////////////////// day 1 ////////////////////////////////////////////////////////////// 
	 
	  $t=date("Y-m-d",mktime(0,0,0,date("m"), date("d"),date("Y")));
	  $tformat=date("d M Y",mktime(0,0,0,date("m"), date("d"),date("Y")));
	  $ta=array();
  
     $amount1= DB::table('platformearning')
     ->where('rider_id',$riderid)
     ->whereDate('created_at',$t)
     ->sum('riderearning');
      
      
	  
	   $ta['date']=$t;
	   $ta['date_format']=$tformat;
	   $ta['amount']=number_format($amount1);
	   $ta['amount_format']="N".number_format($amount1);
	   
	    ////////////////////////////////////////////////// day 2 ////////////////////////////////////////////////////////////// 
		
		$t2=date("Y-m-d",mktime(0,0,0,date("m"), date("d")-1,date("Y")));
	    $t2format=date("d M Y",mktime(0,0,0,date("m"), date("d")-1,date("Y")));
	    $t2a=array();
  
        $amount2= DB::table('payments')
     ->where('payments.status',"ok")
     ->where('riderid',$riderid)
     ->whereDate('created_at',$t2)
     ->sum('amount');
     
	   $t2a['date']=$t2;
	   $t2a['date_format']=$t2format;
	   $t2a['amount']=number_format($amount2);
	    $t2a['amount_format']="N".number_format($amount2);
	   
	   
	     ////////////////////////////////////////////////// day 3 ////////////////////////////////////////////////////////////// 
		 
		$t3=date("Y-m-d",mktime(0,0,0,date("m"), date("d")-2,date("Y")));
	    $t3format=date("d M Y",mktime(0,0,0,date("m"), date("d")-2,date("Y")));
	    $t3a=array();
  
       $amount3= DB::table('payments')
     ->where('payments.status',"ok")
     ->where('riderid',$riderid)
     ->whereDate('created_at',$t3)
     ->sum('amount');
	  
	   $t3a['date']=$t3;
	   $t3a['date_format']=$t3format;
	   $t3a['amount']=number_format($amount3);
	   $t3a['amount_format']="N".number_format($amount3);
      
	  
	    ////////////////////////////////////////////////// day 4 ////////////////////////////////////////////////////////////// 
		 
		 $t4=date("Y-m-d",mktime(0,0,0,date("m"), date("d")-3,date("Y")));
	    $t4format=date("d M Y",mktime(0,0,0,date("m"), date("d")-3,date("Y")));
	    $t4a=array();
  
        $amount4= DB::table('payments')
     ->where('payments.status',"ok")
     ->where('riderid',$riderid)
     ->whereDate('created_at',$t4)
     ->sum('amount');
	  
	   $t4a['date']=$t4;
	   $t4a['date_format']=$t4format;
	   $t4a['amount']=number_format($amount4);
	    $t4a['amount_format']="N".number_format($amount4);
	   
	   
	    ////////////////////////////////////////////////// day 5 ////////////////////////////////////////////////////////////// 
		 
		 $t5=date("Y-m-d",mktime(0,0,0,date("m"), date("d")-4,date("Y")));
	    $t5format=date("d M Y",mktime(0,0,0,date("m"), date("d")-4,date("Y")));
	    $t5a=array();
  
        $amount5= DB::table('payments')
     ->where('payments.status',"ok")
     ->where('riderid',$riderid)
     ->whereDate('created_at',$t5)
     ->sum('amount');
	  
	   $t5a['date']=$t5;
	   $t5a['date_format']=$t5format;
	   $t5a['amount']=number_format($amount5);
	    $t5a['amount_format']="N".number_format($amount5);
	   
	     ////////////////////////////////////////////////// day 6 ////////////////////////////////////////////////////////////// 
		 
		 $t6=date("Y-m-d",mktime(0,0,0,date("m"), date("d")-5,date("Y")));
	    $t6format=date("d M Y",mktime(0,0,0,date("m"), date("d")-5,date("Y")));
	    $t6a=array();
  
        $amount6= DB::table('payments')
     ->where('payments.status',"ok")
     ->where('riderid',$riderid)
     ->whereDate('created_at',$t6)
     ->sum('amount');
	  
	   $t6a['date']=$t6;
	   $t6a['date_format']=$t6format;
	   $t6a['amount']=number_format($amount6);
	   $t6a['amount_format']="N".number_format($amount6);
	   
	    ////////////////////////////////////////////////// day 7 ////////////////////////////////////////////////////////////// 
		 
		 $t7=date("Y-m-d",mktime(0,0,0,date("m"), date("d")-6,date("Y")));
	    $t7format=date("d M Y",mktime(0,0,0,date("m"), date("d")-6,date("Y")));
	    $t7a=array();
  
       $amount7= DB::table('payments')
     ->where('payments.status',"ok")
     ->where('riderid',$riderid)
     ->whereDate('created_at',$t7)
     ->sum('amount');
	  
	   $t7a['date']=$t7;
	   $t7a['date_format']=$t7format;
	   $t7a['amount']=number_format($amount7);
	   $t7a['amount_format']="N".number_format($amount7);
	   
	   
	   
	   $response[]=$ta;
	   $response[]=$t2a;
	   $response[]=$t3a;
	   $response[]=$t4a;
	   $response[]=$t5a;
	   $response[]=$t6a;
	   $response[]=$t7a;
      $response2['earnings']=$response;
  
    
    return response()->json($response2); 
    
}

public function numbertext(){
    
    $floatValue = 1500.0;
echo intval($floatValue);
    
}


public function allpayment(){
    
      $withdrawers= DB::table('withdrawticket')->where('status',"NEW")->get()->count();
    
    $cardearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
	  
	  $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
    
    
      $payments= DB::table('payments')->select('payments.amount','customers.fname','pilots.firstname','payments.created_at','payments.status','payments.order_id')
          ->join('customers','customers.id','=','payments.client_id')
          
          ->join('pilots','pilots.pilotID','=','payments.riderid') 
          ->get(); 
          
          
       $pearning= DB::table('platformearning')->sum('platform_earning');    
          
     return view('admin.all_platform_payment',['payments'=>$payments,'allcashs'=>$cashearning,'allcards'=>$cardearning,'platformearning'=>$pearning,'withdrawer'=>$withdrawers]);
    
}

public function filterpayment(){
    
    $validator=$this->validate(request(),[
            'dates'=>'required|string',
                    ],
            [
            'dates.required'=>'please select date range',
           
             ]);

             if(count(request()->all()) > 0){

                $splits=explode("-",request()->input('dates'));
                
                
                   $pilot= DB::table('pilots')->where('pilotID', $riderid)->first(); 
        
        
                
                
                
                  $payments= DB::table('payments')->select('payments.amount','customers.fname','pilots.firstname','payments.created_at','payments.status','payments.order_id')
          ->join('customers','customers.id','=','payments.client_id')
          
          ->join('pilots','pilots.pilotID','=','payments.riderid') 
          ->whereDate('payments.created_at','>=',date('Y-m-d', strtotime($splits[0])))
          ->whereDate('payments.created_at','<=',date('Y-m-d', strtotime($splits[1])))
          ->get(); 
               
              
                
            return view('admin.all_platform_payment',['payments'=>$payments]);
            
            
            }
    
    
    
}

public function allcardpayment(){
    
    
       $cardearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
	  
	  $cardearninglist= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname','pilots.firstname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
       ->join('pilots','pilots.pilotID','=','payments.riderid')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
	  ->get();
    
    
     return view('admin.all_card_payment',['cardearnings'=>number_format($cardearning),'cardlists'=> $cardearninglist]);
    
}


public function allcashpayment(){
    
   $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
	  
	  $cashearninglist= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.rider_id','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname','pilots.firstname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
       ->join('pilots','pilots.pilotID','=','payments.riderid')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"cash")
      ->where('payments.status',"ok")
	  ->get();
	  
	  return view('admin.all_cash_payment',['cashearnings'=>number_format($cashearning),'cardlists'=> $cashearninglist]);
    
    
}



public function filtercardpayment(){
    
    $validator=$this->validate(request(),[
            'dates'=>'required|string',
                    ],
            [
            'dates.required'=>'please select date range',
           
             ]);

             if(count(request()->all()) > 0){

                $splits=explode("-",request()->input('dates'));
                
                
                   $cardearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
	  
	  $cardearninglist= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname','pilots.firstname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
        ->join('pilots','pilots.pilotID','=','payments.riderid')
         ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
        ->whereDate('payments.created_at','>=',date('Y-m-d', strtotime($splits[0])))
      ->whereDate('payments.created_at','<=',date('Y-m-d', strtotime($splits[1])))
	  ->get();
        
          
                
            return view('admin.all_card_payment',['cardearnings'=>number_format($cardearning),'cardlists'=> $cardearninglist]);
              
                
          
            
            
            }
    
    
    
}

public function filtercashpayment(){
    
    $validator=$this->validate(request(),[
            'dates'=>'required|string',
                    ],
            [
            'dates.required'=>'please select date range',
           
             ]);

             if(count(request()->all()) > 0){

                $splits=explode("-",request()->input('dates'));
                
                
                  $cashearning= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.payment_mode',"card")
      ->where('payments.status',"ok")
	  ->sum('client_orders.amount');
	  
	  $cashearninglist= DB::table('payments')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.pickup_location_format','client_orders.dropoff_location_format','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.payment_mode','client_orders.amount','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','client_orders.created_at','client_orders.order_serial','client_orders.request_date','client_orders.request_time','payments.status','customers.fname','pilots.firstname')
      ->join('client_orders','client_orders.id','=','payments.order_id')
      ->join('customers','customers.id','=','client_orders.client_id')
        ->join('pilots','pilots.pilotID','=','payments.riderid')
         ->where('client_orders.payment_mode',"cash")
      ->where('payments.status',"ok")
        ->whereDate('payments.created_at','>=',date('Y-m-d', strtotime($splits[0])))
      ->whereDate('payments.created_at','<=',date('Y-m-d', strtotime($splits[1])))
	  ->get();
        
          
                
            return view('admin.all_cash_payment',['cashearnings'=>number_format($cashearning),'cardlists'=> $cashearninglist]);
            
            
            }
    
    
    
}





public function shareearning($amount,$rider,$type,$clientid,$orderid){

//////////////////////////// get platform earning ////////////////////////////////////
$pearning="";
$rate="";
if($type=="cash"){
$rate=$amount*0.15;
$pearning=$amount-$rate;
            
			
             
}
else if($type=="card"){
$rate=$amount*0.15;
$pearning=$amount-$rate;
            
			
             
}

            $platformearning = new platform_earning();
            $platformearning->client_id=$clientid;
            $platformearning->rider_id=$rider;
            $platformearning->amount=$amount;
			$platformearning->type=$type;
			$platformearning->riderearning=$pearning;
			$platformearning->platform_earning=$rate;
			$platformearning->order_id=$orderid;
            $platformearning->save();
			
			$balance= DB::table('current_balance')->where('rider_id', $rider)->first(); 
			if(!empty($balance->balance)){
			  DB::table('current_balance')->where('rider_id', $rider)
                            ->update(['balance' =>$balance->balance+$pearning]);
			}
			else if(empty($balance->balance)){
			
			$riderbalance = new riderbalance();
            $riderbalance->rider_id=$rider;
            $riderbalance->balance=$pearning;
            $riderbalance->save();
			}

}


public function riderwithdraw($rider,$withdraw,$balance){
 $response=array();
 
            $withdrawticket = new withdrawticket();
            $withdrawticket->rider_id=$rider;
			$withdrawticket->balance=$balance;
            $withdrawticket->amount=$withdraw;
			$withdrawticket->status="new";
            if($withdrawticket->save()){
                
               $response['status']="ok";  
            }else{
                
                $response['status']="not ok";  
            }
  return response()->json($response); 
 //$newbalance=$balance-$withdraw;
 //DB::table('current_balance')->where('rider_id', $rider)->update(['balance' =>$newbalance]);


}


public function checkremittance($rider,$orderid){

          $remit= DB::table('cash_remittance')->where('rider_id', $rider)->where('order_id', $orderid)->get();
          
          return  $remit->count();


}

public function remitcash(){
    
    
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


public function getriderid($id){

          $remit= DB::table('pilots')->where('pilotID',$id)->first();
          
          return  $remit->id;


}

public function allplatformearning(){
    
      $pearning= DB::table('platformearning')->select('platformearning.amount','platformearning.type','platformearning.riderearning','platformearning.created_at','platformearning.platform_earning','platformearning.order_id','pilots.pilotID','pilots.firstname','customers.fname')
        ->join('pilots','pilots.pilotID','=','platformearning.rider_id')
         ->join('customers','customers.id','=','platformearning.client_id')
         ->get();
        
        return view('admin.payment_sharing',['cardlists'=>$pearning]);
    
}


public function supportissue($riderid,$title,$description,$type){
    
            $response=array();
            $supportissue = new support_issue();
            $supportissue->rider_id=$riderid;
			$supportissue->title=$title;
            $supportissue->issue=$description;
			$supportissue->issue_type=$type;
				$supportissue->status="new";
            if($supportissue->save()){
                
               $response['status']="ok";  
            }else{
                
                $response['status']="not ok";  
            }
            
              return response()->json($response); 
    
}

public function allwithdrawrequest($riderid){
     $response=array();
     $withdraw= DB::table('withdrawticket')->where('rider_id',$riderid)->where('status',"ok")->get();
     if($withdraw){
      $response['requests']=$withdraw;
       $response['count']=$withdraw->count(); 
        $response['error']="false";  
     }else{
        $response['error']="true";  
         
     }
       return response()->json($response); 
    
}


public function platformcharge($riderid){
     $response=array();
      $charges= DB::table('platformearning')->select('platformearning.id','platformearning.amount','platformearning.type','platformearning.riderearning','platformearning.created_at','platformearning.platform_earning','platformearning.order_id','pilots.pilotID','pilots.firstname','customers.fname')
        ->join('pilots','pilots.pilotID','=','platformearning.rider_id')
         ->join('customers','customers.id','=','platformearning.client_id')
         ->where('platformearning.rider_id',$riderid)
         ->orderBy('platformearning.id','desc')
         ->get();
         
          if($charges){
              
              if($charges->count()>0){
         
         foreach($charges as $requesta){
         
        $response['requests'][]=["packageid"=>Admincontroller::getOrderserial($requesta->order_id),"clientname"=>$requesta->fname,"type"=>$requesta->type,"date"=>$requesta->created_at,"amount"=>$requesta->amount,"riderearning"=>$requesta->riderearning,"platform_earning"=>$requesta->platform_earning];
        $response['count']=$charges->count(); 
        $response['error']="false"; 
           
        }
              }
              
              else{
              
            $response['error']="true";     
          } 
          }else{
              
               $response['error']="true"; 
          }
         
         
         
       return response()->json($response);  
    
}


public function allwithdrawals(){
    
    $withdraws= DB::table('withdrawticket')->select('withdrawticket.id','withdrawticket.balance','withdrawticket.amount','withdrawticket.status','withdrawticket.created_at','pilots.firstname')
        ->join('pilots','pilots.pilotID','=','withdrawticket.rider_id')
        ->orderBy('withdrawticket.id', 'desc')
        ->get();
      return view('admin.withdrawal_list',['tickets'=> $withdraws]);
    
}


public static function pullwithdrawdetail($id)
    {
       
       $detail= DB::table('withdrawticket')->select('withdrawticket.id','withdrawticket.balance','withdrawticket.amount','withdrawticket.status','withdrawticket.created_at','pilots.firstname')
        ->join('pilots','pilots.pilotID','=','withdrawticket.rider_id')
        ->where('withdrawticket.id', $id)->first(); 
       return response()->json($detail);
           
      
    }
    
    public function approveticket($id){
      $withdraw= DB::table('withdrawticket')->where('id',$id)->first(); 
      $currentbal= DB::table('current_balance')->where('rider_id',$withdraw->rider_id)->first();
      
      $nubalance= $currentbal->balance-$withdraw->amount;
      
       DB::table('withdrawticket')->where('id',$id)->update(['status' =>"ok"]);
        DB::table('current_balance')->where('rider_id',$withdraw->rider_id)->update(['balance' =>$nubalance]);
        
        return redirect()->back()->withSuccess('Withdraw approved successfully'); 
           
        
    }
    
    public function pullcomplains(){
        
        $complains= DB::table('supportissue')->get();
         return view('admin.all_compalin_list',['complains'=> $complains]);
        
    }
    
    
    
    public function processcardpay($status,$success,$amount,$paymentid,$txref,$clientid,$riderid,$orderid){

           
                       
           $response=array();
           

           if($status=="success" && $success=="success" ){
               
                 $checkpay= DB::table('payments')->where('order_id', $orderid)->where('riderid',$riderid)->where('flutterwave_status',"success")->where('flutterwave_success',"success")->get(); 
        
		   if($checkpay->count()<1){
                            $payments = new payments();
                            $payments->client_id=$clientid;
                            $payments->amount=$amount;
                            $payments->riderid=$riderid;
                            $payments->order_id=$orderid;
                            $payments->paymentid="1";
							$payments->flutterwave_status=$status;
							$payments->flutterwave_success=$success;
							$payments->flutterwave_transaction_id=$paymentid;
							$payments->tx_ref=$txref;
                            $payments->status="ok";
			                if($payments->save()){
							
							$orders= DB::table('client_orders')->where('id',$orderid)->first(); 
							
							if(empty($orders->order_code)){
							
							  $orderCode=AdminController::confirmation_code();
							
							  DB::table('client_orders')->where('id', $orderid)->update(['order_code' => $orderCode]);
							  
							  $response['deliveryCode'] =$orderCode;  
                              $response['message'] = 'payment processed successfully'; 
                              $response['error'] = false; 
							
							}
							
							else if(!empty($orders->order_code)){
							
							 				  
							  $response['deliveryCode'] =$orders->order_code;  
                              $response['message'] = 'payment processed successfully';
                              $response['error'] = false; 
							
							}
							 
							
							
							}
}
else if($checkpay->count()>0){
    
    	$orders= DB::table('client_orders')->where('id',$orderid)->first(); 
							
							if(empty($orders->order_code)){
							
							  $orderCode=AdminController::confirmation_code();
							
							  DB::table('client_orders')->where('id', $orderid)->update(['order_code' => $orderCode]);
							  
							  $response['deliveryCode'] =$orderCode;  
                              $response['message'] = 'payment processed successfully';
                              $response['error'] = false; 
							
							}
							
							else if(!empty($orders->order_code)){
							
							 				  
							  $response['deliveryCode'] =$orders->order_code;  
                              $response['message'] = 'payment processed successfully';
                              $response['error'] = false; 
							
							}
							 
    
    
}

}
else{
                 $response['error'] = true;  
                 $response['message'] = 'something went wrong';  

}


 return response()->json($response);
}


public function sendmessage(){
    
    
     $curl = curl_init();
$data = array("api_key" => "TLn4cMf5MyLxd6AhD18W84QUwHJXj5NYjtQPXISLRVRywDAlD9wCseVY6r2Dbi", "to" => "+2348168422427",  "from" => "TROOPA",
"sms" => "Hi there, testing Termii ",  "type" => "plain",  "channel" => "generic" );

$post_data = json_encode($data);

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.ng.termii.com/api/sms/send",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => $post_data,
CURLOPT_HTTPHEADER => array(
"Content-Type: application/json"
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
    
}

public function clientlogmsgid($clientid,$msgid){
      $response=array();
     $checkmsg= DB::table('clientMessaging')->where('client_id',$clientid)->get();
     
     if($checkmsg->count()<1){
         
                            $clientmessageid = new clientmessageid();
                            $clientmessageid->client_id=$clientid;
                           $clientmessageid->fcmid=$msgid;
			               $clientmessageid->save(); 
			                
			                 $response['status'] = 'ok';
                             
         
     }
     
     if($checkmsg->count()>0){
         
                    
                    $update= DB::table('clientMessaging')->where('client_id',$clientid)->update(['fcmid' =>$msgid]); 
                      $response['status'] = 'ok';        
         
     }
     
    
  return response()->json($response);  
}

public function logmsgid($riderid,$msgid){
      $response=array();
     $checkmsg= DB::table('riderMessaging')->where('rider_id',$riderid)->get();
     if($checkmsg->count()<1){
         
                            $messageid = new messagingid();
                            $messageid->rider_id=$riderid;
                            $messageid->fcmid=$msgid;
			                $messageid->save(); 
			                
			                 $response['status'] = 'ok';
                             
         
     }
      if($checkmsg->count()>0){
         
                    
                    $update= DB::table('riderMessaging')->where('rider_id',$riderid)->update(['fcmid' =>$msgid]); 
                      $response['status'] = 'ok';        
         
     }
    
  return response()->json($response);  
}

public function updatemsgid($riderid,$msgid){
      $response=array();
      
       DB::table('riderMessaging')->where('rider_id',$riderid)->update(['fcmid' =>$msgid]);
         $response['status'] = 'ok';
      
    
  return response()->json($response);  
}

public function updateclientmsgid($clientid,$msgid){
      $response=array();
      
      DB::table('clientMessaging')->where('client_id',$clientid)->update(['fcmid' =>$msgid]);
         $response['status'] = 'ok';
      
    
  return response()->json($response);  
}

function sendPushNotification($title,$message,$FCMtoken,$packageid,$tripstatus,$verificationcode,$notificationid,$riderid){
        $token = $FCMtoken;  
        $from = "AAAAeqyWOO4:APA91bH3-gSJVdaEgFOw5AzT6dmUeigtF0aZ_jNlt11kHN9_W8r0AJ2WfKbXhWHGDrwRsUgawMeZQi0QxQkLhdUIG3oM8un69ISInUKzVjhvYkfixosbfdkVObVa4mwprypf91MYekUt";
        $msg = array
              (
                'body'  => $message,
                'title' => $title,
                'receiver' => 'user',
                'icon'  => "https://troopa.org/dist/images/troopaRiderNew.fw.png ",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $dat=array('packageID'=>$packageid,'tripstatus'=>$tripstatus,'verificationcode' =>$verificationcode,'notificationID' =>$notificationid,'riderID' =>$riderid);

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg,
                     'data'  => $dat
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
      // dd($result);
        curl_close( $ch );
    }
    
    
     public function approachalert($orderid){
        
      $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
      
      //////// get client token id ////////////////
      $clientToken= AdminController::getClientToken($detail->client_id);
      
      //////////////// message to send ///////////
      
      $message="Troopa rider is close to package pickup location";
      
     
      
      $track= DB::table('all_process_track')->where('order_id', $orderid)->where('approach', 1)->first();
      
      if(empty($track->approach)){
          
           AdminController::sendClientNotification($detail->client_id,$message,$detail->order_serial,$detail->delivery_status,"","1",$detail->rider_id);
           DB::table('all_process_track')->where('order_id',$orderid)->update(['approach' =>1]);
         
      
                             
      }
        
    }
    
    public function pullpackageLog($packageID){
      $response=array();
      
      $packagelogs=DB::table('client_alert_msg')->where('packageid',$packageID)->get();
      
      if($packagelogs->count()>0){
      
       foreach($packagelogs as $packagelog){
         
       $response['timeline'][]=["message"=>$packagelog->msg,"time"=>$packagelog->created_at];
        }
         $response['status'] = 'ok';
          $response['message'] = 'all messages';
      }else{
          
          $response['status'] = 'ok';
          $response['message'] = 'empty record'; 
      }
    
  return response()->json($response);  
}


public function pullprocess($orderid){
      $response=array();
      
      $processlogs=DB::table('all_process_track')->where('order_id',$orderid)->get();
      
       foreach($processlogs as $processlog){
         
       $response['process'][]=["approach"=>$processlog->approach,"arrivePickup"=>$processlog->arrive_pickup,"startDelivery"=>$processlog->start_delivery,"approachDelivery"=>$processlog->approach_delivery,"arriveDelivery"=>$processlog->arrive_delivery];
        }
         $response['status'] = 'ok';
      
    
  return response()->json($response);  
}


 public function arrivealert($orderid){
     
       $response=array();
       
       
        
      $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
      
      //////// get client token id ////////////////
      $clientToken= AdminController::getClientToken($detail->client_id);
      
      //////////////// message to send ///////////
      
      $message="Troopa rider has arrived pickup location";
      
     
      
      $track= DB::table('all_process_track')->where('order_id', $orderid)->where('arrive_pickup', 1)->first();
      
      if(empty($track->arrive_pickup)){
          
          
           AdminController::sendClientNotification($detail->client_id,$message,$detail->order_serial,$detail->delivery_status,"","1",$detail->rider_id);
      
          
           DB::table('all_process_track')->where('order_id',$orderid)->update(['arrive_pickup' =>1]);
           
           $response['status'] = 'ok';
           
           
          
      
              
      }
      
       return response()->json($response); 
        
    }
    
    
    
    public function deliveryalert($orderid){
        
         $response=array();
         
         
         $track= DB::table('all_process_track')->where('order_id', $orderid)->where('start_delivery', 1)->first();
      
      if(empty($track->start_delivery)){
       
       
        
      $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
        
        
         $orderCode=AdminController::confirmation_code();
             
         $message="Troopa rider has started delivery of this package. The verification code is ".$orderCode;
                 
           
           AdminController::sendClientNotification($detail->client_id,$message,$detail->order_serial,$detail->delivery_status,$orderCode,"1",$detail->rider_id);
      
          
          DB::table('all_process_track')->where('order_id',$orderid)->update(['start_delivery' =>1]);
          
           DB::table('client_orders')->where('id', $orderid)->update(['order_code' => $orderCode]);
      }
           
          $response['status'] = 'ok';
               
              
        

         return response()->json($response);     
             
             
        
        
    }
    
    
   public function approachdeliveryalert($orderid,$type){
         
      $response=array();
        
      $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
      
      //////// get client token id ////////////////
      $clientToken= AdminController::getClientToken($detail->client_id);
      
      //////////////// message to send ///////////
      
      $message="Troopa rider is close to package delivery location";
      
      $track= DB::table('all_process_track')->where('order_id', $orderid)->where('approach_delivery', 1)->first();
      
      if(empty($track->approach) && $type==1){
          
           $message="Troopa rider is close to package delivery location";
         
           AdminController::sendClientNotification($detail->client_id,$message,$detail->order_serial,$detail->delivery_status,"","2",$detail->rider_id);
           DB::table('all_process_track')->where('order_id',$orderid)->update(['approach_delivery'=>1]);
      
      } else if(empty($track->approach) && $type==2){
      
          $message="Troopa rider is very close to package delivery location  now";
         
           AdminController::sendClientNotification($detail->client_id,$message,$detail->order_serial,$detail->delivery_status,"","2",$detail->rider_id);
      }
        
        
        $response['status'] = 'ok';
               
       
         return response()->json($response);      
        
    }
    
    
    
    
    public function arrivedeliveryalert($orderid){
         
      $response=array();
        
      $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
      
      //////// get client token id ////////////////
      $clientToken= AdminController::getClientToken($detail->client_id);
      
      //////////////// message to send ///////////
      
      $message="Troopa rider has got to package delivery location";
      
     
      
      $track= DB::table('all_process_track')->where('order_id', $orderid)->where('arrive_delivery', 1)->first();
      
      if(empty($track->approach)){
          
          
          
           AdminController::sendClientNotification($detail->client_id,$message,$detail->order_serial,$detail->delivery_status,"","1",$detail->rider_id);
      
         
      
          DB::table('all_process_track')->where('order_id',$orderid)->update(['arrive_delivery'=>1]);
      }
        
        
        $response['status'] = 'ok';
               
       
         return response()->json($response);      
        
    }
    
    
    public function triggernotification($clientid,$message,$packageid,$tripstatus,$verification){
        
          AdminController::sendClientNotificationTest($clientid,$message,$packageid,$tripstatus,$verification);
            
        
    }
    
    
     public function sendClientNotificationTest($clientid,$message,$packageid,$tripstatus,$verificationcode){
        
        
            
				 $title="Delivery Request";
			  AdminController::insert_client_alert_msg($clientid,$message,$packageid);
			 AdminController::sendPushNotificationTest($title,$message,AdminController::getClientToken($clientid),$packageid,$tripstatus,$verificationcode);
    }
    
    
    function sendPushNotificationTest($title,$message,$FCMtoken,$packageid,$tripstatus,$verificationcode){
        $token = $FCMtoken;  
        $from = "AAAAeqyWOO4:APA91bH3-gSJVdaEgFOw5AzT6dmUeigtF0aZ_jNlt11kHN9_W8r0AJ2WfKbXhWHGDrwRsUgawMeZQi0QxQkLhdUIG3oM8un69ISInUKzVjhvYkfixosbfdkVObVa4mwprypf91MYekUt";
        $msg = array
              (
                'body'  => $message,
                'title' => $title,
    
                'receiver' => 'user',
                'icon'  => "https://troopa.org/dist/images/troopaRiderNew.fw.png ",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );
              
               $dat=array('packageID'=>$packageid,'tripstatus'=>$tripstatus,'verificationcode' =>$verificationcode);

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg,
                     'data'  => $dat
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server 
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        dd($result);
        curl_close( $ch );
    }
    
   public function pullpilotinfo($rider){
       
         $response=array();
          $filterdistance= DB::table('pilots')->where('pilotID', $rider)->first(); 
          
          if(!empty($filterdistance->pilotID)){
         
        $response["ridername"]= $filterdistance->firstname;
         $response["riderid"]= $filterdistance->pilotID;
         $response["phone"]=$filterdistance->phone;
         $response["picture"]=$filterdistance->picture;
         $response["machine_manufactue"]=$filterdistance->machine_manufacture;
          $response["engine_size"]=$filterdistance->engine_size;
          $response["license_plate"]=$filterdistance->license_plate;
             $response["bike_color"]=$filterdistance->bike_color;
             $response["driver_license"]=$filterdistance->driver_license;
              $response["message"]="all record"; 
             
          }else{
              $response["message"]="empty record"; 
              
              
          }
       $response["status"]="ok";
        return response()->json($response);
   }
   
   
   public function checkforcancelled($trip){
       
        $trip= DB::table('client_orders')->where('id', $trip)->where('delivery_status', "cancelled")->get();  
        if($trip->count()>0){
            
             $response["status"]="cancelled";
            
        }
        else{
            
             $response["status"]="not cancelled";
            
        }
        
        return response()->json($response);
       
   }
   
   
   public function riderStatusCheck($riderid){
       
       $response=array();
       
        $riderId= DB::table('pilots')->where('pilotID', $riderid)->where('status', "1")->get(); 
        if($riderId->count()>0){
            
            $response["status"]="verified"; 
            
        }else{
            
          $response["status"]="not verified";  
          
            
        }
        
        return response()->json($response); 
        
       
   }
   
   
   public function riderStorePin($riderid,$pin){
       
       $response=array();
        if(!empty($riderid) && !empty($pin)){
            
                            $storepin= new rider_status_pin();
                            $storepin->riderID=$riderid;
                            $storepin->pin=$pin;
			                if($storepin->save()){ 
            
            $response["status"]="saved"; 
             $response["message"]="Your pin has been saved"; 
            
			                }
            
        }else{
            
          $response["status"]="not saved"; 
             $response["message"]="Something went wrong"; 
          
            
        }
        
        return response()->json($response); 
        
       
   }
   
   
   public function newrequest($id){
       
        DB::table('client_orders')->where('id',$id)->update(['delivery_status'=>"new",'treat_status'=>"new"]);
        
        echo"ok";
   }

}
