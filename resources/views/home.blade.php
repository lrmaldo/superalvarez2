@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">

                        <!--(Sucursales) Card Usuarios -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{route('bannerp.index')}}">
                        
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Banners principales</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-file-image fa-3x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        </div>

                          <!--(Sucursales) Card total de productos -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                              <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                  <div class="col mr-2">
                                   <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Productos totales</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">cantidad</div>
                                  </div>
                                  <div class="col-auto">
                                    <i class="fas fa-cube fa-3x text-gray-300"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>

                    <div class="card " style="width: 100%">
                        <div class="card-header">
                          <a href="{{route('sucursal.create')}}" class="btn btn-primary"> <i class="fas fa-store"></i> Crear sucursal</a>
                        </div>
                        <div class="card-body text-center ">
                            <img class="img-fluid  " style="width: 25%;" src="img/portada.svg" alt="">
                            <br>
                            Administra tu sucursal
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Sucursal</th>
                                  <th>Email</th>
                                  <th>Direccion</th>
                                  <th>Estado</th>
                                  <th>Accion</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                                @foreach ($sucursales as $item)
                                  
                                <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->direccion}}</td>
                                <td style="text-align: center">@if ($item->activo == 1)
                                  <span class="badge badge-pill badge-success">Activo</span>
                                @else
                                <span class="badge badge-pill badge-danger">No activo</span>
                                @endif</td>
                                <td>
                                  <a href="{{route('sucursal.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                  <a data-toggle="modal" data-target="#modal_eliminar{{$item->id}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                                  @include('sucursal.modal.modal_eliminar')
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
