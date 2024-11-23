<!-- Modal Crear Venta -->
<div class="modal fade" id="createSaleModal" tabindex="-1" aria-labelledby="createSaleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSaleModal">Crear Nueva Venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sales.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad de Productos</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="unit_price" class="form-label">Precio Unitario</label>
                        <input type="number" class="form-control" id="unit_price" name="unit_price" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control" id="total" name="total" step="0.01" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Venta</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#createSaleModal form").on('submit', function(event){
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
                    alert('Venta creada con éxito');  
                    $('#createSaleModal').modal('hide');  
                    $("#createSaleModal form")[0].reset();
                },
                error: function(error) {
                    console.log(error);  
                    alert('Error al crear la venta. Intenta nuevamente.');  
                }
            });
        });
    });
</script> 