<?php

namespace App\Http\Controllers;

use App\data_about;
use App\dataShakhsi;
use App\dataTahsil;
use App\dataTakmily;
use App\dataWork;
use App\dore;
use App\Http\Requests\data_shakhsi_request;
use App\Http\Requests\dataTahsilRequest;
use App\Http\Requests\dataWorkRequest;
use Illuminate\Http\Request;
use Alert;

class PanelController extends Controller
{



    public function index(){
        $pagenum='page2';
        $isupdate = dataShakhsi::where('user_id',auth()->user()->id)->get();
        if(isset($isupdate[0])){
            return view('user_profile.data_shakhsi',['pagenum'=>$pagenum,'datapanel'=>$isupdate]);
        }else{
            return view('user_profile.data_shakhsi',['pagenum'=>$pagenum,'datapanel'=>'notupdate']);
        }
    }


    public function setDataShakhsi(data_shakhsi_request $request){
        $isupdate = dataShakhsi::all()->where('user_id',auth()->user()->id);
        if(isset($isupdate[0])){
            $this->updateData($request);
        }else{

            $this->setData($request);
        }
        return redirect(route('step2'));
    }

    public function setData($request){
        dataShakhsi::create([
            'user_id'=>auth()->user()->id,
            'name' => $request['name'],
            'family' => $request['family'],
            'gender' => $request['gender'],
            'married' => $request['married'],
            'khedmat' => $request['khedmat'],
            'birthday' => $request['birthday'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'address' => $request['address']
        ]);
    }

    public function updateData($request){

        dataShakhsi::where('user_id',auth()->user()->id)->update([
            'name' => $request['name'],
            'family' => $request['family'],
            'gender' => $request['gender'],
            'married' => $request['married'],
            'khedmat' => $request['khedmat'],
            'birthday' => $request['birthday'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'address' => $request['address']
        ]);
    }

    function testform(Request $request){

        foreach ($request['testarray'] as $r){
            echo $r."</br>";
        }

    }

    public function viewTahsily(){
        $pagenum='page2';
        $dataTahsil = dataTahsil::all()->where('user_id',auth()->user()->id);
        return view('user_profile.data_tahsily',['pagenum'=>$pagenum,'dataTahsil'=>$dataTahsil]);
    }

    public function setDataTahsil(dataTahsilRequest $request){
    dataTahsil::create([
        'user_id'=>auth()->user()->id,
        'maqta'=>$request['maqta'],
        'reshte'=>$request['reshte'],
        'daneshgah'=>$request['daneshgah'],
        'start_year'=>$request['start_year'],
        'end_year'=>$request['end_year'],
    ]);
    return back();
}

    public function deleteDataTahsil(){
        dataTahsil::where('id',$_POST['id'])->delete();
}

    public function viewSabeqeShoqly(){
        $pagenum='page2';
        $dataWork = dataWork::all()->where('user_id',auth()->user()->id);
        return view('user_profile.data_sabeqe_shoqly',['pagenum'=>$pagenum,'dataWork'=>$dataWork]);
    }

    public function setDataWork(dataWorkRequest $request){
        dataWork::create([
            'user_id'=>auth()->user()->id,
            'job'=>$request['job'],
            'company'=>$request['company'],
            'country'=>$request['country'],
            'city'=>$request['city'],
            'job_comment'=>$request['job_comment'],
            'company_comment'=>$request['company_comment'],
            'start_at'=>$request['start_at'],
            'end_at'=>$request['end_at']
        ]);
        return back();
    }

    public function deleteDataWork(){
        dataWork::where('id',$_POST['id'])->delete();
    }

    public function viewTakmily(){
        $pagenum='page2';
        $data = dataTakmily::all()->where('user_id',auth()->user()->id);
        return view('user_profile.data_takmily',['pagenum'=>$pagenum,'dataTakmily'=>$data]);
    }

    public function setDataTakmily(){
        dataTakmily::create([
            'user_id'=>auth()->user()->id,
            'type'=>$_POST['type'],
            'name'=>$_POST['name'],
            'maharat'=>$_POST['maharat']
        ]);
    }

    public function deleteDataTakmily(){
        dataTakmily::where([
            ['user_id','=',auth()->user()->id],
            ['type','=',$_POST['type']],
            ['name','=',$_POST['name']],
            ['maharat','=',$_POST['maharat']]
        ])->delete();
        echo $_POST['type'].'/'.$_POST['name'].'/'.$_POST['maharat'];
    }

    public function viewTakmilyTwo(){
        $pagenum='page2';
        $data_dore = dore::all()->where('user_id',auth()->user()->id);
        $data_about_me = data_about::all()->where('user_id',auth()->user()->id);
        return view('user_profile.data_takmily_two',['pagenum'=>$pagenum,'data_dore'=>$data_dore,'data_user'=>$data_about_me]);
    }
    public function setDore(){
        dore::create([
            'user_id'=>auth()->user()->id,
            'dore'=>$_POST['dore'],
            'amuzeshgah'=>$_POST['amuzeshgah'],
            'time'=>$_POST['time'],
            'date'=>$_POST['date']
        ]);


    }

    public function deleteDore(){
        dore::where([
            ['user_id','=',auth()->user()->id],
            ['dore','=',$_POST['dore']],
            ['amuzeshgah','=',$_POST['amuzeshgah']],
            ['time','=',$_POST['time']],
            ['date','=',$_POST['date']]
        ])->delete();
    }

    public function about_me(Request $request){
        $last_data=data_about::all()->where('user_id',auth()->user()->id);
        if(isset($last_data[0])){
            data_about::where('user_id',auth()->user()->id)->update([
                'about_me'=>$request['about_me']
            ]);
        }else if ($request['about_me']==''){

        }else{
            data_about::create([
                'user_id'=>auth()->user()->id,
                'about_me'=>$request['about_me']
            ]);
        }
        Alert::message('رزومه شما ساخته شد.')->persistent('OK');
        return redirect('home');
    }
}
