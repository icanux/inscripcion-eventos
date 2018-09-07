@extends('layouts.login')

@section('content')
<div class="row justify-content-center pb-lg-3 pt-lg-3">
        <div class="col-lg-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-white">
              <div class="text-muted text-center">
                <img src="images/icanux.png" alt="Rounded image" class="img-fluid rounded shadow" style="width: 100px;">
              </div>
            </div>
            <div class="card-body">
              <div class="text-center text-muted mb-4">
                Registrarme
              </div>
              <form id="frmRegister" method="POST">
                  <input type="hidden" id="token" name="token" readonly="true" value="{{csrf_token()}}">
                  <div class="row">
                        <div class="col-lg-6 col-md-12">
                          <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                              </div>
                              <input class="form-control required" placeholder="Nombres" required type="text" maxlength="250" id="nombres" name="nombres" >
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control required" required placeholder="Apellidos" type="text" maxlength="250" id="apellidos" name="apellidos">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control required" required placeholder="Email" type="email" maxlength="250" id="email" name="email" >
                                </div>
                                <small id="errorEmail" class="text-danger font-medium d-none">El email ingresado no se encuentra disponible.</small>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control required" required placeholder="Password" type="password" name="password" id="password" maxlength="150" minlength="6">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Universidad</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Facultad</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                  </div>
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span>Estoy de acuerdo con la 
                          <a href="#">Política de privacidad</a>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-vino mt-4">Crear Cuenta</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
