<?php

use App\Http\Controllers\getCsv;
use Illuminate\Support\Facades\DB;
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


Route::prefix('api')->group(function () {
    Route::post('/getCsv', [getCsv::class, 'getCsv'])->name('getCsv');
});
