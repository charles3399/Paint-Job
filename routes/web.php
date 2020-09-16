<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaintJobController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [PaintJobController::class, 'index']);

Route::resource('paintjob', PaintJobController::class);

Route::get('joblist', [PaintJobController::class, 'viewPaintJob'])->name('paintjob.list');
