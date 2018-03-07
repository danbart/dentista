<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    //
    public function index(){
      $usuarios = User::orderBy('id', 'desc')->paginate(5);
      return view('home', array(
        'usuarios' => $usuarios
      ));
    }

    public function UpdateUser(){

    }
}
