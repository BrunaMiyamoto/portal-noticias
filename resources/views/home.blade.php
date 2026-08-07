@extends('layouts.site')

{{-- @section('titulo', 'Home - Seu portal de noticias') = serve para mudar o nome do titulo --}}

{{-- começa a sessão --}}
@section('conteudo')
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Últimas Notícias</h2>
        <p class="text-slate-500 text-sm">3 notícias publicadas</p>
    </div>

    <!-- Lista de Categorias -->
    <div class="flex gap-3 mt-5">
        <a href="#" class="bg-[#2196f3] text-white px-4 py-1 rounded-full">Todas</a>
        <a href="#" class="bg-[#4caf50] text-white px-4 py-1 rounded-full">Tecnologia</a>
        <a href="#" class="bg-[#ff9800] text-white px-4 py-1 rounded-full">Educação</a>
        <a href="#" class="bg-[#a621f3] text-white px-4 py-1 rounded-full">Negócios</a>
    </div>

    <div class="grid grid-1 lg:grid-cols-3 gap-6 my-10">

        <!-- Inicio Card Noticias  -->

        @foreach ($noticias as $not)
            <article class="bg-white shadow-sm hover:shadow-md rounded-xl border border-slate-200 overflow-hidden group">
                <div class="h-44 relative overflow-hidden">
                    <img src="{{ asset('storage/' . $not->imagem) }}" alt="{{ $not->titulo }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-5">
                    <span class=" text-white px-4 py-1 rounded-full text-xs mb-4 inline-block"
                        style="background-color: {{ $not->categoria->cor }};">{{ $not->categoria->nome }}</span>
                    <h3 class="font-bold text-slate-800 mb-2 group-hover:text-blue-600">{{ $not->titulo }}</h3>
                    <span class="text-sm block mb-2 text-slate-500">Escrito por: {{ $not->autor->nome }}</span>
                    <p class="text-sm text-slate-500 mb-4">{{ Str::limit($not->resumo, 50, '...') }}</p>
                    <div class="text-xs text-slate-400 border-t border-slate-100 pt-3">
                        {{ $not->updated_at->diffForHumans() }}
                    </div>
                </div>
            </article>

            <!-- Fim Card Noticias -->
        @endforeach




    </div>

    <div class="flex justify-center items-center gap-1.5">
        {{ $noticias->links() }}
    </div>
@endsection
{{-- @endsection = indica aonde termina a sessão --}}
