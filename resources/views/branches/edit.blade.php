@extends ("layouts.app")

@section('content')
<div class="container">

  <h1>Edit Branch</h1>

  <form action="{{ url('branches/'.$branch->id) }}" method="POST" enctype="multipart/form-data">
     {{csrf_field()}}
     @method("PATCH")
         <div class="form-group">
            {{Form::label('branch_name', 'Branch Name')}}
            {{Form::text('branch_name',$branch->branch_name ,['class' => 'form-control' ])}}
         </div>

         <div class="form-group">
           {{ Form::label('campus', 'Description')}}
            {{Form::textarea('campus',$branch->campus ,['id'=> 'article-ckeditor', 'class' => 'form-control' ])}}
         </div> 
         {{Form::submit('Submit' , ['class' => 'btn btn-primary'])}}
  </form>
</div>
@endsection

