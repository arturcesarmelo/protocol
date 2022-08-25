<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CurrierController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\TenentmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=> 'auth'], function() {
    Route::get('/buildings', [BuildingController::class, 'index'])->name('buildings');
    Route::get('/buildings/new', [BuildingController::class, 'create'])->name('building_create');
    Route::post('/buildings', [BuildingController::class, 'new'])->name('building_new');
    Route::get('/buildings/{id}', [BuildingController::class, 'view'])->name('building_view');

    Route::get('/tenentment/{buildingId}/create', [TenentmentController::class, 'create'])->name('tenentment_create');
    Route::post('/tenentment/{buildingId}', [TenentmentController::class, 'store'])->name('tenentment_store');
    Route::get('/tenentment/{id}', [TenentmentController::class, 'view'])->name('tenentment_view');

    Route::get('/resident/{tenentmentId}/create', [ResidentController::class, 'create'])->name('resident_create');
    Route::post('/resident/{tenentmentId}', [ResidentController::class, 'store'])->name('resident_store');

    Route::get('/packages/{tenentmentId}/create', [PackageController::class, 'create'])->name('packages_create');
    Route::post('/packages/{tenentmentId}', [PackageController::class, 'store'])->name('packages_store');

    Route::get('/curriers', [CurrierController::class, 'index'])->name('curriers');
    Route::get('/curriers/create', [CurrierController::class, 'create'])->name('curriers_create');
    Route::post('/curriers/', [CurrierController::class, 'store'])->name('curriers_store');
    
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
