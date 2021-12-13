{{-- modal de importacion de excel --}}
<div class="modal fade" id="ModalEdit{{$item->id}}" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar {{$item->titulo}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formfile{{$item->id}}" class="form-horizontal" role="form" method="POST"
                action="{{route('productos.update',$item->id)}}" enctype="multipart/form-data">
                <div class="modal-body">
                    Actualizar datos
                    {{-- <input type="hidden" name="_method" value="DELETE">
                    --}}
                    {!! method_field('put') !!}
                   
                    {{-- <input type="hidden" name="_method" value="DELETE">
                    --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     {{-- activar --}}
                     <div class="form-check">
                        <div class="custom-control custom-checkbox ">
                          <input type="checkbox" name="activar" id="activar" value="1"  class="form-check-input" {{ ($item->activo == 1 ? 'checked' : '') }} >
                          
                          <label class="form-check-label" for="customCheck">  <h3><strong>Activar</strong></h3> </label>

                        </div>
                      </div>
                    {{-- titulo --}}
                   
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Título del producto:*</label>
                        </div>
                        <div class="col-md-12">
                        <input type="text" id="titulo{{$item->id}}" class="form-control" name="titulo{{$item->id}}" value="{{$item->titulo}}"
                                placeholder="Escribe un titulo del producto" required>
                        </div>
                    </div>
                   
                    <div class="form-group mb-3">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Precio:*</label>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                <input type="text"  id="precio{{$item->id}}" class="form-control precio" name="precio{{$item->id}}"
                            value="{{$item->precio}}" placeholder="Escribe el precio" 
                                    required>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('.precio').keypress(function(eve) {
                            if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve
                                    .which > 57) || (eve.which == 46 && $(this).caret().start == 0)) {
                                eve.preventDefault();
                            }

                            // this part is when left part of number is deleted and leaves a . in the leftmost position. For example, 33.25, then 33 is deleted
                            $('.precio').keyup(function(eve) {
                                if ($(this).val().indexOf('.') == 0) {
                                    $(this).val($(this).val().substring(1));
                                }
                            });
                        });

                    </script>


                    {{-- select de categorias --}}
                    <div class="form-group ">
                        <label >Selecciona la categoria</label>.
                        <div class="col-md-8">
                            <select class="form-control md-8" id="categoria{{$item->id}}" name="categoria{{$item->id}}" required>

                            <option  selected  value="{{$item->id_categoria}}">{{$item->categoria->titulo}}</option>
                                @foreach ($categorias as $items)
                                    <option value="{{ $items->id }}">{{ $items->titulo }}</option>

                                @endforeach

                            </select>
                            <small>Si no aparece ninguna categoria agregalo <a
                                    href="{{ route('categorias.index') }}">aquí</a> </small>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Describe el producto:*</label>
                        </div>
                        <textarea class="form-control" name="descripcion{{$item->id}}" id="descripcion{{$item->id}}" cols="30" rows="5"
                    placeholder="Describe el producto" required>{{$item->descripcion}}</textarea>
                    </div>


                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Seleciona una imagen:*</label>
                        </div>
                        <input type="file" class="form-control" name="file_image{{$item->id}}" accept="image/png, image/jpeg"
                            >
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
