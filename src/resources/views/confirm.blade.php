@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>

    <form action="/" class="form" method="POST">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">お名前</td>
                    <td class="confirm-table__text">
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly>
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly>
                        <div class="confirm-table__name">
                            {{ $contact['last_name'] . '　' . $contact['first_name'] }}
                        </div>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">性別</td>
                    <td class="confirm-table__text">
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly>
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
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">メールアドレス</td>
                    <td class="confirm-table__text">
                        <input type="text" name="email" value="{{ $contact['email'] }}" readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">電話番号</td>
                    <td class="confirm-table__text">
                        <input type="text" name="tel" value="{{ $contact['tel_first'].$contact['tel_second'].$contact['tel_third'] }}" readonly>
                        <input type="hidden" name="tel_first" value="{{ $contact['tel_first'] }}">
                        <input type="hidden" name="tel_second" value="{{ $contact['tel_second'] }}">
                        <input type="hidden" name="tel_third" value="{{ $contact['tel_third'] }}">
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">住所</td>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value={{ $contact['address'] }} readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">建物名</td>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value={{ $contact['building'] }} readonly>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">お問い合わせの種類</td>
                    <td class="confirm-table__text">
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly>
                        <?php
                        foreach($categories as $key=>$category){
                            if($contact['category_id'] == $key+1){
                                echo $category['content'];
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <td class="confirm-table__header">お問い合わせの内容</td>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <input class="form__button-submit" type="submit">
            <input class="form__button-modify" type="submit" value="修正" name="back">
        </div>
    </form>


</div>
@endsection