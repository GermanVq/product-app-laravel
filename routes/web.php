<?php

use App\Http\Controllers\DashboardController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'], function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/dashboard', [DashboardController::class, 'store'])->name('dashboard.store'); 

Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard.show');

Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');

Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('dashboard.update');

Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');

