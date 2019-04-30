<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataTakmily extends Model
{
    protected $fillable=[
        'user_id','type','name','maharat'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
