<div class="modal fade" id="deleteModal{{$producto->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="delete-product-form{{$producto->id}}" action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Estás seguro que deseas eliminar el producto "{{ $producto->nombre }}"?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        @foreach($productos as $producto)
        $("#delete-product-form{{$producto->id}}").on("submit", function (event) {
            event.preventDefault(); 
    
            var url = $(this).attr("action"); 
            var token = $('meta[name="csrf-token"]').attr('content'); 
    
            $.ajax({
                type: "POST", 
                url: url,
                data: {
                    _token: token, 
                    _method: "DELETE" 
                },
                success: function (response) {
                    Swal.fire({
                    title: "Producto eliminado",
                    text: "El producto ha sido eliminado exitosamente.",
                    icon: "success",
                    confirmButtonText: "Aceptar",
                    timer: 3000,
                    timerProgressBar: true
                });
                    $("#deleteModal{{$producto->id}}").modal("hide");
                    $("#product_row_{{$producto->id}}").remove();
                },
                error: function (error) {
                    console.error("Error:", error);
                        Swal.fire({
                        title: "Error",
                        text: "No se pudo eliminar el producto. Intenta nuevamente.",
                        icon: "error",
                        confirmButtonText: "Aceptar"
                    });
                }
            });
        });
        @endforeach
    });
    </script>
    