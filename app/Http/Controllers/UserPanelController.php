<?php

namespace App\Http\Controllers;

use App\data_about;
use App\dataShakhsi;
use App\dataTahsil;
use App\dataTakmily;
use App\dataWork;
use App\dore;
use App\User;
use Illuminate\Http\Request;
use Alert;
use PDF;

class UserPanelController extends Controller
{
    public function index(){
        return view('panel.panel');
    }
    public function downloadResume(Request $request){
        $data_resume= User::where('username',$request['username'])->get();
        if (isset($data_resume[0])) {
            $user_id=$data_resume[0]['id'];
            $data_shakhsi=dataShakhsi::where('user_id',$user_id)->get();
            $data_tahsily=dataTahsil::where('user_id',$user_id)->get();
            $data_takmily=dataTakmily::where('user_id',$user_id)->get();
            $data_work=dataWork::where('user_id',$user_id)->get();
            $data_dore=dore::where('user_id',$user_id)->get();
            $data_about=data_about::where('user_id',$user_id)->get();

            $data=[
                'foo'=>'bar',
                'data_shakhsi'=>$data_shakhsi,
                'data_tahsily'=>$data_tahsily,
                'data_takmily'=>$data_takmily,
                'data_work'=>$data_work,
                'data_dore'=>$data_dore,
                'data_about'=>$data_about,
                'username'=>$request['username']
            ];
            $pdf = PDF::loadView('panel.download_resume', $data);
            return $pdf->stream('document.pdf');

//           return view('panel.resume', $data);
        }else{
            alert()->error('رزومه ای یافت نشد. لطفا لینک رزومه را بررسی نمایید')->persistent('OK');
            return redirect('/');
        }
    }
    public function showResume(Request $request){
        $data_resume= User::where('username',$request['username'])->get();
        if (isset($data_resume[0])) {
            $user_id = $data_resume[0]['id'];
            $data_shakhsi = dataShakhsi::where('user_id', $user_id)->get();
            $data_tahsily = dataTahsil::where('user_id', $user_id)->get();
            $data_takmily = dataTakmily::where('user_id', $user_id)->get();
            $data_work = dataWork::where('user_id', $user_id)->get();
            $data_dore = dore::where('user_id', $user_id)->get();
            $data_about = data_about::where('user_id', $user_id)->get();

            $data = [
                'foo' => 'bar',
                'data_shakhsi' => $data_shakhsi,
                'data_tahsily' => $data_tahsily,
                'data_takmily' => $data_takmily,
                'data_work' => $data_work,
                'data_dore' => $data_dore,
                'data_about' => $data_about,
                'username' => $request['username']
            ];
            return view('panel.show_resume', $data);
        }else{
            $error_text='رزومه ای با این آدرس یافت نشد. لطفا لینک رزومه را بررسی نمایید';
            $error_tittle=config('global.hostname').'resume/'.$request['username'];
            alert()->error($error_text,$error_tittle)->persistent('OK');
            return redirect('/');
        }
    }
}
