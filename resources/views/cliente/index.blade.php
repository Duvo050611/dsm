@extends('home')

@section('content')
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

<div class="container">
    <a href="{{ route('productos.index') }}" class="btn btn-info">Ir a Productos</a>         <a href="{{ route('sales.index') }}" class="btn btn-info">Ir a Ventas</a>

    <br><br>
    <h2 class="mb-4">Lista de Clientes</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#create">Agregar Cliente</button>

    @include('cliente.create')

    <table class="table table-bordered">
        <thead class="bg-dark text-white">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->apellido }}</td>
                <td>{{ $cliente->telefono }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->ciudad }}</td>
                <td>
                    <div class="d-flex">
                        <button class="btn btn-warning me-2" data-toggle="modal" data-target="#edit{{ $cliente->id }}">Editar</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $cliente->id }}">Eliminar</button>
                    </div>
                </td>
            </tr>
            @include('cliente.info')
            @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $clientes->links('pagination::bootstrap-4') }}
    </div>
</div>



@endsection
