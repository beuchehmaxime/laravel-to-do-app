<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login !</h1>
                                    </div>
                                    <form class="user"  method="POST" action="{{ route('login') }}">
                                        @csrf
                                       
                                        <div class="form-group row">
                                            <label for="#">Email</label>
                                            <input type="email" name="email" :value="old('email')" class="form-control form-control-user @error('email')
                                                is-invalid
                                            @enderror" id="exampleInputEmail"
                                                placeholder="Email Address"> <br>
                                                @error('email')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="#">Password</label>
                                            <input type="password" name="password" class="form-control form-control-user @error('password')
                                                is-invalid
                                            @enderror"
                                                id="password" placeholder="Password" autocomplete="new-password"> <br>
                                                @error('password')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror                                         
                                        </div>
                                        
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                      
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('register')}}">Don't have an account? Register!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>