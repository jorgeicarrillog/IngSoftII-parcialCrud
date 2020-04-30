@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Ver Registro</div>

                <div class="card-body">
                    <p>Id: {{$item->id}}</p>
                    <p>Fecha: {{$item->date}}</p>
                    <p>Tipo: {{($item->type=='in'?'Entrada':'Salida')}}</p>
                    <p>Conductor: {{$item->user->name}}</p>
                    <p>Vehiculo: {{$item->vehicle->plate}}</p>
                    <a href="{{route('inout.index')}}" class="btn btn-primary pull-right">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection