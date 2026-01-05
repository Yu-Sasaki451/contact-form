@extends('layouts.contact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact-form/index.css') }}">
@endsection

@section('content')
    <div class="contact-form">
        <div class="contact-form__header">
            <h2>Contact</h2>
        </div>
        <div class="contact-form__content">
            <form class="form" action="">
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label" for="last_name">
                            お名前
                            <span class="required-mark">※</span>
                        </label>
                    </div>
                    <div class="form__group-input">
                        <div class="form__input-text">
                            <input id="last_name" name="last_name" type="text" placeholder="例：山田">
                            <input id="first_name" name="first_name" type="text" placeholder="例：太郎">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label">
                            性別
                            <span class="required-mark">※</span>
                        </label>
                    </div>
                    <div class="form__group-radio">
                        <div class="form__input-radio">
                            <input name="gender" type="radio" value="1">
                            <span>男性</span>
                            <input name="gender" type="radio" value="2">
                            <span>女性</span>
                            <input name="gender" type="radio" value="3">
                            <span>その他</span>
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label" for="email">
                            メールアドレス
                            <span class="required-mark">※</span>
                        </label>
                    </div>
                    <div class="form__group-input">
                        <div class="form__input-text">
                            <input id="email" name="email" type="email" placeholder="例：test@forexample.com">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label" for="tel_1">
                            電話番号
                            <span class="required-mark">※</span>
                        </label>
                    </div>
                    <div class="form__group-input">
                        <div class="form__input-text">
                            <input class="input__tel" id="tel_1" name="tel" type="tel" placeholder="080">
                            <span>-</span>
                            <input class="input__tel" id="tel_2" name="tel" type="tel" placeholder="1234">
                            <span>-</span>
                            <input class="input__tel" id="tel_3" name="tel" type="tel" placeholder="6789">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label" for="address">
                            住所
                            <span class="required-mark">※</span>
                        </label>
                    </div>
                    <div class="form__group-input">
                        <div class="form__input-text">
                            <input id="address" name="address" type="text" placeholder="北海道札幌市白石区菊水1-2-3">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label" for="building">
                            建物名
                        </label>
                    </div>
                    <div class="form__group-input">
                        <div class="form__input-text">
                            <input id="building" name="building" type="text" placeholder="〇〇マンション501号室">
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label" for="category_id">
                            お問い合わせ種類
                            <span class="required-mark">※</span>
                        </label>
                    </div>
                    <div class="form__group-input">
                        <div class="form__input-select">
                            <select name="category_id" id="category_id">
                                <option value=""></option> <!--カテゴリテーブルから-->
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label" for="detail">
                            お問い合わせ内容
                            <span class="required-mark">※</span>
                        </label>
                    </div>
                    <div class="form__group-input">
                        <div class="form__input-textarea">
                            <textarea id="detail" name="detail" type="text" placeholder="お問い合わせ内容をご入力ください"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">確認画面</button>
                </div>
            </form>
        </div>
    </div>

@endsection