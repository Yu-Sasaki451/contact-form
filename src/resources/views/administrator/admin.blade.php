@extends('layouts.certificate')

@section('css')
<link rel="stylesheet" href="{{ asset('css/administrator/admin.css') }}">
@endsection

@section('nav')
<a href="/register">logout</a>
@endsection

@section('content')
    <div class="admin-wrapper">
        <div class="admin-wrapper__header">
            <h2>Admin</h2>
        </div>
        <div class="admin-search">
            <div class="admin-search__item">
                <div class="admin-search__item-flex">
                    <div class="search__item-name">
                        <input class="search__input" type="text" placeholder="名前やメールアドレスを入力してください">
                    </div>
                    <div class="search__item-gender">
                        <select class="search__select" name="" id="">
                            <option value="">性別</option>
                        </select>
                    </div>
                    <div class="search__item-category">
                        <select class="search__select" name="" id="">
                            <option value="">お問い合わせの種類</option>
                        </select>
                    </div>
                    <div class="search__item-day">
                        <input class="search__input" type="text">
                    </div>
                    <div class="search__item-button">
                        <button class="search__button">検索</button>
                    </div>
                    <div class="search__item-reset">
                        <a  class="search__button" href="">リセット</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="admin-action">
            <div class="action__item-flex">
                <div class="action__item-left">
                    <a class="export__link" href="">エクスポート</a>
                </div>
                <div class="action__item-right">
                    <p>{{ $contacts->onEachSide(1)->links('vendor.pagination.admin') }}</p>
                </div>
            </div>
        </div>
        <div class="admin-table">
            <form class="form" action="">
                <table class="table__content">
                    <tr class="table__head-row">
                        <th>お名前</th>
                        <th >性別</th>
                        <th>メールアドレス</th>
                        <th>お問合せの種類</th>
                        <th></th>
                    </tr>
                    @foreach($contacts as $contact)
                    <tr class="table__body-row">
                        <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                        <td>{{ [1=>'男性',2=>'女性',3=>'その他'][(int)$contact->gender]}}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->category->content }}</td>
                        <td>
                            <form class="form-detail" action="">
                                <input type="hidden" name="id" value>
                                <button class="button__detail">詳細</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </form>
        </div>
    </div>


@endsection