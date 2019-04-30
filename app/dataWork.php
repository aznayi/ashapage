<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataWork extends Model
{
    protected $fillable=[
        'user_id','job','company','country','city','job_comment','company_comment','start_at','end_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
