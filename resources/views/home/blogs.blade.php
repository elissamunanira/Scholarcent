 @extends('layouts.apps')
 @section('content')

<div class="section search-result-wrap">
    <div class="container">
      
      {{-- <div class="row">
            @foreach($posts as $post)
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<a href="/posts/{{$post->title}}" class="img-link"><img style="width :100%"src="/storage/images/{{$post->cover_image}}" alt="Image" class="img-fluid"></a>
						<div class="excerpt">
              <span class="date">{{$post->created_at}} &bullet; <a href="#">{{$post->branch_name}}</a></span>
              <h2><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h2>
              <p>{{ Str::limit(strip_tags($post->body), 100, '...') }}</p>
              <p><a href="/posts/{{$post->title}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>
          </div>
            @endforeach
        </div>
      </div>
      </div> --}}

      <div class="row posts-entry">
            @foreach($posts as $post)
        <div class="col-lg-6">
          <div class="blog-entry d-flex blog-entry-search-item">
           <a href="/posts/{{$post->title}}" class="img-link"><img style="width :100%"src="/storage/images/{{$post->cover_image}}" alt="Image" class="img-fluid"></a>
            <div>
              <span class="date">{{$post->created_at}} &bullet; <a href="#">{{$post->branch_name}}</span>
              <h2><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h2>
              <p><a href="/posts/{{$post->title}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>
        </div>
            @endforeach
      </div>

    <div class="row bt"> 
        {{$posts->links()}} 
    </div>
</div>
@endsection