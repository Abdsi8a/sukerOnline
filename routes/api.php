<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\PointsProductController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



/////////////////////////////////////////////Auth
Route::middleware('auth:api')->group( function () {
    Route::post('/logout',[AuthenticationController::class,'logout']);
    
    Route::post('/resatPasswordEnternal',[AuthenticationController::class,'resatPasswordEnternal']);
});


Route::post('/register',[AuthenticationController::class,'register']);

Route::post('/verifyCode',[AuthenticationController::class,'verifyCode']);

Route::post('/loginUser',[AuthenticationController::class,'loginForUser']);

Route::post('/loginAdmin',[AuthenticationController::class,'loginForAdmin']);

Route::post('/forgetPassword',[AuthenticationController::class,'forgetPassword']);

Route::post('/verifyForgetPassword',[AuthenticationController::class,'verifyForgetPassword']);

Route::post('/resatPassword',[AuthenticationController::class,'resatPassword']);

//////////////////////////////////////////////////////////////////////////////// for products

Route::post('/AddProduct',[ProductController::class,'AddProduct']);
Route::get('/ProdctsDetails/{id}', [ProductController::class, 'ProdctsDetails']);
Route::post('/productsUpdate/{id}', [ProductController::class, 'updateProduct']);
Route::post('/onOffProduct/{id}', [ProductController::class, 'onOffProduct']);
Route::delete('/productsDelete/{id}', [ProductController::class, 'deleteProduct']);


Route::post('/AddPointsProduct',[PointsProductController::class,'AddPointsProduct']);
Route::get('/PointsProductDetails/{id}', [PointsProductController::class, 'PointsProductDetails']);
Route::post('/updatePointsProduct/{id}', [PointsProductController::class, 'updatePointsProduct']);
Route::post('/onOffPointsProduct/{id}', [PointsProductController::class, 'onOffPointsProduct']);
Route::delete('/deletePointsProduct/{id}', [PointsProductController::class, 'deletePointsProduct']);

Route::get('/productsAdmin/{type}', [ProductController::class, 'productsAdmin']);
Route::get('/Products/{type}', [ProductController::class, 'Products'])->middleware('auth:api');;


/////////////////////////////////////////////////////////////////////////////////// classification

Route::post('/AddClassification',[ClassificationController::class,'AddClassification']);
Route::get('/allClassifications',[ClassificationController::class,'allClassifications']);
Route::delete('/deleteClassification/{classification_id}',[ClassificationController::class,'deleteClassification']);

//////////////////////////////////////////////////////////////////////////////////////