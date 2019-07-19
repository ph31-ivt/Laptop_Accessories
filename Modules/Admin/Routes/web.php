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

Route::group(['prefix'=>'admin','middleware'=>'admin'], function() {
    Route::get('/', 'AdminController@index');
    Route::group(['prefix'=>'dashboard'], function(){
    Route::get('/','AdminDashboardController@index')->name('admin.get.dashboard');
    Route::get('/logout','AdminController@logout')->name('logout');
    });
    Route::group(['prefix'=>'category'], function(){
    	Route::get('/','AdminCategoryController@index')->name('admin.get.listcategory');
    	Route::get('/create','AdminCategoryController@create')->name('admin.create.category');
        Route::post('/store','AdminCategoryController@store')->name('category-store');
        Route::delete('/delete/{id}', 'AdminCategoryController@destroy')->name('delete-category');
        Route::get('/edit/{id}', 'AdminCategoryController@edit')->name('edit-category');
        Route::put('/update/{id}', 'AdminCategoryController@update')->name('update-category');
        Route::get('/product_in_category/{id}','AdminCategoryController@getproducts')->name('get.product.ofcategory');
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
        Route::get('/product-sold-out', 'AdminProductController@getproductso')->name('get.product.soldout');
    });
    Route::group(['prefix'=>'productdetail'], function(){  
        Route::get('/create/{id}','AdminProductDetailController@create')->name('admin.create.productdetail');
        Route::post('/store','AdminProductDetailController@store')->name('store-product-detail');  

    });
    Route::group(['prefix'=>'order'], function(){
    	Route::get('/','AdminOrderController@index')->name('admin.get.listorder');
        Route::get('/oderdetail/{id}', 'AdminOrderDetailController@index')->name('get-order-detail');
        Route::get('/check-order/{id}/{index}','AdminOrderController@check')->name('check-order');
        Route::get('/order-handle','AdminOrderController@orderhandle')->name('get.uncompleted.order');
    });
    Route::group(['prefix'=>'user'], function(){
    	Route::get('/index','AdminUserController@index')->name('admin.get.listuser');
        Route::get('/edit/{id}','AdminUserController@edit')->name('edit-user');
        Route::delete('/{id}','AdminUserController@destroy')->name('delete-user');
        Route::put('/update/{id}','AdminUserController@update')->name('update-user');
        Route::get('/user-guest','AdminUserController@getguest')->name('admin.notprofileuser');
    });
    Route::group(['prefix'=>'comment'], function(){
    	Route::get('/','AdminCommentController@index')->name('admin.get.listcomment');
        Route::get('/update-status/{id}/{idex}','AdminCommentController@changestatus')->name('update-status');
        Route::get('/newcomment', 'AdminCommentController@getnewcomment')->name('get.newcomment');
    });
    Route::group(['prefix'=>'image'], function(){
        Route::post('/store_image/{id}','AdminImageController@store')->name('store-image');
        Route::delete('/delete_image/{id}','AdminImageController@destroy')->name('delete-image');
    });
    Route::group(['prefix'=>'slide'], function(){
        Route::get('/create_slide','AdminSlideController@create')->name('create-slide-images');
        Route::post('/store_slide', 'AdminSlideController@store')->name('store-slide-images');
        Route::get('/show_slide','AdminSlideController@index')->name('show-slide-images');
        Route::delete('/delete_slide/{id}', "AdminSlideController@destroy")->name('delete-slide');
    });
    Route::group(['prefix'=>'promotion'], function(){
        Route::get('/create_promotion','AdminPromotionController@create')->name('create-promotion');
        Route::get('/index','AdminPromotionController@index')->name('get.list.promotion');
        Route::post('/store_promotion', 'AdminPromotionController@store')->name('store-promotion');
        Route::delete('/delete_promotion/{id}', 'AdminPromotionController@destroy')->name('delete-promotion');
    });

});