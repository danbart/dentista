<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests;
use App\User;
use App\cita;

class UserController extends Controller
{
    //
    public function index(){
      $user = \Auth::user();
      if($user->role != 'admin'|| $user->id==$user_id){
        $usuarios = User::orderBy('id', 'desc')->paginate(10);
        return view('home', array(
          'usuarios' => $usuarios
        ));
      }else{
        return redirect('/');
      }
    }

    public function userEdit($user_id){
      $user = \Auth::user();
      if($user->role=='admin'||$user->id==$user_id){
        $usuario = User::findOrFail($user_id);
        return view('auth.editProfile',array(
          'usuario' => $usuario
        ));
      }else{
        return redirect('/');
      }
    }

    public function UpdateUser($user_id, Request $request){
      $user = \Auth::user();
      if($user->role=='admin'||$user->id==$user_id){
      $validateUser = $this->validate($request, [
        'name' => 'required|max:100',
        'surname' => 'required|max:100',
        'ntelefono' => 'required|max:15',
        'direccion' => 'required|max:255',
        'tipousuario' => 'required'
      ]);

      $usuario = User::findOrFail($user_id);
      $usuario->role = $request->input('tipousuario');
      $usuario->nombre = $request->input('name');
      $usuario->apellido = $request->input('surname');
      $usuario->email = $request->input('email');
      $usuario->telefono = $request->input('ntelefono');
      $usuario->direccion = $request->input('direccion');

      if($request->input('alta_usuarios')){
        $usuario->alta_usuario =  new \DateTime("now");
      }else{
          $usuario->alta_usuario = null;
      }
      if($request->input('baja_usuarios')){
        $usuario->baja_usuario =  new \DateTime("now");
      }else{
          $usuario->baja_usuario = null;
      }

      $usuario->update();

      return redirect('/home')->with(array('message' => 'El usuario se ha actualizado correctamente'));
    }else{
      return redirect('/');
    }

    }

}
