@extends('layouts.app')
@section('content')


<div class="container">
    <center><h2>The created posts</h2></center>
    <a href="/posts/create" class="btn btn-success">ADD NEW POST</a>
    <table class="table table-bordered">
      {{-- <table id="myTable" class="table table-striped" style="width:100%"> --}}
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">TITLE</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($posts)>0)
          @foreach($posts as $post)
          <tr>
              <td >{{ ++$i }}</td>
              <td>{{ $post->title }}</td>
                 {{-- //check for the correct users --}}
                  @if(auth()->user()->roles)
                  @foreach(auth()->user()->roles as $role)
                      @if (($role->name == 'Admin')||($role->name != 'Admin' && auth()->user()->id == $post->user_id)) 
                    <td >
                      <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                      <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                    </td>
                    @endif
                    @endforeach
                    @endif
                </tr>
              </tbody>
            @endforeach
        @else
        <h2>No posts available Here</h2>
        @endif
      </table>
      {{$posts->links()}}
</div>


@endsection

