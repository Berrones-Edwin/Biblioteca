@extends("theme.$theme.layout")
@section('titulo')
    Libros
@endsection

@section('scripts')
    <script src='{{ asset("pages/scripts/admin/libro-prestamo/index.js") }}'></script>
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
                                        <td class="fecha-devolucion">{{$libro->fecha_devolucion ?? 'Prestado'}}</td>
                                        <td>
                                            @if(!$libro->fecha_devolucion)
                                                <a href="{{route('prestamo.devolver', $libro->libro->id)}}" class="libro-devolucion btn-accion-tabla tooltipsC" title="Devolver este libro">
                                                    <i class="fa fa-fw fa-reply-all"></i>
                                                </a>
                                            @endif
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
