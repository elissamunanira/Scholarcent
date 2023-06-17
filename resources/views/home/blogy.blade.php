 @extends('layouts.apps')
 @section('content')

<div class="section search-result-wrap">
    <div class="container">
      
      <div class="row posts-entry">
        {{-- <div class="col-lg-8">
          <div class="blog-entry d-flex blog-entry-search-item">
            @foreach($posts as $post)
            <a href="/posts/{{$post->id}}" class="img-link me-4">
            <img style="width :100%"src="/storage/images/{{$post->cover_image}}"></a>
            <div>
              <span class="date">{{$post->created_at}} &bullet; <a href="#">{{$post->branch_name}}</a></span>
              <h2><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h2>
              <p>{{ Str::limit(strip_tags($post->body), 100, '...') }}</p>
              <p><a href="/posts/{{$post->id}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>


                  <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                  <a href="/posts/{{$post->id}}" class="img-link"><img style="width :100%"src="/storage/images/{{$post->cover_image}}" alt="Image" class="img-fluid"></a>
                  <div class="excerpt">
                    

                    <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
                    <div class="post-meta align-items-center text-left clearfix">
                      <p>Written
                      <span class="d-inline-block mt-1">By <a href="#">{{$post-> user ->name}}</a></span>
                      <span>&nbsp;-&nbsp; {{$post->created_at}}</span></p>
                    </div>

                    <p> {{ Str::limit(strip_tags($post->body), 150, '...') }}</p>
                    <p><a href="/posts/{{$post->id}}" class="read-more">Continue Reading</a></p>
                  </div>
                </div>
              </div>

            @endforeach
          </div>
        </div> --}}

        <div class="row">
				@foreach($posts as $post)
        <div class="col-md-6 col-lg-3">
          <div class="blog-entry">
            <a href="/posts/{{$post->id}}" class="img-link">
              <img style="width :100%"src="/storage/images/{{$post->cover_image}}" alt="Image" class="img-fluid">
            </a>
            <span class="date">{{$post->created_at}}</span>
            <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
            <p>{{ Str::limit(strip_tags($post->body), 100, '...') }}</p>
            <p><a href="/posts/{{$post->id}}" class="read-more">Continue Reading</a></p>
          </div>
        </div>
        @endforeach
      </div>


      </div>
    </div>
    <div class="row bt"> 
        {{$posts->links()}} 
    </div>
</div>
@endsection