@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('nav')
<nav>
    <form action="/logout" class="form__logout" method="POST">
    @csrf
        <button class="header-nav__button" type="submit">logout</button>
    </form>
</nav>
@endsection


@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>

    <div class="admin__inner">
        <form action="/admin/search" class="search-form" method="GET">
            @csrf
            <div class="search-form__text">
                <input type="text" class="search-form__text-input search-selection" placeholder="名前やメールアドレスを入力してください" name="keyword" value="{{ old('keyword') }}">
                <button class="search-form__button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="search-form__gender">
                <select name="gender" id="" class="search-selection">
                    <option value="">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="search-form__category">
                <select name="category_id" id="" class="search-selection">
                    <option value="" disabled selected style="display:none;">お問い合わせの種類</option>
                    @foreach($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-form__calender">
                <input class="search-form__calender-input search-selection" type="date" name="created_at" placeholder="日付を選択してください">
            </div>
        </form>

        <div class="sub-utilities">
            <div class="paginate">
                {{-- {{ $contacts->links() }} --}}
            </div>
        </div>

        <form action="/admin/csv_download" class="admin-list" method="get">
            @csrf
            <input type="hidden" name="keyword" value="{{ request()->query('keyword') }}">
            <input type="hidden" name="gender" value="{{ request()->query('gender') }}">
            <input type="hidden" name="category_id" value="{{ request()->query('category_id') }}">
            <table class="admin-table">
                <tr class="admin-table__row-header">
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
                @foreach($contacts as $contact)
                    <tr class="admin-table__row-inner">
                        <td>{{ $contact['last_name'] . '　' . $contact['first_name'] }}</td>
                        <td>
                            <?php
                            if($contact['gender'] == '1'){
                                echo '男性';
                            }else if($contact['gender'] == '2'){
                                echo '女性';
                            }else if($contact['gender'] == '3'){
                                echo 'その他';
                            }
                            ?>
                        </td>
                        <td>{{ $contact['email'] }}</td>
                        <td>{{ $contact['category']['content'] }}</td>
                        <td>
                            <div class="detail__button">
                                <a href="#modal_{{ $contact['id'] }}">詳細</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <button class="export__button">エクスポート</button>
        </form>

        <div class="reset">
            <a href="/admin" class="reset__button">リセット</a>
        </div>


        @foreach($contacts as $contact)
            <div class="modal-window" id="modal_{{ $contact['id'] }}">
                <a href="#!" class="modal-window_hidden"><i class="fa-regular fa-circle-xmark fa-2xl"></i></a>
                <form action="/admin/delete" class="modal-form" method="POST">
                    @method('DELETE')
                    @csrf
                    <table class="modal-form__table">
                        <tr class="modal-form__table-row">
                            <th class="modal-form__table-header">お名前</th>
                            <td class="modal-form__table-inner">
                                {{ $contact['last_name'] . '　' . $contact['first_name'] }}
                            </td>
                        </tr>
                        <tr class="modal-form__table-row">
                            <th class="modal-form__table-header">性別</th>
                            <td class="modal-form__table-inner">
                                <input type="hidden" value="{{ $contact['gender'] }}">
                                <?php
                                if($contact['gender'] == '1'){
                                    echo '男性';
                                }else if($contact['gender'] == '2'){
                                    echo '女性';
                                }else if($contact['gender'] == '3'){
                                    echo 'その他';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr class="modal-form__table-row">
                            <th class="modal-form__table-header">メールアドレス</th>
                            <td class="modal-form__table-inner">{{ $contact['email'] }}</td>
                        </tr>
                        <tr class="modal-form__table-row">
                            <th class="modal-form__table-header">電話番号</th>
                            <td class="modal-form__table-inner">{{ $contact['tel'] }}</td>
                        </tr>
                        <tr class="modal-form__table-row">
                            <th class="modal-form__table-header">住所</th>
                            <td class="modal-form__table-inner">{{ $contact['address'] }}</td>
                        </tr>
                        <tr class="modal-form__table-row">
                            <th class="modal-form__table-header">建物名</th>
                            <td class="modal-form__table-inner">{{ $contact['building'] }}</td>
                        </tr>
                        <tr class="modal-form__table-row">
                            <th class="modal-form__table-header">お問い合わせの種類</th>
                            <td class="modal-form__table-inner">{{ $contact['category']['content'] }}</td>
                        </tr>
                        <tr class="modal-form__table-row">
                            <th class="modal-form__table-header">お問い合わせ内容</th>
                            <td class="modal-form__table-inner">{{ $contact['detail'] }}</td>
                        </tr>
                    </table>

                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                    <button class="delete__button" type="submit">削除</button>
                </form>
            </div>
        @endforeach

    </div>
</div>
@endsection