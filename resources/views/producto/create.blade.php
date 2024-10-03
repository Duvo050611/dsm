<div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="createProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductLabel">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/productos') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
