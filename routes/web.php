<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Settings\Security\PermissionController;

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


Route::group(

    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

    //...
    Route::get('/', function () {
            return redirect('dashboard');
        });

    //...
    Route::get('dashboard', [DashboardController::class, 'create'])->name('dashboard.create');

    //...
    Route::get('profil', [ProfileController::class, 'create'])->name('profile.create');

    //..
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //
    Route::prefix('settings/')->group(function () {
        Route::get('permission', [PermissionController::class, 'index'])->name('permission.create');
        Route::post('formPermission', [PermissionController::class, 'create']);
        Route::post('setPermission', [PermissionController::class, 'store']);
        Route::post('getPermission', [PermissionController::class, 'getData']);
        Route::post('deletePermission', [PermissionController::class, 'deleteRow']);
        Route::post('togglePermission', [PermissionController::class, 'disableRow']);
    });

    // Route::name('admin.')->group(function () {
    //     Route::get('/users', function () {
    //         // Route assigned name "admin.users"...
    //     })->name('users');
    // });

});


// Route::get('/', function () {
//     return view('components.layout.app-layout');
// });

// Route::get('/', [DashboardController::class, 'create'])->name('profile.create');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
