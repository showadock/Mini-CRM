@extends('layouts.app')

@section('content')



<div class="container mx-auto bg-white p-3">
    <h3 class="text-center mb-2">Gestión de empleados</h3>
    <div>
        <a href="{{ route('home') }}" class="btn btn-dark float-left mb-3"><i class="fas fa-reply"></i> Volver</a>
        <a href="{{ route('empleados.create') }}" class="btn btn-success float-right mb-3"><i class="fas fa-plus-square"></i> Nuevo</a>
    </div>
   
    <div class="row mt-5">
        <div>
            @if(session('message'))
                <div class="alert alert-success mt-4" role="alert">
                    {{session('message')}}
                </div>
            @endif
        </div>
    </div>

    <table class="table">
   
        <thead class="bg-primary  text-light">
            <tr>
                <td>Nombre</td>
                <td>Email</td>
                <td>Logotipo</td>
                <td>Sitio web</td>
                <td>Modificar</td>
                <td>Eliminar</td>
            </tr>                          
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->email }}</td>
                <td><img width="30px" src="/storage/{{ $empleado->imagen }}" alt=""></td>
                <td><a href="https://{{ $empleado->web }}">{{ $empleado->web }}</a></td>
                <td>
                    <a href="{{ route('empleados.show', $empleado->id) }}" class="btn "><i class="fas fa-eye"></i></a>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn "><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <form action="{{route('empleados.destroy', ['empleados' => $empleado->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                        <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach


        </tbody>
       
    </table>
    {{ $empleados->links('pagination::bootstrap-4') }}
</div>                   
                
@endsection
