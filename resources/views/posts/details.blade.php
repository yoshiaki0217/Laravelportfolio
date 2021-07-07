@extends('layouts.app')


@section('content')
<section>
  <div class="post-details-wrap">
    <div class="post-details-inner">
      <div class="post-details-content">
        <div class="post-cover"></div>
        <h3 class="post-details-ttl">{{$posts->title}}</h3>
        <div class="post-details-group">
          <p class="post-details-grade">
            <img src="/images/{{$posts->grade}}.png" alt="" class="post-details-img">
          </p>
          <div>
            <p class="post-details-member">{{$posts->member}}人<span>募集</span></p>
            <p class="post-details-choice">{{$posts->message}}</p>
          </div>
        </div>
        <div class="post-details-comment">
          <p class="post-comment-ttl">メッセージ</p>
          <div class="post-details-text">
            <p>
              {{$posts->comment}}
            </p>

          </div>
          <p class="post-details-btn">
            <a href="{{route('posts.index')}}">一覧に戻る</a>
          </p>
        </div>
      </div>
    </div>
    @include('components.comment')
    @if ($posts->user_id != $user_id)
    @include('components.apply')
    @endif
  </div>
</section>
@endsection