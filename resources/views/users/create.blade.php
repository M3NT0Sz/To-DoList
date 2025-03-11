@extends('layouts.app')
@section('title', 'To-Do List | Criar Usuario')

@section('content')
    <h1>Criar Usuario</h1>

    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div>
            <label>Nome</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div>
            <label>Senha</label>
            <input type="password" name="password">
        </div>
        <div>
            <button type="submit">Cadastrar</button>
            <a href="{{ route('users.index') }}">Voltar</a>
        </div>
    </form>
@endsection