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

Route::get('/','HomeController@index')->name('home');
Route::get('/about','HomeController@about')->name('about');
Route::get('/contact','HomeController@contact')->name('contact');
Route::post('/contact','HomeController@postContact')->name('contact.post');

// User 
Route::group(['prefix'=>'Auth'],function(){
	Route::get('/login',function(){ return view('users.login');})->name('user.login.get');
	Route::post('/login','UserController@postLogin')->name('user.login.post');
	Route::get('/register',function(){ return view('users.register');})->name('user.register.get');
	Route::post('register','UserController@postRegister')->name('user.register.post');
	Route::get('/profile/{id}','UserController@profile')->name('user.profile.get')->middleware('check.login');
	Route::put('/profile/{id}','UserController@updateProfile')->name('update.profile.put');
	Route::get('/logout','UserController@logoutUser')->name('user.logout.get');
});

// Display product
Route::get('/product-detail/{id}','ProductController@productDetail')->name('product-detail');
Route::get('/product/{category}','ProductController@product')->name('product.get');

// Search
Route::post('/search/ajax','SearchController@searchAjax');     // Search bang ajax
Route::post('/search','SearchController@search')->name('search.post'); // Seach bang phuong thuc post bang Category
Route::get('/search-producer/{category_id}/{producer}','SearchController@searchProducer')->name('search.producer.get');
Route::get('/search-property/{category_id}/{property}','SearchController@searchProperty')->name('search.property.get');
Route::post('/fill/ajax','SearchController@fill');                     // loc san pham


// Comment
Route::put('/comment/product/{id}','UserController@commentProduct')->name('comment.product.put')->middleware('check.login');

// Get order detail Ajax
Route::get('/ajax/orderdetail/{id}','CartController@orderDetail');
// Cancel order
Route::put('/ajax/cancelorder','CartController@cancelOrder');

// Quick View
Route::get('/ajax/quickview/{id}','QuickViewController@quickView');

// send Mail
Route::get('contact-us','UserController@showFromContact')->name('form-contact');
Route::post('contact-us','UserController@sendMailContact')->name('send-mail-contact');
Route::get('mail',function(){
  return view('mails.mailcheckout');
});

//Shopping Cart
Route::group(['prefix'=>'shopping'],function(){
	Route::get('/addCart/{id}', 'CartController@addCart')->name('add.cart.get');
	Route::post('/addCart/{id}', 'CartController@addCart')->name('add.cart.post');
	Route::post('/updateCart', 'CartController@updateCart')->name('update.cart.post');
	Route::get('/cart', function(){
		return view('carts.cart');
	})->name('cart.get');
	Route::get('/remover-cart/{rowId}', function($rowId){
		\Cart::instance('cart')->remove($rowId);
		return back();
	})->name('cart.remove');

	//wishlist
	Route::get('/wishlist/{id}', 'CartController@addWishlist')->name('add.wishlist.get');
	Route::get('/wishlist', function(){
		return view('pages.wishlist');
	})->name('wishlist');
	//Remove wishlist
	Route::get('remover-wishlist/{rowId}', function($rowId){
		\Cart::instance('wishlist')->remove($rowId);
		return back();
	})->name('wishlist.remove');

	//Checkout
	Route::get('/checkout',function(){
		return view('carts.checkout');
	})->name('checkout');
	Route::put('/checkout','CartController@checkOut')->name('checkout.put');

});

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth', 'admin']],function(){
 	Route::get('/hello', function(){
 		return view('admin::category.index');
 	});
});
