<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ApiPendidikanController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Menggunakan FQCN untuk Laravel 8+
Route::prefix('api_pendidikan')->group(function () {
    Route::get('/', [ApiPendidikanController::class, 'getAll']);
    Route::get('/{id}', [ApiPendidikanController::class, 'getPen']);
    Route::post('/', [ApiPendidikanController::class, 'createPen']);
    Route::put('/{id}', [ApiPendidikanController::class, 'updatePen']);
    Route::delete('/{id}', [ApiPendidikanController::class, 'deletePen']);
});
