<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\DiseaseController;
use App\Http\Controllers\V1\PrescriptionController;
use App\Http\Controllers\V1\ProfileController;
use App\Http\Controllers\V1\HealthController;
use App\Http\Controllers\V1\RoutineController;
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

Route::post('login',[AuthController::class,'store'])->name('login');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('ziggy', fn() => response()->json(new \Tightenco\Ziggy\Ziggy()));

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {

    Route::apiResource('prescriptions', PrescriptionController::class);
    Route::get('diseases', [DiseaseController::class, 'index'])->name('diseases.index');

    Route::apiResource('health', HealthController::class);
    Route::post('health', [HealthController::class, 'store'])->name('health.store');
    Route::get('health', [HealthController::class, 'index'])->name('health.index');

    Route::apiResource('routines', RoutineController::class);
    //Route::post('routines', [RoutineController::class, 'store'])->name('routines.store');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('logout',[AuthController::class,'destroy'])->name('logout');
});
