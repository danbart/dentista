<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class citas extends Model
{
    //
    protected  $table = 'citas';
    //indica la relacion de las tablas
    public function user(){
      return $this->belongsTo('App\User', 'users_id');
    }

}
