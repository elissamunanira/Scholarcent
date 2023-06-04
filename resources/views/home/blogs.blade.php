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
        <div class="row bt"> 
            {{$posts->links()}} 
        </div>
    </div>
</section>
@endsection