<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Administrador de App Súper Álvarez">
        <meta name="author" content="Ing. Leonardo Maldonado Lopéz">
      
        <title>Login- Súper Álvarez</title>
      
        <!-- Custom fonts for this template-->
        <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      
        <!-- Custom styles for this template-->
        <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
      
      </head>
      <body style="background-color: #fff001;">
          
      
      {{-- <body class="bg-gradient-warning"> --}}
      
        <div class="container">
      
          <!-- Outer Row -->
          <div class="row justify-content-center">
      
            <div class="col-xl-10 col-lg-12 col-md-9">
      
              <div class="card o-hidden border-0 shadow-lg my-5 text-center"  >
                <div class="card-body p-0 " >
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                      {{-- bg-login-image --}}
                    <div class="col-lg-6 d-none d-lg-block " style="background-image:url('img/logo_fondo_amarillo.jpg');background-size: cover;">
                        
                    </div>
                    <div class="col-lg-6 ">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        </div>
                      
                            <form class="user form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <input id="email" type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                            <input id="password" type="password" class="form-control form-control-user" name="password"  placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                          <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                              <input type="checkbox" name="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }} id="customCheck">
                              
                              <label class="custom-control-label" for="customCheck">Recuerdame</label>

                            </div>
                          </div>
                         
                          <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>

                      
                          <hr>
                        {{--   <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                          </a>
                          <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                          </a> --}}
                        </form>
                        
                        <div class="text-center">
                          <a class="small" href="{{ route('password.request') }}">¿Se te olvidó tu contraseña?</a>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
            </div>
      
          </div>
      
        </div>
      
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
      
      </body>
      
      </html>
      




{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}