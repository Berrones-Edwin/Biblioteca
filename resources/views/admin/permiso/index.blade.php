@extends("theme.$theme.layout")
@section('titulo')
    Permisos
@endsection

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/permiso/index.js") }}'></script>
@endsection


@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            <div class="box box-success">
                <div class="box-header with-border">    
                    <h3 class="box-title">Permisos</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('permiso-crear') }}" class="btn btn-primary" type="button" >
                            <i class="fa fa-plus"></i>
                            Nuevo Registro
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover"  id="tabla-data">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th class="width70" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($permisos))
                                @foreach($permisos as $permiso)
                                    <tr>
                                        <td>{{ $permiso->nombre }}</td>
                                        <td>{{ $permiso->slug }}</td>
                                        <td>
                                            <div class="box-tools pull-right">
                                                <a href="{{ route('permiso-editar',['id'=>$permiso->id]) }}" type="button" class="btn btn-box-tool tooltipsC"
                                                title="Editar este registro">
                                                    <i class="fa fa-fw fa-pencil text-primary"></i>
                                                </a>
                                                <form action="{{ route('permiso-eliminar',['id'=>$permiso->id]) }}"
                                                        class="form-eliminar d-inline">
                                                    @csrf @method('delete')

                                                    <button type="submit" 
                                                            class="btn btn-box-tool tooltipsC eliminar-permiso" 
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
