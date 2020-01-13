@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Barrios</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container-fluid">

                            <div class="row mb-3">
                                <div class="col">
                                    <a href="{{ route('barrios.create')  }}">
                                        <button class="btn btn-success">Agregar Barrio</button>
                                    </a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Ciudad</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($barrios as $barrio)
                                            <tr>
                                                <td>{{ $barrio->nombre }}</td>
                                                <td>{{ $barrio->ciudad->nombre }}</td>
                                                <td>
                                                    <a class="float-left mr-2" href="{{ route('barrios.edit', ['barrio' => $barrio->id])  }}">
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
                    {!! $barrios->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
