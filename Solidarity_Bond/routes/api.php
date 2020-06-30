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

Route::middleware('api')->namespace('Auth')->group(function() {
    Route::post('login', 'APIController@login')->name('api.login');
    Route::post('logout', 'APIController@logout')->name('api.logout');
    Route::post('refresh', 'APIController@refresh')->name('api.refresh');
});


Route::namespace('API')->middleware('auth:api')->group(function (){

    Route::group(['prefix'=>'commande'], function (){
        Route::get('terminees', 'CommandeController@terminees')->name('commande.terminees');
        Route::get('nonterminees', 'CommandeController@nonTerminees')->name('commande.nonterminees');
        Route::get('{commande}/produits', 'CommandeController@produitsCommande')->name('commande.produits');
        Route::match(['put','patch'],'{commande}/terminer', 'CommandeController@terminer')->name('commande.terminer');

    });

    Route::group(['prefix'=>'utilisateur'], function (){
        Route::get('{utilisateur}/commandes', 'UtilisateurController@commandes')->name('utilisateur.commandes');
    });

    Route::group(['prefix'=>'produit'], function(){
       Route::get('{produit}/commentaires', 'ProduitController@commentaires')->name('produit.commentaires');
    });

    Route::group(['prefix'=>'commentaire'], function(){
        Route::get('topTrois', 'CommentaireController@topTrois')->name('commentaire.toptrois');

        Route::prefix('{commentaire}')->group(function(){
            Route::get('likesCount', 'CommentaireController@likesCount')->name('commentaire.likescount');
            Route::post('liker-unliker', 'CommentaireController@liker')->name('commentaire.liker-unliker');
        });

    });

    //Route::apiResource('role', 'RoleController');
    Route::apiResource('produit', 'ProduitController');
    Route::apiResource('utilisateur', 'UtilisateurController');
    //Route::apiResource('photo', 'PhotoController');
    Route::apiResource('commande', 'CommandeController');
    //Route::apiResource('composer', 'ComposerController');
    Route::apiResource('commentaire', 'CommentaireController');
    //Route::apiResource('liker', 'LikerController');
});


