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

// Route::get('/', function () {
//     return view('welcome');
// });


// ===============================  Fontend Start ================================


//Frontend Route-----------------------------------------------------------
Route::get('/','HomeController@index');

// Show Cateory wise product here-----------------------------------------
Route::get('/show-product-by-cat/{category_id}','HomeController@showProductByCat');
Route::get('/show-product-by-manufacture/{manufacture_id}','HomeController@showProductByManufacture');
Route::get('/view-product/{product_id}','HomeController@product_details_by_id');

//Cart Related Routes Here------------------------------------------------
Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart','CartController@update_cart');


//Checkout Related Routes Here------------------------------------------------
Route::get('/login-check','CheckoutController@login_check');
Route::post('/customer-registration','CheckoutController@customer_registration');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-shipping-details','CheckoutController@save_shipping_details');
Route::get('/customer-logout','CheckoutController@customer_logout');
Route::get('/customer-login','CheckoutController@customer_login');
Route::get('/payment','CheckoutController@payment');
Route::post('/order-place','CheckoutController@order_place');

// ===============================  Fontend End ================================





// ===============================  Backend Start ================================

//Backend Route------------------------------------------------------------
Route::get('/admin','AdminController@index');
Route::post('/admin-dashboard','AdminController@admin_dashboard');
Route::get('/dashboard','SuperAdminController@dashboard');
Route::get('/logout','SuperAdminController@logout');



//Category Related Route------------------------------------------------------------
Route::get('/add-category','CategoryController@index');
Route::post('/save-category','CategoryController@save_category');

Route::get('/all-category','CategoryController@all_category');

Route::get('/inactive-category/{category_id}','CategoryController@inactive_category');
Route::get('/active-category/{category_id}','CategoryController@active_category');

Route::get('/edit-category/{category_id}','CategoryController@edit_category');
Route::post('/update-category/{category_id}','CategoryController@update_category');

Route::get('/delete-category/{category_id}','CategoryController@delete_category');



//Manufacture or Brand Related Routes-----------------------------------------------
Route::get('/add-manufacture','ManufactureController@index');
Route::post('/store-manufacture','ManufactureController@store');

Route::get('/all-manufacture','ManufactureController@all_manufacture');

Route::get('/inactive-manufacture/{manufacture_id}','ManufactureController@inactive_manufacture');
Route::get('/active-manufacture/{manufacture_id}','ManufactureController@active_manufacture');

Route::get('/edit-manufacture/{manufacture_id}','ManufactureController@edit');
Route::post('/update-manufacture/{manufacture_id}','ManufactureController@update');

Route::get('/delete-manufacture/{manufacture_id}','ManufactureController@destroy');



//Product Related Routes------------------------------------------------------------
Route::get('/add-product','ProductController@index');
Route::post('/store-product','ProductController@store');

Route::get('/all-product','ProductController@all_product');

Route::get('/inactive-product/{product_id}','ProductController@inactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::get('/delete-product/{product_id}','ProductController@destroy');


//Slider Related Routes------------------------------------------------------------
Route::get('/add-slider','SliderController@index');
Route::post('/store-slider','SliderController@store');

Route::get('/all-slider','SliderController@all_slider');

Route::get('/inactive-slider/{slider_id}','SliderController@inactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');

Route::get('/delete-slider/{slider_id}','SliderController@destroy');


//Manage Order Related Routes------------------------------------------------------------
Route::get('/manage-order','ManageorderController@manage_order');
Route::get('/view-order/{order_id}','ManageorderController@view_order');

Route::get('/done-order/{order_id}','ManageorderController@done_order');
Route::get('/pending-order/{order_id}','ManageorderController@pending_order');

Route::get('/delete-order/{order_id}','ManageorderController@delete_order');
