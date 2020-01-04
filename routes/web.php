<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::name('Admin.')->middleware('adminGuest')->group(function(){

    Route::get('/admin','AdminAuth\AuthController@logIn')->name('LogIn');
    Route::post('/admin','AdminAuth\AuthController@handleLogIn')->name('HandleLogIn');

});

Route::middleware('auth:admins')->name('Admin.')->group(function (){

    Route::get('/admin_home','Admin\HomeController@index')->name('Home');
    Route::get('/admin_logout','Admin\HomeController@logOut')->name('LogOut');
});
Route::middleware(['auth'])->namespace('Users')->name('Users.')->prefix('user')->group(function(){

    Route::get('/pending_orders','BookingController@booking')->name('PendingOrders');
    Route::get('/available_payment_methods/{id}','PaymentController@index')->name('PaymentMethods');
    Route::get('/paided_orders','OrdersController@paidedOrders')->name('PaidedOrder');
    Route::post('/give_comment/{hotel_id}','CommentController@giveCommentTohotel')->name('Comment');
});

Route::namespace('Hotels')->name('Hotels.')->prefix('hotels')->group(function(){

    Route::get('/available_hotels/{id}/{comment?}','HotelController@index')->name('Index');
    Route::get('/booking/{hotel_id}','HotelBookingController@index')->name('StartBookingView');

    Route::middleware('HotelGuest')->group(function(){

    	//hotel registration
	    Route::get('/hotel_registration','HotelRegistrationController@showRegistrationForm')->name('ShowRegistrationForm');
		Route::post('/hotel_registration','HotelRegistrationController@register')->name('Register');
        //hotel login
		Route::get('/hotel_login','HotelLogInController@showLogInPage')->name('LogInPage');
		Route::post('/hotel_login','HotelLogInController@logIn')->name('LogIn');

		//available room for users in specified hotel

    });

    Route::middleware(['auth'])->group(function(){
      //pending orders for users
       Route::post('/add_to_pending_orders','HotelBookingController@booking')->name('AddToPendingOrders');
    });


	Route::middleware('HotelAuth')->group(function(){

		Route::get('/hotel_dashboard','HotelDashBoardController@hotelDashBoard')->name('HotelDashBoard');
		Route::get('/hotel_logout','HotelDashBoardController@logOut')->name('LogOut');

        //approved hotels route
		Route::middleware('HotelApprove')->group(function(){

            //room adding
			Route::get('/adding_hotel_room','HotelRoomController@showAddRoomPage')->name('ShowAddRoomPage');
			Route::post('/adding_hotel_room','HotelRoomController@addRoom')->name('AddRoom');
            Route::get('/all_orders','HotelOrderController@allOrders')->name('AllOrders');
            Route::get('/today_check_in','HotelOrderController@todayCheckIn')->name('ToDayCheckIn');
            Route::get('/search_today_order','HotelOrderController@searchToDayorder')->name('SearchTodayCheckin');
            Route::get('/giving_room/{order_id}','HotelOrderController@givingRoom')->name('GivingRoom');

		});

	});





});

