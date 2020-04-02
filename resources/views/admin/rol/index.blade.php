@extends("theme.$theme.layout")

@section('titulo')
    Rol
@endsection

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/rol/index.js") }}' ></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @include('includes.form-mensajes')
            <div class="card card-success">
                <div class="card-header with-border">
                    <h3 class="card-title mr-4">Rol</h3>
                    <div class="card-tools pull-right">
                        <a href="{{ route('rol-crear') }}" type="button" class="btn btn-primary"><i class="fa   fa-plus"></i>Nuevo Registro</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="tabla-data">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th class="width70"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($roles))
                                @foreach($roles as $rol)
                                    <tr>
                                        <td> {{ $rol->nombre }}</td>
                                        <td>
                                            <div class="card-tools pull-right">
                                                <a  href="{{ route('rol-editar',['id'=>$rol->id]) }}" 
                                                    type="button" 
                                                    class="btn btn-card-tool tooltipsC btn-accion-tabla" 
                                                    title="Editar este registro" 
                                                >
                                                    <i class="fa fa-fw fa-pencil text-primary"></i>
                                                </a>
                                                
                                                <form action=" {{ route('rol-eliminar',['id'=>$rol->id]) }} "
                                                        class="form-eliminar d-inline">
                                                    @csrf @method('delete')

                                                    <button type="submit" 
                                                            class="btn btn-card-tool tooltipsC btn-accion-tabla" 
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