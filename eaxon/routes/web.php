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
    return view('checkin');
});


Route::get('/catalogues', function () {
    return "hola"; 
});
 
Route::get('/client/{hash}', 'Controller@client'); 
Route::get('/client/{hash}/perfil/{p}', 'Controller@clientHome'); 


Route::get('/list', 'Controller@list');
Route::post('/guest', 'Controller@guest');




