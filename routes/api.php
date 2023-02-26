<?php
//importar los controladores

use App\Http\Controllers\EgresoController;
use App\Http\Controllers\IngresoController;
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

//las rutas de las api
Route::group(['prefix' => 'egresos'], function() {
    Route::any('/', [EgresoController::class, 'index'])->name('egresos.index');
    Route::post('/crear', [EgresoController::class, 'store'])->name('egresos.store');
    Route::put('/editar/{egreso}', [EgresoController::class, 'update'])->name('egresos.update');
    Route::delete('/eliminar/{egreso}', [EgresoController::class, 'destroy'])->name('egresos.destroy');
});

Route::group(['prefix' => 'ingresos'], function() {
    Route::any('/', [IngresoController::class, 'index'])->name('ingresos.index');
    Route::post('/crear', [IngresoController::class, 'store'])->name('ingresos.store');
    Route::put('/editar/{ingreso}', [IngresoController::class, 'update'])->name('ingresos.update');
    Route::delete('/eliminar/{ingreso}', [IngresoController::class, 'destroy'])->name('ingresos.destroy');
});



