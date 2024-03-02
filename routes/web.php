<?php


use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
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
Route::post('/',[HomeController::class, 'report'])->name('report.store');


/* Authentication */
// Route::post('/login',[CustomAuthenticatedSessionController::class,'login'])
//   ->name('login');
// Route::get('/login', [CustomAuthenticatedSessionController::class, 'create'])
//   ->middleware('guest')->name('login');
Route::post('/logout', [CustomAuthenticatedSessionController::class, 'logout'])
  ->middleware('auth')->name('logout');

// Redirect user from default dashboard to specific user dashboard
Route::get('/redirect', [CustomAuthenticatedSessionController::class, 'redirectTo'])
  ->middleware(['auth','verified']);



/* User section */
Route::group(['prefix' => 'user', 'middleware' => ['auth','user']], function (){
 
  /*user dashboard */
  Route::get('/',[UserController::class, 'index'])->name('user.dashboard');
  Route::get('notification',[UserController::class, 'notification'])->name('user.notification');
  Route::get('schedule',[UserController::class, 'schedule'])->name('user.schedule');
  Route::get('orders',[UserController::class, 'orders'])->name('user.orders');
  Route::get('transactions',[UserController::class, 'transactions'])->name('user.transactions');
  Route::get('checkout',[UserController::class, 'checkout'])->name('user.checkout');
  Route::get('feedback',[UserController::class, 'feedback'])->name('user.feedback');
  Route::get('profile',[UserController::class, 'profile'])->name('user.profile');
  Route::get('booking',[UserController::class,'newOrder'])->name('user.booking');
  Route::get('cart',[UserController::class, 'cart'])->name('user.view-cart');
  Route::get('invoice',[UserController::class, 'invoice'])->name('user.invoice');
  Route::get('/order-invoice', \App\Http\Livewire\PreviewOrder::class )->name('user.order-invoice');
});



/* Staff section */
Route::group(['middleware' => ['auth','staff'], 'prefix' => 'staff' ], function (){
  
  /*staff dashboard */
  Route::get('/',[StaffController::class, 'index'])->name('staff.dashboard');
  // Route::get('dashboard',[StaffController::class, 'index'])->name('staff.dashboard');
  Route::get('customers',[StaffController::class, 'customers'])->name('staff.customers');
  Route::get('pickups', [StaffController::class,'pickups'])->name('staff.pickups');
  Route::get('orders', [StaffController::class,'orders'])->name('staff.orders');
  Route::get('invoices', [StaffController::class, 'invoices'])->name('staff.all-invoices');
  Route::get('search-invoice',[StaffController::class,'searchInvoice'])->name('staff.search-invoice');
  Route::get('gen-invoice', [StaffController::class,'generateInvoice'])->name('staff.gen-invoice');
  Route::get('inventories', [StaffController::class,'inventories'])->name('staff.inventories');
  Route::get('categories',[StaffController::class,'categoriesList'])->name('staff.categories');
  Route::get('items',[StaffController::class,'itemsList'])->name('staff.items');
  Route::get('feedbacks',[StaffController::class,'feedbacks'])->name('staff.feedbacks');
  Route::get('weighbill',[StaffController::class,'weighbill'])->name('staff.weighbill');
  Route::get('profile',[StaffController::class,'profile'])->name('staff.profile');
  Route::get('generated/invoice',[StaffController::class,'cart'])->name('staff.view_generated_invoice');
  Route::get('/order/view', [\App\Http\Livewire\Staff\PreviewOrder::class, 'orderView'] )->name('staff.view-order');
  Route::get('/invoice/view', [\App\Http\Livewire\Staff\ViewGeneratedInvoice::class, 'invoiceView'] )->name('staff.view-invoice');
  Route::get('/export-users-pdf', [\App\Http\Livewire\Staff\Customers::class, 'exportPDF'] )->name('export_users');
  Route::get('/export-users-excel', [\App\Http\Livewire\Staff\Customers::class, 'exportXLSX'] )->name('export_users_excel');
  Route::get('/export-pickup-pdf', [\App\Http\Livewire\Staff\Pickups::class, 'exportPickUpPdf'] )->name('export_pickup_pdf');
  Route::get('/export-order-pdf', [\App\Http\Livewire\Staff\Orders::class, 'exportOrderPDF'] )->name('export_orders_pdf');
  Route::get('/export-invoices-pdf', [\App\Http\Livewire\Staff\Invoices::class, 'exportInvoicePDF'] )->name('export_invoices_pdf');
  Route::get('/export-invoices-excel', [\App\Http\Livewire\Staff\Invoices::class, 'exportInvoiceEXCEL'] )->name('export_invoices_excel');
  Route::get('/staff-receipt',[\App\Http\Livewire\Staff\Invoices::class, 'staffReceipt'])->name('staff_receipt');
});

Route::get('/customer-receipt', [\App\Http\Livewire\Staff\Invoices::class, 'customerReceipt'])->name('customer_receipt');
Route::get('/staff-receipt', [\App\Http\Livewire\Staff\Invoices::class, 'staffReceipt'])->name('staff_receipt');

/* Owner section */
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin' ], function (){
  
  /*owner dashboard */
  Route::get('/',[AdminController::class, 'index'])->name('admin.home');
  // Route::get('home', [AdminController::class, 'index'])->name('admin.home');
  Route::get('staffs',[AdminController::class, 'staffs'])->name('admin.staffs');
  Route::get('invoices',[AdminController::class, 'invoices'])->name('admin.invoices');
  Route::get('categories',[AdminController::class,'categoriesList'])->name('admin.categories');
  Route::get('items',[AdminController::class,'itemsList'])->name('admin.items');
  Route::get('orders',[AdminController::class, 'orders'])->name('admin.orders');
  Route::get('feedbacks',[AdminController::class, 'feedbacks'])->name('admin.feedbacks');
  Route::get('profile',[AdminController::class, 'profile'])->name('admin.profile');
  Route::get('/order/view', [\App\Http\Livewire\Admin\OrderView::class, 'orderView'] )->name('admin.view-order');
  Route::get('/export-orders-pdf',[\App\Http\Livewire\Admin\Orders::class, 'exportOrderPDF'])->name('orders_export_pdf');
  Route::get('/export-invoices-pdf',[\App\Http\Livewire\Admin\Invoices::class, 'exportInvoicePDF'] )->name('invoices_export_pdf');
  Route::get('/export-invoices-excel',[\App\Http\Livewire\Admin\Invoices::class, 'exportInvoiceEXCEL'] )->name('invoices_export_excel');
  Route::get('/invoice/view',[\App\Http\Livewire\Admin\InvoiceView::class, 'invoiceView'] )->name('admin.view-invoice');
  Route::get('/staff-receipt',[\App\Http\Livewire\Staff\Invoices::class, 'staffReceipt'])->name('admin_receipt');
  Route::get('/customer-receipt', [\App\Http\Livewire\Staff\Invoices::class, 'customerReceipt'])->name('admin_customer_receipt');

});
