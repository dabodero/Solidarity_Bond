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
    return view('accueil');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/apropos', function () {
    return view('apropos');
});

Route::get('/test', 'WEB\TestController@sandbox');

Route::get('/boutique', function () {
    return view('boutique');
});
Route::get('/a-propos', function () {
    return view('apropos');
});
Route::get('/produit', function () {
    return view('produit');
});

Route::get('/commande', function () {
    return view('commande');
});



