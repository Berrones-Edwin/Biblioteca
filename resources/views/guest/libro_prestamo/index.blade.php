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
            <div class="card card-success">
                <div class="card-header with-border">    
                    <h3 class="card-title">Libros Prestados</h3>
                    <div class="card-tools pull-right">
                        <a href="{{ route('libroPrestamo-crear') }}" class="btn btn-primary" type="button" >
                            <i class="fa fa-plus"></i>
                            Nuevo Registro
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover"  id="tabla-data">
                        <thead>
                            <tr>
                                <th class="text-center">Imagen</th>
                                <th>Titulo</th>
                                <th>Prestado por</th>
                                <th>Prestado a</th>
                                <th class="width70" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($libros))
                                @foreach($libros as $libro)
                                    <tr>
                                        <td class="text-center"> 
                                            <img width="80" src="{{ Request::root() }}{{ Storage::url('imagenes/caratulas/' . $libro->libro->foto)   }}" alt="">
                                        </td>
                                        <td>{{ $libro->libro->titulo }}</td>
                                        <td>{{ $libro->usuario->nombre }}</td>
                                        <td>{{ $libro->prestado_a }}</td>
                                        <td>
                                            <div class="card-tools pull-right">
                                                <a href="" type="button" class="btn btn-card-tool tooltipsC"
                                                title="Editar este registro">
                                                    <i class="fa fa-fw fa-pencil text-primary"></i>
                                                </a>
                                                <form action=""
                                                        class="form-eliminar d-inline">
                                                    @csrf @method('delete')

                                                    <button type="submit" 
                                                            class="btn btn-card-tool tooltipsC eliminar-libro" 
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
