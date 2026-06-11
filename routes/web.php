<?php

use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [homeController::class, "home"]); //aqui chamamos o método que criamos no controller, deve estar escrito da mesma forma 
Route::get("/noticia", [homeController::class, "visualizarNoticias"]);
