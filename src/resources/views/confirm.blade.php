@extends('layouts.contact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact-form/confirm.css') }}">
@endsection

@section('content')
    <div class="confirm-form">
        <div class="confirm-form__header">
            <h2 class="confirm-form__logo">Confirm</h2>
        </div>
        <div class="confirm-form__content">
            <form action="/contact/store" method="post">
                @csrf
                <table class="confirm-form__table">
                    <tr class="table-row">
                        <th class="table-row__header" scope="row">
                            お名前
                        </th>
                        <td class="table-row__content">
                            {{ $contacts['last_name'] }} {{ $contacts['first_name'] }}
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-row__header" scope="row">
                            性別
                        </th>
                        <td class="table-row__content">
                            {{ [1=>'男性',2=>'女性',3=>'その他'][(int)$contacts['gender']] }}
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-row__header" scope="row">
                            メールアドレス
                        </th>
                        <td class="table-row__content">
                            {{ $contacts['email'] }}
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-row__header" scope="row">
                            電話番号
                        </th>
                        <td class="table-row__content">
                            {{ $contacts['tel_1'] }}{{ $contacts['tel_2'] }}{{ $contacts['tel_3'] }}
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-row__header" scope="row">
                            住所
                        </th>
                        <td class="table-row__content">
                            {{ $contacts['address'] }}
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-row__header" scope="row">
                            建物名
                        </th>
                        <td class="table-row__content">
                            {{ $contacts['building'] }}
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-row__header" scope="row">
                            お問い合わせの種類
                        </th>
                        <td class="table-row__content">
                            {{ $contacts['category_content'] }}
                        </td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-row__header" scope="row">
                            お問い合わせ内容
                        </th>
                        <td class="table-row__content">
                            {{ $contacts['detail'] }}
                        </td>
                    </tr>
                </table>
                @foreach ($contacts as $key => $value)
                    <input type="hidden" name="contacts[{{ $key }}]" value="{{ $value }}">
                @endforeach
                <div class="confirm-form__button">
                    <button class="confirm-form__button--submit" type="submit">送信</button>
                    <a class="back__link" href="/contact">修正</a>
                </div>
            </form>
        </div>

    </div>


@endsection