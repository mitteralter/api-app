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
/*JsonApi::registe0r('default')->withNamespace('api')->routes(function($api){
// ->withNamespace('api')
    $api->resource('facs');
});*/


Route::group([
   'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);

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
