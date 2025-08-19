@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
<button class="title__button" type="submit" onclick="location.href='/login'">logout</button>
@endsection

@section('content')
<h2 class="admin_title">Admin</h2>
<form action="/admin/search" class="search-form__item" method="get">
    @csrf
    <input type="text" class="search-form__item-input"  name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword')}}">
    <select name="gender" class="search-form__item-gender" >
    <option value="">性別</option>
    <option value="1">男性</option>
    <option value="2">女性</option>
    <option value="3">その他</option></select>
    <select name="category_id" class="search-form__item-select" >
    <option value="">お問い合わせの種類</option>
    @foreach ($categories as $category)
    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
    @endforeach
    </select>
    <input type="date" class="search-form__item-date" name="date">
    <button class="search-form__button-submit">検索</button>
    <button class="search-form__button-reset" formaction="/admin">リセット</button>
</form>

<div class="sub-form">
<button class="button-export">エクスポート</button>
</div>

<table class="contact-table">
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
    </tr>
    @foreach($contacts as $contact)
    <tr>
        <td>{{ $contact['last_name'] }}  {{ $contact['first_name'] }}</td>
        <td>@if($contact['gender'] ===1)<span>男性</span> @elseif($contact['gender'] ===2)<span>女性</span> @else <span>その他</span> @endif</td>
        <td>{{ $contact['email'] }}</td>
        <td>{{ $contact['category']['content']}}</td>
        <td><button class="button-detail">詳細</button></td>
    </tr>
    @endforeach
</table>
@endsection