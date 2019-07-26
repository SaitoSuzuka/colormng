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


Auth::routes();

//ログイン画面
Route::get('/', 'LoginController@index')->name('home');
//ログイン後のルーティング
Route::get('/home', 'LoginController@index')->name('home');

// Route::post('/', 'ColorManageController@showList');
//検索、リスト表示
Route::post('/search' , 'ColorManageController@showList');
Route::get('/search' , 'ColorManageController@showList');
//検索フォーム　リセット
Route::post('/reset' , 'ColorManageController@reset');
Route::get('/reset' , 'ColorManageController@reset');


//画面表示(disp~)
// Route::post('/dispdeletecolor' , 'ColorEditController@dispDeleteColor');
Route::post('/dispupdatecolor' , 'ColorEditController@dispUpdateColor');

//新規作成処理
Route::post('/edit' , 'ColorEditController@dispColorEdit');
Route::post('/makecolor' , 'ColorEditController@makeColor');
Route::get('/makecolor' , 'ColorEditController@makeColor');

//更新処理
Route::post('/updatecolor' , 'ColorEditController@updateColor');

//削除処理
Route::post('/deletecolor' , 'ColorEditController@deleteColor');
Route::get('/deletecolor' , 'ColorEditController@deleteColor');

//キャンセル
Route::post('/cancel' , 'ColorManageController@cancel');
Route::get('/cancel' , 'ColorManageController@cancel');




