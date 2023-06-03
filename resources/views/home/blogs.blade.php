 @extends('layouts.apps')
 @section('content')
 <section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 left-side">
                <h2>Recent Blog Posts</h2>
                  <div class="post">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-lg-6 col-md-12 col-12">
                            <div class="col1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <figure class="figure">

                                            <a href="/posts/{{$post->id}}"> <img style="width :100%"src="/storage/images/{{$post->cover_image}}"></a>


                                            {{-- <img src="images/banner-image-1.jpg" class="figure-img img-fluid" alt="A generic square placeholder image with rounded corners in a figure."> --}}
                                        </figure>
                                    </div>
                                    <div class="col-md-6">
                                        <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
                                        <div class="btn-group">
                                            <a href="/posts/{{$post->id}}" class="btn btn-danger">Read more...</a> 
                                        </div>
                                        <p>Posted on {{$post->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
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
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
              <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

        <div class="row bt"> 
            {{$posts->links()}} 
        </div>
    </div>
</section>
@endsection