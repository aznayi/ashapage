<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_about extends Model
{
    protected $fillable=[
        'user_id','about_me'
    ];

    public function user(){
        return $this->belongsTo('App\user');
    }
}
