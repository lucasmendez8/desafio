@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ciudades</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container-fluid">

                            <div class="row mb-3">
                                <div class="col">
                                    <a href="{{ route('ciudades.create')  }}">
                                        <button class="btn btn-success">Agregar Ciudades</button>
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
                                        @foreach($ciudades as $ciudad)
                                            <tr>
                                                <td>{{ $ciudad->nombre }}</td>
                                                <td>
                                                    <a class="float-left mr-2" href="{{ route('ciudades.edit', $ciudad->id) }}">
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
                    {!! $ciudades->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
