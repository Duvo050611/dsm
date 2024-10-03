<!-- Modal para Editar Cliente -->
<div class="modal fade" id="edit{{$cliente->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('home.update', $cliente->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" 
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{$cliente->nombre}}">
            </div>
            
            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" 
                class="form-control" name="apellido" id="apellido" aria-describedby="helpId" placeholder="" value="{{$cliente->apellido}}">
            </div>
  
            <div class="mb-3">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="text" 
                class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="" value="{{$cliente->telefono}}">
            </div>
            
            <div class="mb-3">
              <label for="direccion" class="form-label">Dirección</label>
              <input type="text" 
                class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="" value="{{$cliente->direccion}}">
            </div>
  
            <div class="mb-3">
              <label for="ciudad" class="form-label">Ciudad</label>
              <input type="text" 
                class="form-control" name="ciudad" id="ciudad" aria-describedby="helpId" placeholder="" value="{{$cliente->ciudad}}">
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
        <form action="{{route('home.destroy', $cliente->id)}}" method="post" enctype="multipart/form-data">
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
  