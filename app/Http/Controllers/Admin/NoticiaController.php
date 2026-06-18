<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * lista as noticias do banco
     */
    public function index()
    {
        return view("admin.noticias.index");
    }

    /**
     * Chamar a view do cadastrar noticia
     */
    public function create()
    {
        //
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
        //
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
        //
    }
}
