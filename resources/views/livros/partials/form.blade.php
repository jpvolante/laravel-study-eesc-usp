<style>
    .form-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-direction: row;
        gap: 20px;
        /* Espaçamento entre os elementos */
        flex-wrap: nowrap;
    }

    .form-container div {
        display: flex;
        flex-direction: column;
    }

</style>

<form class="form-container">
    <div>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $livro->titulo) }}">
    </div>

    <div>
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" value="{{ old('autor', $livro->autor) }}">
    </div>

    <div>
        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $livro->isbn) }}">
    </div>

        <div>
        <label for="preco">Preço: R$</label>
        <input type="text" id="preco" name="preco" value="{{ old('preco', $livro->preco) }}">
    </div>

    <div>
        <select name="tipo">
            <option value="" selected=""> - Selecione -</option>
            @foreach ($livro::tipos() as $tipo)
            {{-- 1. Situação em que não houve tentativa de submissão --}}
            @if (old('tipo') == '')
            <option value="{{$tipo}}" {{ ( $livro->tipo == $tipo) ? 'selected' : ''}}>
                {{$tipo}}
            </option>
            {{-- 2. Situação em que houve tentativa de submissão, o valor de old prevalece --}}
            @else
            <option value="{{$tipo}}" {{ ( old('tipo') == $tipo) ? 'selected' : ''}}>
                {{$tipo}}
            </option>
            @endif
            @endforeach
        </select>
    </div>

    <button type="submit">Enviar</button>
</form>
