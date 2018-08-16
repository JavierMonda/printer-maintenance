@extends('layouts.app')
@section('content')
    <header class="page-header">
      <div class="container-fluid">
        <h2 class="no-margin-bottom">Dashboard <small>Impresoras</small></h2>
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
                      <th>Nombre</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Ubicación</th>
                      <th colspan="3"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($impresora as $i)
                    <tr>
                      <th scope="row">{{ $i->id }}</th>
                      <td>{{ $i->nombre }}</td>
                      <td>{{ $i->marca }}</td>
                      <td>{{ $i->modelo }}</td>
                      <td>{{ $i->ubicación }}</td>
                      <td class="text-center">
                        <a class="btn btn-success btn-sm" href="{{ url('/impresoras/' . $i->id ) }}">
                          <i class="fa fa-address-card" aria-hidden="true"></i>
                        </a>
                      </td>
                      <td class="text-center">
                        <form action="{{ action('ImpresoraController@destroy', $i->id) }}" method="POST">
                          {{ method_field('PUT') }}
                          {!! csrf_field() !!}
                          <button type="submit" class="btn btn-danger btn-sm" onclick="
          return confirm('¿Está seguro de eliminar esta impresora?')">
                            <i class="fa fa-trash-o"></i>
                          </button>
                        </form>
                      </td>
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
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Nueva Impresora </button>
                <!-- Modal-->
                <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Alta de nueva Impresora</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                      </div>
                      <div class="modal-body">
                        <p></p>
                        <form method="POST" action="">
                          {{ csrf_field() }}
                          <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control">
                          </div>
                          <div class="form-group">       
                            <label>Marca</label>
                            <input type="text" name="marca" placeholder="Marca" class="form-control">
                          </div>
                          <div class="form-group">       
                            <label>Modelo</label>
                            <input type="text" name="modelo" placeholder="Modelo" class="form-control">
                          </div>
                          <div class="form-group">       
                            <label>Ubicación</label>
                            <input type="text" name="ubicación" placeholder="Ubicación" class="form-control">
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