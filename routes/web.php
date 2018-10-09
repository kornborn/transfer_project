<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('phpinfo', function () {
//    return phpinfo();
//});

Route::view('{path?}', 'welcome');

//Route::get('/', 'UserController@getUsers');
//
//Route::get('/transactions', 'TransactionController@getTransactions');
//
//Route::get('/create_transaction', 'PagesController@getCreateTransaction');
//
//Route::get('/react', 'PagesController@getReact');
//
//Route::post('/transaction/submit', 'TransactionController@createTransaction');
//
//Route::post('/user/add', 'UserController@addUser');
