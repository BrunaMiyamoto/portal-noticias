<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Categorias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center">

                    <h1 class="text-[20px] font-bold">Cadastrar categoria</h1>

                    <a href="{{ route('admin.categorias.index') }}"
                        class="text-slate-500 font-semibold px-4 py-2 rounded">
                        <- Voltar para Categorias</a>
                </div>

                <div class="p-6 overflow-x-auto">

                    <form action="#" method="post">

                        <div class="mb-5">
                            <label for="nome" class="form-label">Nome*:</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                        <div class="mb-5">
                            <label for="descrição" class="form-label">Descrição*:</label>
                            <textarea name="descrição" id="descrição" rows="3" class="form-control"></textarea>
                        </div>

                        <div class="mb-5">
                            <label for="cor" class="form-label">Cor*:</label>
                            <input type="color" name="cor" id="cor">
                        </div>

                        <div class="mb-5">
                            <div>
                                <button type="submit"
                                    class="bg-slate-950 text-white px-4 py-2 rounded">Cadastrar</button>
                                <a href="{{ route('admin.categorias.index') }}"
                                    class="bg-slate-200 text-slate-800 px-4 py-2 rounded inline-block">Cancelar</a>
                            </div>
                        </div>
                </div>
                </form>

            </div>
        </div>
</x-app-layout>
