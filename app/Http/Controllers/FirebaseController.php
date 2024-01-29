<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Jcf\Geocode\Facades\Geocode;
use App\Models\tempdistance;
use App\Models\rider_orders;
use App\Models\trips_order_decline;
use App\Models\order_alert_msg;
use App\Models\customer_rider; 
use App\Models\rider_alert_msg;
use Notification;
use App\Notifications\SendPushNotification;


class FirebaseController extends Controller
{
    //
    
    private $database;
    
    
    

public function __construct()
{
    $this->database = \App\Services\FirebaseService::connect();
}




public function reAssignRider($clientid,$riderid,$pickupaddress,$orderid) 
{
    
   
      $response=array();
     
    $city="";
    $state="";
     $riderID=$riderid;
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
       
    $i = 0;
  
  foreach($riders as $rider){
      
      
    
      if($city=="Yenegoa"){
          
          $city2="Yenagoa";
      }else{
           $city2=$city;
          
      }
      
     
        if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$pickupaddress) < 450 && $rider['riderid'] !=$riderID && FirebaseController::riderDownOnlineStatus($rider['riderid'])=="online"){
     
     // if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && $rider['state']==$state && $rider['city']==$city2 && $rider['riderid'] !=$riderID){
          
          

           
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$clientid;
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$pickupaddress);
             $tempdistance->save();
             
           
           
      }
       
       
       
      $i++; 
       
       
  }
   $a=$i-1;
  if($a>0){
               $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first(); 
        
   if($filterdistance){
       
        $orderSerial =FirebaseController::pullState($pickupaddress)." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
       
          $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact=$filterdistance->phone;
                            $rider_orders->rider_id=$filterdistance->pilotID;
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                             $rider_orders->payment_mode=$detail->payment_mode;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                             $rider_orders->pickup_location_format=FirebaseController::FormatLocation($input['pickup_location']);
                             $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($input['dropoff_location'][$key]);
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
          
          
             FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");	
			 DB::table('tempdistance')->where('client_id',$clientid)->delete();
			 
			 $message="You have a delivery request from ".FirebaseController::getClientname($clientid);
			 $title="Delivery Request";
			 FirebaseController::sendPushNotification($title,$message,FirebaseController::getRiderToken($filterdistance->pilotID));
			 
			  FirebaseController::insert_rider_alert_msg($filterdistance->pilotID,$message);
			 
                
                 $customerrider= DB::table('customer_rider')->where('rider_id', $filterdistance->pilotID)->where('status',"new")->where('order_id',$rider_orders->id)->get(); 
                             if($customerrider->count()<1){
                            $customer_rider = new customer_rider();
                            $customer_rider->customer_id=$input['client_id'];
                            $customer_rider->riderid=$filterdistance->pilotID;
                            $customer_rider->status="new";
                            $customer_rider->order_id=$rider_orders->id;
			                $customer_rider->save();
							 
                             }
                  
         
       
   }
           
           
           
           
          
           
  }else{
      
      $orderSerial =FirebaseController::pullState($pickupaddress)." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
       
        $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                            $rider_orders->payment_mode=$detail->payment_mode;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                             $rider_orders->pickup_location_format=FirebaseController::FormatLocation($input['pickup_location']);
                             $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($input['dropoff_location'][$key]);
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
                            
                            if($rider_orders->save()){
                            $message="There is no rider around for now to pick up your package";
                 
             $order_alert_msg = new order_alert_msg();
             $order_alert_msg->client_id=$clientid;
            $order_alert_msg->rider_id="";
              $order_alert_msg->msg=$message;
              $order_alert_msg->save();
      
                            }
      
  }
   }else{
       
         $orderSerial =FirebaseController::pullState($pickupaddress)." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
               
       
        $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                             $rider_orders->payment_mode=$detail->payment_mode;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                             $rider_orders->pickup_location_format=FirebaseController::FormatLocation($input['pickup_location']);
                             $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($input['dropoff_location'][$key]);
                             $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
       
       
       
   }
   //return response()->json($response); 
   
    FirebaseController::statusUpdateChange($riderid,"online");
}



