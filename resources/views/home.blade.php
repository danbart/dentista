@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Lista de Usuarios</div>

                <div class="panel-body">
                  @if(count($usuarios)>=1)
                  <?php $contador = 0; ?>
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Apellido</th>
                          <th scope="col">Telefono</th>
                          {{-- @if(  Auth::user()->role=='admin') --}}
                          <th scope="col">Actualizar</th>
                          <th scope="col">Citas</th>
                          <th scope="col">Eiminar</th>
                            {{-- @endif --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                          <th scope="row">{{ $contador+=1 }}</th>
                          <td>  {{$usuario->nombre }}</td>
                          <td>  {{$usuario->apellido }}</td>
                          <td>  {{$usuario->telefono }}</td>
                            {{-- @if(  Auth::user()->role=='admin') --}}
                          <td><a href="{{url('/editar-usuario/'.$usuario->id)}}" class="btn btn-sm btn-success">Actualizar</a> </td>
                          <td><a href="{{url('/lista-cita/'.$usuario->id)}}" class="btn btn-sm btn-primary">Citas</a> </td>
                          <td><a href="" class="btn btn-sm btn-danger">Eliminar</a> </td>
                            {{-- @endif --}}
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @else
                    <div class="alert alert-warning" role="alert">
                      No se encontraron datos
                    </div>
                  @endif
                    <div class="clearfix"></div>
                      {{$usuarios->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
