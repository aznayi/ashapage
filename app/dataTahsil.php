<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataTahsil extends Model
{
    protected $fillable=[
        'user_id','maqta','reshte','daneshgah','start_year','end_year'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
