@extends('layouts.login')


@section('content')
<div class="row justify-content-center pb-2 pt-2">
        <div class="col-12">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-white">
              <div class="text-muted text-center">
                    <img src="images/icanux.png" alt="Rounded image" class="img-fluid rounded shadow" style="width: 100px;">
                  {{-- <h1 class="display-2">ICANUX</h1>                     --}}
              </div>
            </div>
            <div class="card-body ">
              <div class="text-center text-muted mb-4">
                Iniciar Sesion
              </div>
              <form role="form" id="loginform" method="POST"  action="/log.store" onsubmit="return validar()">
                {{ csrf_field() }} 
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control required" required placeholder="Email" type="email" id="email" name="email">
                </div>
                @if(Session::has('error_email'))
                    <p class="text-danger col-md-12 text-right">
                        <small>Email ingresado no se existe</small>
                    </p>
                @endif
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control required" required placeholder="Password" type="password" id="password" name="password">
                </div>
                @if(Session::has('error_password'))
                    <p class="text-danger col-md-12 text-right">
                        <small>Contraseña incorrecta</small>
                    </p>
                @endif
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-vino my-4">Ingresar</button>
                </div>
                <div class="row mt-3">
                  <div class="col-6">
                    <a href="{{ route('register') }}" class="text-light u-hover">
                      ¿Olvidaste tu contraseña?
                    </a>
                  </div>
                  <div class="col-6 text-right">
                    <a href="{{ route('register') }}" class="text-light u-hover">
                      Registrarme
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <script>
            function validar(){
                
                let email=document.getElementById('email').value.trim();
                let validacion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                if(!validacion.test(email)){
                    document.getElementById('email').focus();
                    return false;
                }
            }
    </script>
@endsection