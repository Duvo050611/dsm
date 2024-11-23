<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" class="form-control" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#addModal form").on('submit', function(event){
            event.preventDefault();
            
            var data = $(this).serialize();
            console.log(data);  
    
            var url = $(this).attr('action');
            console.log(url);  
    
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response) {
                    console.log(response); 
                    alert('Producto agregado con éxito');
                    $('#addModal').modal('hide');
                    $("#addModal form")[0].reset();
                },
                error: function(error) {
                    console.log(error);  
                }
            });
        });
    });
    </script>
    