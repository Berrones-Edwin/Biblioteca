<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Usuario</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" required autocomplete="off" 
            placeholder="Usuario" id="usuario" name="usuario" value="{{ old('usuario',$usuario->usuario ?? '' )}}"  >
    </div>
</div>

<div class="form-group">
    <label for=""  class="col-lg-3 control-label {{ !isset($usuario) ? 'requerido' : '' }}" >Contraseña</label>
    <div class="col-lg-8">
        <input type="password" class="form-control" {{ !isset($usuario) ? 'required' : '' }} autocomplete="off" 
            placeholder="Contraseña" id="password" name="password" value="{{ old('password' )}}"  >
    </div>
</div>

<div class="form-group">
    <label for=""  class="col-lg-3 control-label {{ !isset($usuario) ? 'requerido' : '' }}">Repita Contraseña</label>
    <div class="col-lg-8">
        <input type="password" class="form-control" {{ !isset($usuario) ? 'required' : '' }} autocomplete="off" 
            placeholder="Repita su Contraseña" id="re_password" name="re_password"   >
    </div>
</div>

<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Nombre</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" required autocomplete="off" 
            placeholder="Nombre" id="nombre" name="nombre" value="{{ old('nombre',$usuario->nombre ?? '' )}}"  >
    </div>
</div>
<div class="form-group">
    <label for=""  class="col-lg-3 control-label requerido" >Correo Electronico</label>
    <div class="col-lg-8">
        <input type="text" class="form-control" required autocomplete="off" 
            placeholder="Correo" id="email" name="email" value="{{ old('email',$usuario->email ?? '' )}}"  >
    </div>
</div>
<div class="form-group">
    <label for="rol_id"  class="col-lg-3 control-label requerido" >Rol</label>
    <div class="col-lg-8">
        <select class="form-control" name="rol_id[]" id="rol_id" required multiple>
            <option disabled value="">Seleccione un rol</option>
            @foreach($roles as $key => $value)
                <option 
                    value="{{ $key }}" 
                    {{is_array(old('rol_id')) ? (in_array($key, old('rol_id')) ? 'selected' : '')  : (isset($usuario) ? ($usuario->roles->firstWhere('id', $key) ? 'selected' : '') : '')}} > 
                    {{ $value }} 
                </option>
            @endforeach
        </select>
    </div>
</div>