public function inputtext($number){
    
    echo date("g:i A");
    echo date("d M Y");
    
}

 public function reAssignMultipleRider($riderid,$clientid,$pickup_location,$option,$orderid)
{
    
   
      $response=array();
     
    $city="";
    $state="";
     $riderID=$riderid;
     $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
     
     $ridername="";
    
     $ridercontact="";
     
    
     //Formatted address
        $formattedAddr = str_replace(' ','+',$pickup_location);
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


        if($option=="Yes"){
            
            
          
            
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
      
     
       
      if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$pickup_location) < 450 && $rider['riderid'] !=$riderID && FirebaseController::riderDownOnlineStatus($rider['riderid'])=="online"){
     
         
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$clientid;
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$pickup_location);
             $tempdistance->save();
             
           
           
      }
       
       
       
      $i++; 
       
       
  }
   $a=$i-1;
  if($a>0){
      
    
               $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first(); 
        
   if(!empty($filterdistance)){
       
     
       
          $details= DB::table('client_orders')->where('client_id', $clientid)->where('rider_id', $riderID)->where('delivery_status',"new")->get(); 
          
          foreach($details as $detail){
                            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact=$filterdistance->phone;
                            $rider_orders->rider_id=$filterdistance->pilotID;
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                            $rider_orders->payment_mode=$detail->payment_mode;
                            $rider_orders->order_serial=$detail->order_serial;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=$detail->pickup_location_format;
                             $rider_orders->dropoff_location_format=$detail->dropoff_location_format;
                              $rider_orders->request_date=$detail->request_date;
                             $rider_orders->request_time=$detail->request_time;
                            $rider_orders->save();
          
          
          }
                  
         
       FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");	
	  DB::table('tempdistance')->where('client_id',$clientid)->delete();
	  
	  
	  		 $message="You have a delivery request from ".FirebaseController::getClientname($clientid);
	  		 $title="Delivery request";
			 FirebaseController::sendPushNotification($title,$message,FirebaseController::getRiderToken($filterdistance->pilotID));
			  FirebaseController::insert_rider_alert_msg($filterdistance->pilotID,$message);
			 
	  
	  
	                       
   }else{
       
      
        
       
       $details= DB::table('client_orders')->where('client_id', $clientid)->where('rider_id', $riderID)->where('delivery_status',"new")->get(); 
          
          foreach($details as $detail){
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                             $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                            $rider_orders->payment_mode=$detail->payment_mode;
                            $rider_orders->order_serial=$detail->order_serial;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=$detail->pickup_location_format;
                             $rider_orders->dropoff_location_format=$detail->dropoff_location_format;
                              $rider_orders->request_date=$detail->request_date;
                             $rider_orders->request_time=$detail->request_time;
                            $rider_orders->save();
          }
                            
                           
                            
       
       
       
   }
   
   	 
          
           
  }else{
      
      
         $details= DB::table('client_orders')->where('client_id', $clientid)->where('rider_id', $riderID)->where('delivery_status',"new")->get(); 
          
          foreach($details as $detail){
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                            $rider_orders->payment_mode=$detail->payment_mode;
                            $rider_orders->order_serial=$detail->order_serial;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=$detail->pickup_location_format;
                             $rider_orders->dropoff_location_format=$detail->dropoff_location_format;
                              $rider_orders->request_date=$detail->request_date;
                             $rider_orders->request_time=$detail->request_time;
                            $rider_orders->save();
          }
                            
                           
                            $message="There is no rider around for now to pick up your package";
                 
                             $order_alert_msg = new order_alert_msg();
                            $order_alert_msg->client_id=$clientid;
                            $order_alert_msg->rider_id="";
                            $order_alert_msg->msg=$message;
                            $order_alert_msg->save();
      
                            
      
  }
   }else{
       
                 
       
        $details= DB::table('client_orders')->where('client_id', $clientid)->where('rider_id', $riderID)->where('delivery_status',"new")->get(); 
          
          foreach($details as $detail){
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                             $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                            $rider_orders->payment_mode=$detail->payment_mode;
                            $rider_orders->order_serial=$detail->order_serial;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=$detail->pickup_location_format;
                             $rider_orders->dropoff_location_format=$detail->dropoff_location_format;
                              $rider_orders->request_date=$detail->request_date;
                             $rider_orders->request_time=$detail->request_time;
                            $rider_orders->save();
       
       
       
   }
   
   
            
   }         
            
            
            
        FirebaseController::statusUpdateChange($riderID,"online"); 
        
        
        
         $detailxs= DB::table('client_orders')->where('rider_id', $riderID)->where('client_id', $clientid)->where('delivery_status', "new")->get();
               foreach($detailxs as $detaili){
               $update= DB::table('client_orders')->where('id',$detaili->id)->update(['delivery_status' =>"decline",'treat_status' =>"old"]); 
               }
            
            
        }
        else if($option=="No"){
            
           
            
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
      
    
       
       if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$pickup_location) < 450 && $rider['riderid'] !=$riderID && FirebaseController::riderDownOnlineStatus($rider['riderid'])=="online"){
         
          

           
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$clientid;
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$pickup_location);
             $tempdistance->save();
             
           
           
      }
       
       
       
      $i++; 
       
       
  }
   $a=$i-1;
  if($a>0){
      
      
               $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first(); 
        
   if(!empty($filterdistance)){
       
       echo "good";
       
          $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact=$filterdistance->phone;
                            $rider_orders->rider_id=$filterdistance->pilotID;
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                             $rider_orders->payment_mode=$detail->payment_mode;
                              $rider_orders->order_serial=$detail->order_serial;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=$detail->pickup_location_format;
                             $rider_orders->dropoff_location_format=$detail->dropoff_location_format;
                              $rider_orders->request_date=$detail->request_date;
                             $rider_orders->request_time=$detail->request_time;
                            $rider_orders->save();
          
          
          
          
            FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");	
	        DB::table('tempdistance')->where('client_id',$clientid)->delete();
             $message="You have a delivery request from ".FirebaseController::getClientname($clientid);
	  		 $title="Delivery request";
			 FirebaseController::sendPushNotification($title,$message,FirebaseController::getRiderToken($filterdistance->pilotID));
			  FirebaseController::insert_rider_alert_msg($filterdistance->pilotID,$message);
         
       
            // $response["status"]="OK"  ;
            // $response["ridername"]= $filterdistance->firstname;
            //  $response["riderid"]= $filterdistance->pilotID;
            // $response["phone"]=$filterdistance->phone;
   }
   else{
       
       
       
         $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                             $rider_orders->payment_mode=$detail->payment_mode;
                              $rider_orders->order_serial=$detail->order_serial;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=$detail->pickup_location_format;
                             $rider_orders->dropoff_location_format=$detail->dropoff_location_format;
                              $rider_orders->request_date=$detail->request_date;
                             $rider_orders->request_time=$detail->request_time;
                            
                            
                            if($rider_orders->save()){
                            
      
                            }
       
       
   }
           DB::table('tempdistance')->where('client_id',$clientid)->delete();
           
  }else{
      
      
        $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                             $rider_orders->payment_mode=$detail->payment_mode;
                              $rider_orders->order_serial=$detail->order_serial;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=$detail->pickup_location_format;
                             $rider_orders->dropoff_location_format=$detail->dropoff_location_format;
                              $rider_orders->request_date=$detail->request_date;
                             $rider_orders->request_time=$detail->request_time;
                            
                            
                            if($rider_orders->save()){
                           
      
                            }
      
  }
   }else{
       
                 
       
        $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
          
          
            $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                           $rider_orders->client_id=$clientid;
                            $rider_orders->pickup_location= $detail->pickup_location;
                             $rider_orders->pickuplon=$detail->pickuplon;
                             $rider_orders->pickuplat=$detail->pickuplat;
                            $rider_orders->pickup_contact=$detail->pickup_contact;
                            $rider_orders->pickup_contact_name=$detail->pickup_contact_name;
                             $rider_orders->dropoff_contact_name=$detail->dropoff_contact_name;
                            $rider_orders->dropoff_location=$detail->dropoff_location;
                            $rider_orders->dropoff_contact=$detail->dropoff_contact;
                            $rider_orders->payment_type=$detail->payment_type;
                             $rider_orders->payment_mode=$detail->payment_mode;
                              $rider_orders->order_serial=$detail->order_serial;
                            $rider_orders->amount=$detail->amount;
                            $rider_orders->package_type=$detail->package_type;
                            $rider_orders->duration=$detail->duration;
                            $rider_orders->distance=$detail->distance;
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=$detail->pickup_location_format;
                             $rider_orders->dropoff_location_format=$detail->dropoff_location_format;
                              $rider_orders->request_date=$detail->request_date;
                             $rider_orders->request_time=$detail->request_time;
                             if($rider_orders->save()){
                            $message="There is no rider around for now to pick up your package";
                 
             $order_alert_msg = new order_alert_msg();
             $order_alert_msg->client_id=$clientid;
            $order_alert_msg->rider_id="";
              $order_alert_msg->msg=$message;
              $order_alert_msg->save();
      
                            }
       
       
       
   }
      
        FirebaseController::statusUpdateChange($riderID,"online"); 
      
        $update= DB::table('client_orders')->where('id',$orderid)->update(['delivery_status' =>"decline",'treat_status' =>"old"]); 
            
            
        }
        
        

   // FirebaseController::statusUpdateChange($riderID,"online");
   //return response()->json($response);   
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
 

   
  }
public function getdrivingparam($riderlatitude,$riderlongitude){
    
$address = '553W+FR5, Eyavwie guater 561101, Sagbama, Bayelsa';
$key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
if(!empty($address)){
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
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
                    echo $addrComp->long_name;
                }
        
      
    
}

                     foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'administrative_area_level_1'){
                    //Return the zipcode
                    echo $addrComp->long_name;
                }
        
      
    
}
}
}




