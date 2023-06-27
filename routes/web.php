<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesOrderController;
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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/product/search', [ProductController::class, 'search'])->name('product.search');
Route::post('/customer/search', [CustomerController::class, 'search'])->name('customer.search');
Route::post('/order/search', [SalesOrderController::class, 'search'])->name('order.search');

Route::middleware('auth')->group(function () {
    Route::group(['prefix'=>'/document'], function (){
        Route::get('/print-surat-jalan/{document}', [DocumentController::class, 'printSuratJalan'])->name('printSuratJalan');
        Route::get('/print-invoice/{document}', [DocumentController::class, 'printInvoice'])->name('printInvoice');
        Route::get('/download-surat-jalan/{document}', [DocumentController::class, 'downloadSuratJalan'])->name('downloadSuratJalan');
        Route::get('/download-invoice/{document}', [DocumentController::class, 'downloadInvoice'])->name('downloadInvoice');
        Route::get('/create/{order}', [DocumentController::class, 'create'])->name('document.create');
    });
    Route::resource('document', DocumentController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', SalesOrderController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
