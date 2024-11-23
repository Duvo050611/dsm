<!-- Modal para Editar Cliente -->
<div class="modal fade" id="edit{{$cliente->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content"> 
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
          </div>
          <form id="edit-client-form{{$cliente->id}}" action="{{route('clientes.update', $cliente->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="modal-body">
                  <div class="mb-3">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" value="{{$cliente->nombre}}">
                  </div>
                  <div class="mb-3">
                      <label for="apellido" class="form-label">Apellido</label>
                      <input type="text" class="form-control" name="apellido" id="apellido" value="{{$cliente->apellido}}">
                  </div>
                  <div class="mb-3">
                      <label for="telefono" class="form-label">Teléfono</label>
                      <input type="text" class="form-control" name="telefono" id="telefono" value="{{$cliente->telefono}}">
                  </div>
                  <div class="mb-3">
                      <label for="direccion" class="form-label">Dirección</label>
                      <input type="text" class="form-control" name="direccion" id="direccion" value="{{$cliente->direccion}}">
                  </div>
                  <div class="mb-3">
                      <label for="ciudad" class="form-label">Ciudad</label>
                      <input type="text" class="form-control" name="ciudad" id="ciudad" value="{{$cliente->ciudad}}">
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
  $(document).ready(function () {
      $("#edit-client-form{{$cliente->id}}").on("submit", function (event) {
          event.preventDefault();
          var formData = new FormData(this);
          var url = $(this).attr("action");

          $.ajax({
              type: "POST",
              url: url,
              data: formData,
              processData: false,
              contentType: false,
              success: function (response) {
                  alert("Cliente actualizado con éxito");
                  $("#edit{{$cliente->id}}").modal("hide");
                  location.reload();  // Recarga la página para reflejar los cambios
              }
          });
      });
  });
</script>
<!-- Modal para Eliminar Cliente -->
<div class="modal fade" id="delete{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form id="delete-client-form{{$cliente->id}}" action="{{route('clientes.destroy', $cliente->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                  ¿Estás seguro de que deseas eliminar a <strong>{{$cliente->nombre}}</strong>?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Confirmar</button>
              </div>
          </form>
      </div>
  </div>
</div>

<script>
  $(document).ready(function () {
      $("#delete-client-form{{$cliente->id}}").on("submit", function (event) {
          event.preventDefault();
          var formData = new FormData(this);
          var url = $(this).attr("action");

          $.ajax({
              type: "POST",
              url: url,
              data: formData,
              processData: false,
              contentType: false,
              success: function (response) {
                  alert("Cliente eliminado con éxito");
                  $("#delete{{$cliente->id}}").modal("hide");
                  location.reload();  // Recarga la página para reflejar los cambios
              }
          });
      });
  });
</script>
