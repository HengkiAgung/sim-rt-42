<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Citizen\ManagementCitizenController;
use App\Http\Controllers\HallwaysController;
use App\Http\Controllers\ManagementFamilyController;
use App\Http\Controllers\DashboardController;
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
    return redirect()->route("dashboard");
});

Route::get("login", [AuthController::class, "login"])->name("login");
Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");


Route::middleware(['auth'])->group(function () {
    Route::post("logout", [AuthController::class, "logout"])->name("logout");
    Route::post('reset/password', [AuthController::class, 'resetPassword'])->name('reset.password');

    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

    Route::prefix("citizen")->group(function () {
        Route::controller(ManagementCitizenController::class)->group(function () {
            Route::get("/", 'index')->name('citizen.index');
            Route::get("/get/datatable", 'getDataTable')->name('citizen.get.datatable');
            Route::post("/store", 'store')->name('citizen.store');
            Route::get("/{id}/manage", 'manageCitizen')->name('citizen.manage');
            Route::put("/{id}/update", 'update')->name('citizen.update');
            Route::post("/{id}/delete", 'destroy')->name('citizen.delete');
            Route::get("/export", 'getExcelTemplate')->name('citizen.export');
            Route::post("/import", 'importCitizen')->name('citizen.import');
        });
    });

    Route::prefix("family")->group(function () {
        Route::controller(ManagementFamilyController::class)->group(function () {
            Route::get("/", 'index')->name('family.index');
            Route::post("/store", 'store')->name('family.store');
            Route::post("/update", 'update')->name('family.update');
            Route::post("/delete", 'delete')->name('family.delete');
            Route::get("/get/datatable", 'getDataTable')->name('family.get.datatable');
            Route::get('/detail/{id}', 'detail')->name('family.detail');
            Route::get('/get-member/datatable', 'getMemberDataTable')->name('family.get-member.datatable');
            // family.assign-citizen
            Route::post('/assign-citizen', 'assignCitizen')->name('family.assign-citizen');
            // family.delete-member
            Route::post('/delete-member', 'deleteMember')->name('family.delete-member');
            Route::post("/import", 'importFamilies')->name('family.import');
        });
    });

    Route::prefix("hallways")->group(function () {
        Route::controller(HallwaysController::class)->group(function () {
            Route::get("/", 'index')->name('hallways.index');
            Route::get("/get/datatable", 'getDataTable')->name('hallways.get.datatable');
            Route::post("/store", 'store')->name('hallways.store');
            Route::post("/update", 'update')->name('hallways.update');
            Route::post("/delete", 'delete')->name('hallways.delete');
        });
    });

});
