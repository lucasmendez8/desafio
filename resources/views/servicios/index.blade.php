@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Servicios</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container-fluid">

                            <div class="row mb-3">
                                <div class="col">
                                    <a href="{{ route('servicios.create')  }}">
                                        <button class="btn btn-success">Agregar Servicio</button>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($servicios as $servicio)
                                            <tr>
                                                <td>{{ $servicio->nombre }}</td>
                                                <td>
                                                    <a class="float-left mr-2" href="{{ route('servicios.edit', ['servicio' => $servicio->id])  }}">
                                                        <button class="btn btn-success">Editar</button>
                                                    </a>
                                                    <form action="{{ route('servicios.destroy', ['servicio' => $servicio->id]) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                                    </form>
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
                    {!! $servicios->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
