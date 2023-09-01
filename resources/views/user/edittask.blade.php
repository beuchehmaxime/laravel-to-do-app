@extends('include.layout')
@section('name')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-clipboard text-primary"></i> Update Task </h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-2"></div>
            
            <!-- Content Column -->
            <div class="col-lg-8 mb-4">
                <!-- Project Card Example -->
                  <!-- DataTales Example -->
                  
            @include('include.message')
                  <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-clipboard text-primary"></i> Update Task</h6>
                    </div>
                    <div class="card-body">
                           <!-- General Form Elements -->
                        <form method="POST" action="{{route('user.update', $task->id )}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="inputText" class="col-form-label">Task Title</label>
                                    <div>
                                        <input type="text" value="{{$task->tasktitle}}" name="task_title" class="form-control @error('task_title') is-invalid @enderror" id="task_title"> 
                                    </div>
                                    @error('task_title')
                                    <div class="text-danger">{{$message}}</div>                      
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="inputText" class="col-form-label">Task Description</label>
                                    <div>
                                        <textarea name="task_description" id="task_description" class="form-control @error('task_description') is-invalid @enderror" cols="30" rows="10">{{$task->taskdescription}}</textarea>
                                         
                                    </div>
                                    @error('task_description')
                                    <div class="text-danger">{{$message}}</div>                      
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="inputText" class="col-form-label">Start Date</label>
                                    <div>
                                        <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" id="start_date"  value="{{$task->starttime}}"> 
                                    </div>
                                    @error('start_date')
                                    <div class="text-danger">{{$message}}</div>                      
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-12">
                                    <label for="inputText" class="col-form-label">End Date</label>
                                    <div>
                                        <input type="date" name="end_date" class="form-control @error('end_date') is-invalid @enderror" id="end_date"  value="{{$task->endtime}}"> 
                                    </div>
                                    @error('end_date')
                                    <div class="text-danger">{{$message}}</div>                      
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Update Task</button>
                            </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection