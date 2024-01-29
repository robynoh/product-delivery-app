<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('redirect', 'App\Http\Controllers\HomeController@index');
Route::get('formpage', 'App\Http\Controllers\UserController@formpage');

Route::get('users', 'App\Http\Controllers\UserController@index');
Route::get('users/list', 'App\Http\Controllers\UserController@list');
Route::post('users/createlist', 'App\Http\Controllers\UserController@createList');
Route::get('users/lists/delete/{list}', 'App\Http\Controllers\UserController@deleteList');
Route::get('users/listDetail/{list}/{type}', 'App\Http\Controllers\UserController@listDetail');
Route::post('users/addcontact/{list}', 'App\Http\Controllers\UserController@addContact');
Route::get('users/contact/delete/{list}', 'App\Http\Controllers\UserController@deleteContact');

Route::get('users/contactname/delete/{list}', 'App\Http\Controllers\UserController@deleteContactname');


Route::get('users/todayBirthday/{list}', 'App\Http\Controllers\UserController@todayBirthday');
Route::get('users/tomorrowBirthday/{list}', 'App\Http\Controllers\UserController@tomorrowBirthday');
Route::get('users/celebrantsByMonths/{list}', 'App\Http\Controllers\UserController@celebByMonth');
Route::get('users/monthExtract/{month}/{list}', 'App\Http\Controllers\UserController@monthExtract');
Route::get('users/name_phone_only/{list}', 'App\Http\Controllers\UserController@phone_name');
Route::post('users/phone_only/{list}', 'App\Http\Controllers\UserController@phone_only');
Route::get('users/phone_edit/{list}', 'App\Http\Controllers\UserController@phone_edit');
Route::put('users/phone_edit/{list}', 'App\Http\Controllers\UserController@phone_update');

Route::get('users/create_contact_list', 'App\Http\Controllers\UserController@create_contact_list');
Route::post('users/create_contact_list', 'App\Http\Controllers\UserController@create_phone_list');

Route::get('users/sentMessages', 'App\Http\Controllers\UserController@sentMessages');
Route::get('users/userProfile', 'App\Http\Controllers\UserController@userProfile');
Route::get('user/updatePassword', 'App\Http\Controllers\UserController@updatePassword');
Route::get('users/pricing', 'App\Http\Controllers\UserController@pricing');
Route::post('users/smstocontacts', 'App\Http\Controllers\UserController@smstocontacts');
Route::post('users/smstocontactsphone', 'App\Http\Controllers\UserController@smstocontactsphone');
Route::get('users/contactphone/delete/{list}', 'App\Http\Controllers\UserController@deletecontactphone');
Route::get('users/schedulesms/delete/{id}', 'App\Http\Controllers\UserController@deleteschedulesms');


Route::post('users/smstocontactstomorrow', 'App\Http\Controllers\UserController@smstocontacts2');
Route::post('users/smstocontactsmonth', 'App\Http\Controllers\UserController@smstocontacts3');
Route::get('users/schedule', 'App\Http\Controllers\UserController@schedule');
Route::post('users/autosms', 'App\Http\Controllers\UserController@autosms');
Route::get('users/scheduleList', 'App\Http\Controllers\UserController@scheduleList');
Route::get('users/deactivate/{list}', 'App\Http\Controllers\UserController@deactivateauto');
Route::get('users/scheduleUpdate/{list}/{type}/{extra}', 'App\Http\Controllers\UserController@scheduleupdate');
Route::post('users/scheduleUpdate/{list}', 'App\Http\Controllers\UserController@scheduleupdate2');
Route::post('users/multiplecontact/{list}', 'App\Http\Controllers\UserController@multiplecontact');
Route::post('users/multiplenamecontact/{list}', 'App\Http\Controllers\UserController@multiplenamecontact');
Route::post('users/schedulesms/{list}', 'App\Http\Controllers\UserController@schedulesms');
Route::post('users/schedulesms2/{list}', 'App\Http\Controllers\UserController@schedulesms2');

Route::post('users/changesenderid/{list}', 'App\Http\Controllers\UserController@changesenderid');
Route::post('users/changesenderid2/{list}', 'App\Http\Controllers\UserController@changesenderid2');

Route::put('users/nameschedulesms/{list}', 'App\Http\Controllers\UserController@nameschedulesms');

Route::post('users/multipleanniversary/{list}', 'App\Http\Controllers\UserController@multipleanniversary');
Route::get('users/autosendtype', 'App\Http\Controllers\UserController@autosendtype');
Route::get('users/contacts/{list}/{type}', 'App\Http\Controllers\UserController@listcontacts');
Route::get('users/done_list/{list}', 'App\Http\Controllers\UserController@donelist');
Route::get('users/singleupdate/{list}', 'App\Http\Controllers\UserController@singleupdate');
Route::get('users/multipleupdate/{list}', 'App\Http\Controllers\UserController@multipleupdate');
Route::put('users/updatemultipleinfo', 'App\Http\Controllers\UserController@multipleupdateinfo');
Route::get('users/pullcontactdetail/{contact}', 'App\Http\Controllers\UserController@pullcontact');
Route::get('users/pullsmsdetail/{contact}', 'App\Http\Controllers\UserController@pullsms');
Route::get('users/pullanniversarydetail/{contact}', 'App\Http\Controllers\UserController@pullanniversary');
Route::post('users/submitcontactupdate', 'App\Http\Controllers\UserController@submitcontactupdate');
Route::post('users/submitlistupdate', 'App\Http\Controllers\UserController@submitlistupdate');
Route::post('users/fileupload', 'App\Http\Controllers\UserController@fileupload');
Route::post('users/fileuploadname', 'App\Http\Controllers\UserController@fileuploadname');
Route::get('users/pulllistdetail/{list}', 'App\Http\Controllers\UserController@pulllistdetail');
Route::get('users/pullfielddetail/{list}', 'App\Http\Controllers\UserController@pulllfielddetail');
Route::post('users/addconfirmsms', 'App\Http\Controllers\UserController@submitcomfirmsms');
Route::post('users/updateconfirmsms', 'App\Http\Controllers\UserController@updatecomfirmsms');

