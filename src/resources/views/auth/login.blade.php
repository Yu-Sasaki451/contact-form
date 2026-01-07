@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('nav')
<form class="form__login" action="/register" method="get">
    @csrf
    <button class="header-nav__button">register</button>
</form>
@endsection

@section('content')
    <div class="login-content">
        <div class="login-content__header">
            <h2 class="login-content__logo">Login</h2>
        </div>
        <form class="login__form" action="/login" method="post">
            @csrf
            <div class="login__form-content">
                <div class="content__center">
                    <div class="form__content-item">
                        <p>メールアドレス</p>
                        <input type="email" name="email" placeholder="例：test@forexample.com" value="{{ old('email') }}">
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="form__content-item">
                        <p>パスワード</p>
                        <input type="password" name="password" placeholder="例：coachtech1231" value="{{ old('password') }}">
                    </div>
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-content__button">
                    <button class="login__button-submit" type="submit">ログイン</button>
                </div>
            </div>
        </form>
    </div>

@endsection