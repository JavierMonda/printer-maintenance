@extends('layouts.app')
@section('content')
<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Dashboard <small>Consumibles</small></h2>
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
            <h3 class="h4">Stock de Consumibles</h3>
          </div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tipo</th>
                  <th>Nombre</th>
                  <th>Cantidad</th>
                  <th>Nº de Páginas</th>
                  <th colspan="3"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($consumible as $c)
                <tr>
                  <th scope="row">{{ $c->id }}</th>
                  <td>{{ $c->tipo }}</td>
                  <td>{{ $c->nombre }}</td>
                  <td>{{ $c->cantidad }}</td>
                  <td>{{ $c->paginas }}</td>
                  <td class="text-center">
                    <a class="btn btn-success btn-sm" href="{{ url('/consumibles/' . $c->id ) }}">
                      <i class="fa fa-address-card" aria-hidden="true"></i>
                    </a>
                  </td>
                  <td class="text-center">
                    <form action="{{ action('ConsumibleController@destroy', $c->id) }}" method="POST">
                      {{ method_field('PUT') }}
                      {!! csrf_field() !!}
                      <button type="submit" class="btn btn-danger btn-sm" onclick="
      return confirm('¿Está seguro de eliminar este consumible?')">
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
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Compra </button>
            <!-- Modal-->
            <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
              <div role="document" class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 id="exampleModalLabel" class="modal-title">Compra de Consumible</h4>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                  </div>
                  <div class="modal-body">
                    <p></p>
                    <form method="POST" action="">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="tipo">Selecciona Tipo</label>
                        <select class="custom-select form-control" name="tipo">
                          <option value="toner">
                            Tóner
                          </option>
                          <option value="tambor">
                            Tambor
                          </option>
                          <option value="unidad de imagen">
                            Unidad de Imagen
                          </option>
                          <option value="tinta">
                            Tinta
                          </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" placeholder="Nombre" class="form-control">
                      </div>
                      <div class="form-group">       
                        <label>Cantidad</label>
                        <input type="number" name="cantidad" placeholder="Cantidad" class="form-control">
                      </div>
                      <div class="form-group">       
                        <label>Nº de páginas</label>
                        <input type="number" name="paginas" placeholder="Páginas" class="form-control">
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