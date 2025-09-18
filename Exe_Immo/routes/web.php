<?php

use App\Http\Controllers\EstateController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/estate')
    ->name('estate.')
    ->controller(EstateController::class)
    ->group(function(){
        //GET
        Route::get('/','index')->name('index');
        Route::get('/{estate}/detail', 'show')->name('show');
        //POST
        Route::get('/create','new')->name('new');
        Route::post('/create','store');
        //Edit
        Route::get('/{estate}/edit', 'edit')->name('edit');
        Route::post('/{estate}/edit','update');
        //Delete
        Route::get('/{estate}/delete', 'delete')->name('delete');
        Route::post('/{estate}/delete', 'remove');
});
