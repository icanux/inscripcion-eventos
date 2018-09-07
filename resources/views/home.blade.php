@extends('layouts.app')

@section('content')
<main>
        <div class="position-relative">
          <!-- shape Hero -->
          <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-vino">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <div class="container py-lg-md d-flex">
              <div class="col px-0">
                <div class="row">
                  <div class="col-lg-6">
                    <h1 class="display-3  text-white">Icanux
                      <span>Comunidad de software lbre</span>
                    </h1>
                    <p class="lead  text-white">La Comunidad de Software Libre Icanux es una comunidad formada inicialmente por estudiantes de Facultad de Sistemas de la Universidad Nacional "San Luis Gonzaga" de Ica, pero abierta a toda la comunidad iqueña interesada en proyectos FOSS.
                    </p>
                    <div class="btn-wrapper">
                      <a href="https://demos.creative-tim.com/argon-design-system/docs/components/alerts.html" class="btn btn-primary btn-icon mb-3 mb-sm-0">
                        <span class="btn-inner--icon"><i class="fa fa-code"></i></span>
                        <span class="btn-inner--text">Ver Eventos</span>
                      </a>
                      <a href="https://www.creative-tim.com/product/argon-design-system" class="btn btn-white btn-icon mb-3 mb-sm-0">
                        <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                        <span class="btn-inner--text">Registrarme</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
              <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
              </svg>
            </div>
          </section>
          <!-- 1st Hero Variation -->
        </div>
        <section class="section section-lg pt-lg-0 mt--200">
          <div class="container">
            @include('inicio.eventos')
          </div>
        </section>
        <section class="section section-lg">
          <div class="container">
            <div class="row justify-content-center text-center mb-lg">
              <div class="col-lg-8">
                <h2 class="display-3">Team Icanux</h2>
                <p class="lead text-muted">Los miembros mas resaltantes de la comunidad icanux, estudiantes y profesionales que aportan todos sus conocimientos a nuesta comunidad.</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="px-4">
                  <img src="images/miembros/elmer.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                  <div class="pt-4 text-center">
                    <h5 class="title">
                      <span class="d-block mb-1">Elmer Ramos</span>
                      <small class="h6 text-muted">Desarrollador Web(backend)</small>
                    </h5>
                    <div class="mt-3">
                      <a href="#" class="btn btn-warning btn-icon-only rounded-circle">
                        <i class="fa fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-warning btn-icon-only rounded-circle">
                        <i class="fa fa-facebook"></i>
                      </a>
                      <a href="#" class="btn btn-warning btn-icon-only rounded-circle">
                        <i class="fa fa-dribbble"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="px-4">
                  <img src="images/miembros/diego.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                  <div class="pt-4 text-center">
                    <h5 class="title">
                      <span class="d-block mb-1">Diego Balbuena</span>
                      <small class="h6 text-muted">Diseñador(interiores)</small>
                    </h5>
                    <div class="mt-3">
                      <a href="#" class="btn btn-primary btn-icon-only rounded-circle">
                        <i class="fa fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-primary btn-icon-only rounded-circle">
                        <i class="fa fa-facebook"></i>
                      </a>
                      <a href="#" class="btn btn-primary btn-icon-only rounded-circle">
                        <i class="fa fa-dribbble"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="px-4">
                  <img src="images/miembros/hugo.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                  <div class="pt-4 text-center">
                    <h5 class="title">
                      <span class="d-block mb-1">Hugo Martinez</span>
                      <small class="h6 text-muted">Desarrollador</small>
                    </h5>
                    <div class="mt-3">
                      <a href="#" class="btn btn-info btn-icon-only rounded-circle">
                        <i class="fa fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-info btn-icon-only rounded-circle">
                        <i class="fa fa-facebook"></i>
                      </a>
                      <a href="#" class="btn btn-info btn-icon-only rounded-circle">
                        <i class="fa fa-dribbble"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <div class="px-4">
                  <img src="images/miembros/jorge.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 200px;">
                  <div class="pt-4 text-center">
                    <h5 class="title">
                      <span class="d-block mb-1">Jorge Raymundo</span>
                      <small class="h6 text-muted">CEO</small>
                    </h5>
                    <div class="mt-3">
                      <a href="#" class="btn btn-success btn-icon-only rounded-circle">
                        <i class="fa fa-twitter"></i>
                      </a>
                      <a href="#" class="btn btn-success btn-icon-only rounded-circle">
                        <i class="fa fa-facebook"></i>
                      </a>
                      <a href="#" class="btn btn-success btn-icon-only rounded-circle">
                        <i class="fa fa-dribbble"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
@endsection
