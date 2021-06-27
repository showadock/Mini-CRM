@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  


                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('empresas.list') }}"><button type="button" class="btn btn-info w-100"><i class="fas fa-landmark"></i> Empresas</button></a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('empleados.list') }}"><button type="button" class="btn btn-info w-100"><i class="fas fa-user-friends"></i> Empleados</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