// public function assignRiderToClient(Request $request) 
// {


//  $input =request()->all(); 
 
 
 
//       $response=array();
//     $city="";
//     $state="";
//      $key="AIzaSyARVQnTNKvSr3d9qyGIjRqgqFhrhXlyMPc";
//      //Formatted address
//          $formattedAddr = str_replace(' ','+',$input['pickup_location']);
//         //Send request and receive json data by address
//         $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key='.$key); 
//         $output1 = json_decode($geocodeFromAddr);
//         //Get latitude and longitute from json data
//         // $latitude  = $output1->results[0]->geometry->location->lat; 
//         // $longitude = $output1->results[0]->geometry->location->lng;
        
//         $addressComponents = $output1->results[0]->address_components;
//             foreach($addressComponents as $addrComp){
//                 if($addrComp->types[0] == 'administrative_area_level_2'){
//                     //Return the zipcode
//                     $city=$addrComp->long_name;
//                 }
        
      
    
// }

//                      foreach($addressComponents as $addrComp){
//                 if($addrComp->types[0] == 'administrative_area_level_1'){
//                     //Return the zipcode
//                     $state=$addrComp->long_name;
//                 }
        
      
    
// }


   
//   $riders=$this->database->getReference('RiderLocation')->getValue();
//   foreach($riders as $rider){
      
    
//       if($city=="Yenegoa"){
          
//           $city2="Yenagoa";
//       }else{
//           $city2=$city;
          
//       }
       
       
//       if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && $rider['state']==$state && $rider['city']==$city2 && FirebaseController::riderDownOnlineStatus($rider['riderid'])=="online"){
           
//           /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
//             $tempdistance = new tempdistance();
//             $tempdistance->client_id=$input['client_id'];
//             $tempdistance->rider_id=$rider['riderid'];
//             $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$input['pickup_location']);
//              $tempdistance->save();
             
           
           
//       }
       
       
       
      
       
       
//   }
  
  
//               $filterdistance= DB::table('tempdistance') 
//                     ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone','pilots.picture','pilots.machine_manufacture','pilots.engine_size','pilots.license_plate','pilots.bike_color','pilots.driver_license')
//                     ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
//                     ->orderBy('tempdistance.distance','desc')
//                     ->first(); 
        
//   if($filterdistance){
//             $riderresponse["ridername"]= $filterdistance->firstname;
//          $riderresponse["riderid"]= $filterdistance->pilotID;
//          $riderresponse["phone"]=$filterdistance->phone;
//          $riderresponse["picture"]=$filterdistance->picture;
//          $riderresponse["machine_manufactue"]=$filterdistance->machine_manufacture;
//           $riderresponse["engine_size"]=$filterdistance->engine_size;
//           $riderresponse["license_plate"]=$filterdistance->license_plate;
//              $riderresponse["bike_color"]=$filterdistance->bike_color;
//              $riderresponse["driver_license"]=$filterdistance->driver_license;
       
//             $response["status"]="OK"  ;
//              $response["message"]="client rider request submitted"  ;
//             $response["rider"]=$riderresponse  ;
           
			
			
			
// 		$condition = $input['dropoff_location'];	
       
//         foreach($condition as $key => $condition) {
           
            
			
			
			
// 			                $rider_orders = new rider_orders();
//                              $rider_orders->rider_contact=$filterdistance->phone;
//                             $rider_orders->rider_id=$filterdistance->pilotID;
//                             $rider_orders->client_id=$input['client_id'];
//                             $rider_orders->pickup_location= $input['pickup_location'];
//                             $rider_orders->pickup_contact=$input['pickup_contact'];
//                             $rider_orders->pickup_contact_name=$input['pickup_contact_name'];
//                              $rider_orders->dropoff_contact_name=$input['dropoff_contact_name'][$key];
//                             $rider_orders->dropoff_location=$input['dropoff_location'][$key];
//                             $rider_orders->dropoff_contact=$input['dropoff_contact'][$key];
//                             $rider_orders->payment_type=$input['payment_type'];
//                             $rider_orders->payment_mode=$input['payment_mode'];
//                             $rider_orders->amount=$input['amount'][$key];
//                             $rider_orders->package_type=$input['package_type'][$key];
//                             $rider_orders->duration=$input['duration'][$key];
//                             $rider_orders->distance=$input['distance'][$key];
//                             $rider_orders->delivery_status="new";
//                             $rider_orders->order_code="";
//                             $rider_orders->treat_status="new";
//                             $rider_orders->customer_rider_id=0;
//                             $rider_orders->save();
							 
							 
//                             FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");	
        
//             }
			
			
			
			
			
			
			
			
			
			
//   }
//           DB::table('tempdistance')->where('client_id',$input['client_id'])->delete();
		   
		   
		   
		   
		   
		   
		   
		   
		   
   
//   return response()->json($response);   
// }