Route::get('admin/pulluserdetail/{user}', 'App\Http\Controllers\AdminController@pulluserdetail');


Route::get('users/edit_field/{fieldid}', 'App\Http\Controllers\UserController@editfielddetail');
Route::put('users/edit_field/{fieldid}', 'App\Http\Controllers\UserController@updatefielddetail');

Route::get('users/senderid', 'App\Http\Controllers\UserController@senderid');
Route::post('users/processmultiplemsg/{list}', 'App\Http\Controllers\UserController@multipleprocessmsg');

Route::put('users/processmultiplemsgedit/{list}', 'App\Http\Controllers\UserController@multipleprocessmsgedit');

Route::get('users/download/{filename}/folder/{path}', 'App\Http\Controllers\UserController@download')->name('download');
Route::get('users/smsallcontacts/{list}/{type}', 'App\Http\Controllers\UserController@smsallcontact')->name('smsallcontacts');
Route::get('users/my_senderid', 'App\Http\Controllers\UserController@mysender');
Route::get('users/anniversary/delete/{ann}/{list}', 'App\Http\Controllers\UserController@deleteAnniversary');
Route::get('users/anniversarylist/delete/{list}', 'App\Http\Controllers\UserController@deleteanniversarylist');
Route::post('users/submitanniversaryupdate', 'App\Http\Controllers\UserController@submitanniversaryupdate');
Route::get('users/{list}/anniversary/{anntype}/{annid}', 'App\Http\Controllers\UserController@anniversaryexc');
Route::get('users/anniversary/today/{list}/{ann}/{annid}', 'App\Http\Controllers\UserController@todayannivlist');
Route::get('users/anniversary/tomorrow/{list}/{ann}/{annid}', 'App\Http\Controllers\UserController@tomorrowannivlist');
Route::get('users/anniversaryByMonths/{list}/{ann}/{annid}', 'App\Http\Controllers\UserController@anniversaryByMonth');
Route::get('users/annmonthExtract/{month}/{list}/{ann}/{annid}', 'App\Http\Controllers\UserController@annmonthExtract');

Route::get('admin/anniversary/today/{list}/{ann}/{annid}', 'App\Http\Controllers\AdminController@todayannivlist');
Route::get('admin/anniversary/tomorrow/{list}/{ann}/{annid}', 'App\Http\Controllers\AdminController@tomorrowannivlist');
Route::get('admin/anniversaryByMonths/{list}/{ann}/{annid}', 'App\Http\Controllers\AdminController@anniversaryByMonth');
Route::get('admin/annmonthExtract/{month}/{list}/{ann}/{annid}', 'App\Http\Controllers\AdminController@annmonthExtract');

Route::post('users/submitinfo', 'App\Http\Controllers\UserController@submitinfo');
Route::get('users/exportresponse', 'App\Http\Controllers\UserController@export');
Route::get('users/moreinfo', 'App\Http\Controllers\UserController@moreinfo');
Route::get('users/profile_view', 'App\Http\Controllers\UserController@profileview');
Route::post('users/profile_view', 'App\Http\Controllers\UserController@profilesubmit');
Route::get('users/create_form_stp2', 'App\Http\Controllers\UserController@form_step2')->name('formstp2');
Route::get('users/create_done_field', 'App\Http\Controllers\UserController@donefield')->name('donefield');
Route::get('users/create_done_field_edit', 'App\Http\Controllers\UserController@donefieldedit')->name('donefieldedit');

Route::get('users/custom_form_arrange', 'App\Http\Controllers\UserController@customarrange')->name('customarrange');
Route::post('users/custom_form_arrange', 'App\Http\Controllers\UserController@fieldarrange')->name('fieldarrange');

Route::get('users/custom_form_arrange_edit', 'App\Http\Controllers\UserController@customarrangeedit')->name('customarrangeedit');
Route::post('users/custom_form_arrange_edit', 'App\Http\Controllers\UserController@fieldarrangeedit')->name('fieldarrangeedit');

Route::get('users/custom_form_arrange_edit', 'App\Http\Controllers\UserController@customarrangeedit')->name('customarrangeedit');
Route::get('users/list_created/{list}', 'App\Http\Controllers\UserController@listcreated')->name('listcreated');

Route::get('users/form/delete', 'App\Http\Controllers\UserController@deletefrm');
Route::get('users/create_form_edit', 'App\Http\Controllers\UserController@formedit')->name('formedit');
Route::get('users/form_info_edit', 'App\Http\Controllers\UserController@forminfoedit')->name('forminfoedit');
Route::post('users/form_info_edit', 'App\Http\Controllers\UserController@form_info_update')->name('formupdate');


Route::get('users/create_form_sheet', 'App\Http\Controllers\UserController@form_step_sheet');
Route::get('users/removefield/{id}', 'App\Http\Controllers\UserController@removefield');
Route::post('users/processstate', 'App\Http\Controllers\UserController@processstate');
Route::post('users/pullfieldname', 'App\Http\Controllers\UserController@pullfieldname');
Route::get('users/new_field', 'App\Http\Controllers\UserController@newfield');
Route::post('users/new_field', 'App\Http\Controllers\UserController@addfield');
Route::get('users/response', 'App\Http\Controllers\UserController@response');

