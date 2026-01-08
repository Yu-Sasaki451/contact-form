@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('nav')
<form class="auth-nav" action="/register" method="get">
    <button class="auth-nav__button">register</button>
</form>
@endsection

@section('content')
    <div class="login">
        <div class="login__header">
            <h2 class="login__title">Login</h2>
        </div>
        <form class="login__form" action="/login" method="post" novalidate>
            @csrf
            <div class="login__body">
                <div class="login__fields">
                    <div class="login__field">
                        <p class="login__label">メールアドレス</p>
                        <input class="login__input" type="email" name="email" placeholder="例：test@forexample.com" value="{{ old('email') }}">
                        <div class="login__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="login__field">
                        <p class="login__label">パスワード</p>
                        <input class="login__input" type="password" name="password" placeholder="例：coachtech1231">
                        <div class="login__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="login__button">
                    <button class="login__button--submit" type="submit">ログイン</button>
                </div>
            </div>
        </form>
    </div>

@endsection