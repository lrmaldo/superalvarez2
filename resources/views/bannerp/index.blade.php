@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="h2">Banners Principal</div>

                <div class="panel-body">
                    <div class="row">

                        <!--(Sucursales) Card Usuarios -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{route('home')}}">

                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sucursales</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-store fa-3x text-gray-300"></i>
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
                          <a data-toggle="modal" data-target="#ModalCreate" class="btn btn-primary"> <i class="far fa-file-image"></i> Crear banner</a>
                          @include('bannerp.modal.modal_create_banner')
                        </div>
                       
                      </div>
                      <div class="card">
                        <div class="card-body">
                          
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Imagen</th>
                                  <th>Accion</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                                @foreach ($banners as $item)
                                  
                                <tr>
                                <td>{{$item->id}}</td>
                                <td > <img src="{{$item->url_imagen}}" alt="" width="120" height="120" class="img-responsive center" style=" margin: 0 auto;"></td>
                                <td>
                                  <a data-toggle="modal" data-target="#ModalEdit{{$item->id}}"  class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
                                  <a data-toggle="modal" data-target="#modal_eliminar{{$item->id}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                                  @include('bannerp.modal.modal_edit_banner')
                                  @include('bannerp.modal.modal_eliminar')
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