public function assignRiderToClient(Request $request) 
{


 if($request->isMethod('post')){
      
      
      
  

 
      $input =$request->input();
 
       
      $response=array();
      $packageids=array();
    $city="";
    $state="";
     $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
     //Formatted address
         $formattedAddr = str_replace(' ','+',$input['pickup_location']);
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


   
  $riders=$this->database->getReference('RiderLocation')->getValue();
  
  if(!empty($riders)){
  foreach($riders as $rider){
      
    
      if($city=="Yenegoa"){
          
          $city2="Yenagoa";
      }else{
          $city2=$city;
          
      }
       
       
      if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$input['pickup_location']) < 450 && FirebaseController::riderDownOnlineStatus($rider['riderid'])=="online"){
           
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$input['client_id'];
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$input['pickup_location']);
             $tempdistance->save();
             
           
           
      }
       
       
       
      
       
       
  }
  
  
              $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone','pilots.picture','pilots.machine_manufacture','pilots.engine_size','pilots.license_plate','pilots.bike_color','pilots.driver_license')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first(); 
        
  if(!empty($filterdistance)){
            $riderresponse["ridername"]= $filterdistance->firstname;
         $riderresponse["riderid"]= $filterdistance->pilotID;
         $riderresponse["phone"]=$filterdistance->phone;
         $riderresponse["picture"]=$filterdistance->picture;
         $riderresponse["machine_manufactue"]=$filterdistance->machine_manufacture;
          $riderresponse["engine_size"]=$filterdistance->engine_size;
          $riderresponse["license_plate"]=$filterdistance->license_plate;
             $riderresponse["bike_color"]=$filterdistance->bike_color;
             $riderresponse["driver_license"]=$filterdistance->driver_license;
       
            $response["status"]="OK"  ;
             $response["message"]="client rider request submitted"  ;
            $response["rider"]=$riderresponse  ;
           
			
			
			
		$condition = $input['dropoff_location'];	
		
       
        foreach($condition as $key => $condition) {
           
            
			 $orderSerial =FirebaseController::pullState($input['pickup_location'])." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
 
			
			
			                $rider_orders = new rider_orders();
                             $rider_orders->rider_contact=$filterdistance->phone;
                            $rider_orders->rider_id=$filterdistance->pilotID;
                            $rider_orders->client_id=$input['client_id'];
                            $rider_orders->pickup_location= $input['pickup_location'];
                            $rider_orders->pickuplon=$input['pickuplon'];
                             $rider_orders->pickuplat=$input['pickuplat'];
                            $rider_orders->pickup_contact_name=$input['pickup_contact_name'];
                             $rider_orders->dropoff_contact_name=$input['dropoff_contact_name'][$key];
                            $rider_orders->dropoff_location=$input['dropoff_location'][$key];
                            $rider_orders->dropoff_contact=$input['dropoff_contact'][$key];
                            $rider_orders->dropoff_coordinates=json_encode($input['dropoff_coordinates'][$key]);
                            $rider_orders->payment_type=$input['payment_type'];
                            $rider_orders->payment_mode=strtolower($input['payment_mode']);
                            $rider_orders->amount=intval($input['amount'][$key]);
                            $rider_orders->package_type=$input['package_type'][$key];
                            $rider_orders->duration=$input['duration'][$key];
                            $rider_orders->distance=$input['distance'][$key];
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                             $rider_orders->pickup_location_format=FirebaseController::FormatLocation($input['pickup_location']);
                             $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($input['dropoff_location'][$key]);
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
                            
                            
                            $customerrider= DB::table('customer_rider')->where('riderid', $filterdistance->pilotID)->where('status',"new")->where('order_id',$rider_orders->id)->get(); 
                             if($customerrider->count()<1){
                            $customer_rider = new customer_rider();
                            $customer_rider->customer_id=$input['client_id'];
                            $customer_rider->riderid=$filterdistance->pilotID;
                            $customer_rider->status="new";
                            $customer_rider->order_id=$rider_orders->id;
			                $customer_rider->save();
			                
			                $packageids['packageids'][]=["packageid"=>$orderSerial];
							 
                             }
                           
        
            }
			
			$response["packageids"]=$packageids  ;
			
			
			
			
			
			 $requestCount= DB::table('client_orders')
      ->select('client_orders.id','client_orders.pickup_location','client_orders.dropoff_location','client_orders.package_type','client_orders.duration','client_orders.distance','client_orders.payment_type','client_orders.pickup_contact','client_orders.dropoff_contact','client_orders.dropoff_contact_name','client_orders.pickup_contact_name','client_orders.delivery_status','customers.picture','customers.fname','customers.lname')
      ->join('customers','customers.id','=','client_orders.client_id')
      ->where('client_orders.treat_status','NEW')
      ->where('client_orders.rider_id',$filterdistance->pilotID)
      ->get()->count(); 
                             
                             
                              $database->getReference('PickupRequest/'.$filterdistance->pilotID)->set(['riderID' => $filterdistance->pilotID ,'clientName' =>FirebaseController::getClientname($input['client_id']),'requestType' =>"multiple",'requestCount'=>$requestCount,'requestDate' =>date("d M Y"),'requestTime' =>date("g:i A")]);
                              
                             
						
			
			 FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");	
			 DB::table('tempdistance')->where('client_id',$input['client_id'])->delete();
			 
			 $message="You have a delivery request from ".FirebaseController::getClientname($input['client_id']);
			 $title="Delivery request";
			 FirebaseController::sendPushNotification($title,$message, FirebaseController::getRiderToken($filterdistance->pilotID));
			  FirebaseController::insert_rider_alert_msg($filterdistance->pilotID,$message);
			
			
			
			
			
			
  }else{
   
   
   
  $condition = $input['dropoff_location'];	
       
        foreach($condition as $key => $condition) {
           
            
			 $orderSerial =FirebaseController::pullState($input['pickup_location'])." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
 
			
			
			                $rider_orders = new rider_orders();
                             $rider_orders->rider_contact='nil';
                            $rider_orders->rider_id='nil';
                            $rider_orders->client_id=$input['client_id'];
                            $rider_orders->pickup_location= $input['pickup_location'];
                               $rider_orders->pickuplon=$input['pickuplon'];
                             $rider_orders->pickuplat=$input['pickuplat'];
                            $rider_orders->pickup_contact=$input['pickup_contact'];
                            $rider_orders->pickup_contact_name=$input['pickup_contact_name'];
                             $rider_orders->dropoff_contact_name=$input['dropoff_contact_name'][$key];
                            $rider_orders->dropoff_location=$input['dropoff_location'][$key];
                            $rider_orders->dropoff_contact=$input['dropoff_contact'][$key];
                              $rider_orders->dropoff_coordinates=json_encode($input['dropoff_coordinates'][$key]);
                            $rider_orders->payment_type=$input['payment_type'];
                            $rider_orders->payment_mode=strtolower($input['payment_mode']);
                            $rider_orders->amount=intval($input['amount'][$key]);
                            $rider_orders->package_type=$input['package_type'][$key];
                            $rider_orders->duration=$input['duration'][$key];
                            $rider_orders->distance=$input['distance'][$key];
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                             $rider_orders->pickup_location_format=FirebaseController::FormatLocation($input['pickup_location']);
                             $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($input['dropoff_location'][$key]);
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
                            
                            
                            
							 
							 
                          // FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");

                            $response["status"]="OK"  ;
                            $response["message"]="your request have been placed in a waiting list. There is no rider available now."  ;						   
        
            }
   
   
   
   
  }
          
		   
		   
		   
		}else{
		
		
		
		$condition = $input['dropoff_location'];	
       
        foreach($condition as $key => $condition) {
           
            
			
			 $orderSerial =FirebaseController::pullState($input['pickup_location'])." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
 
			
			                $rider_orders = new rider_orders();
                             $rider_orders->rider_contact='nil';
                            $rider_orders->rider_id='nil';
                            $rider_orders->client_id=$input['client_id'];
                            $rider_orders->pickup_location= $input['pickup_location'];
                              $rider_orders->pickuplon=$input['pickuplon'];
                             $rider_orders->pickuplat=$input['pickuplat'];
                            $rider_orders->pickup_contact=$input['pickup_contact'];
                            $rider_orders->pickup_contact_name=$input['pickup_contact_name'];
                             $rider_orders->dropoff_contact_name=$input['dropoff_contact_name'][$key];
                            $rider_orders->dropoff_location=$input['dropoff_location'][$key];
                              $rider_orders->dropoff_coordinates=json_encode($input['dropoff_coordinates'][$key]);
                            $rider_orders->dropoff_contact=$input['dropoff_contact'][$key];
                            $rider_orders->payment_type=$input['payment_type'];
                            $rider_orders->payment_mode=strtolower($input['payment_mode']);
                            $rider_orders->amount=intval($input['amount'][$key]);
                            $rider_orders->package_type=$input['package_type'][$key];
                            $rider_orders->duration=$input['duration'][$key];
                            $rider_orders->distance=$input['distance'][$key];
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                             $rider_orders->pickup_location_format=FirebaseController::FormatLocation($input['pickup_location']);
                             $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($input['dropoff_location'][$key]);
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
							 
							 
                          // FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");

                            $response["status"]="OK"  ;
                            $response["message"]="your request have been placed in a waiting list. There is no rider available now."  ;						   
        
            }
		
		
		}  
		   
		   
		   
		   
		   
   
  return response()->json($response);   
}
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
             
              FirebaseController::statusUpdateChange($detail->rider_id,"online");	
           
           FirebaseController::reAssignRider($detail->client_id,$detail->rider_id,$detail->pickup_location,$orderid);
           
           
          
           //////////////////////////////////// reassign to another rider ///////////////////////////////////////////////////////////
        
         return response()->json($response);
        
    }
    
    
    
    public static function multipledeclineorder($orderid,$reason,$option){
            $response=array();
          
           $trips_order_decline = new trips_order_decline();
            $trips_order_decline->order_id=$orderid;
            $trips_order_decline->decline_reason=$reason;
           if($trips_order_decline->save()){
               
               $detail= DB::table('client_orders')->where('id', $orderid)->first(); 
             FirebaseController::statusUpdateChange($detail->rider_id,"online");
             FirebaseController::reAssignMultipleRider($detail->rider_id,$detail->client_id,$detail->pickup_location,$option,$orderid);
             	
           
              
               $response['error'] ='false';  
               
           }
           
             
           
          
           //////////////////////////////////// reassign to another rider ///////////////////////////////////////////////////////////
        
         return response()->json($response);
        
    }
    
    
    
    
    
    
    
    
    
