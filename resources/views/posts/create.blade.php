@extends('layouts.app')

@section('content')
<div class="create-wrap">
  <div class="create-inner">
    <form action="{{ route('posts.add') }}" class="create-form" method="POST">
      <h2 class="create-ttl">仲間を募集する</h2>
      @csrf
      <table class="create-table">
        <tr>
          <th>クラン名</th>
          <td>
            <input type="text" name="title" {{ old('title',isset($title) ? $title : '') }}>
          </td>
        </tr>
        <tr>
          <th>募集人数</th>
          <td>
            <input type="text" name="member" value="{{ old('menber',isset($member) ? $member : '') }}">
          </td>
        </tr>
        <tr>
          <th>ランク帯</th>
          <td>
            <select name="grade" id="grade">
              <option value="チャンピオン">チャンピオン</option>
              <option value="ダイヤ">ダイヤ</option>
              <option value="プラチナ">プラチナ</option>
              <option value="ゴールド">ゴールド</option>
              <option value="シルバー">シルバー</option>
              <option value="ブロンズ">ブロンズ</option>
              <option value="コッパー">コッパー</option>
            </select>
            帯
          </td>
        </tr>
        <tr>
          <th>PCorCS</th>
          <td>
            <select name="message" id="grade">
              <option value="PC">PC</option>
              <option value="PS4">PS4</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>募集要件</th>
          <td>
            <textarea name="comment" id="" cols="30" rows="10">

            </textarea>
          </td>
        </tr>
      </table>
      <p class="create-btn">
        <input type="submit" value="投稿する">
      </p>
    </form>
  </div>
</div>
@endsection