@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="h2">Banners </div>

                    <div class="panel-body">
                        <div class="row">

                            <!--(Sucursales) Card Usuarios -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="{{ route('productos.index') }}">

                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Productos</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-cube fa-3x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <!--(categorias) Card total de productos -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="{{ route('categorias.index') }}">

                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        Categorias</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-columns fa-3x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="{{ route('pedidos.index') }}">

                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        Pedidos</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-archive fa-3x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            {{-- --}}
                            <div class="col-xl-3 col-md-6 mb-4">
                                <a href="{{ route('banners.index') }}">

                                    <div class="card border-left-danger shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                        Total de banners</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_banners }}
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-columns fa-3x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div>

                        <div class="card " style="width: 100%">
                            <div class="card-header">
                                <a data-toggle="modal" data-target="#ModalCreate" class="btn btn-primary text-white"> <i
                                        class="far fa-file-image text-white"></i> Crear banner</a>
                                @include('banners.modal.modal_create_banner')
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
                                                    <td>{{ $item->id }}</td>
                                                    <td> <img src="{{ $item->url_imagen }}" alt="" width="120" height="120"
                                                            class="img-responsive center" style=" margin: 0 auto;"></td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#ModalEdit{{ $item->id }}"
                                                            class="btn btn-info btn-sm"><i
                                                                class="far fa-edit text-white"></i></a>
                                                        <a data-toggle="modal" data-target="#modal_eliminar{{ $item->id }}"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="far fa-trash-alt text-white"></i></a></td>
                                                </tr>
                                                @include('banners.modal.modal_edit_banner')
                                                @include('banners.modal.modal_eliminar')
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