public function assignRiderSingle(Request $request) 
{


 $input =request()->all(); 
 
 
 
      $response=array();
    $city="";
    $state="";
     $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
     //Formatted address
         $formattedAddr = str_replace(' ','+',$input['pickup_location']);
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


   
  $riders=$this->database->getReference('RiderLocation')->getValue();
  foreach($riders as $rider){
      
    
      if($city=="Yenegoa"){
          
          $city2="Yenagoa";
      }else{
           $city2=$city;
          
      }
       
       
      if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$input['pickup_location']) < 50){
           
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$input['client_id'];
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$input['pickup_location']);
             $tempdistance->save();
             
           
           
      }
       
       
       
      
       
       
  }
  
  
               $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone','pilots.picture','pilots.machine_manufacture','pilots.engine_size','pilots.license_plate','pilots.bike_color','pilots.driver_license')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first(); 
        
   if($filterdistance){
            $riderresponse["ridername"]= $filterdistance->firstname;
         $riderresponse["riderid"]= $filterdistance->pilotID;
         $riderresponse["phone"]=$filterdistance->phone;
         $riderresponse["picture"]=$filterdistance->picture;
         $riderresponse["machine_manufactue"]=$filterdistance->machine_manufacture;
          $riderresponse["engine_size"]=$filterdistance->engine_size;
           $riderresponse["license_plate"]=$filterdistance->license_plate;
             $riderresponse["bike_color"]=$filterdistance->bike_color;
             $riderresponse["driver_license"]=$filterdistance->driver_license;
       
            $response["status"]="OK"  ;
             $response["message"]="client rider request submitted"  ;
            $response["rider"]=$riderresponse  ;
           
			
			
			
		$condition = $input['dropoff_location'];	
       
        foreach($condition as $key => $condition) {
           
            
			
			
			
			                 $rider_orders = new rider_orders();
                             $rider_orders->rider_contact=$filterdistance->phone;
                            $rider_orders->rider_id=$filterdistance->pilotID;
                            $rider_orders->client_id=$input['client_id'];
                            $rider_orders->pickup_location= $input['pickup_location'];
                            $rider_orders->pickup_contact=$input['pickup_contact'];
                            $rider_orders->pickup_contact_name=$input['pickup_contact_name'];
                             $rider_orders->dropoff_contact_name=$input['dropoff_contact_name'][$key];
                            $rider_orders->dropoff_location=$input['dropoff_location'][$key];
                            $rider_orders->dropoff_contact=$input['dropoff_contact'][$key];
                            $rider_orders->payment_type=$input['payment_type'];
                            $rider_orders->amount=$input['amount'][$key];
                            $rider_orders->package_type=$input['package_type'][$key];
                            $rider_orders->duration=$input['duration'][$key];
                            $rider_orders->distance=$input['distance'][$key];
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->pickup_location_format=FirebaseController::FormatLocation($input['pickup_location']);
                             $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($input['dropoff_location'][$key]);
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
                            
                             $customerrider= DB::table('customer_rider')->where('riderid', $filterdistance->pilotID)->where('status',"new")->where('order_id',$rider_orders->id)->get(); 
                             if($customerrider->count()<1){
                            $customer_rider = new customer_rider();
                            $customer_rider->customer_id=$input['client_id'];
                            $customer_rider->riderid=$filterdistance->pilotID;
                            $customer_rider->status="new";
                            $customer_rider->order_id=$rider_orders->id;
			                $customer_rider->save();
							 
                             }
							 
							 

        
            }
			
			
			
			
			
			
			
			
			
			
   }
           DB::table('tempdistance')->where('client_id',$input['client_id'])->delete();
		   
		   
		   
		   
		   
		   
		   
		   
		   
   
   return response()->json($response);   
}


