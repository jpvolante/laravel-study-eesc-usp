@extends('main')
@section('content')
<form method="POST" action="./login">
    @csrf
    
    <div class="form-group row">
        <label for="codpes" class="col-sm-4 col-form-label text-md-right">Número usp</label>
        <div class="col-md-6">
            <input type="text" name="codpes" value="{{ old('codpes') }}" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>
        <div class="col-md-6">
            <input type="password" name="password" required>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
    
    </div>
    <br>
        <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <a href= "login/senhaunica" class="btn btn-info">Entrar com Senha única USP</a>
        </div>
    </div>


</form>
@endsection