@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Cita para: {{$usuarios->nombre.' '.$usuarios->apellido}}</div>

                <div class="panel-body">
                  <form  action="" method="post">
                    <input type="hidden" name="user_id" value="{{$usuarios->id}}">
                    <label for="datecita">Fecha de Cita</label>
                    <input type="date" class="form-control" name="datecita" value="">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" class="form-control"></textarea>
                    <label for="costcita">Costo</label>
                    <input type="text" name="costcita" value="" class="form-control">
                    <br>
                    <input type="submit" name="" value="Crear" class="btn btn-primary ">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
