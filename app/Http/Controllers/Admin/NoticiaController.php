<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'categorias' => $categorias,
            "noticia" => new Noticia()
        ]);
    }

    /**
     * Armazenar os dados da noticia enviada pelo formulario
     */
    public function store(Request $request)
    {
        //dd($request);

        $request->validate([

            "categoria_id" => "required",
            "titulo" => "required|min:10|max:255", //esse campo é obrigatório e o usuario precisa digitar mais de 10 caracteres e menos de 255
            "resumo" => "required",
            "conteudo" => "required",
            "imagem" => "required|image|mimes:jpge,jpg, png,webp|max:2048" //esse campo é obrigatório e o usuario precisa inserir apenas imagens nesses formatos e até 2 megsd
        ]);

        $noticia = new Noticia(); //nosso objeto que prepara os dados para o BC

        $noticia->titulo = $request->titulo; //nosso objeto recebe os dados do $request/formulário
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->conteudo;
        $noticia->categoria_id = $request->categoria_id;
        $noticia->ativo = $request->ativo;
        $noticia->usuario_id = Auth::user()->id;

        if ($request->hasFile("imagem")) {
            $noticia->imagem = $request->file("imagem")->store("noticia", "public"); //cria uma pasta para receber a imagem
        }

        $noticia->save(); //salva a noticia no banco de dados. 

        return redirect()->route("admin.noticias.index"); //redireciona para o index
    }


    /**
     * Chamar a view do editar noticia
     */
    public function edit(string $id)
    {
        $categorias = Categoria::orderBy("nome", "asc")->pluck("nome", "id");

        $noticia = Noticia::findOrFail($id); //faz um select e caso dê fail gera um erro 404 

        return view("admin.noticias.editar", [
            "categorias" => $categorias,
            "noticia" => $noticia
        ]);
    }

    /**
     * Armazenar a atualização dos dados da noticia 
     */
    public function update(Request $request, string $id)
    {


        $request->validate([

            "categoria_id" => "required",
            "titulo" => "required|min:10|max:255",
            "resumo" => "required",
            "conteudo" => "required",
            "imagem" => "nullable|image|mimes:jpge,jpg, png,webp|max:2048" // aqui tiramos o required pois já está vindo uma imagem 
        ]);

        $noticia = Noticia::findOrFail($id); //já criamos o objeto no edit e aqui só buscamos ele 

        $noticia->titulo = $request->titulo;
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->conteudo;
        $noticia->categoria_id = $request->categoria_id;
        $noticia->ativo = $request->ativo;
        $noticia->usuario_id = Auth::user()->id;

        if ($request->hasFile("imagem")) {

            if ($noticia->imagem) {
                Storage::disk("public")->delete($noticia->imagem); // sempre vai apagar a imagem anterior e substituir pela nova para evitar sujeira 
            }

            $noticia->imagem = $request->file("imagem")->store("noticia", "public");
        }

        $noticia->save();

        return redirect()->route("admin.noticias.index");
    }

    /**
     * excluir ou deletar uma noticia do banco 
     */
    public function destroy(string $id)
    {
        $noticia = Noticia::findOrFail($id); //pego a noticia
        $noticia->delete(); //excluo 
        return redirect()->route("admin.noticias.index"); //redireciono para o index
    }
}
