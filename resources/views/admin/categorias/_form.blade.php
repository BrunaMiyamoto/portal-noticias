  @if ($errors->any())

      <div class="mb-10 text-red-500">
          <p class="font-bold">Verifique os erros abaixo:</p>
          <ul>
              @foreach ($errors->all() as $erro)
                  <li>{{ $erro }}</li>
              @endforeach
          </ul>
      </div>

  @endif

  <div class="mb-5">
      <label for="nome" class="form-label">Nome*:</label>
      <input type="text" name="nome" value="{{ old('nome', $categoria->nome) }}" id="nome" class="form-control">
  </div>
  <div class="mb-5">
      <label for="descricao" class="form-label">Descrição*:</label>
      <textarea name="descricao" id="descricao" rows="3" class="form-control">{{ old('descricao', $categoria->descricao) }}</textarea>
  </div>

  <div class="mb-5">
      <label for="cor" class="form-label">Cor*:</label>
      <input type="color" name="cor" value="{{ old('cor', $categoria->cor) }}" id="cor">
  </div>

  <div class="mb-5">
      <div>
          <button type="submit" class="bg-slate-950 text-white px-4 py-2 rounded">Salvar</button>
          <a href="{{ route('admin.categorias.index') }}"
              class="bg-slate-200 text-slate-800 px-4 py-2 rounded inline-block">Cancelar</a>
      </div>
  </div>
  </div>
