@extends('layouts.app')

@section('content')
<div class="post-list">
  <div class="serch-wrap">
    <div class="serch-inner">
      @if ($lank == 'all')	
        @if ($machine == 'all')
          <p class="serch-item">条件なしで検索</p>
        @else
          <p class="serch-item">{{$machine}}で検索</p>
        @endif
      @elseif($lank != 'all')
        @if ($machine == 'all')
            <p class="serch-item">{{$lank}}で検索</p>
        @else
            <p class="serch-item">{{$lank}}と{{$machine}}で検索</p>
        @endif
      @endif
      <div class="serch-find">
        <form action="{{ route('posts.search') }}">
          <select class="serch-select" name="machine">
            <option value="all">全選択</option>
            @foreach($arr["machine"] as $key => $value)
            {{-- 連想配列のkeyに入っている値を$valueとして回す --}}
              <option value="{{ $value }}">{{ $value }}
              </option>
            @endforeach
          </select>
          <select class="serch-select" name="lank">
            <option value="all">全選択</option>
            @foreach($arr["lank"] as $key => $value)
              <option value="{{ $value }}">{{ $value }}
              </option>
            @endforeach
          </select>
          <button class="serch-btn" type="submit">検索する</button>
        </form> 
      </div>
    </div>
  </div>
  @include('components.post')
  @include('components.slider')
</div>
@endsection