public function assignRiderSinglePost(Request $request) 
{
   // echo $request->input('pickup_location');
   
 
 
 
      $response=array();
       $packageid="";
    $city="";
    $state="";
     $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
      $orderSerial =FirebaseController::pullState($request->input('pickup_location'))." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
  
     //Formatted address
         $formattedAddr = str_replace(' ','+',$request->input('pickup_location'));
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
      
     
       
      if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$request->input('pickup_location'))<450 && FirebaseController::riderDownOnlineStatus($rider['riderid'])=="online"){
          
          

           
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$request->input('client_id');
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$request->input('pickup_location'));
             $tempdistance->save();
             
           
           
      }
       
       
       
      $i++; 
       
       
  }
  $a=$i;
   
   
  if($a>0){
              $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone','pilots.picture','pilots.machine_manufacture','pilots.license_plate','pilots.engine_size','pilots.bike_color','pilots.driver_license')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first(); 
                    
                   
                    
                    
                    
                   
        
  if(!empty($filterdistance)){
       
       
       
       
       
       
							$rider_orders = new rider_orders();
                             $rider_orders->rider_contact=$filterdistance->phone;
                            $rider_orders->rider_id=$filterdistance->pilotID;
                            $rider_orders->client_id=$request->input('client_id');
                            $rider_orders->pickup_location=$request->input('pickup_location');
                             $rider_orders->pickuplon=$request->input('pickuplon');
                             $rider_orders->pickuplat=$request->input('pickuplat');
                            $rider_orders->pickup_contact=$request->input('pickup_contact');
                            $rider_orders->pickup_contact_name=$request->input('pickup_contact_name');
                             $rider_orders->dropoff_contact_name=$request->input('dropoff_contact_name');
                            $rider_orders->dropoff_location=$request->input('dropoff_location');
                             $rider_orders->dropoff_coordinates=json_encode($request->input('dropoff_coordinates'));
                            $rider_orders->dropoff_contact=$request->input('dropoff_contact');
                            $rider_orders->payment_type=$request->input('payment_type');
                            $rider_orders->payment_mode=strtolower($request->input('payment_mode'));
                            $rider_orders->amount=intval($request->input('amount'));
                            $rider_orders->package_type=$request->input('package_type');
                            $rider_orders->duration=$request->input('duration');
                            $rider_orders->distance=$request->input('distance');
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                             $rider_orders->pickup_location_format=FirebaseController::FormatLocation($request->input('pickup_location'));
                            $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($request->input('dropoff_location'));
                             $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            if($rider_orders->save()){
							
						$packageid=$orderSerial;	
							
							 $database = \App\Services\FirebaseService::connect();
    
                             //$database->getReference('RiderLocation/'.$filterdistance->phone)->push(['availability' => 'no']);
                             
                             
                              
                             
                             
                              $database->getReference('PickupRequest/'.$filterdistance->pilotID)->set(['riderID' => $filterdistance->pilotID ,'clientName' =>FirebaseController::getClientname($request->input('client_id')),'requestType' =>"single",'requestCount'=>"1",'requestDate' =>date("d M Y"),'requestTime' =>date("g:i A")]);
                              
                             
							FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");	
							
							$message="You have a delivery request from ".FirebaseController::getClientname($request->input('client_id'));
							$title="Delivery request";
			                FirebaseController::sendPushNotification($title,$message, FirebaseController::getRiderToken($filterdistance->pilotID));
			                 FirebaseController::insert_rider_alert_msg($filterdistance->pilotID,$message);
							
							}
							
							
							 $customerrider= DB::table('customer_rider')->where('riderid', $filterdistance->pilotID)->where('status',"new")->where('order_id',$rider_orders->id)->get(); 
                             if($customerrider->count()<1){
                            $customer_rider = new customer_rider();
                            $customer_rider->customer_id=$request->input('client_id');
                            $customer_rider->riderid=$filterdistance->pilotID;
                            $customer_rider->status="new";
                            $customer_rider->order_id=$rider_orders->id;
			                $customer_rider->save();
							 
                             }
							
							
				   $riderresponse["ridername"]= $filterdistance->firstname;
         $riderresponse["riderid"]= $filterdistance->pilotID;
         $riderresponse["phone"]=$filterdistance->phone;
         $riderresponse["picture"]=$filterdistance->picture;
         $riderresponse["machine_manufacture"]=$filterdistance->machine_manufacture;
          $riderresponse["engine_size"]=$filterdistance->engine_size;
          $riderresponse["license_plate"]=$filterdistance->license_plate;
             $riderresponse["bike_color"]=$filterdistance->bike_color;
             $riderresponse["driver_license"]=$filterdistance->driver_license;
             
       
            $response["status"]="OK"  ;
             $response["message"]="client rider request submitted"  ;
            $response["rider"]=$riderresponse  ;
             $response["packageid"]=$packageid;
            			
							
           
			 DB::table('tempdistance')->where('client_id',$request->input('client_id'))->delete();
							
							
							
							
  }else{
       
       
       
       
      $rider_orders = new rider_orders();
                             $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$request->input('client_id');
                            $rider_orders->pickup_location= $request->input('pickup_location');
                             $rider_orders->pickuplon=$request->input('pickuplon');
                             $rider_orders->pickuplat=$request->input('pickuplat');
                            $rider_orders->pickup_contact=$request->input('pickup_contact');
                            $rider_orders->pickup_contact_name=$request->input('pickup_contact_name');
                             $rider_orders->dropoff_contact_name=$request->input('dropoff_contact_name');
                            $rider_orders->dropoff_location=$request->input('dropoff_location');
                            $rider_orders->dropoff_contact=$request->input('dropoff_contact');
                              $rider_orders->dropoff_coordinates=json_encode($request->input('dropoff_coordinates'));
                            $rider_orders->payment_type=$request->input('payment_type');
                            $rider_orders->payment_mode=strtolower($request->input('payment_mode'));
                            $rider_orders->amount=intval($request->input('amount'));
                            $rider_orders->package_type=$request->input('package_type');
                            $rider_orders->duration=$request->input('duration');
                            $rider_orders->distance=$request->input('distance');
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                            $rider_orders->pickup_location_format=FirebaseController::FormatLocation($request->input('pickup_location'));
                            $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($request->input('dropoff_location'));
                             $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            
                            if($rider_orders->save()){
                            $message="There is no rider around for now to pick up your package";
                 
             $order_alert_msg = new order_alert_msg();
             $order_alert_msg->client_id=request()->input('client_id');
            $order_alert_msg->rider_id="";
              $order_alert_msg->msg=$message;
              $order_alert_msg->save();
			  
			  
			   $response["status"]="OK"  ;
             $response["message"]="your request have been placed in a waiting list. There is no rider available now."  ;
      
                            }
      
       
       
       
       
  }
          
           
           
         
          
           
  }else{
      
      
                            $rider_orders = new rider_orders();
                              $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$request->input('client_id');
                            $rider_orders->pickup_location= $request->input('pickup_location');
                             $rider_orders->pickuplon=$request->input('pickuplon');
                             $rider_orders->pickuplat=$request->input('pickuplat');
                            $rider_orders->pickup_contact=$request->input('pickup_contact');
                            $rider_orders->pickup_contact_name=$request->input('pickup_contact_name');
                             $rider_orders->dropoff_contact_name=$request->input('dropoff_contact_name');
                            $rider_orders->dropoff_location=$request->input('dropoff_location');
                              $rider_orders->dropoff_coordinates=json_encode($request->input('dropoff_coordinates'));
                            $rider_orders->dropoff_contact=$request->input('dropoff_contact');
                            $rider_orders->payment_type=$request->input('payment_type');
                            $rider_orders->payment_mode=strtolower($request->input('payment_mode'));
                            $rider_orders->amount=intval($request->input('amount'));
                            $rider_orders->package_type=$request->input('package_type');
                            $rider_orders->duration=$request->input('duration');
                            $rider_orders->distance=$request->input('distance');
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                          
                               $rider_orders->pickup_location_format=FirebaseController::FormatLocation($request->input('pickup_location'));
                            $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($request->input('dropoff_location'));
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            if($rider_orders->save()){
                            $message="There is no rider around for now to pick up your package";
                 
             $order_alert_msg = new order_alert_msg();
             $order_alert_msg->client_id=request()->input('client_id');
            $order_alert_msg->rider_id="";
              $order_alert_msg->msg=$message;
              $order_alert_msg->save();
			  
			  
			   $response["status"]="OK"  ;
             $response["message"]="your request have been placed in a waiting list. There is no rider available now."  ;
      
                            }
      
  }
  }else{
       
                 
       
                             $rider_orders = new rider_orders();
                              $rider_orders->rider_contact="nil";
                            $rider_orders->rider_id="nil";
                            $rider_orders->client_id=$request->input('client_id');
                            $rider_orders->pickup_location= $request->input('pickup_location');
                             $rider_orders->pickuplon=$request->input('pickuplon');
                             $rider_orders->pickuplat=$request->input('pickuplat');
                            $rider_orders->pickup_contact=$request->input('pickup_contact');
                            $rider_orders->pickup_contact_name=$request->input('pickup_contact_name');
                             $rider_orders->dropoff_contact_name=$request->input('dropoff_contact_name');
                            $rider_orders->dropoff_location=$request->input('dropoff_location');
                              $rider_orders->dropoff_coordinates=json_encode($request->input('dropoff_coordinates'));
                            $rider_orders->dropoff_contact=$request->input('dropoff_contact');
                            $rider_orders->payment_type=$request->input('payment_type');
                            $rider_orders->payment_mode=strtolower($request->input('payment_mode'));
                            $rider_orders->amount=intval($request->input('amount'));
                            $rider_orders->package_type=$request->input('package_type');
                            $rider_orders->duration=$request->input('duration');
                            $rider_orders->distance=$request->input('distance');
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                             $rider_orders->order_serial=$orderSerial;
                               $rider_orders->pickup_location_format=FirebaseController::FormatLocation($request->input('pickup_location'));
                            $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($request->input('dropoff_location'));
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
							
							$response["status"]="OK"  ;
                            $response["message"]="your request have been placed in a waiting list. There is no rider available now."  ;
       
       
       
  }
   
  return response()->json($response); 
}

   




