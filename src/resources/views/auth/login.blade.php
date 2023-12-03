@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('nav')
<nav>
    <form action="/register" class="form__logout" method="POST">
    @csrf
        <button class="header-nav__button">Register</button>
    </form>
</nav>
@endsection

@section('content')
<div class="login__content">
    <div class="login__heading">
        <h2>Login</h2>
    </div>
    <form action="/login" class="form" method="POST">
    @csrf
        <div class="form__group">
            <div class="form__group-title">
                <p>メールアドレス</p>
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
                <p>パスワード</p>
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
            <button class="form__button-submit" type="submit"> ログイン</button>
        </div>
    </form>
</div>
@endsection