Route::post('users/response', 'App\Http\Controllers\UserController@deleterecord');

Route::get('users/resdetail/{id}', 'App\Http\Controllers\UserController@resdetail');
Route::get('users/response/delete/{id}', 'App\Http\Controllers\UserController@resdelete');



Route::get('users/new_field_edit', 'App\Http\Controllers\UserController@newfieldedit');
Route::post('users/new_field_edit', 'App\Http\Controllers\UserController@addfieldedit');

Route::get('form/{name}/{user}/{title}', 'App\Http\Controllers\UserController@displayform');
Route::post('form/{name}/{user}/{title}', 'App\Http\Controllers\UserController@postform');

Route::get('users/create_custom_field', 'App\Http\Controllers\UserController@customfield');
Route::post('users/create_custom_field', 'App\Http\Controllers\UserController@savecustomfield');

Route::get('users/create_custom_field_edit', 'App\Http\Controllers\UserController@customfieldedit');
Route::post('users/create_custom_field_edit', 'App\Http\Controllers\UserController@savecustomfield2');

Route::get('admin/sent_messages', 'App\Http\Controllers\AdminController@sentMessages');
Route::get('admin/smsdetail/{sms}', 'App\Http\Controllers\AdminController@smsdetail');
Route::get('admin/user_list', 'App\Http\Controllers\AdminController@userlist');




Route::post('users/processoption', 'App\Http\Controllers\UserController@processoption');
Route::post('users/displayprocessoption', 'App\Http\Controllers\UserController@displayprocessoption');
Route::post('users/processmenuoption', 'App\Http\Controllers\UserController@processmenuoption');


Route::post('users/displayprocessmenuoption', 'App\Http\Controllers\UserController@displayprocessmenuoption');

Route::post('users/deleteoption', 'App\Http\Controllers\UserController@deleteoption');
Route::post('users/deletemenuoption', 'App\Http\Controllers\UserController@deletemenuoption');



Route::get('admin/{list}/anniversary/{anntype}/{annid}', 'App\Http\Controllers\AdminController@anniversaryexc');


Route::get('users/collect_information', 'App\Http\Controllers\UserController@collectinfo')->name('collectinfo');
Route::get('users/create_form', 'App\Http\Controllers\UserController@createform');
Route::post('users/create_form', 'App\Http\Controllers\UserController@submitformfield');
Route::get('users/form_info', 'App\Http\Controllers\UserController@form_info');
Route::post('users/form_info', 'App\Http\Controllers\UserController@store_form_info');

Route::get('users/form_create', 'App\Http\Controllers\UserController@form_create')->name('form_create');



Route::get('admin/list', 'App\Http\Controllers\AdminController@list');
Route::get('admin/listDetail/{list}/{type}', 'App\Http\Controllers\AdminController@listDetail');
Route::get('admin/todayBirthday/{list}', 'App\Http\Controllers\AdminController@todayBirthday');
Route::get('admin/tomorrowBirthday/{list}', 'App\Http\Controllers\AdminController@tomorrowBirthday');
Route::get('admin/celebrantsByMonths/{list}', 'App\Http\Controllers\AdminController@celebByMonth');
Route::get('admin/scheduleList', 'App\Http\Controllers\AdminController@scheduleList');
Route::post('admin/createlist', 'App\Http\Controllers\AdminController@createList');
Route::post('admin/multiplecontact/{list}', 'App\Http\Controllers\AdminController@multiplecontact');
Route::get('admin/monthExtract/{month}/{list}', 'App\Http\Controllers\AdminController@monthExtract');
Route::get('admin/smsallcontacts/{list}/{type}', 'App\Http\Controllers\AdminController@smsallcontact')->name('smsallcontacts');
Route::get('admin/multipleupdate/{list}', 'App\Http\Controllers\AdminController@multipleupdate');
Route::get('admin/autosendtype', 'App\Http\Controllers\AdminController@autosendtype');
Route::post('admin/autosms', 'App\Http\Controllers\AdminController@autosms');
Route::get('admin/contacts/{list}/{type}', 'App\Http\Controllers\AdminController@listcontacts');
Route::post('admin/processmultiplemsg/{list}', 'App\Http\Controllers\AdminController@multipleprocessmsg');
Route::get('admin/done_list/{list}', 'App\Http\Controllers\AdminController@donelist');
Route::get('admin/scheduleUpdate/{list}/{type}', 'App\Http\Controllers\AdminController@scheduleupdate');
Route::get('admin/singleupdate/{list}', 'App\Http\Controllers\AdminController@singleupdate');
Route::get('admin/multipleupdate/{list}', 'App\Http\Controllers\AdminController@multipleupdate');
Route::put('admin/updatemultipleinfo', 'App\Http\Controllers\AdminController@multipleupdateinfo');
Route::post('admin/scheduleUpdate/{list}', 'App\Http\Controllers\AdminController@scheduleupdate2');
Route::get('admin/task/', 'App\Http\Controllers\AdminController@todaytask');
Route::get('admin/senderid/', 'App\Http\Controllers\AdminController@senderid');
Route::post('admin/senderidprocess', 'App\Http\Controllers\AdminController@processsenderid');
Route::get('admin/insertname/{sender}', 'App\Http\Controllers\AdminController@insertname');
Route::get('users/smsdetail/{sms}', 'App\Http\Controllers\UserController@smsdetail');
Route::post('users/resendsms', 'App\Http\Controllers\UserController@resend');
Route::post('users/createAnniversary', 'App\Http\Controllers\UserController@createAnniversary');

Route::post('users/sentMessages', 'App\Http\Controllers\UserController@filtermessage');


