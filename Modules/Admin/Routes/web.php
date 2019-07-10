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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::group(['prefix'=>'dashboard'], function(){
    	Route::get('/','AdminDashboardController@index')->name('admin.get.dashboard');
    });
    Route::group(['prefix'=>'category'], function(){
    	Route::get('/','AdminCategoryController@index')->name('admin.get.listcategory');
    	Route::get('/create','AdminCategoryController@create')->name('admin.create.category');
        Route::post('/store','AdminCategoryController@store')->name('category-store');
        Route::delete('/delete/{id}', 'AdminCategoryController@destroy')->name('delete-category');
        Route::get('/edit/{id}', 'AdminCategoryController@edit')->name('edit-category');
        Route::put('/update/{id}', 'AdminCategoryController@update')->name('update-category');
    });
    Route::group(['prefix'=>'product'], function(){
    	Route::get('/','AdminProductController@index')->name('admin.get.listproduct');
    	Route::get('/create','AdminProductController@create')->name('admin.create.product');
        Route::post('/store','AdminProductController@store')->name('product-store');
        Route::delete('/delete/{id}','AdminProductController@destroy')->name('delete-product');
        Route::get('/edit/{id}','AdminProductController@edit')->name('edit-product-info');
        Route::put('/update/{id}','AdminProductController@update')->name('update-product');
        Route::post('/addquantity','AdminProductController@addquantity')->name('add-quantity');
        Route::get('/detail/{id}', 'AdminProductController@getdetail')->name('admin.product.detail');
    });
    Route::group(['prefix'=>'productdetail'], function(){  
        Route::get('/create/{id}','AdminProductDetailController@create')->name('admin.create.productdetail');
        Route::post('/store','AdminProductDetailController@store')->name('store-product-detail');  

    });
    Route::group(['prefix'=>'order'], function(){
    	Route::get('/','AdminOrderController@index')->name('admin.get.listorder');
        Route::get('/oderdetail/{id}', 'AdminOrderDetailController@index')->name('get-order-detail');
        Route::get('/approve-order/{id}','AdminOrderController@approve')->name('approve-order');
        Route::get('/cancel-order/{id}', 'AdminOrderController@cancel')->name('cancel-order');
    });
    Route::group(['prefix'=>'user'], function(){
    	Route::get('/index','AdminUserController@index')->name('admin.get.listuser');
        Route::get('/{id}','AdminUserController@edit')->name('edit-user');
        Route::delete('/{id}','AdminUserController@destroy')->name('delete-user');
        Route::put('/{id}','AdminUserController@update')->name('update-user');
    });
    Route::group(['prefix'=>'comment'], function(){
    	Route::get('/','AdminCommentController@index')->name('admin.get.listcomment');
    });
    Route::group(['prefix'=>'image'], function(){
        Route::get('/update-status/{id}','AdminCommentController@update')->name('update-status-comment');
        Route::post('/store_image/{id}','AdminImageController@store')->name('store-image');
    });
});
