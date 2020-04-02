@section('titulo')
    Editar Rol
@endsection

@extends("theme.$theme.layout")

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/rol/index.js") }}' ></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            @include('includes.form-error')
            <div class="card card-danger">
                <div class="card-header with-border">
                    <h3 class="card-title">Editar Rol</h3>
                    <div class="card-tools pull-right">
                        <a href="{{ route('rol') }}" type="button" class="btn btn-primary"><i class="fa   fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
                <form action="{{ route('rol-actualizar',['id'=>$rol->id]) }}" method="POST" id="form-general" class="form-horizontal">
                    @csrf @method('put')
                    <div class="card-body">
                        @include('admin.rol.form')
                    </div>
                    <div class="card-footer">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            @include('includes.boton-form-editar')
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection