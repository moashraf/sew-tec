<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::controller('users', 'UsersController');
  Route::get('admin/addoffers', 'OffersController@getOff');
 Route::get('API/offers', 'OffersController@gg');
  Route::get('admin/allOffersveiw', 'OffersController@getallOffersveiw');
  Route::get('admin/allOffers', 'OffersController@getallOffers');
  Route::get('admin/DeletOffers/{id}', 'OffersController@getDeleteoneuser');

 Route::post('saveoffers', 'OffersController@saveoffers');



Route::get('/', function () {

	if (Auth::check())
			{
			    // The user is logged in...
              
			    return redirect('admin');
			}
	
	 $setting = \App\setting::find(1);
       return view('welcome')->with('setting' ,$setting);
	});

Route::controller('login','LoginController');


Route::group(['middleware' => ['auth']], function () {
 Route::controller('admin', 'AdminController');
 Route::controller('products', 'ProductsController');
 Route::controller('ordersusers', 'Orders_usersController');
 Route::controller('adminusers', 'Admin_usersController');
 Route::controller('clientusers', 'Client_usersController');
 Route::controller('mainsetting', 'SettingController');
 Route::controller('status', 'StatusController');










});

Route::group(['middleware' => 'api', 'prefix' => 'API', 'namespace' => 'API'], function () {



    
    Route::controller('users', 'UsersController');
    
    Route::controller('orders', 'OrdersController');
    
});





