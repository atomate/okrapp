<?php

use App\Http\Controllers\KeyResultController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ObjectiveController;

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

Route::group(['middleware' => 'auth'],function (){
    Route::group(['prefix' => 'companies'], function(){
        Route::get('/',[CompanyController::class,'index'])->name('company.index');
        Route::get('/create',[CompanyController::class,'create'])->name('company.create');
        Route::post('/',[CompanyController::class,'store'])->name('company.store');
        Route::get('/{company}/edit',[CompanyController::class,'edit'])->name('company.edit');
        Route::patch('/{company}',[CompanyController::class,'update'])->name('company.update');
        Route::delete('/{company}',[CompanyController::class,'destroy'])->name('company.destroy');
    });

    Route::group(['prefix' => 'objectives'],function(){
        Route::get('/', [ObjectiveController::class, 'index'])->name('objectives.index');
        Route::get('/create/{company}', [ObjectiveController::class, 'create'])->name('objectives.create');
        Route::post('/', [ObjectiveController::class, 'store'])->name('objectives.store');
        Route::get('/{objective}', [ObjectiveController::class, 'show'])->name('objectives.show');
        Route::get('/{objective}/edit', [ObjectiveController::class, 'edit'])->name('objectives.edit');
        Route::put('/{objective}', [ObjectiveController::class, 'update'])->name('objectives.update');
        Route::get('/{objective}/delete', [ObjectiveController::class,'destroy']);
        // Route::delete('/{objective}', [ObjectiveController::class, 'destroy'])->name('objectives.destroy');
    });

    Route::group(['prefix' => 'key_results'], function() {
        Route::get('/{company}',[KeyResultController::class,'show'])->name('key-result.show');
        Route::get('/{objective}/create',[KeyResultController::class,'create'])->name('key-result.create');
        Route::post('/',[KeyResultController::class,'store'])->name('key-result.store');
        Route::get('/{keyResult}/edit',[KeyResultController::class,'edit'])->name('key-result.edit');
        Route::patch('/{keyResult}',[KeyResultController::class,'update'])->name('key-result.update');
        Route::delete('/{keyResult}',[KeyResultController::class,'destroy'])->name('key-result.destroy');
    });
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/about', function () {
        return view('about');
    })->name('about');
    Route::get('/template', function () {
        return view('templates/index');
    });
});

Auth::routes();


