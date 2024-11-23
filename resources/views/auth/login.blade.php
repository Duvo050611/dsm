@extends('layouts.app')

@section('content')
    <form action="{{route('login')}}" method="POST">
        @csrf
        <label for="">Correo Electronico</label>
        <input type="email" name="email" id="email">
    <label for="">Contraseña</label>
    <input type="password" name="password" id="password">
    <button type="submit">Iniciar Sesion</button>
</form>

@endsection