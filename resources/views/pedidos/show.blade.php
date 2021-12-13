@extends('layouts.app')
@section('content')

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/pedidos">Pedidos</a></li>
        <li class="breadcrumb-item active">{{ $pedido->id }}</li>
    </ol>

    <div class="card " style="width: 100%">
        <div class="card-header">
            Pedido detalle
            {{-- <a data-toggle="modal" data-target="#ModalCreate"
                class="btn btn-primary text-white"> <i class="fas fa-cube  text-white"></i> Crear Producto</a>
            --}}
            {{-- @include('productos.modal.modal_create') --}}
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th>Cant.</th>
                            <th style="width: 60%">Concepto</th>
                            <th style="width: 20%">Precio Unit.</th>
                            <th style="width: 20%">Importe</th>
                        </tr>
                    </thead>
                    @php
                    $array = json_decode($pedido->carrito);
                    $productos = (object) $array;
                    @endphp
                    @foreach ($productos as $con)
                        <tr>
                            <td>{{ $con->cantidad }}</td>
                            <td>{{ $con->producto->titulo }}</td>
                            <td>${{ number_format($con->producto->precio,2) }}</td>
                            <td>${{ number_format($con->producto->precio * $con->cantidad, 2) }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td style="border:0"></td>
                        <td style="border:0"></td>
                        <td style="border:0; text-align: right"><strong>Total:</strong></td>
                        <td style="border:0"><strong>${{ number_format($pedido->total, 2) }}</strong></td>
                    </tr>
                    {{-- <tr>
                        <td style="border:0"></td>
                        <td style="border:0"></td>
                        <td style="border:0; text-align: right"><strong>Comisión:</strong></td>
                        <td style="border:0"><strong>-${{ $total * $comision }}</strong></td>
                    </tr>
                    <tr>
                        <td style="border:0"></td>
                        <td style="border:0"></td>
                        <td style="border:0; text-align: right"><strong>Total:</strong></td>
                        <td style="border:0"><strong>${{ $total - $total * $comision }}</strong></td>
                    </tr> --}}

                </table>
            </div>
            @php

            $arrayCliente = json_decode($pedido->datos_cliente);


            @endphp
            <div class="table-responsive-sm">
                <table class=" table table-sm w-100 table-hover">
                    <thead>
                        <tr>
                            Datos del cliente:
                            <th style="width: 10%"></th>
                            <th style="width: 70%"></th>

                        </tr>
                    </thead>
                    <tr>
                        <td > <strong>Nombre:</strong> </td>
                        <td>{{ $arrayCliente->nombre }}</td>
                    </tr>

                    <tr>
                        <td>Telefono:</td>
                        <td> <a href="https://wa.me/52{{ $arrayCliente->telefono }}">{{ $arrayCliente->telefono }} </a></td>
                    </tr>

                    <tr>
                        <td>Dirección:</td>
                        <td>{{ $arrayCliente->direccion }}</td>
                    </tr>

                    <tr>
                        <td>Entre:</td>
                        <td>{{ $arrayCliente->entre }}</td>
                    </tr>

                    <tr>
                        <td>Colonia:</td>
                        <td>{{ $arrayCliente->colonia }}</td>
                    </tr>
                    <tr>
                        <td>Referencia:</td>
                        <td>{{ $arrayCliente->referencia }}</td>
                    </tr>
                    <tr>
                      <td>COMENTARIO:</td>
                      <td><strong>{{$pedido->comentario}}</strong></td>
                    </tr>

                    <tr>
                      <td>Fecha de entrega:</td>
                      <td><strong  style="color:rgb(10, 73, 156)">{{$pedido->fecha_entrega}}</strong></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>




@endsection
