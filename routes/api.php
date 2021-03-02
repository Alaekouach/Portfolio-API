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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

////////////////////////////////////////////////////////
//route pour les messages de contact 

Route::get('contact/{user_id}',[
    'uses'=>'ContactController@index',
    'as'=> 'contact.index'
]);


Route::post('contact',[
    'uses'=>'ContactController@store',
    'as'=> 'contact.store'
]);


Route::get('contact/{user_id}/{contact_id}',[
    'uses'=>'ContactController@show',
    'as'=> 'contact.show'
]);


// Route::put('api/contact/{contact_id}',[
//     'uses'=>'ContactController@update',
//     'as'=> 'contact.update'
// ]);


Route::delete('contact/{contact_id}',[
    'uses'=>'ContactController@destroy',
    'as'=> 'contact.destroy'
]);

//////////////////////////////////////////////////////////
//route pour le parcours 

Route::get('parcours/{user_id}',[
    'uses'=>'ParcoursController@index',
    'as'=> 'parcours.index'
]);


Route::Post('parcours',[
    'uses'=>'ParcoursController@store',
    'as'=> 'parcours.store'
]);


Route::get('parcours/{user_id}/{parcours_id}',[
    'uses'=>'ParcoursController@show',
    'as'=> 'parcours.show'
]);


Route::put('parcours/{user_id}/{parcours_id}',[
    'uses'=>'ParcoursController@update',
    'as'=> 'parcours.update'
]);


Route::delete('parcours/{user_id}/{parcours_id}',[
    'uses'=>'ParcoursController@destroy',
    'as'=> 'parcours.destroy'
]);


//////////////////////////////////////////////////////////
//route pour les projets 

Route::get('projet/{user_id}',[
    'uses'=>'ProjetController@index',
    'as'=> 'projet.index'
]);


Route::Post('projet',[
    'uses'=>'ProjetController@store',
    'as'=> 'projet.store'
]);


Route::get('projet/{user_id}/{projet_id}',[
    'uses'=>'ProjetController@show',
    'as'=> 'projet.show'
]);


Route::put('projet/{user_id}/{projet_id}',[
    'uses'=>'ProjetController@update',
    'as'=> 'projet.update'
]);


Route::delete('projet/{user_id}/{projet_id}',[
    'uses'=>'ProjetController@destroy',
    'as'=> 'projet.destroy'
]);



//////////////////////////////////////////////////////////
//route pour les technologies

Route::get('technologie/{user_id}',[
    'uses'=>'TechnologieController@index',
    'as'=> 'technologie.index'
]);


Route::Post('technologie',[
    'uses'=>'TechnologieController@store',
    'as'=> 'technologie.store'
]);


Route::get('technologie/{user_id}/{technologie_id}',[
    'uses'=>'TechnologieController@show',
    'as'=> 'technologie.show'
]);


Route::put('technologie/{technologie_id}',[
    'uses'=>'TechnologieController@update',
    'as'=> 'technologie.update'
]);


Route::delete('technologie/{user_id}/{technologie_id}',[
    'uses'=>'TechnologieController@destroy',
    'as'=> 'technologie.destroy'
]);

Route::get('technologie_by_projet/{projet_id}',[
    'uses'=>'TechnologieController@show_by_projet',
    'as'=> 'technologie.show_by_projet'
]);



//////////////////////////////////////////////////////////
//route pour les categories

Route::get('categorie',[
    'uses'=>'CategorieController@index',
    'as'=> 'categorie.index'
]);


Route::Post('categorie',[
    'uses'=>'CategorieController@store',
    'as'=> 'categorie.store'
]);


Route::get('categorie/{categorie_id}',[
    'uses'=>'CategorieController@show',
    'as'=> 'categorie.show'
]);


Route::put('categorie/{categorie_id}',[
    'uses'=>'CategorieController@update',
    'as'=> 'categorie.update'
]);


Route::delete('categorie/{categorie_id}',[
    'uses'=>'CategorieController@destroy',
    'as'=> 'categorie.destroy'
]);


//////////////////////////////////////////////////////////
//route pour Apropos

Route::get('apropos/{user_id}',[
    'uses'=>'AproposController@index',
    'as'=> 'apropos.index'
]);


Route::post('apropos/{user_id}',[
    'uses'=>'AproposController@store',
    'as'=> 'apropos.store'
]);


Route::get('apropos/{user_id}/{apropos_id}',[
    'uses'=>'AproposController@show',
    'as'=> 'apropos.show'
]);


Route::put('apropos/{user_id}/{apropos_id}',[
    'uses'=>'AproposController@update',
    'as'=> 'apropos.update'
]);


Route::delete('apropos/{user_id}/{apropos_id}',[
    'uses'=>'AproposController@destroy',
    'as'=> 'apropos.destroy'
]);


//////////////////////////////////////////////////////////
//route pour Experience

Route::get('experience/{projet_id}',[
    'uses'=>'ExperienceController@index',
    'as'=> 'experience.index'
]);


Route::Post('experience',[
    'uses'=>'ExperienceController@store',
    'as'=> 'experience.store'
]);

Route::Post('experience/{projet_id}',[
    'uses'=>'ExperienceController@store2',
    'as'=> 'experience.store2'
]);


Route::get('experience/{projet_id}/{experience_id}',[
    'uses'=>'ExperienceController@show',
    'as'=> 'experience.show'
]);


Route::put('experience/{projet_id}/{experience_id}',[
    'uses'=>'ExperienceController@update',
    'as'=> 'experience.update'
]);


Route::delete('experience/{projet_id}/{experience_id}',[
    'uses'=>'ExperienceController@destroy',
    'as'=> 'experience.destroy'
]);




// les routes pour l'authentification

Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('register');

Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');

Route::post('logoutapi', [App\Http\Controllers\API\AuthController::class, 'logoutapi'])->name('logoutapi');

Route::get('user/{user_id}', [App\Http\Controllers\API\AuthController::class, 'index'])->name('user_index');

Route::put('user/{user_id}', [App\Http\Controllers\API\AuthController::class, 'update'])->name('user_update');
