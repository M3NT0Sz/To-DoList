@extends('layouts.app')

@section('title', 'To-Do List | Index')

@section('content')
    <a href="{{ route('users.index') }}">Index</a>
@endsection