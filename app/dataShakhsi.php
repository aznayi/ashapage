<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataShakhsi extends Model
{
    protected $fillable=[
        'user_id','name','family','gender','married','khedmat','birthday','phone','email','address'
    ];


  public function user() {
      return $this->belongsTo('App\User');
  }

}
