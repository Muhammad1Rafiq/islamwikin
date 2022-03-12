<?php

use GuzzleHttp\Psr7\Request;
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

Route::get('/', 'App\Http\Controllers\YaranController@index');

Route::get('/order/{id}', 'App\Http\Controllers\YaranController@showorder');



Route::get('/neworder', 'App\Http\Controllers\YaranController@neworder');

Route::get('/customers', 'App\Http\Controllers\YaranController@customers');

Route::get('/ajax/addcustomer', 'App\Http\Controllers\AjaxController@addcustomer');
Route::post('/ajax/addcustomer', 'App\Http\Controllers\AjaxController@addcustomer');
Route::post('/ajax/checkcustomer', 'App\Http\Controllers\AjaxController@checkcustomer');
Route::post('/ajax/addorder', 'App\Http\Controllers\AjaxController@addorder');
Route::post('/ajax/updateorderstatus', 'App\Http\Controllers\AjaxController@updateorderstatus');
Route::post('/ajax/buttonstate', 'App\Http\Controllers\AjaxController@buttonstate');
Route::post('/ajax/submitsubstring', 'App\Http\Controllers\AjaxController@submitsubstring');


Route::get('/search', 'App\Http\Controllers\YaranController@search');
Route::post('/search', 'App\Http\Controllers\YaranController@search');

Route::get('/analysis', function () {
    return view('analysis');
});
