@extends('layouts.app')
@section('title', 'To-Do List | User')

@section('content')
    <h1>User {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <a href="{{ route('users.index') }}">Back</a>
@endsection