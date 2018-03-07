<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests;
use App\User;
use App\citas;

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
      $citas = citas::where('id', $user_id)->orderBy('id', 'desc')->paginate(5);
        $usuarios = User::find($user_id);
      return view('citas.listacitas', array(
        'citas' => $citas,
        'usuarios' => $usuarios
      ));
    }
}
