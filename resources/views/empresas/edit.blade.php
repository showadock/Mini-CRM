@extends('layouts.app')

@section('content')
<div class="container mx-auto bg-white p-3">
    <div class="row">
        <div class="col-md-4"> 
            <a href="{{ route('empresas.list') }}" class="btn btn-primary float-left mb-3"><i class="fas fa-reply"></i> Volver</a>
        </div>
        <div class="col-md-4"> 
            <h3 class="text-center mb-2">Editar empresa</h3>
        </div>
    </div>

    <form method="POST" action="{{ route('empresas.update', ['empresas' => $empresas->id] ) }}" enctype="multipart/form-data">
        @csrf

        @method('PUT')
        <div class="row">
    
            <div class="col-md-4">
                <img src="/storage/{{ $empresas->imagen }}" alt="..." class="img-thumbnail">
            </div>
        
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre">Nombre de la empresa</label>
                    <input  type="text" 
                            value="{{$empresas->nombre}}" 
                            name="nombre"
                            id="nombre"
                            class="form-control @error('nombre') is-invalid @enderror">
                </div>
                @error('nombre')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror

                <div class="form-group">
                    <label for="nombre">Email</label>
                    <input  type="email" 
                            value="{{$empresas->email}}" 
                            name="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror">
                </div>
                @error('email')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="web">Sitio web</label>
                    <input  type="text" 
                            name="web"
                            id="web"
                            value="{{$empresas->web}}" 
                            class="form-control @error('web') is-invalid @enderror">
                </div>
                @error('web')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror

                <div class="form-group">
                    <label for="cuit">CUIT</label>
                    <input  type="text" 
                            value="{{$empresas->cuit}}" 
                            class="form-control @error('cuit') is-invalid @enderror"
                            name="cuit"
                            id="cuit">
                </div>
                @error('cuit')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror
            </div>
            
        </div>

        <div class="row mt-3">
            <div class="col-md-3">
                <input  type="file"
                        name="imagen"
                        id="imagen">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <input type="submit" class="btn btn-success" value="Guardar cambios">
                </div>
            </div>
        </div>
        
        @if(session('response'))
            <div class="row alert alert-success mt-4" role="alert">
                {{session('response')}}
            </div>
        @endif
       
    </form>
</div>



<div class="container mx-auto bg-white p-3 mt-5">

    <div class="row">
        <h4 class="text-center col-md-12">Empleados trabajando aquí</h4>
    </div>
    <div class="row">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nro. Legajo</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Puesto</th>
      <th scope="col">Fecha de alta</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    
  </tbody>
</table>
</div>
</div>



@endsection
