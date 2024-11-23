<div class="modal fade" id="editModal{{$producto->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_form_{{$producto->id}}" action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" required>{{ $producto->descripcion }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" class="form-control" value="{{ $producto->precio }}" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ $producto->stock }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('form[id^="edit_form_"]').on('submit', function(event){
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var data = form.serialize();

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                if (response.id) {
                    $('#editModal' + response.id).modal('hide');
                    var row = $('#product_row_' + response.id);
                    row.find('.nombre').text(response.nombre);
                    row.find('.descripcion').text(response.descripcion);
                    row.find('.precio').text(response.precio);
                    row.find('.stock').text(response.stock);
                    console.log('Producto actualizado correctamente', response);
                } else {
                    console.error('Respuesta inesperada', response);
                }
            },
            error: function(xhr) {
                console.error('Error en la actualización', xhr.responseText);
            }
        });
    });
});
</script>
