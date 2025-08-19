<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/', [ContactController::class, 'store']);
Route::get('/confirm', [ContactController::class,'confirm']);
Route::get('/thanks', [ContactController::class, 'thanks']);

Route::post('/register', [AuthController::class, 'create']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/admin/search', [AuthController::class, 'search']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AuthController::class, 'index']);
});