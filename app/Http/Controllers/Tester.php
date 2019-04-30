<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Tester extends Controller
{

    public function index(){
       if(isset($_FILES['myfile'])){
           $file=$_FILES['myfile'];
           $fileName=$file['name'];
           $fileSize=$file['size'];
           $fileTmp=$file['tmp_name'];
           $fileType=$file['type'];
           $ext = pathinfo($fileName, PATHINFO_EXTENSION);
       }
       echo 'Name = '.$fileName.'<br>';
       echo 'size = '.$fileSize.'<br>';
       echo 'tmp = '.$fileTmp.'<br>';
       echo 'type = '.$fileType.'<br>';
       echo 'ext = '.$ext.'<br>';
    }
}



