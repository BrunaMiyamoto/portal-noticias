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
        <button type="submit" class="bg-slate-950 text-white px-4 py-2 rounded">Salvar</button>
        <a href="{{ route('admin.categorias.index') }}"
            class="bg-slate-200 text-slate-800 px-4 py-2 rounded inline-block">Cancelar</a>
    </div>
</div>
</div>
