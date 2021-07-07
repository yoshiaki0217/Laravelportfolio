<div class="request-wrap">
	<div class="request-inner">
		<form action="{{route('posts.apply',['id' =>$posts->id])}}" method="POST" class="request-form">
			<h3 class="request-ttl">自己プロフィール</h3>
			@csrf
			<table class="request-table">
				<tr>
					<th>ユーザー名前</th>
					<td>
						<input type="text" name="title">
					</td>
				</tr>
				<tr>
					<th>役職</th>
					<td>
						<input type="text" name="member">
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
					<th>経歴</th>
					<td>
						<textarea name="comment" id="" cols="30" rows="10">

						</textarea>
					</td>
				</tr>
			</table>
			<p class="request-btn">
        <input type="submit" value="応募する">
      </p>
		</form>
	</div>
</div>