Route::middleware(['auth:sanctum', 'verified'])->get('admin/pullpilotdetail/{id}', 'App\Http\Controllers\AdminController@pullpilot');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/pullwithdrawdetail/{id}', 'App\Http\Controllers\AdminController@pullwithdrawdetail');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/approve-ticket/{id}', 'App\Http\Controllers\AdminController@approveticket');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilot/delete/{id}', 'App\Http\Controllers\AdminController@deletepilot');
Route::middleware(['auth:sanctum', 'verified'])->post('admin/perform-action', 'App\Http\Controllers\AdminController@performaction');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilot/{id}', 'App\Http\Controllers\AdminController@pilotdetail');
Route::middleware(['auth:sanctum', 'verified'])->put('admin/pilot/{id}', 'App\Http\Controllers\AdminController@editpilot');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/customers', 'App\Http\Controllers\AdminController@customers');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/customer/{id}', 'App\Http\Controllers\AdminController@customerdetail');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/online-status', 'App\Http\Controllers\FirebaseController@onlinestatus');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/orders', 'App\Http\Controllers\AdminController@allorders');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/order-assign/{id}', 'App\Http\Controllers\AdminController@assignorders');
Route::middleware(['auth:sanctum', 'verified'])->put('admin/order-assign/{id}', 'App\Http\Controllers\AdminController@postassignorders');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilot/{id}/payments', 'App\Http\Controllers\AdminController@pilotpaymentdetail');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilot/{id}/payment/card', 'App\Http\Controllers\AdminController@pilotcardpaymentdetail');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilot/{id}/withdraw-history', 'App\Http\Controllers\AdminController@withdrawhistory');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/complains', 'App\Http\Controllers\AdminController@pullcomplains');


Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilot/{id}/cancelled-trips', 'App\Http\Controllers\AdminController@canceltrips');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilot/{id}/delivered-trips', 'App\Http\Controllers\AdminController@deliveredorder');

Route::middleware(['auth:sanctum', 'verified'])->post('admin/search-request', 'App\Http\Controllers\AdminController@requestsearch');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/waiting-list', 'App\Http\Controllers\AdminController@waitinglist');


Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilot/{id}/payment/cash', 'App\Http\Controllers\AdminController@pilotcashpaymentdetail');

Route::middleware(['auth:sanctum', 'verified'])->post('admin/pilot/{id}/payment/cash', 'App\Http\Controllers\AdminController@remitcash');


Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilots/payments/', 'App\Http\Controllers\AdminController@allpayment');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/all-platform-earning', 'App\Http\Controllers\AdminController@allplatformearning');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/all-withdraws', 'App\Http\Controllers\AdminController@allwithdrawals');


Route::middleware(['auth:sanctum', 'verified'])->post('admin/pilots/payments/', 'App\Http\Controllers\AdminController@filterpayment');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilots/all-card-payments/', 'App\Http\Controllers\AdminController@allcardpayment');

Route::middleware(['auth:sanctum', 'verified'])->post('admin/pilots/all-card-payments/', 'App\Http\Controllers\AdminController@filtercardpayment');
Route::middleware(['auth:sanctum', 'verified'])->post('admin/pilots/all-cash-payments/', 'App\Http\Controllers\AdminController@filtercashpayment');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilots/all-cash-payments/', 'App\Http\Controllers\AdminController@allcashpayment');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/accounts', 'App\Http\Controllers\AdminController@allaccounts');
Route::middleware(['auth:sanctum', 'verified'])->post('admin/accounts', 'App\Http\Controllers\AdminController@postaccounts');
Route::middleware(['auth:sanctum', 'verified'])->put('admin/editaccount', 'App\Http\Controllers\AdminController@editaccounts');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/pilots', 'App\Http\Controllers\AdminController@pilots');
Route::middleware(['auth:sanctum', 'verified'])->post('admin/pilots', 'App\Http\Controllers\AdminController@createnewpilot');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/new_pilot/', 'App\Http\Controllers\AdminController@newpilot');


Route::middleware(['auth:sanctum', 'verified'])->post('admin/new_pilot/', 'App\Http\Controllers\AdminController@postnewpilot');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/real-time-track/', 'App\Http\Controllers\AdminController@locationtrack');

Route::middleware(['auth:sanctum', 'verified'])->post('admin/reassign-waiting-order/', 'App\Http\Controllers\AdminController@assignwaitingorder');



Route::middleware(['auth:sanctum', 'verified'])->get('admin', 'App\Http\Controllers\AdminController@index');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/pullaccountdetail/{user}', 'App\Http\Controllers\AdminController@pullaccountdetail');
Route::middleware(['auth:sanctum', 'verified'])->get('admin/account/delete/{id}', 'App\Http\Controllers\AdminController@deleteaccount');


Route::middleware(['auth:sanctum', 'verified'])->get('admin/pullallcustomerdetail/{id}', 'App\Http\Controllers\AdminController@pullallcustomeruserdetail');

Route::middleware(['auth:sanctum', 'verified'])->get('admin/allcustomers/delete/{id}', 'App\Http\Controllers\AdminController@deleteallcustomers');


Route::get('api/testfire', 'App\Http\Controllers\FirebaseController@testfirebaseupdate');

// ////////APIs//////////////////
// Route::get('api/checkifexist/{phone}', 'App\Http\Controllers\AdminController@checkexist');
// Route::get('api/sendotp/{phone}', 'App\Http\Controllers\AdminController@sendotp');
// Route::get('api/otppairing/{phone}/{otp}', 'App\Http\Controllers\AdminController@otppairing');
// Route::post('api/registration', 'App\Http\Controllers\AdminController@registerrider');
// Route::get('api/ifemailexist/{phone}/', 'App\Http\Controllers\AdminController@ifemailexist');

