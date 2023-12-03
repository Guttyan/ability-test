@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('nav')
<nav>
    <form action="/login" class="form__logout" method="POST">
    @csrf
        <button class="header-nav__button">login</button>
    </form>
</nav>
@endsection

@section('content')
<div class="register__content">
    <div class="register__heading">
        <h2>Register</h2>
    </div>
    <form action="/register" class="form" method="POST">
    @csrf
        <div class="form__group">
            <div class="form__group-title">
                お名前
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="例:山田　太郎">
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                メールアドレス
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="例:test@example.com">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                パスワード
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="password" value="{{ old('password') }}" placeholder="例:coachtech1106">
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit"> 登録</button>
        </div>
    </form>
</div>
@endsection