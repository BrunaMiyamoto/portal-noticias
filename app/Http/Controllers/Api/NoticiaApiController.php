<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoticiaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        return response()->json($noticias);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([

            "categoria_id" => "required",
            "titulo" => "required|min:10|max:255", 
            "resumo" => "required",
            "conteudo" => "required",
            "imagem" => "nullable|image|mimes:jpge,jpg, png,webp|max:2048" 
        ]);

        $noticia = new Noticia(); 

        $noticia->titulo = $request->titulo; 
        $noticia->resumo = $request->resumo;
        $noticia->conteudo = $request->conteudo;
        $noticia->categoria_id = $request->categoria_id;
        $noticia->ativo = $request->ativo;
        $noticia->usuario_id = Auth::user()->id;

        if ($request->hasFile("imagem")) {
            $noticia->imagem = $request->file("imagem")->store("noticia", "public"); 
        }

        $noticia->save(); 

        return response()->json([

            "mensagem"=> "Noticia cadastrada com sucesso!",
            "data"=>$noticia //envia os dados 
        ],201);// quando os dados são cadastrados com sucesso retornamos o erro 201 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $noticia = Noticia::findOrFail($id);
        return response()->json($noticia);
    }


    /**
     * Update the specified resource in storage.
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

        return response()->json([

            "mensagem"=> "Noticia atualizada com sucesso!",
            "data"=>$noticia //envia os dados 
        ]);//aqui não é necessário o erro 201
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $noticia = Noticia::findOrFail($id);
        $noticia->delete(); 

         return response()->json([

            "mensagem"=> "Noticia removida com sucesso!",
        
        ]);
       
    }
}