// Route::get('api/go_online_status/{riderid}/', 'App\Http\Controllers\AdminController@go_online_status');

// Route::get('api/pickuprequest/{phone}/', 'App\Http\Controllers\AdminController@pickuprequest');
// Route::get('api/updateorder/{orderid}/', 'App\Http\Controllers\AdminController@updateorder');
// Route::get('api/updatedeliveryprocess/{orderid}/', 'App\Http\Controllers\AdminController@updelprocess');

// Route::get('api/declineorder/{orderid}/{reason}', 'App\Http\Controllers\FirebaseController@declineorder');
// Route::get('api/all-recent-request/{riderid}', 'App\Http\Controllers\AdminController@recentrequest');

// Route::get('api/all-withdraw-request/{riderid}', 'App\Http\Controllers\AdminController@allwithdrawrequest');

// Route::get('api/arrivalcheck/{orderid}', 'App\Http\Controllers\AdminController@arrivalcheck');

// Route::get('api/login/{phone}/{password}', 'App\Http\Controllers\AdminController@loginnow');

// Route::get('api/register/{phone}/{email}/{vendor}/{fullname}/{password}', 'App\Http\Controllers\AdminController@registerclient');

// Route::get('api/deliverycheck/{orderid}', 'App\Http\Controllers\AdminController@deliverycheck');

// Route::get('api/updatedeliveryprocesscheck/{orderid}/', 'App\Http\Controllers\AdminController@updatedeliveryprocess');

// Route::get('api/forgotpasscode/{phone}', 'App\Http\Controllers\AdminController@passrestphone');
// Route::get('api/forgotpasscode2/{phone}', 'App\Http\Controllers\AdminController@passrestphone2');

// Route::get('api/otppass/{otp}/{pass}/{id}', 'App\Http\Controllers\AdminController@changepass');
// Route::get('api/otppass2/{otp}/{pass}/{id}', 'App\Http\Controllers\AdminController@changepassrider');

// Route::get('api/calculatecost/{pickupaddress}/{destinationaddress}', 'App\Http\Controllers\AdminController@calculatetripcost');

// Route::get('api/riderrequest/{clientid}/{deliveryStatus}/{page}', 'App\Http\Controllers\AdminController@riderrequest');

// //Route::get('api/clientorder/{clientid}/{riderid}', 'App\Http\Controllers\AdminController@allclientorder');
// Route::get('api/clientorder/{riderid}', 'App\Http\Controllers\AdminController@allclientorder');
// Route::get('api/payatdeliverycheck/{orderid}/{riderid}', 'App\Http\Controllers\AdminController@arrivalpaycheck');

// Route::get('api/confirm-delivery/{client_id}/{rider_id}/{amount}/{order_id}/{code}', 'App\Http\Controllers\AdminController@confirmdelivery');

// Route::get('api/assign-rider/{clientid}/{pickupaddress}/', 'App\Http\Controllers\FirebaseController@onlyAssignrider');

// Route::get('api/log-rider-msg-id/{riderid}/{msgid}', 'App\Http\Controllers\AdminController@logmsgid');


// Route::get('api/update-rider-msg-id/{riderid}/{msgid}', 'App\Http\Controllers\AdminController@updatemsgid');


// Route::get('api/log-client-msg-id/{clientid}/{msgid}', 'App\Http\Controllers\AdminController@clientlogmsgid');
// Route::get('api/update-client-msg-id/{clientid}/{msgid}', 'App\Http\Controllers\AdminController@updateclientmsgid');


// Route::get('api/distancecheck/{plat}/{plng}/{rlat}/{flng}', 'App\Http\Controllers\FirebaseController@getdrivingparam');

// Route::get('api/reassign-assign-rider/{clientid}/{pickupaddress}/', 'App\Http\Controllers\FirebaseController@assignRider');

// Route::get('api/checkdistance/{address}/{pickupaddress}/', 'App\Http\Controllers\AdminController@checkdistance2');

// Route::post('api/assign-rider-option', 'App\Http\Controllers\FirebaseController@assignRiderToClient');


// Route::post('api/assign-rider-single-post', 'App\Http\Controllers\FirebaseController@assignRiderSinglePost');

// Route::post('api/upload-multiple-no-rider-assign', 'App\Http\Controllers\FirebaseController@uploadMultipleRequestNoAssign');


// Route::get('api/texttext/{title}/', 'App\Http\Controllers\AdminController@getClientToken');

// Route::get('api/texttext2/{riderid}/{msg}', 'App\Http\Controllers\FirebaseController@insert_rider_alert_msg');

// Route::get('api/process-pay/{status}/{success}/{amount}/{paymentid}/{txref}/{clientid}/{riderid}/{orderid}', 'App\Http\Controllers\AdminController@processcardpay');

// Route::get('api/update-pilot-status/{riderid}/{status}', 'App\Http\Controllers\AdminController@statusUpdate');

// Route::get('api/checkonlinestatus/{riderid}', 'App\Http\Controllers\AdminController@riderDownOnlineStatus');

// Route::get('api/rider-cash-payment/{riderid}', 'App\Http\Controllers\AdminController@ridercashpayment');

// Route::get('api/serial/{address}', 'App\Http\Controllers\FirebaseController@serialTest');

// Route::get('api/rider-card-payment/{riderid}', 'App\Http\Controllers\AdminController@ridercardpayment');

// Route::get('api/pull-confirmed-trip/{riderid}', 'App\Http\Controllers\AdminController@pulledconfirmed');
// Route::get('api/pull-decline-trip/{riderid}', 'App\Http\Controllers\AdminController@pulldeclined');
// Route::get('api/rider-stat/{riderid}', 'App\Http\Controllers\AdminController@riderstat');

