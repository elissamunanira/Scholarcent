@extends('layouts.app')

@section('content')
<div class="container">
<a href="/branches"class="btn btn-default ">GO BACK</a>

    <h1>Branch Details</h1>
    <h2>Name: {{$branch->branch_name}}</h2><br>
    <h3>Description: {{$branch->campus}}</h3>
    <hr>
        <div>
        <a href="/branches/{{$branch->id}}/edit" class="btn btn-default">Edit</a>

        {!!Form::open(['Action' => 'BranchController@destroy', 'method'=>'POST', 'class' => 'pull-right']) !!}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Delete', ['class'=> 'btn btn-danger']) }}
        {!!Form::close()!!}</div>
 
</div>
@endsection
