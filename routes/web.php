<?php

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

Route::get('/', function () { return redirect()->route('contacts.index'); })->name('index');

Route::group(['prefix' => 'contacts'], function()
{
    Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------|
*/

Auth::routes();

Route::group(['middleware' => ['auth']], function ()
{
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::resource('contacts', App\Http\Controllers\ContactController::class);
    
    /*
    Route::group(['prefix' => 'contacts'], function()
    {
        Route::post('/', [App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
        Route::delete('/', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');
        Route::get('/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');

        Route::group(['prefix' => '{contact}'], function()
        {
        });
    });
    */
});