<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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
|GET - Request a resource
|POST - Create a resource
|PUT - Upadate a resource
|PATCH - Modify a resource
|DELETE - Delete a resource
|OPTIONS - Ask the server which verbs are allowed
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// GET

Route::get('/', HomeController::class)->name('home.index');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/services', [HomeController::class, 'services'])->name('home.services');







Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
