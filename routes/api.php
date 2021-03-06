<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//USER
Route::post('/users/register','UserController@registerUser');
Route::post('/users/login','UserController@loginUser');

//PRODUCT
Route::get('/products/getproducts','ProductController@getProducts');
Route::post('/products/storeproduct', 'ProductController@storeProduct');

//CUSTOMER
Route::get('/customers/getcustomers','CustomerController@getCustomers');
Route::post('/customers/storecustomer', 'CustomerController@storeCustomer');
Route::post('/customers/storecustomerxamarin', 'CustomerController@storeCustomerXamarin');
Route::post('/customers/storeimagecustomerxamarin', 'CustomerController@storeImageCustomerXamarin');
Route::delete('/customers/{id}','CustomerController@destroyCustomer');

//CITIES
Route::get('/cities/getcities','CityController@getCities');
Route::post('/cities/storecities', 'CityController@storeCities');

//DEPARTMENTS
Route::get('/departments/getdepartments','DepartmentController@getDepartments');
Route::post('/departments/storedepartments', 'DepartmentController@storeDepartments');