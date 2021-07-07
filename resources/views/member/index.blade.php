<h1>一覧表示</h1>

<div>
  <table>
    <tr>
      <th>ID</th>
      <th>名前</th>
      <th>電話番号</th>
      <th>メールアドレス</th>
    </tr>
    @foreach($members as $member)
    <tr>
      <td>{{$member->id}}</td>
      <td>{{$member->name}}</td>
      <td>{{$member->telephone}}</td>
      <td>{{$member->email}}</td>
    </tr>
    @endforeach
  </table>
  <a href="/add">ユーザー追加</a>
</div>