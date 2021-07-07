<div class="header_slider">
	<ul class="sec_inner">
		@foreach ($posts as $post)			
		<li class="slider">
			<a href="">
				<div class="post-list-inner slider-post">
					<div class="post-cover"></div>
					<div class="post-list-content">
						@if ($userId == $post->user_id)
									<a class="edit-link" href="{{route('posts.edit',['id'=>$post->id])}}">編集する</a>
						@endif
						<h3 class="post-list-ttl">{{$post->title}}</h3>
						<div class="post-list-group">
							<p class="post-list-grade">
								<img src="/images/{{$post->grade}}.png" alt="" class="post-list-img">
							</p>
							<div>
								<p class="post-list-member">{{$post->member}}人募集</p>
								<p class="post-list-choice">{{$post->message}}</p>
							</div>
						</div>
						<p class="post-list-btn">
							<a href="{{ route('posts.detail', ['id'=>$post->id]) }}">詳細を見る</a>
						</p>
					</div>
				</div>
			</a>
		</li>	
		@endforeach
	</ul>
</div>