<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api_AuthorizeController;
use App\Http\Controllers\Api_UserController;
use App\Http\Controllers\Api_UndanganController;
use App\Http\Controllers\Api_PackageController;

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

Route::post('/postlogin', [Api_AuthorizeController::class, 'postlogin']);
Route::post('/postsignup', [Api_AuthorizeController::class, 'postsignup']);

Route::post('/googlesignup', [Api_AuthorizeController::class, 'googlesignup']);

Route::get('/package-list', [Api_PackageController::class, 'packagelist']);

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/simple-data-user/{email}', [Api_UserController::class, 'simpledatauser']);

    Route::get('/tema-undangan', [Api_UndanganController::class, 'temaundangan']);
});
