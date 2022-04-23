<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfoliosController;
use App\Http\Controllers\PagesController;

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

Route::get('/', function(){
    return view('welcome');         
});

Route:: get('/',[PagesController::class,'index'])-> name('index');


Route:: get('/portfolios','App\Http\Controllers\PortfoliosController@index')-> name('portfolios.index');
Route:: get('/portfolios/show',[PortfoliosController::class,'show'])-> name('portfolios.show');
Route:: get('/portfolios/upload/new',[PortfoliosController::class,'create'])-> name('portfolios.upload');
Route:: post('/portfolios/upload/post','App\Http\Controllers\PortfoliosController@store')-> name('portfolios.store');

Route:: get('/portfolios/categories/{slug}','CategoriesController@show')-> name('categories.show');

// Route:: get('/admin','App\Http\Controllers\Backend\PagesController@index')-> name('admin.index');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'App\Http\Controllers\Backend\PagesController@index')->name('admin.index');

    Route::group(['prefix' => 'portfolios'], function(){
        Route::get('/', 'App\Http\Controllers\Backend\PortfoliosController@index')->name('admin.portfolios.index');
        // Route::get('/{id}', 'App\Http\Controllers\Backend\PortfoliosController@show')->name('admin.portfolios.show');
        
        Route::get('/create', 'App\Http\Controllers\Backend\PortfoliosController@create' )->name('admin.portfolios.create');
        Route::get('/edit/{id}', 'App\Http\Controllers\Backend\PortfoliosController@edit')->name('admin.portfolios.edit');
        
        Route::post('/store', 'App\Http\Controllers\Backend\PortfoliosController@store' )->name('admin.portfolios.store');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\PortfoliosController@update')->name('admin.portfolios.update');
        
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\PortfoliosController@destroy')->name('admin.portfolios.delete');
    });

    Route::group(['prefix' => 'businessperson' ], function(){
        Route::get('/', 'App\Http\Controllers\Backend\BusinessPersonController@index')->name ('admin.businessperson.index');
        Route::post('/store', 'App\Http\Controllers\Backend\BusinessPersonController@store' )->name('admin.businessperson.store');
        Route::get('/{id}', 'App\Http\Controllers\Backend\BusinessPersonController@show')->name('admin.businessperson.show');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\BusinessPersonController@update')->name('admin.businessperson.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\BusinessPersonController@destroy')->name('admin.businessperson.delete');
        // Route::post('/deleteproduct/{id}', 'App\Http\Controllers\Backend\BusinessPersonController@deleteproduct')->name('deleteproduct');
    });

    Route::group(['prefix' => 'categories' ], function(){
        Route::get('/', 'App\Http\Controllers\Backend\CategoriesController@index')->name ('admin.categories.index');
        Route::post('/store', 'App\Http\Controllers\Backend\CategoriesController@store' )->name('admin.categories.store');
        Route::get('/{id}', 'App\Http\Controllers\Backend\CategoriesController@show')->name('admin.categories.show');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\CategoriesController@update')->name('admin.categories.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\CategoriesController@destroy')->name('admin.categories.delete');
    });

    Route::group(['prefix' => 'profilecreator' ], function(){
        Route::get('/', 'App\Http\Controllers\Backend\ProfileCreatorController@index')->name ('admin.profilecreator.index');
        Route::post('/store', 'App\Http\Controllers\Backend\ProfileCreatorController@store' )->name('admin.profilecreator.store');
        Route::get('/{id}', 'App\Http\Controllers\Backend\ProfileCreatorController@show')->name('admin.profilecreator.show');
        Route::post('/update/{id}', 'App\Http\Controllers\Backend\ProfileCreatorController@update')->name('admin.profilecreator.update');
        Route::post('/delete/{id}', 'App\Http\Controllers\Backend\ProfileCreatorController@destroy')->name('admin.profilecreator.delete');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
