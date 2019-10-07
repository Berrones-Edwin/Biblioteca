@section('titulo')
    Editar Menu
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
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Menu</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('menu') }}" type="button" class="btn btn-primary"><i class="fa   fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
                <form action="{{ route('menu-actualizar',['id'=>$menu->id]) }}" method="POST" id="form-general" class="form-horizontal">
                    @csrf @method('put')
                    <div class="box-body">
                        @include('admin.menu.form')
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