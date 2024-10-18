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
    <input type="number" id="isbn" name="isbn" value="{{ old('isbn', $livro->isbn) }}">
</div>

<button type="submit">Enviar</button>
