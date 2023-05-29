@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Branch</h1>
    <form action= "{{url('branches')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            {{Form::label('branch_name', 'branch_name')}}
            {{Form::text('branch_name','' ,['class' => 'form-control', 'placeholder' => 'category'])}}
         </div>
         <div class="form-group">
           {{ Form::label('campus', 'Description')}}
            {{Form::textarea('campus','',['class' => 'form-control', 'placeholder' => 'Description'])}}
         </div>
        <input type="submit" value="Submit" class="btn btn-success"></br>
    </form>
</div>
@endsection
