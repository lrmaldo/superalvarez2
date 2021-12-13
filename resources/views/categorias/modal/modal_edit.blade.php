{{-- modal de importacion de excel --}}
<div class="modal fade" id="ModalEdit{{$item->id}}" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar {{$item->titulo}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formfile" class="form-horizontal" role="form" method="POST"
                action="{{route('categorias.update',$item->id)}}" enctype="multipart/form-data">
                <div class="modal-body">
                    Actualiza la Imagen 
                    {{-- <input type="hidden" name="_method" value="DELETE">
                    --}}
                    {!! method_field('put') !!}
                   
                    {{-- <input type="hidden" name="_method" value="DELETE">
                    --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Título de la categoria:*</label>
                        </div>
                        <div class="col-md-12">
                            <input type="text" id="titulo" class="form-control" name="titulo{{$item->id}}" value="{{$item->titulo}}"
                                placeholder="Escribe una categoria (ejemplo. lacteos)" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Seleciona un color:*</label>
                        </div>
                        <div class="col-md-8">
                        <input type="color" id="color" name="color{{$item->id}}" value="{{$item->color}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="input-group-prepend">
                            <label class="col-md-6 control-label">Seleciona una imagen:*</label>
                        </div>
                        <input type="file" class="form-control" name="file_image{{$item->id}}" accept="image/png, image/jpeg">
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
