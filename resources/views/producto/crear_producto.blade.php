<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear Nuevo Producto</h1>
    <form action="{{ url('/productos') }}" method="POST">
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
        </div>
        <div>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" required>
        </div>
        <div>
            <button type="submit">Crear Producto</button>
        </div>
    </form>
</body>
</html>
 