@extends("layouts.auth")

@section("title", "To-Do List | Login")

@section("body-class", "login-page")

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a href="../index2.html" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>To-DoList</b></h1>
                </a>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        <div class="form-floating">
                            <input id="loginEmail" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="" placeholder="{{ old('email') }}" />
                            <label for="loginEmail">Email</label>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        <div class="form-floating">
                            <input id="loginPassword" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="" />
                            <label for="loginPassword">Password</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="text-center">
                    <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center"> Register a new membership </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection