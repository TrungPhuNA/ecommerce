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

Route::get('/home', 'HomeController@index');

Route::get('default',function() {
    return view('backend/layouts/default');
});

Route::get('product',function() {
    return view('backend/product/add');
});

// 'middleware' => ['checkLogin','checkSubperadmin']
Route::group(['prefix' => '/backend'],function() {
    Route::get('/home',['as' => 'backend.home.index','uses' => 'Backend\HomeBackendController@getIndex']);


    // category
    Route::group(['prefix' => '/category'],function() {
        Route::get('/', ['as' => 'backend.category.index' , 'uses' => 'Backend\CategoryController@getIndex']);
        Route::get('/add', ['as' => 'backend.category.add' , 'uses' => 'Backend\CategoryController@getAdd']);
        Route::post('/add',['uses' => 'Backend\CategoryController@postAdd']) ;

        Route::get('/{id}/edit', ['as' => 'backend.category.edit' , 'uses' => 'Backend\CategoryController@getEdit']);
        Route::post('/{id}/edit', ['as' => 'backend.category.edit' , 'uses' => 'Backend\CategoryController@postEdit']);

        Route::get('/{id}/delete', ['as' => 'backend.category.delete' , 'uses' => 'Backend\CategoryController@getDelete']);
        

    });



    // category
    Route::group(['prefix' => '/producer'],function() {
        Route::get('/', ['as' => 'backend.producer.index' , 'uses' => 'Backend\ProducerController@getIndex']);
        Route::get('/add', ['as' => 'backend.producer.add' , 'uses' => 'Backend\ProducerController@getAdd']);
        Route::post('/add',['uses' => 'Backend\ProducerController@postAdd']) ;

        Route::get('/{id}/edit', ['as' => 'backend.producer.edit' , 'uses' => 'Backend\ProducerController@getEdit']);
        Route::post('/{id}/edit', ['as' => 'backend.producer.edit' , 'uses' => 'Backend\ProducerController@postEdit']);

        Route::get('/{id}/delete', ['as' => 'backend.producer.delete' , 'uses' => 'Backend\ProducerController@getDelete']);
        Route::post('/deleteall', ['as' => 'backend.producer.deleteall' , 'uses' => 'Backend\ProducerController@postDeleteall']);

    });


    // product
    Route::group(['prefix' => '/product'],function() {
        Route::get('/', ['as' => 'backend.product.index' , 'uses' => 'Backend\ProductController@getIndex']);
        Route::get('/add', ['as' => 'backend.product.add' , 'uses' => 'Backend\ProductController@getAdd']);
        Route::post('/add',['uses' => 'Backend\ProductController@postAdd']) ;

        Route::get('/{id}/edit', ['as' => 'backend.product.edit' , 'uses' => 'Backend\ProductController@getEdit']);
        Route::post('/{id}/edit', ['as' => 'backend.product.edit' , 'uses' => 'Backend\ProductController@postEdit']);

        Route::get('/{id}/view', ['as' => 'backend.product.view' , 'uses' => 'Backend\ProductController@getView']);
        Route::get('/{id}/delete', ['as' => 'backend.product.delete' , 'uses' => 'Backend\ProductController@getDelete']);
        Route::post('/deleteall', ['as' => 'backend.product.deleteall' , 'uses' => 'Backend\ProducerController@postDeleteall']);
       
    });

    /* quản lý cấu hình website*/

});

