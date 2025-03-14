@extends('layouts.app')

@section('title', 'To-Do List | Index')

@section('content')
    <h1>Olá, {{ auth()->user()->name }}</h1>
    <p>Seja bem-vindo ao To-Do List</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
@endsection