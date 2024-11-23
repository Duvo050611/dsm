<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create-client-form" action="{{ route('clientes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div id="error-messages" class="alert alert-danger">
                            <ul id="error-list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div id="error-messages" class="alert alert-danger d-none">
                            <ul id="error-list"></ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" required/>
                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" required/>
                    </div>
                    
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="" required/>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="" required/>
                    </div>

                    <div class="mb-3">
                        <label for="ciudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#create-client-form').on('submit', function(event){
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
                alert('Cliente agregado con éxito');
                $('#create').modal('hide');  
                $('#create-client-form')[0].reset();  
            },
            error: function(xhr, status, error) {
                console.log(error);  
                alert('Ocurrió un error al agregar el cliente. Intenta de nuevo.');
            }
        });
    });
});
</script>
