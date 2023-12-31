@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>

    <form action="/confirm" class="form" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input-name" type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}">
                <input class="form__input-name" type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}">
            </div>
        </div>
        <div class="form__error">
            @error('last_name')
            {{ $message }}
            @enderror
        </div>
        <div class="form__error">
            @error('first_name')
            {{ $message }}
            @enderror
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content form__group-radio">
                <input type="radio" name="gender" value="1" {{ old('gender') === '1' ? 'checked' : '' }} id="man"><label for="man">男性</label>
                <input type="radio" name="gender" value="2" {{ old('gender') === '2' ? 'checked' : '' }} id="woman"><label for="woman">女性</label>
                <input type="radio" name="gender" value="3" {{ old('gender') === '3' ? 'checked' : '' }} id="other"><label for="other">その他</label>
            </div>
        </div>
        <div class="form__error">
            @error('gender')
            {{ $message }}
            @enderror
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input-email" type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input-tel" type="text" name="tel_first" placeholder="080" value="{{ old('tel_first') }}">
                <p>-</p>
                <input class="form__input-tel" type="text" name="tel_second" placeholder="1234" value="{{ old('tel_second') }}">
                <p>-</p>
                <input class="form__input-tel" type="text" name="tel_third" placeholder="5678" value="{{ old('tel_third') }}">
            </div>
        </div>
        <div class="form__error">
            @error('tel_first')
            {{ $message }}
            @enderror
        </div>
        <div class="form__error">
            @error('tel_second')
            {{ $message }}
            @enderror
        </div>
        <div class="form__error">
            @error('tel_second')
            {{ $message }}
            @enderror
        </div>


        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input-address" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
        </div>
        <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <input class="form__input-building" type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <select class="form__item-select" name="category_id">
                    <option value="" hidden>選択してください</option>
                    @foreach($categories as $category)
                    <option value="{{ $category['id'] }}" @if($category['id'] == old('category_id')) selected @endif>{{ $category['content'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <textarea class="form__input-detail" name="detail" rows="5" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
            </div>
        </div>
        <div class="form__error">
            @error('detail')
            {{ $message }}
            @enderror
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>




@endsection