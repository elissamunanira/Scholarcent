@extends('layouts.app')
@section('content')


<div class="container">
    <center><h2>The created Categories</h2></center>
    <a href="/branches/create" class="btn btn-success">ADD NEW BRANCH</a>
    <table class="table table-bordered">
      {{-- <table id="myTable" class="table table-striped" style="width:100%"> --}}
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @if(count($branches)>0)
          @foreach($branches as $branch)
          <tr>
              <td >{{ ++$i }}</td>
              <td>{{ $branch->branch_name }}</td>
              <td>{{ $branch->campus }}</td>
                 {{-- //check for the correct users --}}
                  @if(auth()->user()->roles)
                  @foreach(auth()->user()->roles as $role)
                      @if (($role->name == 'Admin')||($role->name != 'Admin' && auth()->user()->id == $branch->user_id)) 
                    <td >
                      <a class="btn btn-info" href="{{ route('branches.show',$branch->id) }}">Show</a>
                      <a class="btn btn-primary" href="{{ route('branches.edit',$branch->id) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['branches.destroy', $branch->id],'style'=>'display:inline']) !!}
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
        <h2>No branches available Here</h2>
        @endif
      </table>
      {{-- {!! $branches->render() !!} --}}
</div>


@endsection

