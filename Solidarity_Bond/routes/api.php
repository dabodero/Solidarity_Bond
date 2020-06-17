<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API')->group(function (){

    Route::group(['prefix'=>'commande'], function (){
        Route::get('terminees', 'CommandeController@terminees')->name('commande.terminees');
        Route::get('nonterminees', 'CommandeController@nonTerminees')->name('commande.nonterminees');
        Route::get('{commande}/produits', 'CommandeController@produitsCommande')->name('commande.produits');
        Route::get('{commande}/terminer', 'CommandeController@terminer')->name('commande.terminer');

    });

    Route::group(['prefix'=>'utilisateur'], function (){
        Route::get('{utilisateur}/commandes', 'UtilisateurController@commandes')->name('utilisateur.commandes');
    });

    Route::apiResource('role', 'RoleController');
    Route::apiResource('produit', 'ProduitController');
    Route::apiResource('utilisateur', 'UtilisateurController');
    Route::apiResource('photo', 'PhotoController');
    Route::apiResource('commande', 'CommandeController');
    Route::apiResource('composer', 'ComposerController');
    Route::apiResource('commentaire', 'CommentaireController');
    Route::apiResource('liker', 'LikerController');
    Route::apiResource('image', 'ImageController');
});


