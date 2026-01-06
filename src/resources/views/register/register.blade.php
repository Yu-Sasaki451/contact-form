@extends('layouts.certificate')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register/register.css') }}">
@endsection

@section('nav')
<a href="/login">login</a>
@endsection

@section('content')
    <div class="register-content">
        <div class="register-content__header">
            <h2 class="register-content__logo">Register</h2>
        </div>
        <form class="register__form" action="">
            <div class="register__form-content">
                <div class="content__center">
                    <div class="form__content-item">
                        <p>お名前</p>
                        <input type="text" name="name" placeholder="例：山田 太郎">
                    </div>
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
                    <button class="register__button-submit" type="submit">登録</button>
                </div>
            </div>
        </form>
    </div>

@endsection