@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">Nuevo Cliente</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container-fluid">
                            <div class="row mb-3">
                                <div class="col">
                                    <form action="{{ route('clientes.store')  }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="apellidos" @error('apellidos') class="text-danger" @enderror>Apellidos</label>
                                                <input type="text" class="form-control @error('apellidos') border border-danger @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
                                                @error('apellidos')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="nombres" @error('nombres') class="text-danger" @enderror>Nombres</label>
                                                <input type="text" class="form-control @error('nombres') border border-danger @enderror" id="nombres" name="nombres" value="{{ old('nombres') }}">
                                                @error('nombres')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="cuit" @error('cuit') class="text-danger" @enderror>CUIT/CUIL <small>(Ej: 20123456781)</small></label>
                                                <input type="text" class="form-control @error('cuit') border border-danger @enderror" id="cuit" name="cuit" value="{{ old('cuit') }}">
                                                @error('cuit')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="direccion" @error('direccion') class="text-danger" @enderror>Dirección</label>
                                                <input type="text" class="form-control @error('direccion') border border-danger @enderror" id="direccion" name="direccion" value="{{ old('direccion') }}">
                                                @error('direccion')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="ciudad" @error('ciudad_id') class="text-danger" @enderror>Ciudad</label>
                                                <select class="form-control @error('ciudad_id') border border-danger @enderror" id="ciudad" name="ciudad_id">
                                                    <option value="">Seleccione una ciudad ...</option>
                                                    @foreach($ciudades as $index => $ciudad)
                                                        <option value="{{ $index }}" {{ old('ciudad_id') == $index ? 'selected' : '' }}>{{ $ciudad }}</option>
                                                    @endforeach
                                                </select>
                                                @error('ciudad_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="barrio" @error('barrio_id') class="text-danger" @enderror>Barrio</label>
                                                <select class="form-control @error('barrio_id') border border-danger @enderror" id="barrio" name="barrio_id">
                                                    <option value="">Seleccione un barrio ...</option>
                                                </select>
                                                @error('barrio_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="servicio @error('servicio_id') class="text-danger" @enderror">Servicio</label>
                                                <select class="form-control @error('servicio_id') border border-danger @enderror" id="servicio" name="servicio_id">
                                                    <option value="">Seleccione un servicio ...</option>
                                                    @foreach($servicios as $index => $servicio)
                                                        <option value="{{ $index }}" {{ old('servicio_id') == $index ? 'selected' : '' }}>{{ $servicio }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="estado-servicio">Estado Servicio</label>
                                                <select class="form-control" id="estado-servicio" name="estado_servicio">
                                                    <option value="0" {{ old('estado_servicio') == 0 ? 'selected' : '' }}>No Activo</option>
                                                    <option value="1" {{ old('estado_servicio') == 1 ? 'selected' : '' }}>Activo</option>
                                                </select>
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

@section('script')
    <script>
        $("document").ready(function (){

            //Tomo el valor inicial de ciudad al iniciar el Form
            const ciudad = $("#ciudad").val()

            if (ciudad !== '') {
                getBarrios(ciudad, {{ @old('barrio_id') }})
            }

            //Traigo los barrios de una ciudad
            function getBarrios(ciudad_id, old) {
                $.ajax({
                    url: "{{ route('barrios.get_by_ciudad') }}?ciudad_id="+ ciudad_id + "&old=" + old,
                    method: "GET",
                    success: function (data) {
                        $("#barrio").html(data.html)
                    }
                })
            }

            /**
             * Cada vez que cambio de ciudad recargo el combo barrios
             */
            $("#ciudad").change(function () {
                getBarrios($(this).val(), 0)
            });
        });
    </script>
@endsection
