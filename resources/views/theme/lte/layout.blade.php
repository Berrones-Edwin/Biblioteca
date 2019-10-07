<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('titulo','Biblioteca')</title>
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
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
  
      <!-- Inicio Header -->
      @include("theme/$theme/header")
      <!-- Fin Header -->

      <!-- Inicio Aside -->
      @include("theme/$theme/aside")
      <!-- Fin Aside -->
      
      <div class="content-wrapper">
        <section class="content">
           @yield('contenido')
        </section>
      </div>

      <!-- Inicio Footer -->
      @include("theme/$theme/footer")
      <!-- Fin Footer -->

      <!-- Inicio -  modal para elegir el rol -->
      @if(session()->get('roles') && count(session()->get('roles'))>1)
        @csrf
        <div class="modal fade" id="modal-seleccionar-rol" data-rol-set="{{ empty(session()->get('rol_id')) ? 'NO' : 'SI' }}" tabindex="-1" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Roles de Usuario</h4>
              </div>
             
              <div class="modal-body">
                <p>Cuentas con más de un <b>Rol</b> en la plataforma, a continuación selecccione con caul de ellos desear trabajar.</p>
                @foreach(session()->get('roles') as $key => $rol)
                  <li>
                    <a href="#" class="asignar-rol" data-rolid="{{ $rol['id'] }}" data-rolnombre="{{ $rol['nombre'] }}">
                      {{ $rol['nombre'] }}
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
    <script src='{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}'></script>
    <!-- Bootstrap 3.3.7 -->
    <script src='{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}'></script>
    
    <!-- SlimScroll -->
    <script src='{{asset("assets/$theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}'></script>
    <!-- FastClick -->
    <script src='{{asset("assets/$theme/bower_components/fastclick/lib/fastclick.js")}}'></script>
    <!-- AdminLTE App -->
    <script src='{{asset("assets/$theme/dist/js/adminlte.min.js")}}'></script>

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
