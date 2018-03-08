<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests;
use App\User;
use App\citas;
use Carbon\Carbon;

class CitasController extends Controller
{
    //
    public function createCita($user_id){
        $usuarios = User::find($user_id);
      return view('citas.createCita', array(
        'usuarios' => $usuarios
      ));
    }

    public function getCitas($user_id){
      $date = Carbon::now('America/Guatemala');
      $citas = citas::where('user_id', $user_id)->orderBy('consulta', 'asc')->paginate(5);
        $usuarios = User::findOrFail($user_id);
      return view('citas.listacitas', array(
        'citas' => $citas,
        'usuarios' => $usuarios,
        'date' => $date
      ));
    }

    public function saveCita(Request $request){
      $validateData = $this->validate($request, [
        'datecita' => 'required',
        'descripcion' => 'required|max:255',
        'costcita' => 'required|max:30',
        'timecita' => 'required'
      ]);

      $cita = new citas();
      $user = \Auth::user();
      $cita->user_id = $request->input('user_id');
      $cita->consulta = $request->input('datecita');
      $cita->horacita = $request->input('timecita');
      $cita->descripcion = $request->input('descripcion');
      $cita->costo_cita = $request->input('costcita');

      $cita->save();
      return redirect()->route('listCita',['user_id' => $cita->user_id])->with(array(
        'message' => 'La cita se ha creado Correctamente'
      ));
    }

    public function editCita($cita_id){
      $cita = citas::findOrFail($cita_id);
      return view('citas.editCita', array(
       'cita'=> $cita
     ));
    }

    public function updateCita($cita_id, Request $request){
      $validateData = $this->validate($request, [
        'datecita' => 'required',
        'descripcion' => 'required|max:255',
        'costcita' => 'required|max:30',
        'timecita' => 'required'
      ]);

      $cita = citas::findOrFail($cita_id);
      $user = \Auth::user();
      $cita->consulta = $request->input('datecita');
      $cita->horacita = $request->input('timecita');
      $cita->descripcion = $request->input('descripcion');
      $cita->costo_cita = $request->input('costcita');

      $cita->update();

      return redirect()->route('listCita', ['user_id' => $cita->user_id])->with(array('message' => 'La cita se ha actualizado'));
    }

    public function dateTimeCancel($date_consult){
        $date = Carbon::now('America/Guatemala');
        $date_cons = Carbon::parse($date_consult);
        return $date->diffInHours($date_cons);
    }

}
