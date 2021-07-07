<h2>一覧表示</h2>

<div>
  <form action="{{ route('member.add') }}" method="post">
    <table>
      @csrf
      <tr>
        <th>名前</th>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <th>メール</th>
        <td><input type="text" name="email"></td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td><input type="text" name="telephone"></td>
      </tr>
    </table>
    <input type="submit" value="送信">
  </form>
</div>