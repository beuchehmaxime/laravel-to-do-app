@extends('include.layout')
@section('name')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
        
        @include('include.message')
        <!-- Content Row -->
        <div class="row">
            
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    My Tasks</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$taskcount}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    My Completed Tasks</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$completedtask}} </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">My Pending Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{$pendingtask}} </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    My Expired Tasks</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$expiredtask}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
                <!-- Project Card Example -->
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All My Task</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Task Title</th>
                                        <th>Task Description</th>
                                        <th>Task Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>#</th>
                                        <th>Task Title</th>
                                        <th>Task Description</th>
                                        <th>Task Status</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($tasks as $key => $task)
                                    <tr class="@if ($task->iscompleted)
                                        bg-gray-500
                                    @endif">
                                        <td>
                                            <form action="#" method="post">
                                                <input type="checkbox" @if ($task->iscompleted)
                                                    checked
                                                @endif disabled>
                                            </form>
                                        </td>                                        
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$task->tasktitle}}</td>
                                        <td>{{ Illuminate\Support\Str::limit($task->taskdescription, 50, '...') }}</td>                                        
                                        <td>
                                            @if ($task->endtime < now())
                                            <span class="btn btn-danger">Expired</span>
                                            @else
                                                @if (!$task->iscompleted)
                                                    <span class="btn btn-warning">Not Completed</span> 
                                                @else
                                                    <span class="btn btn-success">Completed</span>
                                                @endif</td>
                                            @endif

                                            
                                        <td>{{ $task->starttime }}</td>
                                        <td>{{ $task->endtime }}</td>
                                        <td>
                                            <a href="{{route('user.edit',$task->id)}}" class="btn btn-info mb-2">Edit</a> <br>
                                            <form action="{{route('user.destroy',$task->id)}}" method="post" style="display: inline-block" class="mb-2">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection