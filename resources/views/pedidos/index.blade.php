@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="h2">Pedidos</div>

                <div class="panel-body">
                    <div class="row">

                        <!--(Sucursales) Card Usuarios -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{route('banners.index')}}">

                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Banners</div>
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
                            <a href="{{route('categorias.index')}}">
                          <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Categorias</div>
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
                          <a href="{{route('productos.index')}}">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                               <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Productos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fas fa-cube fa-3x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                      </div>
                      <div class="col-xl-3 col-md-6 mb-4">
                        <a href="{{route('pedidos.index')}}">
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total de pedidos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$total_pedidos}}</div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fas fa-archive fa-3x text-gray-300"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    </div>
                      
                          {{--  --}}
                    </div>

                    <div class="card " style="width: 100%">
                        <div class="card-header">
                       {{--    <a data-toggle="modal" data-target="#ModalCreate" class="btn btn-primary text-white"> <i class="fas fa-cube  text-white"></i> Crear Producto</a> --}}
                         {{--  @include('productos.modal.modal_create') --}}
                        </div>
                       
                      </div>
                      <div class="card">
                        <div class="card-body">
                          
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataTablePedidos" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>Id pedido</th>
                                  <th>Concepto</th>
                                  {{-- <th>Tipo de servicio</th> --}}
                                  <th>Total</th>
                                  <th>Fecha de pedido</th>
                                  <th>Acciones</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                                
                                @foreach($pedidos as $registro)
                                  
                                <tr>
                                  <td>{{$registro->id}}</td>
                                      <?php 
                                      //conversion de concepto convertir el string en array
                                      $array =  json_decode($registro->carrito);
                                        $pedido = (object) $array; 
                                        $texto="";  
                                        foreach ( $pedido as $r ) {
                                          $total= $r->producto->precio * $r->cantidad;
                                          $texto.=$r->producto->titulo.": $".$r->producto->precio." * ".$r->cantidad." = $".$total ."<br>";
                                         
                                     // $s.= $r["food"]["titulo"].": $".$r["food"]["precio"]." * ". $r["quantity"]." = $".$total." \n";
                                          
                                         
                                      } 
                                    
                                      ?>
                                    <td><?php echo substr($texto,0,15)."..." ?></td>
                                    
                                   {{--  <td>{{$registro->tipo}}</td> --}}<!--es el username me dio hueva cambiar el atributo en la db xD -->
                                    <td>${{number_format($registro->total,2)  }}</td>
                                    <th>
                                       <?php /* echo date_format($registro->created_at, 'd/m/Y H:i:s'); */ ?> 
                                       {{$registro->fecha_entrega}}
                                     </th>
                                    <th>
                                    <a href="{{ url('/pedidos/' . $registro->id) }}" class="btn btn-info btn-xs"> Ver en detalle </a>
                                                                      
                                    </th>
                                   
                                  </tr>
                                {{--   @include('productos.modal.modal_edit')
                                  @include('productos.modal.modal_eliminar') --}}
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
