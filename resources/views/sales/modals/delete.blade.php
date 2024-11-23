<!-- Modal Eliminar Venta -->
<div class="modal fade" id="deleteSaleModal{{ $sale->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteSaleModalLabel{{ $sale->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSaleModalLabel">Eliminar Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar esta venta?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form id="deleteSaleForm" method="POST" action="{{ route('sales.destroy', $sale)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteSale(saleId) {
        document.getElementById("deleteSaleForm").action = `/sales/${saleId}`;
        new bootstrap.Modal(document.getElementById('deleteSaleModal')).show();
    }
</script>
