@extends("theme.$theme.layout")

@section('titulo')
    Menu
@endsection

@section('styles')
    <link rel="stylesheet" href='{{ asset("js/nestable/jquery.nestable.css") }}'>
@endsection

@section('scriptsPlugins')
    <script src='{{  asset("js/nestable/jquery.nestable.js") }}' ></script>
@endsection

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/menu/index.js") }}' ></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Menu</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('menu-crear') }}" type="button" class="btn btn-primary"><i class="fa   fa-plus"></i>Nuevo Registro</a>
                    </div>
                </div>
                <div class="box-body">
                    @csrf
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($menus as $key => $item)
                                @if ($item["menu_id"] != 0)
                                    @break
                                @endif
                                @include("admin.menu.menu-item",["item" => $item])
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection