@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              @if(session('message'))
              <div class="alert alert-success">
               {{session('message')}}
             </div>
             @endif
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
                          <th scope="col">Actualizar</th>
                          <th scope="col">Citas</th>
                          <th scope="col">Eiminar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                          <th scope="row">{{ $contador+=1 }}</th>
                          <td>  {{$usuario->nombre }}</td>
                          <td>  {{$usuario->apellido }}</td>
                          <td>  {{$usuario->telefono }}</td>
                          <td><a href="{{url('/editar-usuario/'.$usuario->id)}}" class="btn btn-sm btn-success">Actualizar</a> </td>
                          @if($usuario->role!='admin')
                          @if($usuario->alta_usuario ==null)
                            @if($usuario->baja_usuario ==null)
                            <td><a href="{{url('/lista-cita/'.$usuario->id)}}" class="btn btn-sm btn-primary">Citas</a> </td>
                            @else
                            <td> <span class="label label-warning">Caso Incompleto</span> </td>
                            @endif
                            @else
                            <td> <span class="label label-info">Caso Concluido</span> </td>
                          @endif
                          @else
                            <td> <span class="label label-primary">Administrador</span> </td>
                          @endif
                          <td><a href="{{url('delete-user/'.$usuario->id)}}" class="btn btn-sm btn-danger">Eliminar</a> </td>
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
