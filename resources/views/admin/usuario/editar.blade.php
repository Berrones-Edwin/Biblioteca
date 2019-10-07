@section('titulo')
    Editar Usuario
@endsection

@extends("theme.$theme.layout")


@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            @include('includes.form-error')
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Usuario</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('usuario') }}" type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
                <form action="{{ route('usuario-actualizar',['id'=>$usuario->id]) }}" method="POST" id="form-general" class="form-horizontal">
                    @csrf @method('put')
                    <div class="box-body">
                        @include('admin.usuario.form')
                    </div>
                    <div class="box-footer">
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