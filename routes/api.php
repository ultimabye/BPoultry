<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ShopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group([
    'prefix' => 'v1'
], function () {

    //Auth::routes();
    Route::post('login', [AuthController::class, 'login']);
    //Auth Routes
    // Route::post('register', [AuthController::class, 'register']);
    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('token/refresh', [AuthController::class, 'refreshToken']);



    // Route::post(
    //     '/password/email',
    //     [ApiForgotPasswordController::class, 'sendResetLinkEmail']
    // )->name('password.email');


    // Route::post(
    //     '/password/reset',
    //     [ResetPasswordController::class, 'reset']
    // )->name('password.reset');

    // Route::post(
    //     '/email/verify/{id}/{hash}',
    //     [ApiEmailVerificationController::class, 'verify']
    // )->name('verification.verify');





    Route::middleware('auth:api')->group(function () {

        // Route::post(
        //     '/email/resend',
        //     [ApiEmailVerificationController::class, 'resend']
        // )->name('verification.resend');

        Route::post('/collection', [CollectionController::class, 'store']);
        Route::get('/driver/{id}/shops', [ShopController::class, 'driverShops']);
    });
});
