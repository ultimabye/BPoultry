<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BankAccountsController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\ContractorPaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopPaymentController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\VoucherController;
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





Auth::routes();



Route::middleware('auth')->group(function () {

    Route::get('/addShop', function () {
        return view('poultry/addShop');
    });
    Route::get('/updateShop', function () {
        return view('poultry/updateShop');
    });



    Route::get('/updateContractor', function () {
        return view('poultry/updateContractor');
    });

    Route::get('/updateDriver', function () {
        return view('poultry/updateDriver');
    });

    Route::get('/allCollections',  [CollectionController::class, 'index']);
    Route::get(
        '/collection/{id}/edit',
        [CollectionController::class, 'view']
    )->name('view-collection');
    Route::post('/update-collection', [CollectionController::class, 'update']);
    Route::get(
        '/collection/{id}/delete',
        [CollectionController::class, 'delete']
    )->name('delete-collection');



    Route::get('/logout', [AuthController::class, 'logout']);


    Route::get('/index2',  [HomeController::class, 'index']);
    Route::get('/', [HomeController::class, 'index']);


    Route::get('/addDriver', function () {
        return view('poultry/addDriver');
    });
    Route::get('/updateDriver', function () {
        return view('poultry/updateDriver');
    });


    Route::get('/addContractor', function () {
        return view('poultry/addContractor');
    });


    Route::get('/addShop', function () {
        return view('poultry/addShop');
    });
    Route::get('/updateShop', function () {
        return view('poultry/updateShop');
    });
    Route::get(
        '/shops/{id}/edit',
        [ShopController::class, 'viewShop']
    )->name('view-shop');
    Route::post('/update-shop', [ShopController::class, 'update']);




    Route::post('/save-driver', [DriverController::class, 'store']);
    Route::get('/allDrivers',  [DriverController::class, 'index']);
    Route::get(
        '/drivers/{id}/edit',
        [DriverController::class, 'viewDriver']
    )->name('view-driver');
    Route::post('/update-driver', [DriverController::class, 'update']);


    Route::post('/save-shop', [ShopController::class, 'store']);
    Route::get('/allShops', [ShopController::class, 'index']);
    Route::post('save-shop-payment', [ShopPaymentController::class, 'store']);
    Route::get('/shopsReport', [ShopController::class, 'report']);
    Route::get('/shop/{id}/detail', [ShopController::class, 'shopLedger']);



    Route::post('/save-contractor', [ContractorController::class, 'store']);
    Route::post('/update-contractor', [ContractorController::class, 'update']);
    Route::get('/allContractors', [ContractorController::class, 'index']);
    Route::get(
        '/contractors/{id}/edit',
        [ContractorController::class, 'viewContractor']
    )->name('view-contractor');
    Route::get('/contractorsReport', [ContractorController::class, 'report']);
    Route::get('/contractor/{id}/detail', [ContractorController::class, 'ledger']);

    Route::post('save-contractor-payment', [ContractorPaymentController::class, 'store']);
});






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
    '/invoice/{order_id}&{invoice_type}',
    [InvoiceController::class, 'index']
)->name('invoice');

Route::get(
    '/invoice/view/{order_id}',
    [InvoiceController::class, 'prepareForPrint']
)->name('view_invoice');



Route::post('save-new-bank-account', [BankAccountsController::class, 'store']);
Route::get('/allBanks',  [BankAccountsController::class, 'index']);


Route::post('save-new-expense', [ExpenseController::class, 'store']);
Route::get('/allExpenses',  [ExpenseController::class, 'index']);


Route::get('/searchVoucher',  [VoucherController::class, 'index']);
Route::get('/voucher/out/{id}',  [VoucherController::class, 'prepareOutboundPayment']);
Route::get('/voucher/in/{id}',  [VoucherController::class, 'prepareInboundPayment']);


Route::post('save-outbound-payment', [PaymentController::class, 'handleOutboundPayment']);
Route::post('save-inbound-payment', [PaymentController::class, 'handleInboundPayment']);
