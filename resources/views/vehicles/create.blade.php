@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Crear Registro</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('inout.store')}}">
                        @csrf
                        <div class="form-row justify-content-center">
                            <div class="col-md-10 mb-3">
                              <label for="validationDefault01">Fecha</label>
                              <input type="date" class="form-control" format="Y-m-d H:i:s" name="date" required>
                            </div>
                            <div class="col-md-10 mb-3">
                              <label for="validationDefault01">Tipo</label>
                              <select name="type" class="form-control">
                                <option value="in">Entrada</option>
                                <option value="out">Salida</option>
                              </select>
                            </div>
                            <div class="col-md-5 mb-3">
                              <label for="validationDefault01">Conductor</label>
                              <select class="form-control" name="user_id" required>
                                @foreach(\App\User::cursor() as $user)
                                  <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-md-5 mb-3">
                              <label for="validationDefault01">Vehiculo</label>
                              <select class="form-control" name="vehicle_id" required>
                                @foreach(\App\Vehicle::cursor() as $vh)
                                  <option value="{{$vh->id}}">{{$vh->plate}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{route('inout.index')}}" class="btn btn-secundary">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection