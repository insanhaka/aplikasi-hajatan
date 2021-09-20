<?php

use Illuminate\Support\Facades\Route;

//===============FRONTEND ROUTE===============//
use App\Http\Controllers\FrontlandingController;
use App\Http\Controllers\FrontAuthController;

//===============BACKEND ROUTE================//
use App\Http\Controllers\AuthorizeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\Tema_UndanganController;




//=========================FRONTEND ROUTE=================================//

Route::get('/', [FrontlandingController::class, 'index'])->name('landing');
Route::get('/masuk', [FrontAuthController::class, 'login'])->name('masuk');
Route::get('/daftar', [FrontAuthController::class, 'signup'])->name('daftar');

//=========================BACKEND ROUTE=================================//

Route::get('/masuk-dapur', [AuthorizeController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthorizeController::class, 'postlogin']);
Route::get('/signup', [AuthorizeController::class, 'signup'])->name('signup');
Route::post('/postsignup', [AuthorizeController::class, 'postsignup']);
Route::get('/notactive', [AuthorizeController::class, 'notactive'])->name('notactive');

Route::group(['prefix' => 'dapur', 'middleware' => 'auth'], function () {

    Route::get('/logout', [AuthorizeController::class, 'logout']);

    Route::get('/', [HomeController::class, 'index'])->name('home');

    //Route Untuk Super Admin
    Route::get('/super/dashboard', [UsersController::class, 'index'])->name('admin');
    Route::get('/super/view', [UsersController::class, 'view']);
    Route::get('/super/view/add', [UsersController::class, 'add']);
    Route::post('/super/view/create', [UsersController::class, 'create']);
    Route::get('/super/view/{id}/edit', [UsersController::class, 'edit']);
    Route::post('/super/view/{id}/update', [UsersController::class, 'update']);
    Route::get('/super/view/{id}/delete', [UsersController::class, 'delete']);
    Route::post('/super/activation', [UsersController::class, 'activation']);

    Route::get('/super/roles', [RolesController::class, 'view'])->name('roles');
    Route::get('/super/roles/add', [RolesController::class, 'add']);
    Route::post('/super/roles/create', [RolesController::class, 'create']);
    Route::get('/super/roles/{id}/edit', [RolesController::class, 'edit']);
    Route::post('/super/roles/{id}/update', [RolesController::class, 'update']);
    Route::get('/super/roles/{id}/delete', [RolesController::class, 'delete']);

    Route::get('/super/permission', [PermissionController::class, 'view'])->name('permission');
    Route::get('/super/permission/add', [PermissionController::class, 'add']);
    Route::post('/super/permission/create', [PermissionController::class, 'create']);
    Route::get('/super/permission/{id}/show', [PermissionController::class, 'show']);
    Route::get('/super/permission/{id}/edit', [PermissionController::class, 'edit']);
    Route::post('/super/permission/{id}/update', [PermissionController::class, 'update']);
    Route::get('/super/permission/{id}/delete', [PermissionController::class, 'delete']);

    Route::get('/super/menu', [MenuController::class, 'view'])->name('menu');
    Route::get('/super/menu/add', [MenuController::class, 'add']);
    Route::post('/super/menu/create', [MenuController::class, 'create']);
    Route::get('/super/menu/{id}/edit', [MenuController::class, 'edit']);
    Route::post('/super/menu/{id}/update', [MenuController::class, 'update']);
    Route::get('/super/menu/{id}/delete', [MenuController::class, 'delete']);
    Route::post('/menu/activation', [MenuController::class, 'activation']);

    //Route Untuk Admin Lain (Sesuai Menu)

    Route::get('/user/{id}/profile', [UsersController::class, 'profile']);
    Route::get('/user-profile/{id}/edit', [UsersController::class, 'editprofile']);
    Route::post('/user-profile/{id}/update', [UsersController::class, 'updateprofile']);

    Route::get('/pengguna', [PenggunaController::class, 'view'])->name('pengguna');
    Route::get('/pengguna/activation', [PenggunaController::class, 'activation']);
    Route::get('/pengguna/getdatapengguna-serverside', [PenggunaController::class, 'getDataPenggunaServerSide']);

    Route::get('/tema-undangan', [Tema_UndanganController::class, 'view'])->name('tema-undangan');
    Route::get('/tema-undangan/add', [Tema_UndanganController::class, 'add']);
    Route::post('/tema-undangan/create', [Tema_UndanganController::class, 'create']);
    Route::get('/tema-undangan/edit/{id}', [Tema_UndanganController::class, 'edit']);
    Route::post('/tema-undangan/update/{id}', [Tema_UndanganController::class, 'update']);
    Route::get('/tema-undangan/delete/{id}', [Tema_UndanganController::class, 'delete']);
    Route::post('/tema-undangan/activation', [Tema_UndanganController::class, 'activation']);


    // Route::post('/getRegenciesFromProvince', function (Request $request) {
    //     $arrRegencies = App\Regency::where('province_id', $request->paramid)->orderBy('name','asc')->pluck('id','name')->prepend('','');
    //     return response()->json(['code' => 200,'data' => $arrRegencies], 200);
    // })->name('getregenciesfromprovince');

});