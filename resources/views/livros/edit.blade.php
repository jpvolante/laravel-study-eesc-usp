@extends('main')

@section('content')
<form method="post" action ="{{ route('livros.update', $livro->id) }}">
@csrf
@method('patch')
@include('livros.partials.form')
</form>
@endsection
