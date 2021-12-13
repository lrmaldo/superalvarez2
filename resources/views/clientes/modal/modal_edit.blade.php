{{-- modal de importacion de excel --}}
<div class="modal fade" id="ModalEdit{{$item->id}}" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar {{$item->id}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formfile{{$item->id}}" class="form-horizontal" role="form" method="POST"
                action="{{route('clientes.update',$item->id)}}" enctype="multipart/form-data">
                <div class="modal-body">
                    Actualizar datos de clientes
                    {{-- <input type="hidden" name="_method" value="DELETE">
                    --}}
                    {!! method_field('put') !!}
                   
                    {{-- <input type="hidden" name="_method" value="DELETE">
                    --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     {{-- activar --}}
                     
                    {{-- titulo --}}
                   
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Nombre:*</label>
                        </div>
                        <div class="col-md-12">
                        <input type="text" id="nombre{{$item->id}}" class="form-control" name="nombre{{$item->id}}" value="{{$item->nombre}}"
                                placeholder="Escribe el nombre del cliente" required>
                        </div>
                    </div>
                   
                    <div class="form-group mb-3">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Correo:*</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group-prepend">
                                
                                <input type="email"  id="correo{{$item->id}}" class="form-control" name="correo{{$item->id}}"
                            value="{{$item->correo}}" placeholder="Escribe el correo" 
                                    required>
                            </div>
                        </div>
                    </div>
                    
            {{-- direccion --}}
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Dirección:*</label>
                        </div>
                        <input type="text"  id="direcccion{{$item->id}}" class="form-control" name="direccion{{$item->id}}"
                        value="{{$item->direccion}}" placeholder="Escribe la direccion" 
                                required>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Colonia:*</label>
                        </div>
                        <input type="text"  id="colonia{{$item->id}}" class="form-control" name="colonia{{$item->id}}"
                        value="{{$item->colonia}}" placeholder="Escribe la colonia" 
                                required>
                    </div>

                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Referencias:*</label>
                        </div>
                        <input type="text"  id="referencias{{$item->id}}" class="form-control" name="referencias{{$item->id}}"
                        value="{{$item->referencias}}" placeholder="Escribe la referencia" 
                                required>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Teléfono:*</label>
                        </div>
                        <input type="text"  id="telefono{{$item->id}}" class="form-control" name="telefono{{$item->id}}"
                        value="{{$item->telefono}}" placeholder="Escribe el número teléfonico" 
                                required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input class="btn btn-primary btn-xs" type="submit" value="Actualizar" />

                </div>
            </form>
        </div>
    </div>
</div>
