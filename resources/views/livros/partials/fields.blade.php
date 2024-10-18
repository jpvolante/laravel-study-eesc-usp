<ul> 
    <li><strong>Título: </strong>{{ $livro->titulo ?? '' }}</li>
    <li><strong>Autor: </strong>{{ $livro->autor ?? '' }}</li>
    <strong>ISBN:</strong>
    <li class = "isbn">{{ $livro->isbn ?? '' }}</li>
    <li><a href="{{ route('livros.update', $livro->id) }}/edit">Editar</a> {{ $livro->titulo}} </li>
    <li>
        <form action="{{ route('livros.update', $livro->id) }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
    </form>
    </li>
</ul> 