public function onlyassignrider($clientid,$pickupaddress) 
{


 
 
 
 
      $response=array();
    $city="";
    $state="";
     $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
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


   
  $riders=$this->database->getReference('RiderLocation')->getValue();
  if(!empty($riders)){
       
    $i = 0;
  
  foreach($riders as $rider){
      
      
    
      if($city=="Yenegoa"){
          
          $city2="Yenagoa";
      }else{
           $city2=$city;
          
      }
      
     
       
      if($rider['onlinestatus']=="online" && $rider['availability']=="yes" && FirebaseController::checkdistance($rider['address'],$pickupaddress) < 50 && FirebaseController::riderDownOnlineStatus($rider['riderid'])=="online" ){
          
          

           
          /////////////////////////////////////////// get distance foreach riders //////////////////////////////
          
            $tempdistance = new tempdistance();
            $tempdistance->client_id=$clientid;
            $tempdistance->rider_id=$rider['riderid'];
            $tempdistance->distance=FirebaseController::checkdistance($rider['address'],$pickupaddress);
             $tempdistance->save();
             
           
           
      }
       
       
       
      $i++; 
       
       
  }
   
  if($a>0){
               $filterdistance= DB::table('tempdistance') 
                    ->select('tempdistance.rider_id','pilots.firstname','pilots.pilotID','pilots.phone','pilots.picture','pilots.machine_manufacture','pilots.license_plate','pilots.engine_size','pilots.bike_color','pilots.driver_license')
                    ->join('pilots','pilots.pilotID','=','tempdistance.rider_id')
                    ->orderBy('tempdistance.distance','desc')
                    ->first();  
        
   if($filterdistance){
       
       
							
							
							
							
						    FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");	
							
							
							
							
							
							
             $riderresponse["ridername"]= $filterdistance->firstname;
         $riderresponse["riderid"]= $filterdistance->pilotID;
         $riderresponse["phone"]=$filterdistance->phone;
         $riderresponse["picture"]=$filterdistance->picture;
         $riderresponse["machine_manufactue"]=$filterdistance->machine_manufacture;
          $riderresponse["engine_size"]=$filterdistance->engine_size;
           $riderresponse["license_plate"]=$filterdistance->license_plate;
             $riderresponse["bike_color"]=$filterdistance->bike_color;
             $riderresponse["driver_license"]=$filterdistance->driver_license;
       
            $response["status"]="OK"  ;
             $response["message"]="client rider request submitted"  ;
            $response["rider"]=$riderresponse  ;
			
							
							
		FirebaseController::statusUpdateChange($filterdistance->pilotID,"offline");					
							
   }
           DB::table('tempdistance')->where('client_id',$clientid)->delete();
           
           
         
          
           
  }else{
      
      
			  
			  
			   $response["status"]="OK"  ;
             $response["message"]="There is no rider available in this location for now."  ;
      
                            
      
  }
   }else{
       
                 
       
							$response["status"]="OK"  ;
                            $response["message"]="There is no rider available now."  ;
       
       
       
   
}

  return response()->json($response);  

}

