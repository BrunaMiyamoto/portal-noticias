<?php
 
namespace App\Http\Controllers;
 
use App\Models\Noticia;
use Illuminate\Http\Request;
 
class HomeController extends Controller
{
    public function home()
    {
        $noticias = Noticia::where('ativo',true)->orderByDesc('update_at')->paginate(3); //o erro é provavelmente de extensão
     
        return view('home',['noticias' => $noticias]);
    }
    public function visualizarNoticias()
    {
        return view('visualizar-noticias');
    }
    public function contato()
    {
        return view('contato');
    }
}