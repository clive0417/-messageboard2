<?php

use Illuminate\Support\Facades\Route;

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
    return view('test');
});

Route::resource('messages','MessageController');
//動詞      路徑                 行為      路由名稱
//GET    /messages               index     message  [總表]
//GET    /messages/create        create    message.create [此web site 不需要 與總表頁面合併]
//POST   /messages               store     message.store [存資料 / create DB 互動]
//GET    /messages/{id}          show      message.show   [此web site 不需要 與總表頁面合併]
//GET    /messages /{id}/edit    edit      message.edit   [此web site 不需要 與總表頁面合併]
//PUT    /messages/{id}          update    message.update [更新產品功能頁面]
//DELETE /messages/{id}          destroy   message.destroy [刪除]