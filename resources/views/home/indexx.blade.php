@extends('layouts.apps')
@section('content')
	<!-- Start retroy layout blog posts -->
	<section class="section bg-light">
		<div class="container">
			<div class="row align-items-stretch retro-layout">
				@foreach($posts as $post)
				<div class="col-md-4">
					<a href="/posts/{{$post->id}}" class="h-entry mb-30 v-height gradient">

						<div class="featured-img" style="background-image: url('{{ asset('/storage/images/' . $post->cover_image) }}');"></div>

						<div class="text">
							<span class="date">{{$post->created_at}}</span>
							<h2>{{$post->title}}</h2>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Scholarship</h2>
				</div>
				<div class="col-sm-3 text-sm-end"><a href="/category/scholarship" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9">
					<div class="row g-3">
					@foreach($scholarshipPosts as $post)
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="/posts/{{$post->id}}" class="img-link">
									<img src="/storage/images/{{$post->cover_image}}" alt="Image" class="img-fluid">
								</a>
								<span class="date">{{$post->created_at}}</span>
								<h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
								<p>{{ Str::limit(strip_tags($post->body), 150, '...') }}</p>
								<p><a href="/posts/{{$post->id}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
					@endforeach
					</div>
				</div>
				<div class="col-md-3">
					
				<h1>Banner</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End posts-entry -->

	<!-- Start posts-entry -->
	<section class="section posts-entry">
		<div class="container">
			<div class="row mb-4">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Internship</h2>
				</div>
				<div class="col-sm-3 text-sm-end"><a href="/category/internship" class="read-more">View All</a></div>
			</div>
			<div class="row g-3">
				<div class="col-md-9 order-md-2">
					<div class="row g-3">
					@foreach($internshipPosts as $post)
						<div class="col-md-6">
							<div class="blog-entry">
								<a href="/posts/{{$post->id}}" class="img-link">
									<img src="/storage/images/{{$post->cover_image}}"  alt="Image" class="img-fluid">
								</a>
								<span class="date">{{$post->created_at}}</span>
								<h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
								<p>{{ Str::limit(strip_tags($post->body), 150, '...') }}</p>
								<p><a href="/posts/{{$post->id}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
							</div>
						</div>
					@endforeach
					</div>
				</div>
				<div class="col-md-3">
					<h1>Banner</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Caurses</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="/category/courses" class="read-more">View All</a></div>
			</div>

			<div class="row">
				@foreach($coursesPosts as $post)
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="/posts/{{$post->id}}" class="img-link"><img style="width :100%"src="/storage/images/{{$post->cover_image}}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
							

							<h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<figure class="author-figure mb-0 me-3 float-start"><img src="/home/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
								<span class="d-inline-block mt-1">By <a href="#">{{$post-> user ->name}}</a></span>
								<span>&nbsp;-&nbsp; {{$post->created_at}}</span>
							</div>

							<p> {{ Str::limit(strip_tags($post->body), 150, '...') }}</p>
							<p><a href="/posts/{{$post->id}}" class="read-more">Continue Reading</a></p>
						</div>
					</div>
				</div>
				@endforeach
				{{$coursesPosts->links()}} 
			</div>
			
		</div>
	</section>

	<div class="section bg-light">
		<div class="container">

			<div class="row mb-4">
				<div class="col-sm-6">
					<h2 class="posts-entry-title">Jobs</h2>
				</div>
				<div class="col-sm-6 text-sm-end"><a href="/category/jobs" class="read-more">View All</a></div>
			</div>

			<div class="row align-items-stretch retro-layout-alt">

				@foreach($jobPosts as $post)

				<div class="col-md-6">

					<a href="/posts/{{$post->id}}" class="hentry img-2 v-height mb30 gradient">
						<div class="featured-img" style="background-image: url('{{ asset('/storage/images/' . $post->cover_image) }}');"></div>
						<div class="text text-sm">
							<span>{{$post->created_at}}</span>
							<h2>{{$post->title}}</h2>
						</div>
					</a>

				</div>
				@endforeach
			</div>

		</div>
	</div>
@endsection
