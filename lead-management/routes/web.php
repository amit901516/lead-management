<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
    return view('auth.login');
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

Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/view_lead', [AdminController::class, 'view_lead']);
Route::post('/add_lead', [AdminController::class, 'add_lead']);
Route::get('/manage_leads', [AdminController::class, 'manage_leads']);
Route::get('/delete_lead/{id}', [AdminController::class, 'delete_lead']);
Route::get('/edit_lead/{id}', [AdminController::class, 'edit_lead']);
Route::post('/edit_lead_confirm/{id}', [AdminController::class, 'edit_lead_confirm']);
