

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reset Password">
    <meta name="author" content="Ing. Leonardo Maldonado López">
  
    <title>Súper Álvarez - Reset Password</title>
  
    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  
  </head>
  
  <body class="bg-gradient-warning">
  
    <div class="container">
  
      <!-- Outer Row -->
      <div class="row justify-content-center">
  
        <div class="col-xl-10 col-lg-12 col-md-9">
  
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

         

              <!-- Nested Row within Card Body -->
              <div class="row">
               {{--  <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>  imagen lateral--}}
                <div class="col-lg-6">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
                      <p class="mb-4">Lo entendemos, pasan cosas. Simplemente ingrese su dirección de correo electrónico a continuación y le enviaremos un enlace para restablecer su contraseña.</p>
                    </div>
                    
                        <form class="form-horizontal user" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        
                        <input id="email" type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" placeholder="Escribe Email ..." required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif 
                    </div>
                      
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Enviar Password Reset Link
                    </button>
                    </form>
                    <hr>
                   
                    <div class="text-center">
                    <a class="small" href="{{route('login')}}">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
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
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
  
  </body>
  
  </html>
  





{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
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