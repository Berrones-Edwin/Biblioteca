@extends("theme.$theme.layout")
@section('titulo')
    Libros
@endsection

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/libro/index.js") }}'></script>
@endsection


@section('contenido')

    <div class="row">
        <div class="col-lg-12">
            @csrf()
            @include('includes.form-mensajes')
            <div class="box box-success">
                <div class="box-header with-border">    
                    <h3 class="box-title">Libros</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ route('libro-crear')  }}" class="btn btn-primary" type="button" >
                            <i class="fa fa-plus"></i>
                            Nuevo Registro
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered table-hover"  id="tabla-data">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Cantidad</th>
                                <th class="width70" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($libros))
                                @foreach($libros as $libro)
                                    <tr>
                                        <td> <a href="{{ route('libro-detalles',$libro) }}" class="mostrar-detalles"> {{ $libro->titulo }} </a></td>
                                        <td>{{ $libro->cantidad }}</td>
                                        <td>
                                            <div class="box-tools pull-right">
                                                <a href="{{ route('libro-editar',$libro) }}" type="button" class="btn btn-box-tool tooltipsC"
                                                title="Editar este registro">
                                                    <i class="fa fa-fw fa-pencil text-primary"></i>
                                                </a>
                                                <form action="{{ route('libro-eliminar',['id'=>$libro->id]) }}"
                                                        class="form-eliminar d-inline">
                                                    @csrf @method('delete')

                                                    <button type="submit" 
                                                            class="btn btn-box-tool tooltipsC eliminar-libro" 
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
    
    <div class="modal fade" id="modal-ver-libro" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Libro</h4>
                </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
    
@endsection
