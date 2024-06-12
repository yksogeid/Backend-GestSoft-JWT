<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetallePrendaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TallaController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'YKSecurity'
], function ($router) {
    Route::get('listaTallasFr', [TallaController::class, 'getTalla']);
    Route::post('crearFormInteres', [DetallePrendaController::class, 'newInteres']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);

    // Rutas protegidas por JWT
    Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('solicitudes', [DetallePrendaController::class, 'getDetalleSolicitud']);
        Route::get('listaTallas', [TallaController::class, 'getTalla']);
        Route::post('register-talla', [TallaController::class, 'registrarTalla']);
    });
});

