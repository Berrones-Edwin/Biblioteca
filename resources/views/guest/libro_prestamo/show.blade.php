
<div class="card" style="width: 18rem;">
  <!-- <img src="{{ $libro->foto }}" width="150" alt="{{ $libro->titulo }}" class="card-img-top"> -->
  <img src="{{'http://localhost:8080/Laravel/tutoVirtual/biblioteca/public/' .  Storage::url('imagenes/caratulas/' . $libro->foto)  }}" width="150" alt="{{ $libro->titulo }}" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{ $libro->titulo }}</h5>
    <p class="card-text">
        <b>Autor</b>{{ $libro->autor }} <br>
        <b>Editorial</b>{{ $libro->editorial }}
    </p>
  </div>
</div