// Route::get('api/easy-login/{phone}/{password}', 'App\Http\Controllers\AdminController@easyLogin');

// Route::get('api/pull-cash-payment-daily/{rider}/{day}/{month}/{year}', 'App\Http\Controllers\AdminController@ridercashpaymentdaysort');
// Route::get('api/pull-cash-payment-weekly/{rider}', 'App\Http\Controllers\AdminController@ridercashpaymentweeksort');
// Route::get('api/pull-cash-payment-monthly/{rider}', 'App\Http\Controllers\AdminController@ridercashpaymentmonthsort');

// Route::get('api/pull-card-payment-daily/{rider}/{day}/{month}/{year}', 'App\Http\Controllers\AdminController@ridercardpaymentdaysort');
// Route::get('api/pull-card-payment-weekly/{rider}', 'App\Http\Controllers\AdminController@ridercardpaymentweeksort');
// Route::get('api/pull-card-payment-monthly/{rider}', 'App\Http\Controllers\AdminController@ridercardpaymentmonthsort');

// Route::get('api/update-online-time/{rider}/{time}', 'App\Http\Controllers\AdminController@time_online');

// Route::get('api/declinemultipleorder/{orderid}/{reason}/{option}', 'App\Http\Controllers\FirebaseController@multipledeclineorder');

// Route::get('api/weekly-earning/{number}', 'App\Http\Controllers\AdminController@weeklyEarning');
// Route::get('api/rider-withdraw/{rider}/{withdraw}/{balance}', 'App\Http\Controllers\AdminController@riderwithdraw');
// Route::get('api/support-issue/{riderid}/{title}/{description}/{type}', 'App\Http\Controllers\AdminController@supportissue');

// Route::get('api/all-platform-earnings/{riderid}', 'App\Http\Controllers\AdminController@platformcharge');
// Route::get('api/cancel-ride-request/{packageid}', 'App\Http\Controllers\FirebaseController@cancelorder');

// Route::get('api/approach-alert/{orderid}', 'App\Http\Controllers\AdminController@approachalert');

// Route::get('api/package-timeline/{packageid}', 'App\Http\Controllers\AdminController@pullpackageLog');

// Route::get('api/all-process-tracker/{orderid}', 'App\Http\Controllers\AdminController@pullprocess');

// Route::get('api/arrive-alert/{orderid}', 'App\Http\Controllers\AdminController@arrivealert');

// Route::get('api/start-delivery-alert/{orderid}', 'App\Http\Controllers\AdminController@deliveryalert');

// Route::get('api/delivery-approach-alert/{orderid}/{type}', 'App\Http\Controllers\AdminController@approachdeliveryalert'); 
// Route::get('api/arrive-delivery-alert/{orderid}', 'App\Http\Controllers\AdminController@arrivedeliveryalert');

// Route::get('api/trigger-notification/{clientid}/{message}/{packageid}/{tripstatus}/{verificationcode}', 'App\Http\Controllers\AdminController@triggernotification');

// Route::get('api/pull-pilots-info/{pilot}', 'App\Http\Controllers\AdminController@pullpilotinfo');

// Route::get('api/check-cancelled-trip/{trip}', 'App\Http\Controllers\AdminController@checkforcancelled');



////////APIs//////////////////
Route::get('api/checkifexist/{phone}', 'App\Http\Controllers\AdminController@checkexist');
Route::get('api/sendotp/{phone}', 'App\Http\Controllers\AdminController@sendotp');
Route::get('api/otppairing/{phone}/{otp}', 'App\Http\Controllers\AdminController@otppairing');
Route::post('api/registration', 'App\Http\Controllers\AdminController@registerrider');
Route::get('api/ifemailexist/{phone}/', 'App\Http\Controllers\AdminController@ifemailexist');

Route::get('api/phone-validate/{phone}', 'App\Http\Controllers\AdminController@phonevalidate');

Route::get('api/email-validate/{email}', 'App\Http\Controllers\AdminController@emailvalidate');

Route::get('api/go_online_status/{riderid}/', 'App\Http\Controllers\AdminController@go_online_status');

Route::get('api/pickuprequest/{phone}/', 'App\Http\Controllers\AdminController@pickuprequest');

Route::get('api/updateorder/{orderid}/', 'App\Http\Controllers\AdminController@updateorder');
Route::get('api/new-request-test/{orderid}/', 'App\Http\Controllers\AdminController@newrequest');

Route::get('api/accept-request/{orderid}/', 'App\Http\Controllers\AdminController@updateorder');

Route::get('api/decline-request/{orderid}/{reason}', 'App\Http\Controllers\FirebaseController@declineorder');


Route::get('api/updatedeliveryprocess/{orderid}/', 'App\Http\Controllers\AdminController@updelprocess');

Route::get('api/declineorder/{orderid}/{reason}', 'App\Http\Controllers\FirebaseController@declineorder');
Route::get('api/all-recent-request/{riderid}', 'App\Http\Controllers\AdminController@recentrequest');

Route::get('api/recent-multiple-request/{riderid}', 'App\Http\Controllers\AdminController@recentrequest');

Route::get('api/all-rider-request/{riderid}', 'App\Http\Controllers\AdminController@allriderrequest');


Route::get('api/recent-single_request/{riderid}/', 'App\Http\Controllers\AdminController@singlerecentrequest');


Route::get('api/all-withdraw-request/{riderid}', 'App\Http\Controllers\AdminController@allwithdrawrequest');

Route::get('api/arrivalcheck/{orderid}', 'App\Http\Controllers\AdminController@arrivalcheck');

Route::get('api/login/{phone}/{password}', 'App\Http\Controllers\AdminController@loginnow');

