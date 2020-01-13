@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">Editar Perfil</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="container">
                            <div class="row mb-3">
                                <div class="col">
                                    <form action="{{ route('perfil.update', $user->id)  }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="name">Nombre</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" >
                                            </div>
                                        </div>

                                        <div class="form-row">

                                            <img width="100px" @if($user->avatar == '') src="{{ asset('avatars/user.png') }}" @else src="{{ asset('storage/avatars/'.$user->avatar) }}" @endif />

                                            <div class="form-group col-6">
                                                <label for="avatar">Avatar</label>
                                                <input type="file" class="form-control-file" id="avatar" name="avatar" value="{{old('avatar')}}">
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
