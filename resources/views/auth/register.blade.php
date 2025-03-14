@extends('layouts.app')

@section('title', 'To-Do List | Register')

@section('body-class', 'register-page')

@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="{{ route('index') }}"
                    class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>To-DoList</b></h1>
                </a>
            </div>
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                        <div class="form-floating">
                            <input id="registerFullName" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="{{ old('name') }}" />
                            <label for="registerFullName">Full Name</label>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        <div class="form-floating">
                            <input id="registerEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="{{ old('email') }}" />
                            <label for="registerEmail">Email</label>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        <div class="form-floating">
                            <input id="registerPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="" />
                            <label for="registerPassword">Password</label>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        <div class="form-floating">
                            <input id="registerPassword" type="password" class="form-control" name="password_confirmation"
                                placeholder="" />
                            <label for="registerPassword">Password Confirmation</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <p class="mb-0 text-center">
                    <a href="{{ route('login') }}" class="link-primary text-center"> I already have a membership </a>
                </p>
            </div>
        </div>
    </div>
@endsection