@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('nav')
<form class="auth-nav" action="/login" method="get">
    <button class="auth-nav__button">login</button>
</form>
@endsection

@section('content')
    <div class="register">
        <div class="register__header">
            <h2 class="register__title">Register</h2>
        </div>
        <form class="register__form" action="/register" method="post" novalidate>
            @csrf
            <div class="register__body">
                <div class="register__fields">
                    <div class="register__field">
                        <p class="register__label">お名前</p>
                        <input class="register__input" type="text" name="name" placeholder="例：山田 太郎" value="{{ old('name') }}">
                        <div class="register__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="register__field">
                        <p class="register__label">メールアドレス</p>
                        <input class="register__input" type="email" name="email" placeholder="例：test@forexample.com" value="{{ old('email') }}">
                        <div class="register__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="register__field">
                        <p class="register__label">パスワード</p>
                        <input class="register__input" type="password" name="password" placeholder="例：coachtech1231" value="{{ old('password') }}">
                        <div class="register__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="register__button">
                    <button class="register__button-submit" type="submit">登録</button>
                </div>
            </div>
        </form>
    </div>

@endsection