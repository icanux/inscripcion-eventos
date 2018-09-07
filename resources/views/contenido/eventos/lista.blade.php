<div class="d-flex px-3">
        <div>
          <div class="icon icon-lg icon-shape bg-gradient-white shadow rounded-circle text-primary">
            <i class="ni ni-calendar-grid-58 text-primary"></i>
          </div>
        </div>
        <div class="pl-4">
          <h4 class="display-3">Eventos</h4>
          <p class="">Lista de eventos organizados por la comunidad Icanux.</p>
        </div>
</div>


<div class="row mt-4">
  @foreach($eventos as $evento)
    <div class="col-lg-4">
            <div class="card card-lift--hover shadow border-0">
                    <div class="card-header text-center">
                      <img src="images/eventos/{{$evento->imagen}}" alt="" class="img-fluid">
                    </div>
                    <div class="card-body py-3">
                      <h5 class="title text-primary font-weight-bold">{{$evento->nombre}}</h5>
                      <p class="description mt-3">{{substr($evento->descripcion,0,120).'...'}}</p>
                      <div>
                        <h6><i class="ni ni-calendar-grid-58 pr-2"></i>Fecha: <?php echo date("d/m/Y", strtotime($evento->fecha)); ?></h6>
                      </div>
                      <a href="/evento/{{$evento->id}}" class="btn btn-primary mt-4">Ver mas</a>
                    </div>
            </div>
    </div>
  @endforeach
</div>