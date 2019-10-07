<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" required autocomplete="off" 
            placeholder="Nombre" id="nombre" name="nombre" value="{{ old('nombre',$permiso->nombre ?? '' )}}"  >
    </div>
</div>

<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido">Slug</label>
    <div class="col-lg-8">

        <input type="text" class="form-control" required autocomplete="off" 
                placeholder="Slug" id="slug" name="slug" value="{{ old('slug',$permiso->slug ?? '' )}}"  >
    </div>
</div>