@extends('layouts.contact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact-form/index.css') }}">
@endsection

@section('content')
    <div class="contact-form">
        <div class="contact-form__header">
            <h2 class="contact-form__logo">Contact</h2>
        </div>
        <div class="contact-form__content">
            <form class="form" action="/contact/confirm" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <label class="form__label" for="last_name">
                            お名前
                            <span class="required-mark">※</span>
                        </label>
                    </div>
                    <div class="form__group-input">
                        <div class="form__input-name">
                            <input id="last_name" name="last_name" type="text"
                            placeholder="例：山田" value="{{ old('last_name',$contacts['last_name'] ?? '') }}">
                            <p class="form__error">
                                @error('last_name') {{ $message }} @enderror
                            </p>
                        </div>
                        <div class="form__input-name">
                            <input id="first_name" name="first_name" type="text"
                            placeholder="例：太郎" value="{{ old('first_name',$contacts['first_name'] ?? '') }}">
                            <p class="form__error">
                                @error('first_name') {{ $message }} @enderror
                            </p>
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
                        @php
                                $selectedGender = (string) old('gender', $contacts['gender'] ?? '');
                            @endphp
                        <div class="form__input-radio">
                            <input type="radio" name="gender" value="1" {{ $selectedGender === '1' ? 'checked' : '' }}>
                            <span>男性</span>

                            <input type="radio" name="gender" value="2" {{ $selectedGender === '2' ? 'checked' : '' }}>
                            <span>女性</span>

                            <input type="radio" name="gender" value="3" {{ $selectedGender === '3' ? 'checked' : '' }}>
                            <span>その他</span>
                        </div>
                        <p class="form__error">
                            @error('gender') {{ $message }} @enderror
                        </p>
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
                            <input id="email" name="email" type="email"
                            placeholder="例：test@forexample.com" value="{{ old('email',$contacts['email'] ?? '') }}">
                            <p class="form__error">
                                @error('email') {{ $message }} @enderror
                            </p>
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
                    <div class="form__group-tel">
                        <div class="form__input-text">
                            <input class="input__tel" id="tel_1" name="tel_1" type="tel"
                            placeholder="080" value="{{ old('tel_1',$contacts['tel_1'] ?? '') }}">
                            <span>
                                -
                            </span>
                            <input class="input__tel" id="tel_2" name="tel_2" type="tel"
                            placeholder="1234" value="{{ old('tel_2',$contacts['tel_2'] ?? '') }}">
                            <span>
                                -
                            </span>
                            <input class="input__tel" id="tel_3" name="tel_3" type="tel"
                            placeholder="6789" value="{{ old('tel_3',$contacts['tel_3'] ?? '') }}">
                        </div>
                        <p class="form__error">
                            @error('tel') {{ $message }} @enderror
                        </p>
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
                            <input id="address" name="address" type="text"
                            placeholder="北海道札幌市白石区菊水1-2-3" value="{{ old('address',$contacts['address'] ?? '') }}">
                            <p class="form__error">
                                @error('address') {{ $message }} @enderror
                            </p>
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
                            <input id="building" name="building" type="text"
                            placeholder="〇〇マンション501号室" value="{{ old('building',$contacts['building'] ?? '') }}">
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
                    <div class="form__input-select">
                    @php
                        $selectedCategoryId = (string) old('category_id', $contacts['category_id'] ?? '');
                    @endphp

                    <select name="category_id" id="category_id">
                        <option value="" {{ $selectedCategoryId === '' ? 'selected' : '' }}>
                            選択してください
                        </option>

                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $selectedCategoryId === (string) $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                        @endforeach
                    </select>
                    <p class="form__error">
                        @error('category_id') {{ $message }} @enderror
                    </p>
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
                            <textarea id="detail" name="detail" type="text"
                            placeholder="お問い合わせ内容をご入力ください">{{ old('detail',$contacts['detail'] ?? '') }}</textarea>
                            <p class="form__error">
                                @error('detail') {{ $message }} @enderror
                            </p>
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