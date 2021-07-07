<h1>検索一覧</h1>

<div>
  <form action="/index/find" method="post">
    @csrf
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="検索">
  </form>
  @isset($item)
  <p>{{$item->getData()}}</p>
  @else
  @endisset
  <p>見つかりません</p>
</div>