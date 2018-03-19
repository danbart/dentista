<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\citas;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = \Auth::user();
      if($user->role == 'admin'){
        $usuarios = User::orderBy('id', 'desc')->paginate(10);
        return view('home', array(
          'usuarios' => $usuarios
        ));
      }else{
        return redirect('/lista-cita/'.$user->id);
      }
    }

}
