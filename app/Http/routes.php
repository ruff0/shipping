<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('/booking/manage',['as'=>'getBookSearch','uses'=>'BookingController@manage']);
    Route::get('/booking/post',['as'=>'booking.post','uses'=>'BookingController@post']);
    Route::get('/customer-vendor/search',['as'=>'getSearch','uses'=>'CustomerVendorController@search']);
    Route::put('/booking/{id}/edit',['as'=>'bookEdit','uses'=>'BookingController@postEdit']);
    Route::post('/home/addbooking',['as'=>'addbooking','uses'=>'HomeController@addBooking']);
    //Booking print
    Route::get('/print/bookingorder/{id}',['as'=>'printBookingOrder','uses'=>'PrintBookingController@showBookingOrder']);
    Route::get('/print/billoflading/{id}',['as'=>'printBillLading','uses'=>'PrintBookingController@showBillLading']);
    Route::get('/print/shipperexport/{id}',['as'=>'printShipperExport','uses'=>'PrintBookingController@showShipperExport']);
    Route::get('/print/arrivalnotice/{id}',['as'=>'printArrivalNotice','uses'=>'PrintBookingController@showArrivalNotice']);
    
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/',['as'=>'home','uses'=> 'HomeController@index']);
    Route::get('/home',['as'=>'home','uses'=> 'HomeController@index']);
    Route::get('/home/waiting',['as'=>'waiting','uses'=> 'HomeController@waiting']);
    Route::get('/home/lastest',['as'=>'lastest','uses'=> 'HomeController@lastest']);
    Route::get('/home/approve',['as'=>'approve','uses'=> 'HomeController@approve']);
    Route::get('/booking/add',['as'=>'addbook','uses'=> 'BookingController@add']);
    Route::get('/booking/up',['as'=>'updatebook','uses'=> 'BookingController@up']);

    
    Route::get('/logout',function(){
    	Auth::logout();
    	return view('auth.login');
    });
    //Route::get('/login',['as'=>'getLogin','uses'=>'Auth\AuthController@getLogin']);
	Route::post('authen/post',['as'=>'postLogin','uses'=>'Auth\AuthController@postLogin']);
    Route::resource('register','RegisterController');
	
    Route::resource('/customer-vendor','CustomerVendorController');

    Route::resource('/permission','PermissionController');
    Route::resource('/booking','BookingController');
    Route::post('/booking/create/bill',['as'=>'postbill','uses'=>'BookingController@postbill']);
    Route::post('/booking/create/shipper',['as'=>'postshipper','uses'=>'BookingController@postshipper']);
    Route::post('/booking/create/arrival',['as'=>'postarrival','uses'=>'BookingController@postarrival']);
    Route::get('/change-pass/edit/{id}',['as'=>'getEditPass','uses'=>'Auth\PasswordController@getEdit']);
    Route::post('/change-pass/edit/{id}',['as'=>'postEditPass','uses'=>'Auth\PasswordController@postEdit']);
    Route::get('/booking/approve/{id}',['as'=>'getbookapprove','uses'=>'BookingController@showapprove']); 
    Route::put('/booking/approve/{id}',['as'=>'putbookapprove','uses'=>'BookingController@approve']); 
    Route::put('/booking/updatetype/{id}',['as'=>'booking.updatetype','uses'=>'BookingController@updatetype']); 
Route::get('test', function() {
    return view('test');
});

                                                               
});



