@extends('layouts.app')
@section('content')

    <h1 class="mt-4">Crear Tienda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('sucursal.update',$sucursal->id) }}" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!! method_field('put') !!}
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-lg  btn-info">
                    <i class="fa fas-store"></i>
                    Guardar
                </button>
                <!--button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal"> <i class="far fa-trash-alt"></i>
                                                              Eliminar
                                                              </button-->
            </div>
        </div>
         {{-- activar --}}
         <div class="form-check">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Activar sucursal:</label>
            </div>
            <div class="custom-control custom-checkbox ">
              <input type="checkbox" name="activar" id="activar" value="1"  class="form-check-input" {{ ($sucursal->activo == 1 ? 'checked' : '') }}>
              
              <label class="form-check-label" for="customCheck">  <h3><strong>Activar</strong></h3> </label>

            </div>
          </div>
          {{-- mayorista --}}
          <div class="form-group">
            
            <label for='mayorista'class="col-md-4 control-label">¿Esta sucursal tiene ventas por mayoreo?:</label>
        
     
            <div class="col-md-4">
                
                <select class="form-control " id="mayorista" name="mayorista">
                  <option value="1" {{$sucursal->mayoreo==1 ? 'selected': null}}>Si</option>
                  <option value="0" {{$sucursal->mayoreo==0 ? 'selected': null}} >No</option>
                </select>
            </div>
          

        
      </div>
        {{-- nombre --}}
        <div class="form-group">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Nombre de la sucursal:*</label>
            </div>
            <div class="col-md-8">
            <input type="text" id="nombre" class="form-control" name="nombre" value="{{$sucursal->name}}"
                    placeholder="Como se llama la sucursal" required autofocus>
            </div>
        </div>

        {{-- email --}}

        <div class="form-group">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Email:*</label>
            </div>
            <div class="col-md-8">
            <input type="email" id="correo" class="form-control" name="correo" value="{{$sucursal->email}}"
                    placeholder="Email para iniciar sesion en esta plataforma" required>
            </div>
        </div>
        {{-- contraseña  --}}

        <div class="form-group">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Contraseña:*</label>
            </div>
            <div class="col-md-8">
                <input type="text" id="contrasenia" class="form-control" name="contrasenia" value=""
                    placeholder="Contraseña" >
            </div>
        </div>

        {{-- direccion --}}
        <div class="form-group">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Dirección:</label>
            </div>
            <div class="col-md-8">
            <input type="text" id="direccion" class="form-control" name="direccion" value="{{$sucursal->direccion}}"
                    placeholder="Dirección de la sucursal" >
            </div>
        </div>
         {{-- telefono --}}
         <div class="form-group">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Teléfono:</label>
            </div>
            <div class="col-md-8">
                <input type="number" min="0" minlength="10" value="{{$sucursal->telefono}}" pattern=" 0+\.[0-9]*[1-9][0-9]*$"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="telefono" class="form-control" name="telefono" value=""
                    placeholder="Escribe el teléfono de la sucursal"  >
            </div>
        </div>

        {{-- whatsapp --}}
        <div class="form-group">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Whatsapp:</label>
            </div>
            <div class="col-md-8">
                <input type="number"  min="0"  id="whatsapp" class="form-control" value="{{$sucursal->whatsapp}}" name="whatsapp" value=""
                    placeholder="número telefonico, puedes dejar vacio este campo" pattern=" 0+\.[0-9]*[1-9][0-9]*$"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
            </div>
        </div>
        {{-- imagen --}}
        <div class="form-group">
            <div class="input-group-prepend">
              <label class="col-md-4 control-label">Imagen de portada:*</label>
              </div>
              <div class="col-md-8">
              <input type="file" id="url_imagen"  class="form-control" name="url_imagen"   >
              </div>
            </div> 
             {{-- whatstapp_mayoreo --}}
        <div class="form-group">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Whatsapp <strong>sí la sucursal es mayorista</strong>:</label>
            </div>
            <div class="col-md-8">
                <input type="number"  min="0"  id="whatsapp" class="form-control" name="whatstapp_mayoreo" value="{{$sucursal->whatstapp_mayoreo}}"
                    placeholder="" pattern=" 0+\.[0-9]*[1-9][0-9]*$"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
                    <small>solo llenar este campo sí se activa la sucursal como mayorista, y este whatsapp sera cuando el cliente sea nuevo, es decir, va a comprar como  <strong>mayorista</strong> por primera vez </small>
            </div>
        </div>

        {{-- descripcion --}}
        <div class="form-group">
            <div class="input-group-prepend">
                <label class="col-md-4 control-label">Descripcion:</label>
            </div>
            <div class="col-md-8">
                <textarea  id="descripcion" class="form-control "  rows="5" cols="50" name="descripcion" 
            placeholder="puedes poner una breve descripción de la sucursal o puedes dejar este campo vacío "  >{{$sucursal->descripcion}}</textarea>
            </div>
        </div>
        
        {{-- id telegram --}}
        <div class="form-group ">
            <div class="input-group-prepend">
            <label class="col-md-4 control-label" for="exampleFormControlSelect1">Selecciona el id del telegram de la sucursal</label>.
            </div>
            <div class="col-md-8">
                <select class="form-control md-8" id="idtelegram" name="idtelegram" required>
                    <option  value="null">Seleccionar</option>
                 {{--    <option disabled  hidden>Seleccionar</option> --}}
                    @foreach (App\userbotTelegram::get() as $telegram)
                        @php
                            $selected ='';
                            if($telegram->id == (int)$sucursal->id_telegram){
                                $selected='selected';
                            }
                        @endphp
                        <option value="{{ $telegram->id }}" {{$selected}}>{{ $telegram->id }} - {{ $telegram->nombre }} </option>

                    @endforeach

                </select>
                <small>Si no aparece ningún Id pidele que mande un hola al bot  <a
                        href="{{ route('telegram.index') }}">checa aquí la lista</a> </small>

            </div>
        </div>

    
        {{-- ubicacion --}}
        <div class="form-group" >
            <div class="input-group-prepend">
              <label class="col-md-4 control-label">Localiza la sucursal en el mapa*</label>
              </div>
              <div class="col-md-8">
                <div class="map-responsive">
                <div id="mapa" style="width: 450px; height: 350px;"> </div>
               </div>
                <input type="hidden" id ="lat" class="form-control" name="lat" value="{{$sucursal->lat}}" placeholder="Como se llama la tienda" required>
                <input type="hidden" id ="long" class="form-control" name="long" value="{{$sucursal->lon}}" placeholder="Como se llama la tienda" required>
              </div>
            </div>


    </form>

    @endsection

    <!--  script de mapa -->
    <style>
        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

    </style>

   
    <script>
        var lat=17.8282252;
        var long =-95.8210509;
        mapa = {
            map: false,
            marker: false,
            initMap: function() {
                // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
                mapa.map = new google.maps.Map(document.getElementById('mapa'), {
                    center: {
                        lat: 17.8282252,
                        lng: -95.8210509
                    },
                    scrollwheel: false,
                    zoom: 14,
                    zoomControl: true,
                    rotateControl: false,
                    mapTypeControl: true,
                    streetViewControl: false,
                });
                // Creamos el marcador
                mapa.marker = new google.maps.Marker({
                    position: {
                        lat:lat,
                        lng:long,
                        /* lat: 17.8282252,
                        lng: -95.8210509 */
                    },

                    draggable: true
                });
                // Le asignamos el mapa a los marcadores.
                mapa.marker.setMap(mapa.map);
                mapa.marker.addListener('dragend', function(event) {
                    //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                    document.getElementById("lat").value = this.getPosition().lat();
                    document.getElementById("long").value = this.getPosition().lng();
                });
            },
            // función que se ejecuta al pulsar el botón buscar dirección
            getCoords: function() {
                // Creamos el objeto geodecoder
                var geocoder = new google.maps.Geocoder();
                address = document.getElementById('search').value;
                document.getElementById("coordenadas").innerHTML = 'Coordenadas:   ' + results[0].geometry
                    .location.lat() + ', ' + results[0].geometry.location.lng();
                if (address != '') {
                    // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
                    geocoder.geocode({
                        'address': address
                    }, function(results, status) {
                        if (status == 'OK') {
                            // Mostramos las coordenadas obtenidas en el p con id coordenadas
                            document.getElementById("coordenadas").innerHTML = 'Coordenadas:   ' +
                                results[0].geometry.location.lat() + ', ' + results[0].geometry.location
                                .lng();
                            // Posicionamos el marcador en las coordenadas obtenidas
                            mapa.marker.setPosition(results[0].geometry.location);
                            // Centramos el mapa en las coordenadas obtenidas
                            mapa.map.setCenter(mapa.marker.getPosition());
                            agendaForm.showMapaEventForm();
                        }
                    });
                }
            }
        }

    </script>
