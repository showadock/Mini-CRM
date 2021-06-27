@extends('layouts.app')

@section('content')



<div class="container mx-auto bg-white p-3">
    <div class="row">
        <div class="col-md-10 ">
            <h3 class="text-center mb-2">Nueva empresa</h3>
            <a href="{{ route('empresas.list') }}" class="btn btn-primary float-left mb-3"><i class="fas fa-reply"></i> Volver</a>
        </div>  
    </div>                 

    <div class="row justify-content-center  mt-5">
    <div class="col-md-8">
            <form method="POST" action="{{ route('empresas.store') }}" enctype="multipart/form-data" novalidate>
            @csrf
                <div class="form-group ">
                    <label for="nombre">Nombre</label>
                    <input type="text"
                            name="nombre"
                            class="form-control  @error('nombre') is-invalid @enderror"
                            id="nombre"
                            placeholder="Nombre de la empresa"
                            value="{{ old('nombre')}}">
                </div>
                @error('nombre')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            placeholder="Email"
                            value="{{ old('email')}}">
                </div>
                @error('email')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror

                <div class="form-group">
                    <label for="web">Sitio web</label>
                    <input type="text"
                            name="web"
                            class="form-control  @error('web') is-invalid @enderror"
                            id="web"
                            placeholder="Sitio web"
                            value="{{ old('web')}}">
                </div>
                @error('web')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror
                
                <!-- CUIT -->
                <div class="form-group">
                    <label for="cuit">CUIT</label>
                    <input type="text"
                            name="cuit"
                            class="form-control  @error('cuit') is-invalid @enderror"
                            id="cuit"
                            placeholder="Nro. de CUIT"
                            value="{{ old('cuit')}}">
                </div>
                @error('cuit')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror

                <!-- IMAGEN -->
                <div class="form-group">
                    <label for="imagen">Logotipo</label>
                    
                    <input  class="form-control  @error('imagen') is-invalid @enderror"
                            id="imagen" 
                            type="file"
                            name="imagen"
                            >
                </div>

                @error('imagen')
                <span class="invalid-feedback d-block mb-2" role="alert">
                    <b>{{$message}}</b>
                </span>
                @enderror

                <div class="form-group">
                    <input type="submit" value="Guardar">
                </div>
            </form>
    </div>
    </div> 
</div>   

@endsection
