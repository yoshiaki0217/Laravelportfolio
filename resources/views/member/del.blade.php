<h2>削除ページ</h2>

<div>
  <form action="{{route('member.remove')}}" method="POST">
    <table>
      @csrf
      <input type="hidden" name="id" value="{{ $members->id }}">
      <tr>
        <th>名前</th>
        <td>{{ $members->name }}</td>
      </tr>
      <tr>
        <th>メール</th>
        <td>{{ $members->emaile }}</td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td>{{ $members->telephone }}</td>
      </tr>
      <th></th>
      <td>
        <input type="submit" value="削除">
      </td>
    </table>
  </form>
</div>