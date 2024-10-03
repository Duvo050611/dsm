@extends('home')

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <br><br>
        <h3>LISTA DE CLIENTES</h3>
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
            Nuevo Cliente
        </button>
        @include ('cliente.create')
        <div class="table-responsive">
            <br>
            <table class="table">
                <thead class="bg-dark text-white">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr class="">
                        <td scope="row">{{$cliente->id}}</td>
                        <td>{{$cliente->nombre}}</td>
                        <td>{{$cliente->apellido}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>{{$cliente->direccion}}</td>
                        <td>{{$cliente->ciudad}}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit{{$cliente->id}}">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$cliente->id}}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                    @include('cliente.info')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>


@endsection
