@section('titulo')
    Crear Libro
@endsection

@extends("theme.$theme.layout")

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/libro/crear.js") }}' ></script>
  
@endsection


@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            @include('includes.form-error')
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Crear Prestamo</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('libroPrestamo.index') }}" type="button" class="btn btn-primary"><i class="fa   fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
                <form action="{{ route('libro-guardar') }}" method="POST" id="form-general" class="form-horizontal" enctype= multipart/form-data>
                    @csrf
                    <div class="box-body">
                        @include('guest.libro.form')
                    </div>
                    <div class="box-footer">
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