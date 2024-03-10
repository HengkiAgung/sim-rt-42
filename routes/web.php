<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Citizen\ManagementCitizenController;
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
    });
});
