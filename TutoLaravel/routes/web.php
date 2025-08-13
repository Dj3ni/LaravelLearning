<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
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

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('login', [AuthController::class, 'doLogin']);



Route::prefix('/user')
	->name('user.')
	->controller(UserController::class)
	->group(function(){
		// Get
        Route::get('/', 'index')->name('index');

        // Create — avant la route paramétrée !
        Route::get('/new', 'create')->name('create');
        Route::post('/new', 'store');

        // Show
        Route::get('/{user}/details', 'show')->name('show');
		
	});

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function (){    
	Route::get('/','index')   
	->name('index');
	// Create
	Route::get('/new','create')
	->name('create');
	Route::post('/new','store');
	//Edit
	Route::get('/{post}/edit','edit')
	->name('edit');
	Route::post('/{post}/edit', 'update');

	//Get
    Route::get('/{slug}-{post}', 'show')    
	->where([        
		"id" => '[0-9]+',        
		"slug" => '[a-z0-9\-]+'     
	])
	->name('show');
	//Delete
	Route::get('/{post}/delete', 'remove')
	->name('remove');
	Route::post('/{post}/delete', 'delete')
	->name('delete');

	
	Route::get('/{category}', 'category')    
	->name('category')
	->where([
		"id" => '[0-9]+', 
	]);
});

