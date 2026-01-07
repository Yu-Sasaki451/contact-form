@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('nav')
<form class="form__login" action="/login" method="get">
    @csrf
    <button class="header-nav__button">login</button>
</form>
@endsection

@section('content')
    <div class="register-content">
        <div class="register-content__header">
            <h2 class="register-content__logo">Register</h2>
        </div>
        <form class="register__form" action="/register" method="post">
            @csrf
            <div class="register__form-content">
                <div class="content__center">
                    <div class="form__content-item">
                        <p>お名前</p>
                        <input type="text" name="name" placeholder="例：山田 太郎" value="{{ old('name') }}">
                    </div>
                    <div class="form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
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
                    <button class="register__button-submit" type="submit">登録</button>
                </div>
            </div>
        </form>
    </div>

@endsection