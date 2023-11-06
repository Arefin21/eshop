<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenAuthenticate;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/BrandLIst', [BrandController::class, 'BrandList']);
Route::get('/CategoryList', [CategoryController::class, 'CategoryList']);

Route::get('/ListProductByCategory/{id}', [ProductController::class, 'ListProductByCategory']);
Route::get('/ListProductByBrand/{id}', [ProductController::class, 'ListProductByBrand']);
Route::get('/ListProductByRemark/{remark}', [ProductController::class, 'ListProductByRemark']);
Route::get('/ListProductSlider', [ProductController::class, 'ListProductSlider']);
Route::get('/ProductDetailsById/{id}', [ProductController::class, 'ProductDetailsById']);
Route::get('/ListReviewByProduct/{product_id}', [ProductController::class, 'ListReviewByProduct']);

Route::get("/PolicyByType/{type}", [PolicyController::class, 'PolicyByType']);

//User Auth
Route::get('/UserLogin/{UserEmail}', [UserController::class, 'UserLogin']);
Route::get('/VerifyLogin/{UserEmail}/{otp}', [UserController::class, 'VerifyLogin']);
Route::get('/logout', [UserController::class, 'UserLogout']);

//User Profile

Route::post('/CreateProfile', [ProfileController::class, 'CreateProfile'])->middleware([TokenAuthenticate::class]);
Route::get('/ReadProfile', [ProfileController::class, 'ReadProfile'])->middleware([TokenAuthenticate::class]);