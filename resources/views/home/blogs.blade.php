 @extends('layouts.apps')
 @section('content')

<div class="section search-result-wrap">
    <div class="container">
      
      <div class="row posts-entry">
        <div class="col-lg-8">
          <div class="blog-entry d-flex blog-entry-search-item">
            <a href="/posts/{{$post->id}}" class="img-link me-4">
            <img style="width :100%"src="/storage/images/{{$post->cover_image}}"></a>
            <div>
              <span class="date">{{$post->created_at}} &bullet; <a href="#">{{$post->branch_name}}</a></span>
              <h2><a href="single.html">{{$post->title}}</a></h2>
              <p>{{$post->body}}</p>
              <p><a href="/posts/{{$post->id}}" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

        <div class="row bt"> 
            {{$posts->links()}} 
        </div>
    </div>
@endsection