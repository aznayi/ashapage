<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dore extends Model
{
    protected $fillable=[
        'user_id','dore','amuzeshgah','time','date'
    ];

    public function user(){
        return $this->belongsTo('App\user');
    }
}
