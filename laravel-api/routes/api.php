<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use CloudCreativity\LaravelJsonApi\Facades\JsonApi;
// use \CloudCreativity\LaravelJsonApi\Resolver\
// use App\http\Controllers\Api\V1\FacController;
// use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request;
});



// Route::get('facs', function() {
    
//     return Facs::all();
// });


// Route::group([
//     'middleeare' => 'api',
//     'prefix' => 'fac',    
// ], function ($source){
    // Route::get('list', 'FacController@index');
    // Route::get('show/{id}', 'FacController@show');
    // Route::post('new', 'FacController@store');
    // Route::put('edit/{id}', 'FacController@update');
    // Route::delete('delete{id}', 'FacController@delete');


// });



// JsonApi::register('default')->routes(function ($api){ 
//     $api->resource('facs', FastController::class);
// });


 
// Route::get('hi', function(){
//     return "holi";
// });

// Route::get('log', function(){
//     return "hola ";
// });


// Route::get('jdjd', function(){
//     return "eee";
// });
JsonApi::register('default')->middleware('auth:api')->withNamespace('api')->routes(function($api){
// ->withNamespace('api')
    $api->resource('facs');
    $api->resource('estados');
});




Route::get('hiu', function(){
    return "holi";
    });
    //     return "holi";
    // JsonApiRoute::server('v1')
    // ->prefix('v1')
    // // ->namespace('Api\V1')
    // ->resources(function($server){
    //     $server->resource('facs', FacController::class);
    // });
// Route::get('hi', function(){
//     return "holi";
// });

Route::group([
   'prefix' => 'auth'
], function () {
    //Route::post('login', [AuthController::class, 'login'] );
    Route::post('login', [AuthController::class, 'login'])->name('api.auth.login');
    Route::post('signup', [AuthController::class, 'signUp']);

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('userA', [AuthController::class, 'user']);
     
    });
});



    // JsonApiRoute::server('v1')
    // ->prefix('v1')
    // // ->namespace('Api\V1')
    // ->resources(function($server){
    //     $server->resource('facs', FacController::class);
    // });



/* 
Personal access client created successfully.
Client ID: 950e9602-24a8-4222-b4b0-d1d888185d10
Client secret: GV5nBBxQXk9783tnKCFr5ln5W6VYNvcCA9ON9phl
Password grant client created successfully.
Client ID: 950e9602-3e6f-4264-a93a-6e07cfed6e17
Client secret: GcWv2nGBLhnw2qRi6vd7Jpf4FgPmtkxnUDaQyC5t */