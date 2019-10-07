@extends("theme.$theme.layout")
@section('titulo')
    Usuarios
@endsection

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/usuario/index.js") }}' ></script>
@endsection

@section('contenido')

   {{ Auth::user() }}
   {{ Auth::id() }}
   {{ Auth::check() }}
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            <div class="box box-success">
                <div class="box-header with-border">    
                    <h3 class="box-title">Usuarios</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('usuario-crear') }}" class="btn btn-primary" type="button" >
                            <i class="fa fa-plus"></i>
                            Nuevo Registro
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover"  id="tabla-data">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Roles</th>
                                <th class="width70" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($usuarios))
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->usuario }}</td>
                                        <td>{{ $usuario->nombre }}</td>
                                        <td>{{ $usuario->correo }}</td>
                                        <td>
                                            @foreach($usuario->roles as $rol)
                                                {{ $loop->last ? $rol->nombre  : $rol->nombre . ' , '}}
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="box-tools pull-right">
                                                <a href="{{ route('usuario-editar',['id'=>$usuario->id]) }}" type="button" class="btn btn-box-tool tooltipsC"
                                                title="Editar este registro">
                                                    <i class="fa fa-fw fa-pencil text-primary"></i>
                                                </a>
                                                <form action="{{ route('usuario-eliminar',['id'=>$usuario->id]) }}"
                                                        class="form-eliminar d-inline">
                                                    @csrf @method('delete')

                                                    <button type="submit" 
                                                            class="btn btn-box-tool tooltipsC eliminar-usuario" 
                                                            title="Eliminar este registro"
                                                    >
                                                        <i class="fa fa-trash text-danger"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
