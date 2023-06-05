<?php

use App\Http\Controllers\Controller;
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

Route::get('/', function () { return view('statistics'); });

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/employee/store', [Controller::class, 'storeEmployee'])->name('store-employee');
Route::get('/employee/sign-in', function () {
    return view('statistics');
});

// statistics
Route::get('/statistics', [Controller::class, 'statisticsIndex'])->name('statistics');

Route::get('/sensor-data', function () {
    return view('statistics');
});
