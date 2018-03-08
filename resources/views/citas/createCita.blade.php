@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Cita para: {{$usuarios->nombre.' '.$usuarios->apellido}}</div>

                <div class="panel-body">
                  <form  action="{{ url('/create-cita')}}" method="POST">
                      {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{$usuarios->id}}">
                    <label for="datecita">Fecha de Cita</label>

                    <input type="date" class="form-control" name="datecita" value="{{old('datecita')}}">
                    @if ($errors->has('datecita'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datecita') }}</strong>
                        </span>
                    @endif
                    <label for="timecita">Hora de Cita</label>
                    <input type="time" class="form-control" name="timecita" value="{{old('timecita')}}">
                    @if ($errors->has('timecita'))
                        <span class="help-block">
                            <strong>{{ $errors->first('timecita') }}</strong>
                        </span>
                    @endif
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" class="form-control">{{old('descripcion')}}</textarea>
                    @if ($errors->has('descripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('descripcion') }}</strong>
                        </span>
                    @endif
                    <label for="costcita">Costo</label>
                    <input type="text" name="costcita" value="{{old('costcita')}}" class="form-control">
                    @if ($errors->has('costcita'))
                        <span class="help-block">
                            <strong>{{ $errors->first('costcita') }}</strong>
                        </span>
                    @endif
                    <br>
                    <input type="submit" value="Crear" class="btn btn-primary ">
                    <a href="{{url('/lista-cita/'.$usuarios->id)}}" class="btn btn-danger">Cancelar</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
