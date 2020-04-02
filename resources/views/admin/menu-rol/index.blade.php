@extends("theme.$theme.layout")

@section('titulo')
    Menu - Rol
@endsection


@section('scripts')
    <script src='{{ asset("pages/scripts/admin/menu-card/index.js") }}' ></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            <div class="card card-success">
                <div class="card-header with-border">
                    <h3 class="card-title">Menus - Rol</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <table class="table table-striped table-bordered table-hover" id="tabla-data">
                        <thead >
                            <tr>
                                <td>Menu</td>
                                @foreach($rols as $id => $nombre)
                                    <td class="text-center"> {{ $nombre }} </td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($menus as $key => $menu)
                            @if ($menu["menu_id"] != 0)
                                @break
                            @endif
                            <tr>
                                <td class="font-weight-bold"><i class="fa fa-arrows-alt"></i> {{$menu["nombre"]}}</td>
                                @foreach($rols as $id => $nombre)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="menu_rol"
                                        name="menu_rol[]"
                                        data-menuid={{$menu["id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($menusRols[$menu["id"]], "id"))? "checked" : ""}}>
                                    </td>
                                @endforeach
                            </tr>
                            @foreach($menu["submenu"] as $key => $hijo)
                                <tr>
                                    <td class="pl-20"><i class="fa fa-arrow-right"></i> {{ $hijo["nombre"] }}</td>
                                    @foreach($rols as $id => $nombre)
                                        <td class="text-center">
                                            <input
                                            type="checkbox"
                                            class="menu_rol"
                                            name="menu_rol[]"
                                            data-menuid={{$hijo[ "id"]}}
                                            value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo["id"]], "id"))? "checked" : ""}}>
                                        </td>
                                    @endforeach
                                </tr>
                                @foreach ($hijo["submenu"] as $key => $hijo2)
                                    <tr>
                                        <td class="pl-30"><i class="fa fa-arrow-right"></i> {{$hijo2["nombre"]}}</td>
                                        @foreach($cards as $id => $nombre)
                                            <td class="text-center">
                                                <input
                                                type="checkbox"
                                                class="menu_rol"
                                                name="menu_rol[]"
                                                data-menuid={{$hijo2[ "id"]}}
                                                value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo2["id"]], "id"))? "checked" : ""}}>
                                            </td>
                                        @endforeach
                                    </tr>
                                    @foreach ($hijo2["submenu"] as $key => $hijo3)
                                        <tr>
                                            <td class="pl-40"><i class="fa fa-arrow-right"></i> {{$hijo3["nombre"]}}</td>
                                            @foreach($cards as $id => $nombre)
                                            <td class="text-center">
                                                <input
                                                type="checkbox"
                                                class="menu_rol"
                                                name="menu_rol[]"
                                                data-menuid={{$hijo3[ "id"]}}
                                                value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo3["id"]], "id"))? "checked" : ""}}>
                                            </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection