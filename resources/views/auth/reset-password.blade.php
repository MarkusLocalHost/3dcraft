@extends('layouts.main')

@section('title')
    Dking - Смена пароля
@endsection

@section('content')
    <div class="login-register-area bg-gray pt-250 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="password" name="password" placeholder="Пароль">
                        <input type="password" name="password_confirmation" placeholder="Подтвердите пароль">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $request->input('email') }}">
                        <button type="submit" style="background-color: #0A1039;
                                                    color: #fff;
                                                    border: medium none;
                                                    cursor: pointer;
                                                    font-size: 13px;
                                                    font-weight: 600;
                                                    line-height: 1;
                                                    padding: 13px 30px 13px;
                                                    text-transform: uppercase;
                                                    -webkit-transition: all 0.3s ease 0s;
                                                    -o-transition: all 0.3s ease 0s;
                                                    transition: all 0.3s ease 0s;"
                        >Сменить пароль</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
