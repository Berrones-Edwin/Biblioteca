<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Isbn</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" required autocomplete="off" 
            placeholder="Isbn" id="isbn" name="isbn"  value="{{ old('isbn',$libro->isbn ?? '' )}}"  >
    </div>
</div>
<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Autor</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" required ="off" 
            placeholder="Autor" id="autor" name="autor"  value="{{ old('autor',$libro->autor ?? '' )}}"  >
    </div>
</div>
<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Cantidad</label>
    <div class="col-lg-8">
        <input type="number" class="form-control" required autocomplete="off" 
            placeholder="Cantidad" id="cantidad" name="cantidad"  value="{{ old('cantidad',$libro->cantidad ?? '' )}}"  >
    </div>
</div>
<div class="form-group">
    <label for=""  class="col-lg-3 control-label " >Editorial</label>
    <div class="col-lg-8">
        <input type="text" class="form-control"  autocomplete="off" 
            placeholder="Editorial" id="editorial" name="editorial"  value="{{ old('editorial',$libro->editorial ?? '' )}}"  >
    </div>
</div>

<div class="form-group">
    <label for="foto" class="col-lg-3 control-label">Foto</label>
    <div class="col-lg-5">
        <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($libro->imagen) ? Storage::url('imagenes/caratulas/$data->imagen') : ''}}" accept="image/*"/>
    </div>
</div>