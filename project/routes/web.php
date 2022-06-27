<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Auth::routes();

Route::group(['prefix' => 'companies'], function(){
   Route::get('/',[CompanyController::class,'index'])->name('company.index');
   Route::get('/create',[CompanyController::class,'create'])->name('company.create');
   Route::get('/{company}/edit',[CompanyController::class,'edit'])->name('company.edit');
   Route::patch('/{company}',[CompanyController::class,'update'])->name('company.update');
   Route::delete('/{company}',[CompanyController::class,'destroy'])->name('company.destroy');
});




Route::get('/objectives', [ObjectiveController::class, 'index'])->name('objectives.index');

Route::get('/objectives/create', [ObjectiveController::class, 'create'])->name('objectives.create');

Route::post('/objectives', [ObjectiveController::class, 'store'])->name('objectives.store');

Route::get('/objectives/{objective}', [ObjectiveController::class, 'show'])->name('objectives.show');

Route::get('/objectives/{objective}/edit', [ObjectiveController::class, 'edit'])->name('objectives.edit');

Route::put('/objectives/{objective}', [ObjectiveController::class, 'update'])->name('objectives.update');

Route::delete('/objectives/{objective}', [ObjectiveController::class, 'destroy'])->name('objectives.destroy');
Route::get('/template', function () {
    return view('templates/index');
});
