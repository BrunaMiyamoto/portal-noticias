{{-- @dd($noticias) --}}

<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Noticias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">

                    <h1 class="text-[20px] font-bold">Lista de Noticias</h1>

                    <a href="#" class="bg-slate-950 text-white px-4 py-2 rounded">+ Adicionar Noticia</a>
                </div>

                <div class="p-6 overflow-x-auto">

                    <table class="table">
                        {{-- CABEÇALHO DA TABELA --}}
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TÍTULO</th>
                                <th class="hidden sm:table-cell">RESUMO</th>
                                <th class="hidden sm:table-cell">CATEGORIA</th>
                                <th>PUBLICAÇÃO</th>
                                <th class="text-center">AÇÃO</th>
                            </tr>

                        </thead>
                        {{-- CORPO DA TABELA --}}
                        <tbody>

                            @forelse ($noticias as $n)
                                {{-- criamos outra variavel para armazenar a noticia que vem da variavel noticias --}}

                                <tr>
                                    <td>{{ $n->id }}</td>
                                    <td>{{ $n->titulo }}</td>
                                    <td class="hidden sm:table-cell">{{ $n->resumo }}</td>
                                    <td class="hidden sm:table-cell">{{ $n->categoria_id }}</td>
                                    <td>
                                        {{ $n->created_at->format('d/m/Y H:i') }}
                                        <br>
                                        {{ $n->created_at->diffForHumans() }}

                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn-editar">Editar</a>
                                        <a href="#" class="btn-excluir">Excluir</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-slate-400"colspan="6">
                                        <p>Nenhuma noticia cadastrada</p>
                                    </td>
                                </tr>
                            @endforelse


                        </tbody>

                    </table>
                </div>

                <div class="flex justify-center p-6 pt-0">

                    //Paginação
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
