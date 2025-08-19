@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('button')
<button class="title__button" type="submit" onclick="location.href='/login'">login</button>
@endsection

@section('content')
<h2 class="register_title">Register</h2>
<form action="/register" class="register" method="post">
        @csrf
        <label>お名前
        @error('name')
        <p style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('name') }}</p>
        @enderror
        <div class="form__input">
                <input type="text" name="name" placeholder="例）山田　太郎" value="{{ old('name')}}" />
        </div></label>
        <label>メールアドレス
        @error('email')
        <p style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('email') }}</p>
        @enderror
        <div class="form__input">
                <input type="email" name="email" placeholder="例）test@example.com" value="{{ old('email') }}" />
        </div></label>
        <label>パスワード
        @error('password')
        <p style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('password') }}</p>
        @enderror
        <div class="form__input">
                <input type="password" name="password" placeholder="例）coachtech1106" />
        </div></label>
        <div class="register-button">
        <button class="form__button-submit" type="submit">登録</button>
        </div>
</form>
@endsection
