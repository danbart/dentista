<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests;
use App\User;
use App\citas;

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
      if($user->role=='admin'|| $user->id==$user_id){
      $validateUser = $this->validate($request, [
        'name' => 'required|max:100',
        'surname' => 'required|max:100',
        'ntelefono' => 'required|max:15',
        'direccion' => 'required|max:255'
      ]);

      $usuario = User::findOrFail($user_id);
      $usuario->nombre = $request->input('name');
      $usuario->apellido = $request->input('surname');
      $usuario->email = $request->input('email');
      $usuario->telefono = $request->input('ntelefono');
      $usuario->direccion = $request->input('direccion');

      if($user->role == "admin"){
        $usuario->role = $request->input('tipousuario');
      }

      if($user->role = 'admin'){
      if($request->input('alta_usuarios')){
        if(!$usuario->alta_usuario){
          $usuario->alta_usuario =  new \DateTime("now");
        }
      }else{
          $usuario->alta_usuario = null;
      }
      if($request->input('baja_usuarios')){
        if(!$usuario->baja_usuario){
          $usuario->baja_usuario =  new \DateTime("now");
        }
        }else{
          $usuario->baja_usuario = null;
      }
    }
      $usuario->update();

      return redirect('/home')->with(array('message' => 'El usuario se ha actualizado correctamente'));
    }else{
      return redirect('/');
    }

    }

    public function regUserAdmin(){
      // 'nombre' => $data['name'],
      // 'apellido' => $data['surname'],
      // 'telefono' => $data['ntelefono'],
      // 'direccion' => $data['direccion'],
      // 'email' => $data['email'],
      // 'password' => bcrypt($data['password']),

      $user = \Auth::user();
        if($user->role=='admin'){
          return view('auth.regAdmin');
        }
    }

    public function regUserAdminPost(Request $request){
      $user = \Auth::user();
      if($user->role=='admin'){
      $validateUser = $this->validate($request, [
        'name' => 'required|max:100',
        'surname' => 'required|max:100',
        'ntelefono' => 'required|max:15',
        'direccion' => 'required|max:255'
      ]);


      $usuario = new User();
      $usuario->nombre = $request->input('name');
      $usuario->apellido = $request->input('surname');
      $usuario->email = $request->input('email');
      $usuario->telefono = $request->input('ntelefono');
      $usuario->direccion = $request->input('direccion');
      $usuario->role = $request->input('tipousuario');
      $usuario->password = bcrypt($request->input('password'));

      $usuario->save();

      return redirect('/home')->with(array('message' => 'El usuario se ha actualizado correctamente'));
    }else{
      return redirect('/register');
    }
    }

    public function deleteUser($user_id){
      $user = \Auth::user();
      $allUser = User::whereRaw('role = "admin"');
      if($user->role=='admin' && count($allUser) >=1){
        $usuarios = User::findOrFail($user_id);
        $citas = citas::where('user_id', $user_id)->get();

        //eliminar los Comentarios
        if($citas && count($citas) >= 1){
          foreach($citas as $cita){
            $cita->delete();
          }
        }

        if(count($citas) == 0){
          $usuarios->delete();
          return redirect('/home')->with(array('message' => 'El usuario se ha eliminado correctamente'));
        }else {
          return redirect('/home')->with(array('message' => 'El las citas no se han eliminado'));
        }

      }else{
        return redirect('/home')->with(array('message' => 'El usuario no se ha eliminado'));
      }
    }

}
