<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Pest\Concerns\Retrievable;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view("admin.categorias.index", [
            "categorias" => $categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categorias.cadastrar", [
            "categoria" => new Categoria()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "nome" => "required",
            "descricao" => "nullable",
            "cor" => "required"
        ]);

        $categoria = new Categoria();

        $categoria->nome = $request->nome;
        $categoria->descricao = $request->descricao;
        $categoria->cor = $request->cor;

        $categoria->save();

        return redirect()->route("admin.categorias.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categoria = Categoria::findOrFail($id);

        return view("admin.categorias.editar", [
            "categoria" => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nome" => "required",
            "descricao" => "nullable",
            "cor" => "required"
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->nome = $request->nome;
        $categoria->descricao = $request->descricao;
        $categoria->cor = $request->cor;

        $categoria->save();

        return redirect()->route("admin.categorias.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route("admin.categorias.index");
    }
}
