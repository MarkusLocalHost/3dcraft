@extends('layouts.main')

@section('title')
    Dking - Авторизация
@endsection

@section('content')
    <div class="login-register-area bg-gray pt-250 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#login">
                                <h4> вход </h4>
                            </a>
                            <a data-toggle="tab" href="#register">
                                <h4> регистрация </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="login" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="list-unstyled">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form action="{{ route('auth.login') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="email" name="email" placeholder="Ваш e-mail">
                                            <input type="password" name="password" placeholder="Пароль">
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" name="remember">
                                                    <label>Запомнить меня</label>
                                                    <a href="{{ route('password.request') }}">Забыли пароль?</a>
                                                </div>
                                                <button type="submit">Войти</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="register" class="tab-pane">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="list-unstyled">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form action="{{ route('auth.register') }}" method="post">
                                            @csrf
                                            @method('POST')
                                            <input type="text" name="name" placeholder="Ваше Имя" value="{{ old('name') }}">
                                            <input name="email" placeholder="Email" type="email" value="{{ old('email') }}">
                                            <input type="password" name="password" placeholder="Пароль">
                                            <input type="password" name="password_confirmation" placeholder="Подтвердите пароль">
                                            <div class="button-box">
                                                <button type="submit">Регистрация</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
