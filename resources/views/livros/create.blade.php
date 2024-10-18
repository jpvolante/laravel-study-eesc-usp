@extends('main')



@section('content')
<form method="post" action="{{ route('livros.store') }}">
    @csrf
    @include('livros.partials.form')
    
</form>
@endsection
