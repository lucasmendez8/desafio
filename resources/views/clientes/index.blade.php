@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Clientes</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container-fluid">

                            <div class="row mb-3">
                                <div class="col">
                                    <a href="{{ route('clientes.create')  }}">
                                        <button class="btn btn-success">Agregar Cliente</button>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>CUIT/CUIL</th>
                                            <th>Dirección</th>
                                            <th>Barrio</th>
                                            <th>Ciudad</th>
                                            <th>Servicio</th>
                                            <th>Estado Servicio</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clientes as $cliente)
                                            <tr>
                                                <td>{{ $cliente->apellidos . ', ' . $cliente->nombres }}</td>
                                                <td>{{ $cliente->cuit }}</td>
                                                <td>{{ $cliente->direccion }}</td>
                                                <td>{{ $cliente->barrio->nombre }}</td>
                                                <td>{{ $cliente->ciudad->nombre }}</td>
                                                <td>{{ $cliente->servicio->nombre }}</td>
                                                <td>
                                                    @if($cliente->estado_servicio == 1)
                                                        Activo
                                                    @else
                                                        Inactivo
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('clientes.edit', ['cliente' => $cliente->id])  }}">
                                                        <button class="btn btn-success">Editar</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="row">
                <div class="col">
                    {!! $clientes->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
