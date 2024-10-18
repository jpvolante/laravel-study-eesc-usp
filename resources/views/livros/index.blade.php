@extends('main')


@section('content')

@forelse($livros as $livro)
@include('livros.partials.fields')

@empty
    Não há livros nesse sistema ainda!
@endforelse

@endsection
