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


Route::group(['prefix' => 'action'], function () {
    Route::get('/', [ActionController::class, 'index']);
    Route::post("/create", [ActionController::class, "store"]);
    Route::get("/show/{id}", [ActionController::class, "show"]);
    Route::patch("/update/{id}", [ActionController::class, "update"]);
    Route::delete("/delete/{id}", [ActionController::class, "destroy"]);
});
