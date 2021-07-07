@extends('layouts.app')

@section('content')
<div class="create-wrap">
  <div class="create-inner cmn-bg">
    <div class="create-form">

      <form action="{{ route('posts.update', ['id' =>$posts->id]) }}" class="" method="POST">
        <h2 class="create-ttl">仲間を募集する</h2>
        @csrf
        <table class="create-table">
          <tr>
            <th>クラン名</th>
            <td>
              <input type="text" name="title" value="{{$posts->title}}">
            </td>
          </tr>
          <tr>
            <th>募集人数</th>
            <td>
              <input type="text" name="member" value="{{$posts->member}}">
            </td>
          </tr>
          <tr>
            <th>ランク帯</th>
            <td>
              <select name="grade" id="grade">
                @if (!empty($posts->grade))    
                  <option value="{{$posts->grade}}">{{$posts->grade}}</option>
                @endif
                {{-- もしgradeの文字列とoptionのvalueの文字列が一緒なら表示させないようにする。 --}}
                @if ($posts->grade != "チャンピオン")
                  <option value="チャンピオン">チャンピオン</option>
                @endif
                @if ($posts->grade != "ダイヤ")    
                  <option value="ダイヤ">ダイヤ</option>
                @endif
                @if ($posts->grade != "プラチナ")    
                  <option value="プラチナ">プラチナ</option>
                @endif
                @if ($posts->grade != "ゴールド")    
                  <option value="ゴールド">ゴールド</option>
                @endif
                @if ($posts->grade != "シルバー")
                  <option value="シルバー">シルバー</option>
                @endif
                @if ($posts->grade != "ブロンズ")
                  <option value="ブロンズ">ブロンズ</option> 
                @endif
                @if ($posts->grade != "コッパー")    
                  <option value="コッパー">コッパー</option>
                @endif
              </select>
              帯
            </td>
          </tr>
          <tr>
            <th>PCorCS</th>
            <td>
              <select name="message" id="grade">
                @if (!empty($posts->message))    
                <option value="{{$posts->message}}">{{$posts->message}}</option>
              @endif
              {{-- もしmessageの文字列とoptionのvalueの文字列が一緒なら表示させないようにする。 --}}
              @if ($posts->message != "PC")
                <option value="PC">PC</option>
              @endif
              @if ($posts->message != "PS4")
                <option value="PS4">PS4</option>
              @endif
              </select>
            </td>
          </tr>
          <tr>
            <th>募集要件</th>
            <td>
              <textarea name="comment" id="" cols="30" rows="10" value="{{$posts->comment}}">
  
              </textarea>
            </td>
          </tr>
        </table>
        <div class="edit-btn">
          <p class="create-btn">
            <input type="submit" value="更新する">
          </p>
          <p class="create-btn">
            <a href="{{route('posts.index')}}">一覧に戻る</a>
          </p>
        </div>
      </form>
      <form action="{{ route('posts.delete',['id'=>$posts->id])}}" method="POST" class="delete-btn">
        @csrf
      <button type="submit">削除</button>
      </form>
    </div>
  </div>
@endsection