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

Route::get('/','EiserController@index')->name('/');

Route::get('/category/{id}/{name}','EiserController@category')->name('category');
Route::get('/product-details/{id}','EiserController@productDetails')->name('product-details');

Route::post('/cart','CartController@addCart')->name('add-cart');
Route::get('/cart','CartController@viewCart');
Route::get('/cart/{id}','CartController@deleteCart')->name('delete-cart');
Route::post('/cart/update','CartController@updateCart')->name('edit-cart');

Route::get('/checkout','CheckoutController@index')->name('checkout');
Route::post('/checkout/sign-up','CheckoutController@signUp')->name('checkout-sign-up');
Route::post('/checkout/log-in','CheckoutController@logIn')->name('checkout-login');
Route::post('/checkout/log-out','CheckoutController@logOut')->name('checkout-logout');
Route::get('/checkout/shipping','CheckoutController@shipping');
Route::post('/checkout/shipping','CheckoutController@saveShipping')->name('new-shipping');
Route::get('/checkout/payment','CheckoutController@paymentForm');
Route::post('/checkout/order','CheckoutController@newOrder')->name('new-order');
Route::get('/checkout/payment/confirm','CheckoutController@confirmPayment');
Route::get('/checkout/payment/stripe', 'StripController@stripe');
Route::post('/stripe', 'StripController@stripePost')->name('stripe.post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/add','CategoryController@addCategory')->name('add-category');
Route::post('/category/new','CategoryController@newCategory')->name('new-category');
Route::get('/category/manage','CategoryController@manageCategory')->name('manage-category');
Route::get('/category/published/{id}','CategoryController@publishedCategory')->name('published-category');
Route::get('/category/unpublished/{id}','CategoryController@unpublishedCategory')->name('unpublished-category');
Route::post('/category/update','CategoryController@updateCategory')->name('update-category');
Route::get('/category/delete/{id}','CategoryController@deleteCategory')->name('delete-category');


Route::get('/brand/add','BrandController@addBrand')->name('add-brand');
Route::post('/brand/new','BrandController@newBrand')->name('new-brand');
Route::get('/brand/view','BrandController@viewBrand')->name('view-brand');
Route::post('/brand/update','BrandController@updateBrand')->name('update-brand');


Route::get('/product/add','ProductController@addProduct')->name('add-product');
Route::post('/product/new','ProductController@newProduct')->name('new-product');
Route::get('/product/view','ProductController@viewProduct')->name('view-product');


Route::get('/manage-order', 'OrderController@manageOrder')->name('orders');
Route::get('/view-order-details/{id}', 'OrderController@viewOrder')->name('view-order-details');
Route::get('/view-order-invoice/{id}', 'OrderController@viewInvoice')->name('view-order-invoice');
Route::get('/download-invoice/{id}', 'OrderController@downloadInvoice')->name('download-invoice');









