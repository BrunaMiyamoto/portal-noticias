<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get("/", [homeController::class, "home"])->name("home"); //aqui chamamos o método que criamos no controller, deve estar escrito da mesma forma 
Route::get("/noticia", [homeController::class, "visualizarNoticias"])->name("visualizarNoticias"); //name() não pode ter espaços, podemos usar pontos e traços

Route::get("/contato", [homeController::class, "contato"])->name("contato");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //rotas do gerenciamento de noticias 

    Route::get("/dashboard/noticias", [NoticiaController::class, "index"])->name("admin.noticias.index");

    Route::get("/dashboard/noticias/cadastrar", [NoticiaController::class, "create"])->name("admin.noticias.cadastrar");

    Route::get("/dashboard/noticias/editar/{id}", [NoticiaController::class, "edit"])->name("admin.noticias.editar");

    Route::delete("/dashboard/noticias/excluir/{id}", [NoticiaController::class, "destroy"])->name("admin.noticias.excluir");


    //rotas do gerenciamento de categorias 
    Route::get("/dashboard/categorias", [CategoriaController::class, "index"])->name("admin.categorias.index");
    Route::get("/dashboard/categorias/cadastrar", [CategoriaController::class, "create"])->name("admin.categorias.cadastrar");
    Route::get("/dashboard/categorias/editar/{id}", [CategoriaController::class, "edit"])->name("admin.categorias.editar");
    Route::delete("/dashboard/categorias/excluir/{id}", [CategoriaController::class, "destroy"])->name("admin.categorias.excluir");
});

require __DIR__ . '/auth.php';
