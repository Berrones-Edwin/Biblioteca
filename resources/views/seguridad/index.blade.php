<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Biblioteca</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href='{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}'>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='{{asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css")}}'>
  <!-- Theme style -->
  <link rel="stylesheet" href='{{asset("assets/$theme/dist/css/AdminLTE.min.css")}}'>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href='{{asset("assets/$theme/dist/css/skins/_all-skins.min.css")}}'>

  <!-- toast -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <link rel="stylesheet" href='{{asset("css/custom.css")}}'>
  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="../../index2.html"><b>Admin</b>LTE</a> -->
    <h2>Inicio de Sesion</h2>
  </div>
  @include('includes.form-error')
  @include('includes.form-mensajes')
  @if(session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
  @endif
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicio de sesion</p>
    <form action="{{ route('login-post') }}" method="post" autocomplete="false">
        @csrf
      <div class="form-group has-feedback">
        <input type="text" name="usuario" class="form-control" value="{{ old('usuario') }}" placeholder="Usuario" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
      
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Accesar</button>
        </div>
        <!-- /.col -->

        <div class="col-xs-4">
          <!-- <a href="{{ route('register') }}">Registro</a> -->
          @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="btn btn-link mx-auto">
              {{ __('Forgot Your Password?') }}
            </a>
          @endif
        </div>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

 <!-- jQuery 3 -->
 <script src='{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}'></script>
<!-- Bootstrap 3.3.7 -->
<script src='{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}'></script>
</body>
</html>
