@extends('layouts.login-layout')

@section('title', 'Iniciar sesión')

@section('content')

@include('layouts.alerts')

<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="{{ route('auth.signup') }}" method="POST">
            @csrf
            <h1>Crear una cuenta nueva</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
            </div>
            <span>O utiliza tu correo electrónico</span>
            <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required/>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" required/>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="password" name="password" placeholder="Contraseña" required/>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required/>
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn-1">Registrarme</button>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <h1>Iniciar sesión</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
            </div>
            <span>O usa tu cuenta</span>
            <input type="email" name="email" placeholder="Correo electrónico" required/>
            <input type="password" name="password" placeholder="Contraseña" required/>
            <a href="#">¿Olvidaste tu contraseña?</a>
            <button type="submit" class="btn-1">Iniciar sesión</button>
            <img src="{{ asset('images/logo-4-canvolt.png') }}" style="height: 50px; margin-top: 25px;" alt="Canvolt">
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>¿Ya tienes una cuenta?</h1>
                <p>Para mantenerse conectado con nosotros, inicie sesión con su información personal</p>
                <button class="ghost" id="signIn">Iniciar sesión</button>
                <img src="{{ asset('images/logo-5-canvolt.png') }}" style="height: 50px; margin-top: 25px;" alt="Canvolt">
            </div>
            <div class="overlay-panel overlay-right">
                <h1>¡Bienvenido a Canvolt!</h1>
                <p>Introduce tus datos personales y comienza tu viaje con nosotros</p>
                <button class="ghost" id="signUp">Registrarme</button>
            </div>
        </div>
    </div>
</div>
@endsection
