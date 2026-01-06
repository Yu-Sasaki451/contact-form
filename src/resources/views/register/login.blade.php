@extends('layouts.certificate')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register/login.css') }}">
@endsection

@section('nav')
<a href="/register">register</a>
@endsection

@section('content')
    <div class="login-content">
        <div class="login-content__header">
            <h2 class="login-content__logo">Login</h2>
        </div>
        <form class="login__form" action="">
            <div class="login__form-content">
                <div class="content__center">
                    <div class="form__content-item">
                        <p>メールアドレス</p>
                        <input type="text" name="email" placeholder="例：test@forexample.com">
                    </div>
                    <div class="form__content-item">
                        <p>パスワード</p>
                        <input type="text" name="" placeholder="例：coachtech1231">
                    </div>
                </div>
                <div class="form-content__button">
                    <button class="login__button-submit" type="submit">ログイン</button>
                </div>
            </div>
        </form>
    </div>

@endsection