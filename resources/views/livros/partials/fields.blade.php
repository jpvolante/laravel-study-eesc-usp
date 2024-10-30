{!! $stepper !!}

<ul>
    <br>
    <br>
    <strong>Status do livro:</strong> {{$livro->status}} <br>

    @if($livro->status == 'Solicitado')
    <a href="./livros/{{$livro->id}}/cotacao"> Enviar para cotação </a>
    @else
    <a href="./livros/{{$livro->id}}/devolver"> Devolver </a>
    @endif
    <br>
    <strong>Histórico:</strong>
    <br>
    @foreach($livro->statuses as $status)
    {{$status->name}} - {{$status->reason}} {{$status->created_at}} - {{$status->user_id}} <br>
    @endforeach
    <br>

    <a href="./livros/{{$livro->id}}"> {{ $livro->titulo }} </a>

    <li><strong>Título: </strong>{{ $livro->titulo ?? '' }}</li>
    <li><strong>Autor: </strong>{{ $livro->autor ?? '' }}</li>

    <li class="isbn"> <strong>ISBN:</strong>{{ $livro->isbn ?? '' }}</li>
    <li><a href="{{ route('livros.update', $livro->id) }}/edit">Editar</a> {{ $livro->titulo}} </li>
    <li>
        <form action="{{ route('livros.update', $livro->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
        </form>
    </li>
    <li><strong>Cadastrado por:</strong> {{$livro->user->name ?? ''}} </li>

@if(isset($livro->caminho_arquivo))
    <li>
        <strong>Imagem do Livro:</strong><br>
        <img src="{{ asset('storage/app/private/uploads' . basename($livro->caminho_arquivo)) }}" alt="Imagem" style="max-width: 300px;">
    </li>
@endif


</ul>
