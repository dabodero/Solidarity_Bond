<?php

use Illuminate\Support\Facades\Route;
use App\Mail\AvisMail;
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
Route::namespace('Test')->group(function(){
    Route::any('/test', 'TestController@sandbox')->name('test');
});

Route::namespace('WEB')->group(function (){

    Route::prefix('/')->group(function(){
        Route::get('/', 'GeneralController@accueil')->name('accueil');
        Route::get('a-propos', 'GeneralController@a_propos')->name('a-propos');

        Route::get('email', function (){
            return new AvisMail();
        });
        Route::get('mentions', 'GeneralController@mentions')->name('mentions');

        Route::get('mentions-legales', 'GeneralController@mentions')->name('mentions-legales');

        Route::get('contact', 'GeneralController@contact')->name('contact');
        Route::post('contact', 'GeneralController@postContact')->name('envoimail');
        Route::get('cgv', 'GeneralController@cgv')->name('cgv');
        Route::get('fablab', 'FablabController@commandes')->name('fablab');

        Route::prefix('profil')->group(function(){
            Route::get('/', 'ProfilController@profil')->name('profil');
            Route::post('deleteUser', 'ProfilController@deleteUser')->name('deleteUser');
            Route::post('updateData', 'ProfilController@updateData')->name('updateData');
        });

    });

    Route::prefix('boutique')->group(function(){
        Route::get('/', 'BoutiqueController@boutique')->name('boutique');
        Route::get('commande','BoutiqueController@commande')->name('commande');
        Route::get('produit/{ID_Produit}', 'BoutiqueController@produit')->name('produit');

        Route::prefix('panier')->middleware('auth')->group(function(){
            Route::get('/', 'BoutiqueController@panier')->name('panier');
            Route::post('ajout/{ID_Produit}', 'BoutiqueController@ajouterAuPanier')->name('ajouterAuPanier');
            Route::post('supprimer/{ID_Produit}', 'BoutiqueController@supprimerDuPanier')->name('supprimerDuPanier');
            Route::post('valider', 'BoutiqueController@validerCommande')->name('validerCommande');
        });

    });

});

Auth::routes();