Route::get('api/register/{phone}/{email}/{vendor}/{fullname}/{password}', 'App\Http\Controllers\AdminController@registerclient');

Route::get('api/deliverycheck/{orderid}', 'App\Http\Controllers\AdminController@deliverycheck');

Route::get('api/updatedeliveryprocesscheck/{orderid}/', 'App\Http\Controllers\AdminController@updatedeliveryprocess');

Route::get('api/forgotpasscode/{phone}', 'App\Http\Controllers\AdminController@passrestphone');
Route::get('api/forgotpasscode2/{phone}', 'App\Http\Controllers\AdminController@passrestphone2');

Route::get('api/otppass/{otp}/{pass}/{id}', 'App\Http\Controllers\AdminController@changepass');
Route::get('api/otppass2/{otp}/{pass}/{id}', 'App\Http\Controllers\AdminController@changepassrider');

Route::get('api/calculatecost/{pickupaddress}/{destinationaddress}', 'App\Http\Controllers\AdminController@calculatetripcost');

Route::get('api/riderrequest/{clientid}/{deliveryStatus}/{page}', 'App\Http\Controllers\AdminController@riderrequest');

//Route::get('api/clientorder/{clientid}/{riderid}', 'App\Http\Controllers\AdminController@allclientorder');
Route::get('api/clientorder/{riderid}', 'App\Http\Controllers\AdminController@allclientorder');
Route::get('api/payatdeliverycheck/{orderid}/{riderid}', 'App\Http\Controllers\AdminController@arrivalpaycheck');

Route::get('api/confirm-delivery/{client_id}/{rider_id}/{amount}/{order_id}/{code}', 'App\Http\Controllers\AdminController@confirmdelivery');

Route::get('api/assign-rider/{clientid}/{pickupaddress}/', 'App\Http\Controllers\FirebaseController@onlyAssignrider');

Route::get('api/log-rider-msg-id/{riderid}/{msgid}', 'App\Http\Controllers\AdminController@logmsgid');


Route::get('api/update-rider-msg-id/{riderid}/{msgid}', 'App\Http\Controllers\AdminController@updatemsgid');


Route::get('api/log-client-msg-id/{clientid}/{msgid}', 'App\Http\Controllers\AdminController@clientlogmsgid');
Route::get('api/update-client-msg-id/{clientid}/{msgid}', 'App\Http\Controllers\AdminController@updateclientmsgid');


Route::get('api/distancecheck/{plat}/{plng}/{rlat}/{flng}', 'App\Http\Controllers\FirebaseController@getdrivingparam');

Route::get('api/reassign-assign-rider/{clientid}/{pickupaddress}/', 'App\Http\Controllers\FirebaseController@assignRider');

Route::get('api/checkdistance/{address}/{pickupaddress}/', 'App\Http\Controllers\AdminController@checkdistance2');

Route::post('api/assign-rider-option', 'App\Http\Controllers\FirebaseController@assignRiderToClient');


Route::post('api/assign-rider-single-post', 'App\Http\Controllers\FirebaseController@assignRiderSinglePost');

Route::post('api/upload-multiple-no-rider-assign', 'App\Http\Controllers\FirebaseController@uploadMultipleRequestNoAssign');


Route::get('api/texttext/{add1}/{add2}', 'App\Http\Controllers\AdminController@checkdistance');

Route::get('api/texttext2/{riderid}/{msg}', 'App\Http\Controllers\FirebaseController@insert_rider_alert_msg');

Route::get('api/process-pay/{status}/{success}/{amount}/{paymentid}/{txref}/{clientid}/{riderid}/{orderid}', 'App\Http\Controllers\AdminController@processcardpay');

Route::get('api/update-pilot-status/{riderid}/{status}', 'App\Http\Controllers\AdminController@statusUpdate');

Route::get('api/checkonlinestatus/{riderid}', 'App\Http\Controllers\AdminController@riderDownOnlineStatus');

Route::get('api/rider-cash-payment/{riderid}', 'App\Http\Controllers\AdminController@ridercashpayment');

Route::get('api/serial/{address}', 'App\Http\Controllers\FirebaseController@serialTest');

Route::get('api/rider-card-payment/{riderid}', 'App\Http\Controllers\AdminController@ridercardpayment');

Route::get('api/pull-confirmed-trip/{riderid}', 'App\Http\Controllers\AdminController@pulledconfirmed');
Route::get('api/pull-decline-trip/{riderid}', 'App\Http\Controllers\AdminController@pulldeclined');
Route::get('api/rider-stat/{riderid}', 'App\Http\Controllers\AdminController@riderstat');

Route::get('api/easy-login/{phone}/{password}', 'App\Http\Controllers\AdminController@easyLogin');

Route::get('api/pull-cash-payment-daily/{rider}/{day}/{month}/{year}', 'App\Http\Controllers\AdminController@ridercashpaymentdaysort');
Route::get('api/pull-cash-payment-weekly/{rider}', 'App\Http\Controllers\AdminController@ridercashpaymentweeksort');
Route::get('api/pull-cash-payment-monthly/{rider}', 'App\Http\Controllers\AdminController@ridercashpaymentmonthsort');

Route::get('api/pull-card-payment-daily/{rider}/{day}/{month}/{year}', 'App\Http\Controllers\AdminController@ridercardpaymentdaysort');
Route::get('api/pull-card-payment-weekly/{rider}', 'App\Http\Controllers\AdminController@ridercardpaymentweeksort');
Route::get('api/pull-card-payment-monthly/{rider}', 'App\Http\Controllers\AdminController@ridercardpaymentmonthsort');

Route::get('api/update-online-time/{rider}/{time}', 'App\Http\Controllers\AdminController@time_online');

