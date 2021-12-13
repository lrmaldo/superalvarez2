<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Pedido: N°:{{$pedido->id}}</title>

  <link rel="stylesheet" href="css/pdf/style.css" media="all" />
  {{--   {!! Html::style('css/pdf.css') !!} --}}
  </head>
  <body>
    <main>
    <h1  class="clearfix"><small><span>Fecha de entrega:</span><br />{{$pedido->fecha_entrega}}</small> PEDIDO: N°: {{$pedido->id}} <small></h1>
      <table>
        <thead>
          <tr>
            <th class="service">CANT.</th>
            <th class="desc">DESCRIPCIÓN</th>
            <th>PRECIO UNIT.</th>
            
            <th>IMPORTE</th>
          </tr>
        </thead>
        @php
             $array = json_decode($pedido->carrito);
             $productos = (object) $array;
        @endphp
        <tbody>
          @foreach ($productos as $con)
          
          <tr>
          <td class="service">{{$con->cantidad}}</td>
          <td class="desc">{{$con->producto->titulo}}</td>
          <td class="unit">${{number_format($con->producto->precio,2) }}</td>
           
            <td class="total">${{ number_format($con->producto->precio * $con->cantidad, 2) }}</td>
          </tr>
          
          @endforeach

          
         
          <tr>
            <td colspan="3" class="sub">SUBTOTAL</td>
            <td class="sub total">${{ number_format($pedido->total, 2) }}</td>
          </tr>
        
          <tr>
            <td colspan="3" class="grand total">TOTAL</td>
            <td class="grand total">${{ number_format($pedido->total, 2) }}</td>
          </tr>
        </tbody>
      </table>
      @php

      $arrayCliente = json_decode($pedido->datos_cliente);

      $sucursal = App\User::find($pedido->id_sucursal);
      @endphp
      <div id="details" class="clearfix">
        <table class="egt">

          <caption> <h3>Datos</h3></caption>
        
          <tr>
            
            <td class="desc"><strong>CLIENTE:</strong><span>{{$arrayCliente->nombre}} </span></th>
        
            <td class="desc"><strong>SUCURSAL:</strong><span>{{$sucursal->name}} </span></th>
            
          </tr>
          <tr>
            <td class="desc">
              <strong>TELÉFONO: </strong> <span>{{$arrayCliente->telefono}}</span>
            </td>
            <td class="desc">
              <strong>TELÉFONO: </strong><span>{{$sucursal->telefono}}</span> 
            </td>
          </tr>
          <tr>
            <td class="desc"><strong>DIRECCIÓN: </strong><span> {{$arrayCliente->direccion}} entre: {{$arrayCliente->colonia}} colonia: {{$arrayCliente->colonia}}</span></th>
           
        
            <td class="desc"><strong>DIRECCIÓN</strong> <span>{{$sucursal->direccion}}</span></th>
            
          </tr>
          <tr>
          <td class="desc"><strong>REFERENCIA: </strong> <span>{{$arrayCliente->referencia}}</span></td>
          <td></td>
        </tr>
         
        
        </table>
      <div id="notices">
        <div>Comentario:</div>
        <div class="notice"><strong> <h4>{{$pedido->comentario}}</h4></strong></div>
      </div>
    </main>
    <footer>
      Copyright © Super Álvarez  <script>document.write(new Date().getFullYear())</script> 
    </footer>
  </body>
</html>