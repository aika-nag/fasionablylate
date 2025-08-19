@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('button')
<button class="title__button" type="submit" onclick="location.href='/register'">Register</button>
@endsection

@section('content')
<h2 class="log_title">Login</h2>
<form action="/login" class="login" method="post">
    @csrf
    <label>メールアドレス
    @error('email')
        <p style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('email') }}</p>
    @enderror
    <div class="form__input"><input type="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}" /></div></label>
    <label>パスワード
    @error('password')
        <p style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('password') }}</p>
    @enderror
    <div class="form__input"><input type="password" name="password" placeholder="例）coachtechno6" /></div></label>
    <div class="login-button">
    <button class="form__button-submit" type="submit">ログイン</button>
    </div>
</form>
@endsection