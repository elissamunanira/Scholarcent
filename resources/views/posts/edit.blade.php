@extends ("layouts.app")

@section('content')
<div class="container">

  <h1>Edit Post</h1>

  <form action="{{ url('posts/'.$post->id) }}" method="post" enctype="multipart/form-data">
     {{csrf_field()}}
     @method("PATCH")
         <div class="form-group col-md-6">
            <label for="title">Category:</label>
                <select name="branch_name" class="form-control">
                    <option selected>{{$post->branch_name}}</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch_name }} </option>
                    @endforeach
                </select>
            </label>
        </div>
         <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title',$post->title ,['class' => 'form-control', 'placeholder' => 'Title'])}}
         </div>

         <div class="form-group">
           {{ Form::label('body', 'Body')}}
            {{Form::textarea('body',$post->body ,['id'=> 'editor', 'class' => 'ckeditor form-control', 'placeholder' => 'Body'])}}
         </div>
         <div class="form-group">
            <label for="cover_image">Featured Image</label>
            {{Form::file('cover_image')}}
         </div>
         {{Form::submit('Submit' , ['class' => 'btn btn-success'])}}
  </form>
</div>

@endsection

