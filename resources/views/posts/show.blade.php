@extends('layouts.app')

@section('content')
<div class="container">
<a href="/posts"class="btn btn-default ">GO BACK</a>
    <h1>{{$post->title}}</h1>
    <img style="width :100%"src="/storage/images/{{$post->cover_image}}">
    <div>
        {{$post->body}}
    </div>
    <hr>

    <small>Written on {{$post->created_at}} by {{$post-> user ->name}}</small>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <hr>
            <div>
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['Action' => 'PostsController@destroy', 'method'=>'POST', 'class' => 'pull-right']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', ['class'=> 'btn btn-danger']) }}
            {!!Form::close()!!}</div>
        @endif
    @endif
    <hr>
<h3><u>Comments:</u></h3>
    @foreach ($post->comments as $comment)
        <p><b>{{ $comment->name }}</b></p>
        <p>{{ $comment->comment_body }}</p>
        <p class="text-muted">Commented by {{ $comment->name }} on {{ $comment->created_at->format('M d, Y') }}</p>
        <hr>
    @endforeach
    <form method="POST" action="/posts/{{ $post->id }}/comments">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <label>Name</label><input type="text" name="name"><br>
        <label>Email</label><input type="email" name="email"><br>
        <label>Comment</label><textarea name="comment_body"></textarea>
        <button type="submit">Add comment</button>
    </form>
</div>
@endsection
