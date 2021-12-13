{{-- modal de importacion de excel --}}
<div class="modal fade" id="ModalCreate" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Banner</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formfile" class="form-horizontal" role="form" method="POST"
                action="{{ route('bannerp.store') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    Sube una imagen que se vera  como banner en la App
                    {{-- <input type="hidden" name="_method" value="DELETE">
                    --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                       
                        
                        <input type="file" class="form-control" name="file_image" 
                        accept="image/png, image/jpeg">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input class="btn btn-primary btn-xs" type="submit" value="Subir" />

                </div>
            </form>
        </div>
    </div>
</div>
