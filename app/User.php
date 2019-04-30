<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password','username','type','confirm'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','confirm'
    ];


    public function dataShakhsi() {
        return $this->hasOne('app\dataShakhsi');
    }

    public function dataTahsil() {
        return $this->hasOne('app\dataTahsil');
    }
    public function dataWork() {
        return $this->hasOne('app\dataWork');
    }
    public function dataTakmily() {
        return $this->hasOne('app\dataTakmily');
    }
    public function dore(){
        return $this->hasOne('app\dore');
    }

    public function data_about(){
        return $this->hasOne('app\data_about');
    }
}
