<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pdf', [App\Http\Controllers\CvbuilderController::class, 'index'])->name('pdf');
Route::post('/Cv-create', [App\Http\Controllers\CvbuilderController::class, 'store'])->name('cv.store');
Route::get('/Cv-edit', [App\Http\Controllers\CvbuilderController::class, 'edit'])->name('cv.edit');
Route::post('/Cv-update{id}', [App\Http\Controllers\CvbuilderController::class, 'update'])->name('update.cv');

Route::get('generate-pdf{id}', [App\Http\Controllers\CvbuilderController::class, 'generatePDF'])->name('generate-pdf');

// Route::get('pdfview',array('as'=>'pdfview','uses'=>'App\Http\Controllers\CvbuilderController@pdfview'));
