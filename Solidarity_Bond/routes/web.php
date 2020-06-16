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

Route::namespace('WEB')->group(function (){

    Route::get('/test', 'TestController@sandbox')->name('test');

    Route::prefix('/')->group(function(){
        Route::get('/', 'GeneralController@accueil')->name('accueil');
        Route::get('a-propos', 'GeneralController@a_propos')->name('a-propos');
        Route::get('mentions-legales', 'GeneralController@mentions_legales')->name('mentions-legales');
        Route::get('contact', 'GeneralController@contact')->name('contact');
        Route::get('cgv', 'GeneralController@cgv')->name('cgv');
        Route::get('partenaires', 'GeneralController@partenaires')->name('partenaires');
    });

    Route::prefix('boutique')->group(function(){
        Route::get('/', 'BoutiqueController@boutique')->name('boutique');
        Route::get('commande','BoutiqueController@commande')->name('commande');
        Route::get('produit/{ID_Produit}', 'BoutiqueController@produit')->name('produit');
        Route::get('panier', 'BoutiqueController@panier')->name('panier');
    });
});
<<<<<<< HEAD
Route::get('/profile', function () {
    return view('profile');
});
=======

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

>>>>>>> 03cbf5dd31edb93b2de5cca7f3a31ef935effa59
