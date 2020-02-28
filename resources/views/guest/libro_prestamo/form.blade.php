 <div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Titulo</label>
    <div class="col-lg-8">
        <select class="form-control" name="libro_id" id="libro_id">
            
            @foreach($libros as $key => $libro )
                    <option value="{{ $key}}">
                        {{ $libro }}
                    </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Prestado a:</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" required autocomplete="off" 
            placeholder="prestado a" id="prestado_a" name="prestado_a"  value="{{ old('prestado_a',$libro->prestado_a ?? '' )}}"  >
    </div>
</div>
<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Fecha Prestamo</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" required autocomplete="off" 
            placeholder="YYYY/MM/DD" id="fecha_prestamo" name="fecha_prestamo"  value="{{ old('fecha_prestamo',$libro->fecha_prestamo ?? '' )}}"  >
    </div>
</div>