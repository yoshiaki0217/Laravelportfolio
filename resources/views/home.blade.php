@extends('layouts.app')

@section('content')
<div class="home-content cmn-bg">
    <div class="home-wrap">
        <div class="home-inner">
            <h2 class="home-ttl">
                <span>{{ __('GAMEROOM') }}</span><br>
                <p>{{ $users->name }}さん、ようこそゲームの世界へ</p>
            </h2>
            <div class="">
                @if (session('status'))
                <div class="" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="home-group">
                <p class="group-search cmn-home-group">
                    <a href="{{ route('posts.index') }}">チームに応募する</a>
                </p>
                <p class="group-recruit cmn-home-group">
                    <a href="{{ route('posts.create') }}">仲間を募集する</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection