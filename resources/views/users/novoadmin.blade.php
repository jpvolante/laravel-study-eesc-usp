@extends('main')
@section('content')
<form method="POST" action="./novoadmin">
    @csrf
    <div class="form-group row">
        <label for="codpes" class="col-sm-4 col-form-label text-md-right">número usp</label>
        <div class="col-md-6">
            <select name="codpes">
        @foreach(App\Models\User::all() as $user)
            <option value = "{{$user->codpes}}">
              {{$user->codpes}} - {{$user->name}}
            </option>
        @endforeach
        </select>
        </div>

        
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
@endsection