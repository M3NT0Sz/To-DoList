@extends('layouts.app')
@section('title', 'To-Do List | Editar Usuario')

@section('content')
    <h1>Editar Usuarios</h1>

    <form action="{{ route('users.editUser', ['user' => $user->id]) }}" method="post">
        @csrf
        <div>
            <label>Name: </label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>
        <div>
            <label>Email: </label>
            <input type="email" name="email" value="{{ $user->email }}">
        </div>
        <div>
            <button type="submit">Editar</button>
            <a href="{{ route('users.index') }}">Voltar</a>
        </div>
    </form>
@endsection