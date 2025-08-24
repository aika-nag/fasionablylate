@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<h2 class="confirm_title">Confirm</h2>
<form action="/" class="confirm" method="post">
    @csrf
    <table>
        <tr>
            <th>お名前</th>
            <td>{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
            <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            <input type="hidden" name="first_name" value=" {{ $contact['first_name'] }}">
        </tr>
        <tr>
            <th>性別</th>
            @if($contact['gender'] === 1)
            <td>男性</td>
            @elseif($contact['gender'] === 2)
            <td>女性</td>
            @else
            <td>その他</td>
            @endif
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $contact['email'] }}</td>
            <input type="hidden" name="email" value="{{ $contact['email'] }}">
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $tel }}</td>
            <input type="hidden" name="tel" value="{{ $tel }}">
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $contact['address'] }}</td>
            <input type="hidden" name="address" value="{{ $contact['address'] }}">
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $contact['building'] }}</td>
            <input type="hidden" name="building" value="{{ $contact['building'] }}">
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $category['content'] }}</td>
            <input type="hidden" name="category_id" value="{{ $category['id'] }}">
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{{ $contact['detail'] }}</td>
            <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
        </tr>
    </table>

    <div class="confirm-button">
        <button class="confirm__button-submit" type="submit">送信</button>
        <button class="correct__button-submit" type="submit" formaction="/">修正</button>
    </div>
</form>
@endsection
