@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">Editar Servicio - {{ $servicio->nombre }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container-fluid">
                            <div class="row mb-3">
                                <div class="col">
                                    <form action="{{ route('servicios.update', $servicio->id)  }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="nombre" @error('nombre') class="text-danger" @enderror>Nombre</label>
                                                <input type="text" class="form-control @error('nombre') border border-danger @enderror" id="nombre" name="nombre" value="{{ old('nombre', $servicio->nombre)  }}">
                                                @error('nombre')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success float-right">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