public function uploadMultipleRequestNoAssign(Request $request) 
{


 $input =request()->all(); 
 
 
 
      $response=array();
//     $city="";
//     $state="";
//      $key="AIzaSyARVQnTNKvSr3d9qyGIjRqgqFhrhXlyMPc";
//      //Formatted address
//          $formattedAddr = str_replace(' ','+',$input['pickup_location']);
//         //Send request and receive json data by address
//         $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key='.$key); 
//         $output1 = json_decode($geocodeFromAddr);
//         //Get latitude and longitute from json data
//         // $latitude  = $output1->results[0]->geometry->location->lat; 
//         // $longitude = $output1->results[0]->geometry->location->lng;
        
//         $addressComponents = $output1->results[0]->address_components;
//             foreach($addressComponents as $addrComp){
//                 if($addrComp->types[0] == 'administrative_area_level_2'){
//                     //Return the zipcode
//                     $city=$addrComp->long_name;
//                 }
        
      
    
// }

//                      foreach($addressComponents as $addrComp){
//                 if($addrComp->types[0] == 'administrative_area_level_1'){
//                     //Return the zipcode
//                     $state=$addrComp->long_name;
//                 }
        
      
    
// }


   
			  $orderSerial =FirebaseController::pullState($request->input('pickup_location'))." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
  
			
			
		$condition = $input['dropoff_location'];	
       
        foreach($condition as $key => $condition) {
           
            
			
			
			
			                 $rider_orders = new rider_orders();
                             $rider_orders->rider_contact=$input['rider_contact'];
                            $rider_orders->rider_id=$input['rider_id'];
                            $rider_orders->client_id=$input['client_id'];
                            $rider_orders->pickup_location= $input['pickup_location'];
                            $rider_orders->pickup_contact=$input['pickup_contact'];
                            $rider_orders->pickup_contact_name=$input['pickup_contact_name'];
                             $rider_orders->dropoff_contact_name=$input['dropoff_contact_name'][$key];
                            $rider_orders->dropoff_location=$input['dropoff_location'][$key];
                            $rider_orders->dropoff_contact=$input['dropoff_contact'][$key];
                            $rider_orders->payment_type=$input['payment_type'];
							$rider_orders->payment_mode=request()->input('payment_mode');
                            $rider_orders->amount=$input['amount'][$key];
                            $rider_orders->package_type=$input['package_type'][$key];
                            $rider_orders->duration=$input['duration'][$key];
                            $rider_orders->distance=$input['distance'][$key];
                            $rider_orders->delivery_status="new";
                            $rider_orders->order_code="";
                            $rider_orders->treat_status="new";
                            $rider_orders->customer_rider_id=0;
                            $rider_orders->order_serial=$orderSerial;
                            $rider_orders->pickup_location_format=FirebaseController::FormatLocation($input['pickup_location']);
                             $rider_orders->dropoff_location_format=FirebaseController::FormatLocation($input['dropoff_location'][$key]);
                              $rider_orders->request_date=date("d M Y");
                             $rider_orders->request_time=date("g:i A");
                            $rider_orders->save();
							
							
							$response["status"]="OK"  ;
                            $response["message"]="client rider request submitted"  ;
                           						 
							 

        
            }
			
		   
		   
		                     $databasex = \App\Services\FirebaseService::connect();
    
                             $databasex->getReference('RiderLocation/'.$filterdistance->phone)->push(['availability' => 'no']);	 
		   
		   
		   
		   
		   
   
   return response()->json($response);   
}

 public function riderDownOnlineStatus($riderid){
     
     $onlineStatus="";
 
        $num= DB::table('pilots')->where('pilotID', $riderid)->get();
         $online= DB::table('pilots')->where('pilotID', $riderid)->first(); 
		if($num->count()>0){
						
      $onlineStatus= $online->available_status;
		}
		else if($num->count()<1){
	$onlineStatus="empty";	    
		    
		}
		
		return $onlineStatus;

    }
    
  public function statusUpdateChange($riderid,$status){
 
  

        $updaterid=DB::table('pilots')->where('pilotID', $riderid)->update(['available_status' =>$status]);
				
						
		
        

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


public function pullState($address)
{

$state="";
 $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
     //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=true_or_false&key='.$key); 
        $output1 = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        // $latitude  = $output1->results[0]->geometry->location->lat; 
        // $longitude = $output1->results[0]->geometry->location->lng;
        
        $addressComponents = $output1->results[0]->address_components;
          

                     foreach($addressComponents as $addrComp){
                if($addrComp->types[0] == 'administrative_area_level_1'){
                    //Return the zipcode
                    $state=$addrComp->long_name;
                }
        
      
    
}

if($state=="Federal Capital Territory"){
    $state="FCT";
}

    return $state;

}  

public function serialTest($address){
   $pilot_id=FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();
   
   
    $orderSerial =FirebaseController::pullState($address)." ".FirebaseController::firstTwo()."-".FirebaseController::SecondFour().FirebaseController::LastTwo();

  echo  $pilot_id."<br/>";
  echo  $orderSerial."<br/>";

}


public function pullCity($address)
{

$city="";
 $key="AIzaSyCGPDz4LFZeTDm_nSFZVpqVmRvaNP6UpF8";
     //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
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





    return $city;

} 

public function FormatLocation($address){
 
 $cityFormat=FirebaseController::pullState($address).", ".FirebaseController::pullCity($address);
 return $cityFormat;
 
 }
 
 
  public function onlinestatus2()
    {
        
        $database = \App\Services\FirebaseService::connect();
   
        $riders=$database->getReference('RiderLocation')->getValue();
        
        
        $pilots= DB::table('pilots')->get(); 
        $onlines= DB::table('pilots')->where('online_status',1)->get();
        $offlines= DB::table('pilots')->where('online_status',0)->get();
        return view('admin.online-status',['pilots'=>$riders,'online'=>count($riders),'offline'=>$offlines]);

    }
    
 
 public function onlinestatus()
    {
        
        $database = \App\Services\FirebaseService::connect();
   
        $riders=$database->getReference('RiderLocation')->getValue();
        
        
        $pilots= DB::table('pilots')->get(); 
        $onlines= DB::table('pilots')->where('online_status',1)->get();
        $offlines= DB::table('pilots')->where('online_status',0)->get();
        return view('admin.online-status',['pilots'=>$riders,'online'=>count($riders),'offline'=>$offlines]);

    }
 
 
public function allRidersOnline(){
    
    
     $database = \App\Services\FirebaseService::connect();
   
  $riders=$database->getReference('RiderLocation')->getValue();
  
  
  
  
  
  
  
} 


function sendPushNotification($title,$message,$FCMtoken){
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

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
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
    
    // public function getRiderToken($riderid){
        
    //      $token= DB::table('riderMessaging')->where('rider_id', $riderid)->first();
    //      return  $token->fcmid;
        
    // }
    
     public function getRiderToken($riderid){
        
        $fcmid="";
        
         $token= DB::table('riderMessaging')->where('rider_id', $riderid)->first();
         if(!empty($token)){
             
            $fcmid=$token->fcmid; 
         }else{
             
             $fcmid="nil"; 
         }
         
         return  $fcmid;
        
    }
    
     public function getClientname($clientid){
        
         $customer= DB::table('customers')->where('id',$clientid)->first();
         return  $customer->fname;
        
    }
    
     public function insert_rider_alert_msg($rider,$message){
        
            $rideralert = new rider_alert_msg();
            $rideralert->msg=$message;
            $rideralert->rider_id=$rider;
            $rideralert->read_status=1;
            $rideralert->save();  
        
        
        
    }
    
    
    public function cancelorder($orderSerial){
            $response=array();
          
         
               
               $update= DB::table('client_orders')->where('order_serial',$orderSerial)->update(['delivery_status' =>"cancelled",'treat_status' =>"old"]); 
               $response['error'] ='false';  
               
          
           
             $detail= DB::table('client_orders')->where('order_serial', $orderSerial)->first(); 
           
           
            FirebaseController::statusUpdateChange($detail->rider_id,"online");
            FirebaseController::sendPushNotification("Ride request",FirebaseController::getClientname($detail->client_id)." has cancelled his ride request",FirebaseController::getRiderToken($detail->rider_id));			
           FirebaseController::insert_rider_alert_msg($detail->rider_id,FirebaseController::getClientname($detail->client_id)." has cancelled the ride request");
            $response['status'] ='ok'; 
            $response['message'] ='ride cancelled successfully';
          
         return response()->json($response);
        
    }
    
    
    
    
    public function approachalert($orderid){
        
      $detail= DB::table('client_orders')->where('order_id', $orderid)->first();   
        
    }
    
    
  public function testfirebaseupdate(){
      
    
      
       $database = \App\Services\FirebaseService::connect();
        $database->getReference('PickupRequest/LB-2998QG')->set(['riderID' =>"LB-2998QG" ,'clientName' =>FirebaseController::getClientname("35"),'requestType' =>"single",'requestCount'=> "1",'requestDate' =>date("d M Y"),'requestTime' =>date("g:i A")]);
                            
      
  }  
    
}



