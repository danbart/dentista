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
                <div class="panel-heading">Lista de citas</div>

                <div class="panel-body">
                  @if(count($citas)>=1)
                  <?php $contador = 0; ?>
                  <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Dia de Consulta</th>
                          <th scope="col">Paciente</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Costo Cita</th>
                          <th scope="col">Actualizar</th>
                          <th scope="col">Cancelar Cita</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($citas as $cita)
                        <tr>
                          <th scope="row">{{ $contador+=1 }}</th>
                          @if($cita->consulta !=null)
                          <td> {{$cita->consulta.' '.$cita->horacita }}</td>
                          @else
                          <td>La cita esta pendiente de fecha </td>
                          @endif
                          <td>  {{$cita->user->nombre.' '.$cita->user->apellido }}</td>
                          <td>  {{$cita->descripcion }}</td>
                          @if($cita->costo_cita != null)
                          <td>Q  {{$cita->costo_cita }}</td>
                          @else
                          <td>Pendiente</td>
                          @endif
                            @if(  Auth::user()->role=='admin')
                          <td><a href="{{url('/editar-cita/'.$cita->id)}}" class="btn btn-sm btn-success">Actualizar</a> </td>
                          @endif
                          {{-- @inject('service',App\Http\Controllers\CitasController)
                          @if(CitasController::dateTimeCancel($cita->consulta.' '.$cita->horacita)>=48) --}}
                          @if($cita->consulta !=null)
                          @if(\FormatTime::LongTimeFilter($cita->consulta,$cita->horacita)>48)
                          <td><a href="" class="btn btn-sm btn-danger">Cancelar</a> </td>
                          @else
                          <td><a href="" class="btn btn-sm btn-danger" disabled="disabled">Cancelar</a> </td>
                          @endif
                          @endif
                            {{-- @else
                            <dt>48 horas</dt>
                            @endif
                            @endif --}}
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @else
                    <div class="alert alert-warning" role="alert">
                      No se encontraron Citas
                    </div>
                  @endif
                  {{-- <hr>
                  <a href="{{url('/crear-cita/'.$usuarios->id)}}" class="btn btn-sm btn-primary">
                    Crear Cita
                  </a> --}}
                  <a href="{{url('/home')}}" class="btn btn-sm btn-danger">Atras</a>
                      <div class="clearfix"></div>
                    {{$citas->links()}}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
