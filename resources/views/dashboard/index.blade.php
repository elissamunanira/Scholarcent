@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-default">
                <div class="inner">
                  <h3>{{ $postsCount }}</h3>
  
                  <p>Posts</p>
                </div>
                <div class="icon">
                  <i class="fas fa-blog"></i>
                </div>
                <a href="/dashboardposts" class="small-box-footer bg-success">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-default">
                <div class="inner">
                  <h3>{{ $rolesCount }}</h3>
  
                  <p>Roles</p>
                </div>
                <div class="icon">
                  <i class="fab fa-critical-role"></i>
                </div>
                <a href="/roles" class="small-box-footer bg-success">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-default">
                <div class="inner">
                  <h3>{{ $usersCount }}</h3>
  
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="/users" class="small-box-footer bg-success">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-default">
                <div class="inner">
                  <h3>{{$branchesCount}}</h3>
  
                  <p>Categories</p>
                </div>
                <div class="icon">
                  <i class="fas fa-code-branch"></i>
                </div>
                <a href="/branches" class="small-box-footer bg-success">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- /.row -->
        <!-- Main content -->
        {{-- <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">

                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-chart-line mr-1"></i>
                        Posts
                        </h3>
                        <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                            <a class="btn btn-success"href="/posts" data-toggle="tab">Post Overview</a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    
                    <!-- /.card-header -->

                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="grid">
                                  <div class="grid-body">
                                    <div class="item-wrapper">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                  
                                      <canvas id="myChart" width="600" height="400"></canvas>
                                      
                                      <script>
                                      var postxValues =  JSON.parse('{!! @json_encode($postMonths)!!}');
                                      var postyValues =  JSON.parse('{!! @json_encode($postMonthCount)!!}');
                                      
                                      new Chart("myChart", {
                                          type: "bar",
                                          data: {
                                          labels: postxValues,
                                          datasets: [{
                                              label:"Post",
                                              backgroundColor: 'blue',
                                              data: postyValues,
                                              fill: true, 
                                          
                                          }]
                                          },
                                          options: {
                                          legend: {display: false},
                                          title: {
                                              display: true,
                                              text: "Post Overview"
                                          },
                                          scales:{
                                              yAxes: [
                                              {
                                                  ticks:{min:0}
                                              }
                                              ],
                                          }
                                          }
                                      });
                                      </script>


                                    </div>
                                  </div>
                                </div>
                              </div>

                              
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div> --}}
    <!-- /.content -->


    {{-- <a href="/posts/create" class="btn btn-success">ADD NEW POST</a> --}}

    

    <center><h2>Recent posts</h2></center>


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
          @if(count($postOwner)>0)
          @foreach($postOwner as $post)
          <tr>
              <td >{{ ++$i }}</td>
              <td>{{ $post->title }}</td>
              @if(auth()->user()->roles)
                  @foreach(auth()->user()->roles as $role)
                      @if (($role->name == 'Admin')||($role->name != 'Admin' && auth()->user()->id == $post->user_id)) 
                    <td >
                      <a class="btn btn-info" href="{{ route('posts.show',$post->title) }}">Show</a>
                      <a class="btn btn-primary" href="{{ route('posts.edit',$post->title) }}">Edit</a>
                          {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->title],'style'=>'display:inline']) !!}
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
      {{$postOwner->links()}}

<a href='https://acadooghostwriter.com/'>Ghostwriter Acadoo</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=2501ab976c485734fd0f43599f9717d36397860b'></script>
<script type="text/javascript" src="https://freevisitorcounters.com/en/home/counter/1052326/t/1"></script>



@endsection