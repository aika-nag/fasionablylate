@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<h2 class="contact_title">Contact</h2>
<form action="/confirm" class="contact" method="post">
    @csrf
    <table>
        <tr>
            <th>
                <label for="name">お名前
                <span class="form__label--required">※</span>
                </label>
            </th>
            <td>
                <div class="form__input--name">
                    <input type="text" name="last_name" id="name" placeholder="例）山田" value="{{ old('last_name') }}"/>
                    <input type="text" name="first_name" placeholder="例）太郎" value="{{ old('first_name') }}" />
                </div>
                @error('last_name')
                <span style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('last_name') }}</span>
                @enderror
                @error('first_name')
                <span style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('first_name') }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>
                <label for="gender">性別
                <span class="form__label--required">※</span>
                </label>
            </th>
            <td>
                <div class="form__input--gender">
                    <input type="radio" name="gender" value="1">男性
                    <input type="radio" name="gender" value="2" >女性
                    <input type="radio" name="gender" value="3" >その他
                </div>
                @error('gender')
                <span style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('gender') }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>
                <label for="mail">メールアドレス
                <span class="form__label--required">※</span>
                </label>
            </th>
            <td>
                <input type="email" name="email" id="email" placeholder="例）test@example.com" value="{{ old('email') }}"/>
                @error('email')
                <span style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('email') }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>
                <label for="tel">電話番号</label>
                <span class="form__label--required">※</span>
                </label>
            </th>
            <td>
                <div class="form__input--tel">
                <input type="tel" name="tel1" id="tel" placeholder="080" value="{{ old('tel1') }}" > -
                <input type="tel" name="tel2" placeholder="1234"  value="{{ old('tel2')}}"> -
                <input type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                </div>
                @error('tel1')
                <span style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('tel1') }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>
                <label for="address">住所
                <span class="form__label--required">※</span>
                </label>
            </th>
            <td>
                <input type="text" name="address" id="address" placeholder="例）東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
                @error('address')
                <span style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('address') }}</span>
                @enderror
            </td>
        </tr>
        <tr>
            <th>
                <label for="building">建物名</label>
            </th>
            <td>
                <input type="text" name="building" id="building" placeholder="例）千駄ヶ谷マンション101"value="{{ old('building') }}" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="category_id">お問い合わせの種類
                <span class="form__label--required">※</span>
                </label>
            </th>
            <td>
                <select name="category_id" id="category_id" required>
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
                @error('category_id')
                <span style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('category_id') }}</span>
                @enderror
                </select>
            </td>
        </tr>
        <tr>
            <th>
                <label for="detail">お問い合わせ内容
                <span class="form__label--required">※</span>
                </label>
            </th>
            <td>
                <textarea name="detail" id="detail" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}" ></textarea>
                @error('detail')
                <span style="color: red;font-size:14px;margin-top:3px;">{{ $errors->first('detail') }}</span>
                @enderror
            </td>
        </tr>
    </table>
    <div class="confirm-button">
    <button class="form__button-submit" type="submit">確認画面</button>
    </div>
</form>
@endsection