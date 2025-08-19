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
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>{{ $contact['email'] }}</td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td>{{ $tel }}</td>
        </tr>
        <tr>
            <th>住所</th>
            <td>{{ $contact['address'] }}</td>
        </tr>
        <tr>
            <th>建物名</th>
            <td>{{ $contact['building'] }}</td>
        </tr>
        <tr>
            <th>お問い合わせの種類</th>
            <td>{{ $category['content'] }}</td>
        </tr>
        <tr>
            <th>お問い合わせ内容</th>
            <td>{{ $contact['detail'] }}</td>
        </tr>
    </table>

    <div class="confirm-button">
        <button class="confirm__button-submit" type="submit">送信</button>
        <button class="correct__button-submit" type="submit" formaction="/">修正</button>
    </div>
</form>
@endsection
