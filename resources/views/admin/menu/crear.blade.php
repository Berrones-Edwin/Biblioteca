@section('titulo')
    Crear Menu
@endsection

@extends("theme.$theme.layout")

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/menu/crear.js") }}' ></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            @include('includes.form-error')
            <div class="card card-danger">
                <div class="card-header with-border">
                    <h3 class="card-title">Crear Menu</h3>
                    <div class="card-tools pull-right">
                        <a href="{{ route('menu') }}" type="button" class="btn btn-primary"><i class="fa   fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
                <form action="{{ route('menu-guardar') }}" method="POST" id="form-general" class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        @include('admin.menu.form')
                    </div>
                    <div class="card-footer">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            @include('includes.boton-form-crear')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection