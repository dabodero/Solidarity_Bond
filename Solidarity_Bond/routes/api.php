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

Route::group(['prefix'=>'commande'], function (){
    Route::get('terminees', 'API\CommandeController@terminees')->name('commande.terminees');
    Route::get('nonterminees', 'API\CommandeController@nonTerminees')->name('commande.nonterminees');
});

Route::apiResource('role', 'API\RoleController');
Route::apiResource('produit', 'API\ProduitController');
Route::apiResource('utilisateur', 'API\UtilisateurController');
Route::apiResource('photo', 'API\PhotoController');
Route::apiResource('commande', 'API\CommandeController');
Route::apiResource('composer', 'API\ComposerController');
Route::apiResource('commentaire', 'API\CommentaireController');
Route::apiResource('liker', 'API\LikerController');
Route::apiResource('image', 'API\ImageController');

