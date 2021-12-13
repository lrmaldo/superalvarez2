{{-- modal de importacion de excel --}}
<div class="modal fade " id="ModalCreate" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formfile" class="form-horizontal" role="form" method="POST"
                action="{{ route('productos.store') }}" enctype="multipart/form-data">
                <div class="modal-body">

                    {{-- <input type="hidden" name="_method" value="DELETE">
                    --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{-- titulo --}}
                   
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Título de la categoria:*</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="titulo" class="form-control" name="titulo" value=""
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
                                <input type="text"  id="precio" class="form-control precio" name="precio"
                                    value="" placeholder="Escribe el precio" 
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
                        <label for="exampleFormControlSelect1">Selecciona la categoria</label>.
                        <div class="col-md-8">
                            <select class="form-control md-8" id="categoria" name="categoria" required>

                             {{--    <option disabled  hidden>Seleccionar</option> --}}
                                @foreach ($categorias as $item)
                                    <option value="{{ $item->id }}">{{ $item->titulo }}</option>

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
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"
                            placeholder="Describe el producto" required></textarea>
                    </div>


                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Seleciona una imagen:*</label>
                        </div>
                        <input type="file" class="form-control" name="file_image" accept="image/png, image/jpeg"
                            required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input class="btn btn-primary btn-xs" type="submit" value="Guardar" />

                </div>
            </form>
        </div>
    </div>
</div>
