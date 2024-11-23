@extends('layouts.app')

@section('content')
<div class="container">
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

    <a href="{{ route('productos.index') }}" class="btn btn-info mb-3">Ir a Productos</a>
    <a href="{{ route('clientes.index') }}" class="btn btn-info mb-3">Ir a Clientes</a>

    <h2 class="mb-4">Lista de Ventas</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createSaleModal">Crear Nueva Venta</button>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Cantidad de Productos</th>
                <th>Precio Unitario</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $index => $sale)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sale->date }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>{{ $sale->unit_price }}</td>
                    <td>{{ $sale->total }}</td>
                    <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editSaleModal{{ $sale->id }}">
                            Editar
                        </button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteSaleModal{{ $sale->id }}">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @include('sales.modals.create')
                @include('sales.modals.edit', ['sale' => $sale])
                @include('sales.modals.delete')
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $sales->links('pagination::bootstrap-4') }}
    </div>
</div>



@endsection
