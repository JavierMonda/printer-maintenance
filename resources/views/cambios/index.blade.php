@extends('layouts.app')
@section('content')
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Dashboard <small>Cambios</small></h2>
  </div>
</header>
<!-- Dashboard Counts Section-->
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-violet"><i class="icon-user"></i></div>
          <div class="title"><span>Total<br>Impresoras</span>
            <div class="progress">
              <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
            </div>
          </div>
          <div class="number"><strong>{{ $total }}</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-red"><i class="icon-padnote"></i></div>
          <div class="title"><span>Work<br>Orders</span>
            <div class="progress">
              <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
            </div>
          </div>
          <div class="number"><strong>70</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-green"><i class="icon-bill"></i></div>
          <div class="title"><span>New<br>Invoices</span>
            <div class="progress">
              <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
            </div>
          </div>
          <div class="number"><strong>40</strong></div>
        </div>
      </div>
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="item d-flex align-items-center">
          <div class="icon bg-orange"><i class="icon-check"></i></div>
          <div class="title"><span>Open<br>Cases</span>
            <div class="progress">
              <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
            </div>
          </div>
          <div class="number"><strong>50</strong></div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="tables">   
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center">
            <h3 class="h4">Listado de Impresoras</h3>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Impresora</th>
                  <th>Consumible</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                @foreach($utiliza as $u)
                <tr>
                  <th scope="row">{{ $u->id }}</th>
                  <td>{{ $u->impresora }}</td>
                  <td>{{ $u->consumible }}</td>
                  <td>{{ $u->fecha }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Modal Form-->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-close">
            <div class="dropdown">
              <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
              <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
            </div>
          </div>
          <div class="card-header d-flex align-items-center">
            <h3 class="h4"></h3>
          </div>
          <div class="card-body text-center">
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Nuevo Cambio </button>
            <!-- Modal-->
            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
              <div role="document" class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Sustitución de consumible</h4>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                  </div>
                  <div class="modal-body">
                    <p></p>
                    <form method="POST" action="">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="impresora_id">Selecciona Impresora</label>
                        <select class="custom-select form-control" name="impresora_id">
                          @foreach($impresora as $i)
                          <option value="{{ $i->id }}">
                            {{ $i->nombre }}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="consumible_id">Selecciona Consumible</label>
                        <select class="custom-select form-control" name="consumible_id">
                          @foreach($consumible as $c)
                          <option value="{{ $c->id }}">
                            {{ $c->nombre }}
                          </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">       
                        <label>Fecha</label>
                        <input type="date" name="fecha" placeholder="Fecha" class="form-control">
                      </div>
                      <div class="form-group">       
                        <button type="submit" class="btn btn-primary">Enviar</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection