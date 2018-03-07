<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'users';

    protected $fillable = [
        'role', 'nombre', 'apellido', 'email', 'password', 'telefono', 'direccion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function citas(){
      return $this->hasMany('App\citas');
      //hasOne --- es de uno a uno
    }
}
