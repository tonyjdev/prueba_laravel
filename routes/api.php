<?php

use App\Http\Controllers\EstudianteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::resource('estudiante', 'App\Http\Controllers\EstudianteController');
Route::get('/estudiante', [EstudianteController::class, 'index']);
Route::get('/estudiante/{id}', [EstudianteController::class, 'show']);
Route::post('/estudiante', [EstudianteController::class, 'store']);
Route::put('/estudiante', [EstudianteController::class, 'update']);
Route::delete('/estudiante/{id}', [EstudianteController::class, 'destroy']);
