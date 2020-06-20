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

    Route::any('/test', 'TestController@sandbox')->name('test');

    Route::prefix('/')->group(function(){
        Route::get('/', 'GeneralController@accueil')->name('accueil');
        Route::get('a-propos', 'GeneralController@a_propos')->name('a-propos');
        Route::get('mentions', 'GeneralController@mentions')->name('mentions');
        Route::get('contact', 'GeneralController@contact')->name('contact');
        Route::get('cgv', 'GeneralController@cgv')->name('cgv');
        Route::get('fablab', 'FablabController@commandes')->name('fablab');
        Route::post('{Commentaire}/liker', 'GeneralController@liker')->middleware('auth')->name('liker');
        Route::prefix('profil')->group(function(){
            Route::get('/', 'ProfileController@ShowDataProfile')->name('profil');
            Route::post('deleteUser', 'ProfileController@deleteUser')->name('deleteUser');
            Route::post('updateData', 'ProfileController@updateData')->name('updateData');
        });
    });

    Route::prefix('boutique')->group(function(){
        Route::get('/', 'BoutiqueController@boutique')->name('boutique');
        Route::get('commande','BoutiqueController@commande')->name('commande');
        Route::get('produit/{ID_Produit}', 'BoutiqueController@produit')->name('produit');
        Route::prefix('panier')->middleware('auth')->group(function(){
            Route::get('/', 'BoutiqueController@panier')->name('panier');
            Route::post('ajout/{ID_Produit}/{Quantite}', 'BoutiqueController@ajouterAuPanier')->name('ajouterAuPanier');
        });

    });

});

Auth::routes();

