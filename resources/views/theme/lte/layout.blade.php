<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('titulo','Biblioteca')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href='{{asset("assets/$theme/plugins/fontawesome/css/all.min.css")}}'>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href='{{asset("assets/$theme/dist/css/adminlte.min.css")}}'>
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Para agregar estilos especificos de una pagina -->
  @yield('styles')

  <link rel="stylesheet" href='{{asset("css/custom.css")}}'>

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
  
      <!-- Inicio Header -->
      @include("theme.lte.header")
      <!-- Fin Header -->

      <!-- Inicio Aside -->
      @include("theme.lte.aside")
      <!-- Fin Aside -->
      
      <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

            </section>
            <section class="content">
                <div class="container-fluid">
                    @yield('contenido')
                </div>
            </section>
        </div>

      <!-- Inicio Footer -->
      @include("theme.lte.footer")
      <!-- Fin Footer -->

      <!-- Inicio -  modal para elegir el rol -->
      @if(session()->get('roles') && count(session()->get('roles'))>1)
        @csrf
        <div class="modal fade" id="modal-seleccionar-rol" data-rol-set="{{empty(session()->get("rol_id")) ? 'NO' : 'SI'}}" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Roles de Usuario</h4>
                        </div>
                        <div class="modal-body">
                            <p>Cuentas con mas de un Rol en la plataforma, a continuación seleccione con cual de ellos desea trabajar</p>
                            @foreach(session()->get("roles") as $key => $rol)
                                <li>
                                    <a href="#" class="asignar-rol" data-rolid="{{$rol['id']}}" data-rolnombre="{{$rol["nombre"]}}">
                                        {{$rol["nombre"]}}
                                    </a>
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
      @endif
      <!-- Fin -  modal para elegir el rol -->

  </div>
  <!-- jQuery 3 -->
  <script src='{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}'></script>
    <!-- Bootstrap -->
    <script src='{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}'></script>
      <!-- AdminLTE App -->
      <script src='{{asset("assets/$theme/dist/js/adminlte.min.js")}}'></script>

    
    <script src='{{asset("assets/$theme/dist/js/adminlte.min.js")}}'></script>
    
    <!-- SlimScroll -->
    <!-- <script src='{{asset("assets/$theme/plugins/jquery-slimscroll/jquery.slimscroll.min.js")}}'></script> -->
    <!-- FastClick -->
    <script src='{{asset("assets/$theme/plugins/fastclick/fastclick.js")}}'></script>


    <!-- SCRIPTS PLUGINS -->
    @yield('scriptsPlugins')

    <!-- Jquery Validation -->
    <script src='{{asset("js/jquery-validation/jquery.validate.min.js")}}'></script>
    <script src='{{asset("js/jquery-validation/localization/messages_es.min.js")}}'></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src='{{asset("js/scripts.js")}}'></script>
    <script src='{{asset("js/funciones.js")}}'></script>
    <!-- Para agregar scripts especificos de una pagina -->
    @yield('scripts')
</body>
</html>
