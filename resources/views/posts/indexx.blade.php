@extends('layouts.apps')

@section('content')
<div class="container">
    <h1>Posts</h1>
    @if (count($posts)>0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width :100%"src="/storage/images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href = "/posts/{{$post->id}}">{{ $post->title }}</a></h3>
                        <p>{{ $post->body }}</p>
                        <small>Written on {{$post->created_at}} by {{$post-> user ->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        <hr>
        {{-- {{$posts->links()}} --}}
    @else
        <h3>No Posts available</h3>
    @endif
</div>
@endsection
