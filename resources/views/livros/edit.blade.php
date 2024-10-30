@extends('main')

@section('content')
    <h1>Editar Livro</h1>

    <!-- Se houver uma imagem, mostre-a -->
    @if(isset($livro->image_url))
        <div>
            <label>Imagem Atual:</label><br>
            <img src="{{ $livro->image_url }}" alt="Imagem do Livro" style="max-width: 200px; max-height: 200px;">
        </div>
    @endif

    <form method="post" action="{{ route('livros.update', $livro->id) }}">
        @csrf
        @method('patch')
        @include('livros.partials.form')
    </form>
@endsection
