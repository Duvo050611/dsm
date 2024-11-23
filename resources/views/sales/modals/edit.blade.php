<!-- sales/modals/edit.blade.php -->
<div class="modal fade" id="editSaleModal{{ $sale->id }}" tabindex="-1" aria-labelledby="editSaleModalLabel{{ $sale->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSaleModalLabel{{ $sale->id }}">Editar Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="date" class="form-label">Fecha:</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{ $sale->date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Cantidad de Productos:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $sale->quantity }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="unit_price" class="form-label">Precio Unitario:</label>
                        <input type="number" step="0.01" name="unit_price" id="unit_price" class="form-control" value="{{ $sale->unit_price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total:</label>
                        <input type="number" step="0.01" name="total" id="total" class="form-control" value="{{ $sale->total }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#editSaleModal{{ $sale->id }} form").on('submit', function(event){
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
                    alert('Venta editada con éxito');  
                    $('#editSaleModal{{ $sale->id }}').modal('hide');  
                    $("#editSaleModal{{ $sale->id }} form")[0].reset();
                },
                error: function(error) {
                    console.log(error);  
                    alert('Error al editar la venta. Intenta nuevamente.');
                }
            });
        });
    });
</script>

