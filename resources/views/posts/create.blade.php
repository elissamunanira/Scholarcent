@extends('layouts.app')

@section('content')
<div class="container"><script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <h1>Create Post</h1>
    <form action= "{{url('posts')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group col-md-6">
            <label for="title">Branch:</label>
                <select name="branch_name" class="form-control">
                    <option value="">-- Select category --</option>
                    @foreach ($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch_name }} </option>">
                    @endforeach
                </select>
            </label>
        </div>
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title','' ,['class' => 'form-control', 'placeholder' => 'Title'])}}
         </div>
         <div class="form-group">
           {{ Form::label('body', 'Body')}}
            {{Form::textarea('body','',['id'=> 'description', 'class' => 'form-control', 'placeholder' => 'Body'])}}
         </div>
         <div class="form-group">
            {{Form::file('cover_image')}}
         </div>
        <input type="submit" value="Upload" class="btn btn-success"></br>
    </form>
</div><script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection
