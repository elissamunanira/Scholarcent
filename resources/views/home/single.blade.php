@extends('layouts.apps')
@section('content')
  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('/storage/images/' . $post->cover_image) }}');">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">{{$post->title}}</h1>
            <div class="post-meta align-items-center text-center">
              {{-- <figure class="author-figure mb-0 me-3 d-inline-block"><img src="/home/images/person_1.jpg" alt="Image" class="img-fluid"></figure> --}}
              <p>Written </p>
              <span class="d-inline-block mt-1">By {{$post->user->name}}</span>
              <span>&nbsp;-&nbsp; {{$post->created_at}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">
            <p>{{$post->body}}</p>
          </div>
          <p><a href="/posts/{{$post->id}}" class="btn btn-sm btn-outline-primary">Join Our Whatsapp Group</a></p>
      </div>
    </div>
    <hr>
      <small>Written on {{$post->created_at}} by {{$post-> user ->name}}</small>
    @if(!Auth::guest())
      @if(Auth::user()->id == $post->user_id)
          <hr>
          <div>
          <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

          <div class="pull-right">
          {!!Form::open(['Action' => 'PostsController@destroy', 'method'=>'POST', 'class' => 'pull-right']) !!}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Delete', ['class'=> 'btn btn-danger']) }}
          {!!Form::close()!!}</div>
      @endif
  @endif
  </section>


  <!-- Start posts-entry -->
  <section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
      <div class="row mb-4">
        <div class="col-12 text-uppercase text-black">More Blog Posts</div>
      </div>
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
  </section>
  <!-- End posts-entry -->

  @endsection