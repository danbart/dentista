@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar cita: {{$cita->descripcion}}</div>

                <div class="panel-body">
                  <form  action="{{ url('/update-cita')}}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="user_id" value="{{$cita->id}}">
                    <label for="datecita">Fecha de Cita</label>
                    <?php $date->setToStringFormat($cita->consulta); ?>
                    <input type="datetime-local" class="form-control" name="datecita" value="{{$date->format('Y-m-d\TH:i')}}">
                    @if ($errors->has('datecita'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datecita') }}</strong>
                        </span>
                    @endif
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" class="form-control">{{$cita->descripcion}}</textarea>
                    @if ($errors->has('descripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @endif
                    <label for="costcita">Costo</label>
                    <input type="text" name="costcita" value="{{$cita->costo_cita}}" class="form-control">
                    @if ($errors->has('costcita'))
                        <span class="help-block">
                            <strong>{{ $errors->first('costcita') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input type="submit" value="Actualizar" class="btn btn-primary ">
                    <a href="{{url('/lista-cita/'.$cita->user_id)}}" class="btn btn-danger">Cancelar</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
