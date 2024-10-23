@extends('main')


@section('content')

<form method="get" action="./livros">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="search" value="{{ request()->search }}">

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form>
<br>
<br>

{{ $livros->appends(request()->query())->links() }}
@forelse($livros as $livro)
@include('livros.partials.fields')

@empty
    Não há livros cadastrados!
@endforelse

@endsection
