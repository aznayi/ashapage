<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\registerRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }


    public function create(registerRequest $request)
    {
        User::create([
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);
        Alert::message('ثبت نام شما با موفقت انجام شد')->persistent('OK');

        Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);

       return redirect('/');

    }
    public function showRegistrationForm()
    {
        $pagenum='';
        return view('register.register',compact('pagenum'));
    }



}
