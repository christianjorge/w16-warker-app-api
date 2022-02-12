<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Http\Controllers\PostosController;
use App\Http\Controllers\CidadesController;

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
//Rota para registro
Route::post('auth/register', [AuthController::class, 'register']);
//Rota para login
Route::post('auth/login', [AuthController::class, 'login']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    //Grupos de rotas para cidades
    Route::controller(CidadesController::class)->group(function () {
        Route::get('cidade/{id}', 'show');
    });

    //Grupo de rotas para o controller de Postos
    Route::controller(PostosController::class)->group(function () {
        //Rota de get pra ver dados
        Route::get('posto/{id}', 'show');
        //Rota de post para inserir dados
        Route::post('posto', 'store');
        Route::put('posto/{id}', 'update');
        Route::delete('posto/{id}', 'destroy');
    });

    Route::post('auth/logout', [AuthController::class, 'logout']);
});

