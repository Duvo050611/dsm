@extends('layouts.app')
@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Aceptar',
                timer: 3000, 
                timerProgressBar: true
            });
        });
    </script>
@endif

@section('content')

<div class="container">
    <a href="{{ route('clientes.index') }}" class="btn btn-info">Ir a Clientes</a>        <a href="{{ route('sales.index') }}" class="btn btn-info">Ir a Ventas</a>

    <br><br>
    <h2 class="mb-4">Lista de Productos</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Agregar Producto</button>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th> 
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr id="product_row_{{$producto->id}}">
                <td>{{ $loop->index + 1 }}</td>
                <td class="nombre">{{ $producto->nombre }}</td>
                <td class="descripcion">{{ $producto->descripcion }}</td>
                <td class="precio">{{ $producto->precio }}</td>
                <td class="stock">{{ $producto->stock }}</td>
                <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $producto->id }}">Editar</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $producto->id }}">Eliminar</button>
                </td>
            </tr>
            
        
            <!-- Modales de Editar y Eliminar -->
            @include('productos.modals.edit', ['producto' => $producto])
            @include('productos.modals.delete', ['producto' => $producto])
            @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $productos->links('pagination::bootstrap-4') }}
    </div>
</div>

<!-- Modal para Agregar Producto -->
@include('productos.modals.add')

@endsection