Route::get('api/declinemultipleorder/{orderid}/{reason}/{option}', 'App\Http\Controllers\FirebaseController@multipledeclineorder');

Route::get('api/weekly-earning/{number}', 'App\Http\Controllers\AdminController@weeklyEarning');
Route::get('api/rider-withdraw/{rider}/{withdraw}/{balance}', 'App\Http\Controllers\AdminController@riderwithdraw');
Route::get('api/support-issue/{riderid}/{title}/{description}/{type}', 'App\Http\Controllers\AdminController@supportissue');

Route::get('api/all-platform-earnings/{riderid}', 'App\Http\Controllers\AdminController@platformcharge');
Route::get('api/cancel-ride-request/{packageid}', 'App\Http\Controllers\FirebaseController@cancelorder');

Route::get('api/approach-alert/{orderid}', 'App\Http\Controllers\AdminController@approachalert');

Route::get('api/package-timeline/{packageid}', 'App\Http\Controllers\AdminController@pullpackageLog');

Route::get('api/all-process-tracker/{orderid}', 'App\Http\Controllers\AdminController@pullprocess');

Route::get('api/arrive-alert/{orderid}', 'App\Http\Controllers\AdminController@arrivealert');

Route::get('api/start-delivery-alert/{orderid}', 'App\Http\Controllers\AdminController@deliveryalert');

Route::get('api/delivery-approach-alert/{orderid}/{type}', 'App\Http\Controllers\AdminController@approachdeliveryalert'); 
Route::get('api/arrive-delivery-alert/{orderid}', 'App\Http\Controllers\AdminController@arrivedeliveryalert');

Route::get('api/trigger-notification/{clientid}/{message}/{packageid}/{tripstatus}/{verificationcode}', 'App\Http\Controllers\AdminController@triggernotification');

Route::get('api/pull-pilots-info/{pilot}', 'App\Http\Controllers\AdminController@pullpilotinfo');

Route::get('api/check-cancelled-trip/{trip}', 'App\Http\Controllers\AdminController@checkforcancelled');
Route::get('api/rider-status-check/{pilotID}', 'App\Http\Controllers\AdminController@riderStatusCheck');
Route::get('api/rider-store-pin/{pilotID}/{pin}', 'App\Http\Controllers\AdminController@riderStorePin');


///////////////////////////////////////////////////// 3PL ///////////////////////////////////////////
Route::get('3pl', 'App\Http\Controllers\thirdplController@threeplpage');
Route::post('3pl/sign-up', 'App\Http\Controllers\thirdplController@newaccount');

Route::get('3pl/sign-up', 'App\Http\Controllers\thirdplController@signup');

Route::get('3pl/login', 'App\Http\Controllers\thirdplController@login');
Route::post('3pl/login', 'App\Http\Controllers\thirdplController@loginnow');

Route::group(['middleware' => 'auth.custom'], function () {
    // Protected routes.
    Route::get('3pl/dashboard', 'App\Http\Controllers\thirdplController@dashboard');
    Route::get('3pl/riders', 'App\Http\Controllers\thirdplController@riders');

    Route::get('3pl/rider/{id}', 'App\Http\Controllers\thirdplController@riderdetail');

    Route::get('3pl/rider/{id}/cancelled-trips', 'App\Http\Controllers\thirdplController@canceltrips');

    Route::get('3pl/rider/{id}/delivered-trips', 'App\Http\Controllers\thirdplController@deliveredorder');

    Route::get('3pl/rider/{id}/payments', 'App\Http\Controllers\thirdplController@pilotpaymentdetail');
    Route::get('3pl/rider/{id}/payment/card', 'App\Http\Controllers\thirdplController@ridercardpaymentdetail');
    Route::get('3pl/profile', 'App\Http\Controllers\thirdplController@profile');

    Route::post('3pl/changeimage', 'App\Http\Controllers\thirdplController@update_brand');

    Route::post('3pl/profile', 'App\Http\Controllers\thirdplController@postprofile');


    Route::get('3pl/rider/{id}/payment/cash', 'App\Http\Controllers\thirdplController@pilotcashpaymentdetail');

    Route::post('3pl/rider/{id}/payment/cash', 'App\Http\Controllers\thirdplController@remitcash');

    Route::get('3pl/rider/{id}/withdraw-history', 'App\Http\Controllers\thirdplController@withdrawhistory');

    Route::post('3pl/perform-action', 'App\Http\Controllers\thirdplController@performaction');
    Route::get('3pl/trips', 'App\Http\Controllers\thirdplController@allorders');
    Route::post('3pl/search-request', 'App\Http\Controllers\thirdplController@requestsearch');
    Route::post('3pl/filter-status', 'App\Http\Controllers\thirdplController@filterstatus');

    Route::post('3pl/filter-trip', 'App\Http\Controllers\thirdplController@filtertrip');

    Route::get('3pl/payments', 'App\Http\Controllers\thirdplController@thirdPartyPaymentdetail');


    Route::get('3pl/payments/card', 'App\Http\Controllers\thirdplController@thirdPartycardpaymentdetail');

    Route::get('3pl/payments/cash', 'App\Http\Controllers\thirdplController@thirdPartycashpaymentdetail');
    
    Route::get('3pl/online-status', 'App\Http\Controllers\FirebaseController@onlinestatus2');




});

//Route::get('3pl/login', 'App\Http\Controllers\thirdplController@relogin')->name('relogin');

//Route::middleware(['auth:sanctum', 'verified'])->get('3pl/dashboard', 'App\Http\Controllers\thirdplController@dashboard');

Route::post('logout', 'App\Http\Controllers\thirdplController@logout')->name('logout');











