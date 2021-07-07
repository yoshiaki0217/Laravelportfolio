<div class="comment">
	<h2 class="comment-ttl">応募一覧</h2>
	{{-- $commentsがからの時if文が発火	 --}}
	@if ($comments->isEmpty())
			<p class="comment-text">応募はまだありません</p>
	@endif
	<ul class="comment-wrap">
		@foreach ($comments as $item)
			<li class="comment-content">
				<div class="coment-group">
					<p class="comment-name">{{$item->title}}<span>:</span></p>
					<div class="comment-grop-content">
						<p class="comment-grade">{{$item->grade}}</p>
						<p>{{$item->member}}</p>
						<p>{{$item->comment}}</p>
					</div>
				</div>
			</li>
			@endforeach
	</ul>
</div>