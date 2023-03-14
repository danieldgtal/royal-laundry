<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomAuthenticatedSessionController;

// use App\Http\Controllers\LogoutController;

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


/*Home Controller */
Route::get('/', HomeController::class)->name('home.index');

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/services', [HomeController::class, 'services'])->name('home.services');

/* Authentication */
Route::post('/login',[CustomAuthenticatedSessionController::class,'login'])
  ->name('login');
Route::get('/login', [CustomAuthenticatedSessionController::class, 'create'])
  ->middleware('guest')->name('login');
Route::post('/logout', [CustomAuthenticatedSessionController::class, 'logout'])
  ->middleware('auth')->name('logout');
//Redirect user from default dashboard to specific user dashboard
Route::get('/redirect', [CustomAuthenticatedSessionController::class, 'redirectTo'])
  ->middleware(['auth','verified']);

// Route::get('logout', [LogoutController::class, '__invoke'])->name('logout');


/* User section */
Route::group(['prefix' => 'user', 'middleware' => ['auth','user','verified']], function (){
  /*user dashboard */
  Route::get('/',[UserController::class, 'index'])->name('user.dashboard');
  Route::get('dashboard',[UserController::class, 'index'])->name('user.dashboard');
  Route::get('notification',[UserController::class, 'notification'])->name('user.notification');
  Route::get('schedule',[UserController::class, 'schedule'])->name('user.schedule');
  Route::get('orders',[UserController::class, 'orders'])->name('user.orders');
  Route::get('invoice',[UserController::class, 'invoice'])->name('user.invoice');
  Route::get('transactions',[UserController::class, 'transactions'])->name('user.transactions');
  Route::get('checkout',[UserController::class, 'checkout'])->name('user.checkout');
  Route::get('feedback',[UserController::class, 'feedback'])->name('user.feedback');
  Route::get('profile',[UserController::class, 'profile'])->name('user.profile');
});

/* Staff section */
Route::group(['middleware' => ['auth','staff'], 'prefix' => 'staff' ], function (){
  /*staff dashboard */
  Route::get('/',[StaffController::class, 'index'])->name('staff.dashboard');
  Route::get('dashboard',[StaffController::class, 'index'])->name('staff.dashboard');
  Route::get('new-customer',[CustomerController::class, 'create'])->name('staff.new-customer');
  Route::post('/new-customer',[CustomerController::class, 'store'])->name('staff.new-customer');
  Route::get('all-customers',[CustomerController::class, 'index'])->name('staff.all-customers');
  Route::get('/items', [StaffController::class, 'listItems'])->name('staff.items');
  Route::get('invoices', \App\Http\Livewire\Staff\Invoices::class)->name('staff.invoices');
  Route::get('inventories', \App\Http\Livewire\Staff\Inventories::class)->name('staff.inventories');
  Route::get('orders', \App\Http\Livewire\Staff\Orders::class)->name('staff.orders');
});

/* Owner section */
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin'] ], function (){
  /*owner  dashboard */
  Route::get('/',[AdminController::class, 'index'])->name('admin.dashboard');
  Route::get('dashboard',[AdminController::class, 'index'])->name('admin.dashboard');
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
