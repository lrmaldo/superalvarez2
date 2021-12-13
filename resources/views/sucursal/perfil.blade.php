@extends('layouts.app')
@section('content')


<!--  script de mapa -->
<style>
    .map-responsive{
        overflow:hidden;
        padding-bottom:56.25%;
        position:relative;
        height:0;
    }
    </style>
    
     <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn-SItPueeJksJgURjiGNpeHjhzCef9iM"></script>
  <script>
  //variables de lat y long 
  ///variables de base de datos
  const Rlat = {!! json_encode( Auth::user()->lat) !!};
  const Rlongitud = {!! json_encode( Auth::user()->lon) !!};
  var var_lat, var_long;
  console.log("lon"+Rlongitud +"  long: "+Rlat) ;
   if(Rlat == null && Rlongitud == null){
          var_lat = 18.0864363;
          var_long = -96.1248874;
          console.log("si es vacio "+var_lat) 

        }else{
          var_lat = parseFloat(Rlat);//convierte en tipo flotante 
          var_long = parseFloat(Rlongitud);//convierte tipo flotante
          
        }
        mapa = {
        map : false,
        marker : false,
        initMap : function() {
        // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
        mapa.map = new google.maps.Map(document.getElementById('mapa'), {
          center: {lat:18.0864363, lng: -96.1248874},
          scrollwheel: false,
          zoom: 14,
          zoomControl: true,
          rotateControl : false,
          mapTypeControl: true,
          streetViewControl: false,
        });
       
        // Creamos el marcador
        mapa.marker = new google.maps.Marker({
        position: {lat: var_lat, lng:var_long},
        
        draggable: true
        });
        // Le asignamos el mapa a los marcadores.
          mapa.marker.setMap(mapa.map);
          mapa.marker.addListener( 'dragend', function (event)
              {
                //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                document.getElementById("lat").value = this.getPosition().lat();
                document.getElementById("long").value =  this.getPosition().lng();
              });
        },
        // función que se ejecuta al pulsar el botón buscar dirección
        getCoords : function()
        {
          // Creamos el objeto geodecoder
        var geocoder = new google.maps.Geocoder();
        address = document.getElementById('search').value;
        document.getElementById("coordenadas").innerHTML='Coordenadas:   '+results[0].geometry.location.lat()+', '+results[0].geometry.location.lng();
        if(address!='')
        {
          // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
        geocoder.geocode({ 'address': address}, function(results, status)
        {
          if (status == 'OK')
          {
        // Mostramos las coordenadas obtenidas en el p con id coordenadas
          document.getElementById("coordenadas").innerHTML='Coordenadas:   '+results[0].geometry.location.lat()+', '+results[0].geometry.location.lng();
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
  
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Perfil</li>
</ol>

<center>
    @if(Auth::user()->url_imagen==null)
    <img src="{{ asset('img/logo.jpg')}} " name="aboutme"  border="0" class="img-responsive img-profile rounded-circle" width="200"></a>
    @else
    <img src="{{ Auth::user()->url_imagen }}" name="aboutme"   border="0" class="img-responsive img-profile rounded-circle" width="200"></a>
    @endif
        <h3 class="media-heading">{{ Auth::user()->name }} </h3>

</center>

    <center>
        
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('perfil.update',Auth::user()->id) }}" >
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
    {{-- nombre --}}
    <div class="form-group">
        <div class="input-group-prepend">
            <label class="col-md-4 control-label">Nombre de la sucursal:*</label>
        </div>
        <div class="col-md-8">
        <input type="text" id="nombre" class="form-control" name="nombre" value="{{Auth::user()->name}}"
                placeholder="Como se llama la sucursal" disabled>
        </div>
    </div>

    {{-- email --}}

    <div class="form-group">
        <div class="input-group-prepend">
            <label class="col-md-4 control-label">Email:*</label>
        </div>
        <div class="col-md-8">
        <input type="email" id="correo" class="form-control" name="correo" value="{{Auth::user()->email}}"
                placeholder="Email para iniciar sesion en esta plataforma" required autofocus>
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

     {{-- telefono --}}
     <div class="form-group">
        <div class="input-group-prepend">
            <label class="col-md-4 control-label">Teléfono:*</label>
        </div>
        <div class="col-md-8">
        <input type="text" id="telefono" class="form-control" name="telefono" value="{{Auth::user()->telefono}}"
                placeholder="Como se llama la sucursal"  >
        </div>
    </div>
     {{-- whatsapp --}}
     <div class="form-group">
        <div class="input-group-prepend">
            <label class="col-md-4 control-label">Whatsapp:*</label>
        </div>
        <div class="col-md-8">
        <input type="text" id="whatsapp" class="form-control" name="whatsapp" value="{{Auth::user()->whatsapp}}"
                placeholder="Como se llama la sucursal"  >
        </div>
    </div>
      {{-- mayorista --}}
      <div class="form-group">
            
        <label for='mayorista'class="col-md-8 control-label">¿Esta sucursal tiene ventas por mayoreo?:</label>
    
 
        <div class="col-md-8">
            
            <select class="form-control " id="mayorista" name="mayorista">
              <option value="1" {{Auth::user()->mayoreo==1 ? 'selected': null}}>Si</option>
              <option value="0" {{Auth::user()->mayoreo==0 ? 'selected': null}} >No</option>
            </select>
        </div>
      

    
  </div>
    {{-- whatapp sucursal --}}
    <div class="form-group">
      <div class="input-group-prepend">
          <label class="col-md-4 control-label">Whatsapp <strong>sí la sucursal es mayorista</strong>:</label>
      </div>
      <div class="col-md-8">
          <input type="number"  min="0"  id="whatsapp" class="form-control" name="whatstapp_mayoreo" value="{{Auth::user()->whatstapp_mayoreo}}"
              placeholder="" pattern=" 0+\.[0-9]*[1-9][0-9]*$"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" >
              <small>solo llenar este campo sí se la sucursal tiene ventas por mayoreo, y este whatsapp sera cuando el cliente sea nuevo, es decir, va a comprar como  <strong>mayorista</strong> por primera vez </small>
      </div>
  </div>
    {{-- direccion --}}
    <div class="form-group">
        <div class="input-group-prepend">
            <label class="col-md-4 control-label">Dirección:</label>
        </div>
        <div class="col-md-8">
        <input type="text" id="direccion" class="form-control" name="direccion" value="{{Auth::user()->direccion}}"
                placeholder="Dirección de la sucursal" >
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

    {{-- descripcion --}}
    <div class="form-group">
        <div class="input-group-prepend">
            <label class="col-md-4 control-label">Descripcion:</label>
        </div>
        <div class="col-md-8">
            <textarea  id="descripcion" class="form-control "  rows="5" cols="50" name="descripcion" 
        placeholder="puedes poner una breve descripción de la sucursal o puedes dejar este campo vacío "  >{{Auth::user()->descripcion}}</textarea>
        </div>
    </div>
    {{-- id telegram --}}

    <div class="form-group">
        <div class="input-group-prepend">
          <label class="col-md-4 control-label">Localiza la direccion en el mapa*</label>
          </div>
          <div class="col-md-8">
            <div class="map-responsive">
            <div id="mapa" style="width: 450px; height: 350px;"> </div>
          </div>
        <input type="hidden" id ="lat" class="form-control" name="lat" value="{{Auth::user()->lat}}" placeholder="Como se llama la tienda" required>
            <input type="hidden" id ="long" class="form-control" name="long" value="{{Auth::user()->lon}}" placeholder="Como se llama la tienda" required>
          </div>
      </div>
 

</form>

    </center>


@endsection