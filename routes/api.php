<?php

use Illuminate\Http\Request;
use App\Http\Middleware\ValidateUser;


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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return $request->user();
//});

Route::apiResource('/user', 'UserController');
Route::post('/login', 'UserController@login');

Route::group(['middleware' => ['auth']], function () {
    
    Route::apiResource('/book', 'BookController');
    Route::post('/lend', 'UserController@lend');

});
