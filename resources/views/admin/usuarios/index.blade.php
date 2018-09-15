<section class="section section-components pb-0 pt-5" id="section-components">
    
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12">
              <!-- Basic elements -->
              <h2 class="mb-3">
                <span>Usuarios</span>
              </h2>
              <!-- Buttons -->
              <h3 class="h4 text-primary font-weight-bold mb-4">Informacion de usuarios registrados</h3>


              <div class="informacion">
                    <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-bullet-list-67 mr-2"></i></i>Datos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-ruler-pencil mr-2"></i>Crear</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        @include('admin.usuarios.table')
                                    </div>
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        @include('admin.usuarios.add')
                                    </div>
                                </div>
                            </div>
                        </div>
              </div>

            </div>
          </div>
        </div>
</section>