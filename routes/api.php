<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\CategoriaaApiController;
use App\Http\Controllers\Api\NoticiaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login',[AuthApiController::class, "login"]);
Route::post('logout',[AuthApiController::class, 'logout'])->middleware("auth:sanctum");


//Route::apiResource("noticias", NoticiaApiController::class); //ideal para areas em que não é necessário login

Route::apiResource("noticias", NoticiaApiController::class)->except(["index","show"])->middleware("auth:sanctum");// adicionando a proteção para que apenas usuários logados acessem todas as rotas com excessão das que estão em parenteses, o middleware usado sozinho é aplicado para todas as rotas 

Route::apiResource("noticias", NoticiaApiController::class)->only(["index","show"]);//aqui apenas essas duas rotas em parenteses vão estar sem middleware;

//Route::apiResource("categorias", CategoriaaApiController::class);
