<?php

use App\Http\Controllers\SuppliersController;
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
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/index2', function () {
    return view('index2');
});
Route::get('/addCustomer', function () {
    return view('addCustomer');
});
Route::get('/allCustomers', function () {
    return view('allCustomers');
});

Route::get('/addExpenses', function () {
    return view('addExpenses');
});
Route::get('/allExpenses', function () {
    return view('allExpenses');
});
Route::get('/addSupplier', function () {
    return view('addSupplier');
});
Route::get('/allSuppliers', function () {
    return view('allSuppliers');
});
Route::get('/addProduct', function () {
    return view('addProduct');
});
Route::get('/allProducts', function () {
    return view('allProducts');
});
Route::get('/addSale', function () {
    return view('addSale');
});
Route::get('/allSales', function () {
    return view('allSales');
});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('save-new-supplier', [SuppliersController::class, 'store']);