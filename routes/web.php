<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Citizen\ManagementCitizenController;
use App\Http\Controllers\ManagementFamilyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("login", [AuthController::class, "login"])->name("login");

Route::prefix("citizen")->group(function () {
    Route::controller(ManagementCitizenController::class)->group(function () {
        Route::get("/", 'index')->name('citizen.index');
        Route::get("/get/datatable", 'getDataTable')->name('citizen.get.datatable');
        Route::post("/store", 'store')->name('citizen.store');
    });
});

Route::prefix("family")->group(function () {
    Route::controller(ManagementFamilyController::class)->group(function () {
        Route::get("/", 'index')->name('family.index');
        Route::get("/get/datatable", 'getDataTable')->name('family.get.datatable');

    });
});
