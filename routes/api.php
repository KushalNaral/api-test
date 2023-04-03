<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\InvokableController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\TestController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [TestController::class, 'returnResponse']);
Route::post('/test-post', [TestController::class, 'testPost']);


Route::get('/invoke', InvokableController::class);

Route::post("/store-action", [ActionController::class, "store"]);
Route::delete("/delete-action", [ActionController::class, "destroy"]);

//database queries

Route::get('/query', [QueryController::class, 'actors']);
