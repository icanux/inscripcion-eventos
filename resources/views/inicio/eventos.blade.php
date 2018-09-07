<div class="row justify-content-center">
  <div class="col-lg-12">
      <div class="row row-grid">
        <div class="col-lg-4">
              
        </div>
        <div class="col-lg-4">
          @if(count($eventos)==1)
            @foreach($eventos as $evento)
              <div class="card card-lift--hover shadow border-0">
                  <div>
                    <h6 class="text-white bg-primary p-2 b-t-l-radius b-b-l-radius" style="position:absolute;top:15px;right:0;">Evento</h6>
                  </div>
                  <div class="card-header text-center">
                    <img src="images/eventos/{{$evento->imagen}}" alt="" class="img-fluid">
                  </div>
                  <div class="card-body py-3">
                    <h5 class="title text-primary font-weight-bold">{{$evento->nombre}}</h5>
                    <p class="description mt-3">{{substr($evento->descripcion,0,200).'...'}}</p>
                    <div>
                      <h6><i class="ni ni-calendar-grid-58 pr-2"></i>Fecha: {{$evento->fecha->format('d/m/Y')}}</h6>
                    </div>
                    <a href="/evento/{{$evento->id}}" class="btn btn-primary mt-4">Ver mas</a>
                  </div>
              </div>
            @endforeach
          @endif
        </div>
        <div class="col-lg-4">

        </div>
      </div>
  </div>
</div>