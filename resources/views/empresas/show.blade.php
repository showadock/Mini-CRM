@extends('layouts.app')

@section('content')
<div class="container mx-auto bg-white p-3">
    <div class="row">
        <div class="col-md-4"> 
            <a href="{{ route('empresas.list') }}" class="btn btn-primary float-left mb-3"><i class="fas fa-reply"></i> Volver</a>
        </div>
        <div class="col-md-4"> 
            <h3 class="text-center mb-2">Datos de la empresa</h3>
        </div>
    </div>

    <form action="">
        <div class="row">
            <div class="col-md-2">
                <img src="/storage/{{ $empresas->imagen }}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-md-10">
                <div class="form-group">
                    <h3 class="font-weight-bold">{{$empresas->nombre}}</h3>
                </div>
                <div class="form-group">
                   <h5> Email: {{$empresas->email}}</h5>
                </div>
                <div class="form-group">
                    <h6>Sitio web: <a href="https://{{$empresas->web}}">{{$empresas->web}}</a></h6>
                </div>
                <div class="form-grou">
                    <h6>CUIT: {{$empresas->cuit}}</h6>
                </div>
            </div>
        </div>
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
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>
</div>
</div>

@endsection
