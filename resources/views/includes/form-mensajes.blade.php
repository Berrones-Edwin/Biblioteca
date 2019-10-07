@if(session('mensaje'))
    <div class="alert alert-success alert-dismissible" data-auto-dismiss="1500">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> ¡Datos correctos!</h4>
        {{ session('mensaje') }}
    </div>
@elseif(session('mensaje-error'))
    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="1500">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> ¡Error en la petición!</h4>
        {{ session('mensaje-error') }}
    </div>
@endif