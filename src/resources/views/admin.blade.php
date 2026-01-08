@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/administrator/admin.css') }}">
@endsection

@section('nav')
<form class="form__logout" action="/logout" method="post">
    @csrf
    <button class="header-nav__button">logout</button>
</form>
@endsection

@section('content')
<div class="admin-wrapper">
    <div class="admin-wrapper__header">
        <h2>Admin</h2>
    </div>

    <div class="admin-search">
        <form action="/search" method="get">
            <input type="hidden" name="search" value="1">
            <div class="admin-search__item">
                <div class="admin-search__item-flex">
                    <div class="search__item-name">
                        <input class="search__input" type="text" placeholder="名前やメールアドレスを入力してください">
                    </div>
                    <div class="search__item-gender">
                        <select class="search__select" name="gender" id="gender">
                            <option value="" {{ request('gender','') === '' ? 'selected' : '' }}>性別</option>
                            <option value="1" {{ request('gender') === '1' ? 'selected' : '' }}>男性</option>
                            <option value="2" {{ request('gender') === '2' ? 'selected' : '' }}>女性</option>
                            <option value="3" {{ request('gender') === '3' ? 'selected' : '' }}>その他</option>
                        </select>
                    </div>
                    <div class="search__item-category">
                        <select class="search__select" name="category_id" id="category_id">
                            <option value="" {{ $category_id === '' ? 'selected' : '' }}>
                                お問い合わせの種類
                            </option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category_id === (string) $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="search__item-date">
                        <input class="search__input" name="date" type="date" value="{{ $date }}" placeholder="年/月/日">
                    </div>
                    <div class="search__item-button">
                        <button class="search__button">検索</button>
                    </div>
                    <div class="search__item-reset">
                        <a class="search__button" href="/search/reset">リセット</a>
                    </div>
                </div>
            </div>
        </form>
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
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問合せの種類</th>
                    <th></th>
                </tr>

                @foreach($contacts as $contact)
                <tr class="table__body-row">
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>{{ [1=>'男性',2=>'女性',3=>'その他'][(int)$contact->gender] }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td>
                        <a class="button__detail" href="#modal-{{ $contact->id }}">詳細</a>
                    </td>
                </tr>

                @push('modals')
                <div id="modal-{{ $contact->id }}" class="modal">
                    <a href="#" class="modal__backdrop" aria-label="閉じる"></a>

                    <div class="modal__panel" role="dialog" aria-modal="true">
                        <a href="#" class="modal__close" aria-label="閉じる">×</a>

                        <dl class="modal__dl">
                            <div class="modal__row">
                                <dt class="row__header">お名前</dt>
                                <dd class="row__body">{{ $contact->last_name }} {{ $contact->first_name }}</dd>
                            </div>
                            <div class="modal__row">
                                <dt class="row__header">性別</dt>
                                <dd class="row__body">{{ [1=>'男性',2=>'女性',3=>'その他'][(int)$contact->gender] }}</dd>
                            </div>
                            <div class="modal__row">
                                <dt class="row__header">メールアドレス</dt>
                                <dd class="row__body">{{ $contact->email }}</dd>
                            </div>
                            <div class="modal__row">
                                <dt class="row__header">電話番号</dt>
                                <dd class="row__body">{{ $contact->tel }}</dd>
                            </div>
                            <div class="modal__row">
                                <dt class="row__header">住所</dt>
                                <dd class="row__body">{{ $contact->address }}</dd>
                            </div>
                            <div class="modal__row">
                                <dt class="row__header">建物名</dt>
                                <dd class="row__body">{{ $contact->building }}</dd>
                            </div>
                            <div class="modal__row">
                                <dt class="row__header">お問い合わせの種類</dt>
                                <dd class="row__body">{{ $contact->category->content }}</dd>
                            </div>
                            <div class="modal__row">
                                <dt class="row__header">お問い合わせ内容</dt>
                                <dd class="row__body">{{ $contact->detail }}</dd>
                            </div>
                        </dl>
                        <form action="/delete" method="post">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="id" value="{{ $contact->id }}">
                            <button class="delete__button" type="submit">削除</button>
                        </form>
                    </div>
                </div>
                @endpush
                @endforeach
            </table>
        </form>

        @stack('modals')
    </div>
</div>
@endsection
