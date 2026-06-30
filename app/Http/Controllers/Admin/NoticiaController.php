<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * lista as noticias do banco
     */
    public function index()
    {

        $noticias = Noticia::all();
        return view("admin.noticias.index", [
            "noticias" => $noticias
        ]);
    }

    /**
     * Chamar a view do cadastrar noticia
     */
    public function create()
    {
        $categorias = Categoria::orderBy("nome", "asc")->pluck("nome", "id");
        return view("admin.noticias.cadastrar", [
            'categorias' => $categorias
        ]);
    }

    /**
     * Armazenar os dados da noticia enviada pelo formulario
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Chamar a view do editar noticia
     */
    public function edit(string $id)
    {
        return view("admin.noticias.editar");
    }

    /**
     * Armazenar a atualização dos dados da noticia 
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * excluir ou deletar uma noticia do banco 
     */
    public function destroy(string $id)
    {
        return "funcionou .....deletou o registro";
    }
}
