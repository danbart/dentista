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
      $user = \Auth::user();
        $usuarios = User::find($user_id);
  if($user->role=='admin'||$user->id==$user_id)
    if($usuarios->role!='admin'){
      return view('citas.createCita', array(
        'usuarios' => $usuarios
      ));
    }else{
      return redirect('/');
    }
}
    public function getCitas($user_id){
      $user = \Auth::user();
      if($user->role=='admin'||$user->id==$user_id){
      $usuarios = User::findOrFail($user_id);
      if($usuarios->role!='admin'){
      $date = Carbon::now('America/Guatemala');
      $citas = citas::where('user_id', $user_id)->where('consulta', '>=', date('Y-m-d'))->whereRaw('baja_consulta is null')->orderBy('consulta', 'asc')->orderBy('horacita', 'asc')->paginate(5);
      // $citas = citas::where('user_id = ? and consulta > ?', [$user_id, date('Y-m-d')])->orderBy('consulta', 'asc')->orderBy('horacita', 'asc')->paginate(5);

      return view('citas.listacitas', array(
        'citas' => $citas,
        'usuarios' => $usuarios,
        'date' => $date
      ));
      }else{
      return redirect('/');
    }
  }else{
  return redirect('/todas-citas');
}
    }

    public function saveCita(Request $request){
      $user = \Auth::user();
      $message = array(
        'message' => 'La cita no se ha creado '
      );
      $user_id = $request->input('user_id');
      if($user->role=='admin' || $user->id==$user_id ){
        $cita = new citas();
        if($user->role=='admin'){
          $validateData = $this->validate($request, [
            'datecita' => 'required',
            'descripcion' => 'required|max:255',
            'costcita' => 'required|max:30',
            'timecita' => 'required'
          ]);
          $cita->consulta = $request->input('datecita');
          $cita->horacita = $request->input('timecita');
          $cita->costo_cita = $request->input('costcita');
          $cita->user_id = $user_id;
          $cita->descripcion = $request->input('descripcion');
          $message = array(
            'message' => 'La cita se ha creado correctamente'
          );

        }else{
          $validateData = $this->validate($request, [
            'descripcion' => 'required|max:255'
          ]);
          $cita->user_id = $user_id;
          $cita->descripcion = $request->input('descripcion');
          $cita->consulta = date('Y-m-d');
          $message = array(
            'message' => 'La cita fue solicitada con exito'
          );
        }
        $cita->save();
        return redirect()->route('listCita',['user_id' => $cita->user_id])->with($message);
        }else{
        return redirect('/');
      }
    }

    public function editCita($cita_id){
      $user = \Auth::user();
      if($user->role=='admin' ){
      $cita = citas::findOrFail($cita_id);
      return view('citas.editCita', array(
       'cita'=> $cita
     ));
       }else{
       return redirect('/');
     }
    }

    public function updateCita($cita_id, Request $request){
      $user = \Auth::user();
      if($user->role=='admin' ){
      $validateData = $this->validate($request, [
        'datecita' => 'required',
        'descripcion' => 'required|max:255',
        'costcita' => 'required|max:30',
        'timecita' => 'required'
      ]);

      $cita = citas::findOrFail($cita_id);
      $cita->consulta = $request->input('datecita');
      $cita->horacita = $request->input('timecita');
      $cita->descripcion = $request->input('descripcion');
      $cita->costo_cita = $request->input('costcita');

      $cita->update();

      return redirect()->route('listCita', ['user_id' => $cita->user_id])->with(array('message' => 'La cita se ha actualizado'));
        }else{
        return redirect('/');
      }
    }

    public function dateTimeCancel($date_consult){
        $date = Carbon::now('America/Guatemala');
        $date_cons = Carbon::parse($date_consult);
        return $date->diffInHours($date_cons);
    }

    public function allCitas() {
      $user = \Auth::user();
      if($user->role=='admin'){
      $citas = citas::where('consulta','>=', date('Y-m-d'))->whereRaw('baja_consulta is null')->orderBy('consulta', 'asc')->orderBy('horacita', 'asc')->paginate(10);
      return view('citas.allcitas', array(
        'citas' => $citas,
      ));
      }else{
      return redirect('/home');
      }
    }

    public function cancelCitaCliente($cita_id){
      $cita = citas::findOrFail($cita_id);
      $cita->baja_consulta = new \DateTime("now");
      $cita->update();

      return redirect()->route('listCita', ['user_id' => $cita->user_id])->with(array('message' => 'La cita se ha Cancelado'));
    }

    public function cancelCita($cita_id){
      $cita = citas::findOrFail($cita_id);
      $cita->baja_consulta = new \DateTime("now");
      $cita->update();

      return redirect()->route('allCitas')->with(array('message' => 'La cita se ha Cancelado'));
    }

}
