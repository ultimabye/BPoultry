<?php

use App\Http\Controllers\BankAccountsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SuppliersController;
use App\Models\BankAccount;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('index2');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/addCustomer', function () {
    return view('addCustomer');
});

Route::get('/addExpenses', function () {
    return view('addExpenses');
});

Route::get('/addSupplier', function () {
    return view('addSupplier');
});

Route::get('/addSale', function () {
    return view('addSale');
});
Route::get('/index2', function () {
    return view('index2');
});

Route::get('/saleSuccess', function () {
    return view('saleSuccess');
})->name('saleSuccess');

Route::get('/supplierInvoice', function () {
    return view('supplierInvoice');
});

Route::get('/addBank', function () {
    return view('addBank');
});


Route::get('/searchVoucher', function () {
    return view('searchVoucher');
});

Route::get('/saleReceipt', function () {
    return view('saleReceipt');
})->name('saleReceipt');

Route::get('/purchaseReceipt', function () {
    return view('purchaseReceipt');
})->name('purchaseReceipt');








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/save-new-supplier', [SuppliersController::class, 'store']);
Route::get('/allSuppliers',  [SuppliersController::class, 'index']);


Route::post('save-new-customer', [CustomerController::class, 'store']);
Route::get('/allCustomers',  [CustomerController::class, 'index']);


Route::get('/addProduct',  [ProductController::class, 'prepareNewProduct']);
Route::post('save-new-product', [ProductController::class, 'store']);
Route::get('/allProducts',  [ProductController::class, 'index']);

Route::get('/addPurchase',  [PurchaseController::class, 'prepareNewPurchase']);
Route::post('save-new-purchase', [PurchaseController::class, 'store']);
Route::get('/allPurchases',  [PurchaseController::class, 'index']);



Route::get('/newSale',  [SalesController::class, 'prepareNewSale']);
Route::post('save-new-sale', [SalesController::class, 'store']);
Route::get('/allSales',  [SalesController::class, 'index']);


Route::get(
    '/customerInvoice/{order_id}&{invoice_type}',
    [InvoiceController::class, 'index']
)->name('customerInvoice');



Route::post('save-new-bank-account', [BankAccountsController::class, 'store']);
Route::get('/allBanks',  [BankAccountsController::class, 'index']);



Route::post('save-new-expense', [ExpenseController::class, 'store']);
Route::get('/allExpenses',  [ExpenseController::class, 'index']);