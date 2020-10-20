<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UsersController;
use GuzzleHttp\Middleware;

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

Route::post('register',[UsersController::class,'store']);
Route::post('login',[UsersController::class, 'login']);
Route::group(['middleware' => ['auth:api']], function () {

    Route::put('update',[UsersController::class, 'update']);
    Route::get('detail',[UsersController::class, 'details']);
    Route::post('logout',[UsersController::class, 'logout']);
});
