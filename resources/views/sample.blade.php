@include('layouts.header')
<div>
  <h1>おはよう</h1>
  @isset ($name)
  <p>今日わ{{$name}}さん</p>
  @else
  <p>名前を入力してください</p>
  @endisset
  <form action="/sample" method="post">
    @csrf
    <input type="text" name="name" />
    <input type="submit">
  </form>
  {{-- @foreach ($data as $item)
  <li>{{$item}}</li>
  @endforeach --}}
</div>