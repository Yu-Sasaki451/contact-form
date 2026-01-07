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
                <div class="search__item-date">
                    <input class="search__input" type="date" value="{{ request('date') }}" placeholder="年/月/日" readonly>
                </div>
                <div class="search__item-button">
                    <button class="search__button">検索</button>
                </div>
                <div class="search__item-reset">
                    <a class="search__button" href="">リセット</a>
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
                            <div class="modal__row"><dt>お名前</dt><dd>{{ $contact->last_name }} {{ $contact->first_name }}</dd></div>
                            <div class="modal__row"><dt>性別</dt><dd>{{ [1=>'男性',2=>'女性',3=>'その他'][(int)$contact->gender] }}</dd></div>
                            <div class="modal__row"><dt>メール</dt><dd>{{ $contact->email }}</dd></div>
                            <div class="modal__row"><dt>電話</dt><dd>{{ $contact->tel }}</dd></div>
                            <div class="modal__row"><dt>住所</dt><dd>{{ $contact->address }}</dd></div>
                            <div class="modal__row"><dt>建物</dt><dd>{{ $contact->building }}</dd></div>
                            <div class="modal__row"><dt>種類</dt><dd>{{ $contact->category->content }}</dd></div>
                            <div class="modal__row"><dt>内容</dt><dd>{{ $contact->detail }}</dd></div>
                        </dl>
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
