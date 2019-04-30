
@extends('home')
@section('content')

    <style>
        form{
            width: 370px;
            margin: 0 auto;
            padding: 20px;
        }
        form label{
            font-family: iran;
            font-size: 10pt;
            color: #448AFF;
            width: 120px;
            display: inline-block;

        }
        form input{
            width: 190px;
            height: 30px;
            border-radius: 5px;
            border: 1px solid #cccccc;
            font-family: iran;
            font-size: 10pt;
            margin-bottom: 10px;
        }
        .submit{
            background: #448AFF ;
            font-size: 12pt;
        }
        form li{
            font-family: iran;
            font-size: 10pt;
        }
    </style>


<div class="continer" style="max-width: 1200px ;  background: #ECF3FF; margin: 0 auto;">


    <form method="post" action="{{ route('register') }}">
        {{csrf_field()}}

        @if( count( $errors ) > 0 )

            <ul class="alert alert-danger">
                @foreach( $errors -> all()  as  $error )
                    <li> * {{ $error }}  </li>
                @endforeach
            </ul>
        @endif

        <div class="row">
        <label for="name" class="col-sm-12 col-md-5">نام کاربری </label>
        <input  @if($errors -> has('username')) class="border border-danger rounded alert alert-danger col-sm-12 col-md-4" @else class="col-sm-12 col-md-6" @endif type="text"
               name="username" id="username" value="{{old('username')}}" required>
        </div>
        <div class="row">
        <label for="email" class="col-sm-12 col-md-5">ایمیل</label>
        <input @if($errors -> has('email')) class="border border-danger rounded alert alert-danger col-sm-12 col-md-4" @else class="col-sm-12 col-md-6" @endif dir="ltr"
               type="email" name="email" id="email" value="{{old('email')}}" required>
        </div>
        <div class="row">
        <label for="password" class="col-sm-12 col-md-5">رمز عبور</label>
        <input @if($errors -> has('password')) class="border border-danger rounded alert alert-danger col-sm-12 col-md-4" @else class="col-sm-12 col-md-6" @endif id="password" type="password" name="password" placeholder="حداقل 6 کاراکتر" required>
        </div>
        <div class="row">
        <label for="confirmed" class="col-sm-12 col-md-5">تکرار رمز عبور</label>
        <input @if($errors -> has('password-confirm')) class="border border-danger rounded alert alert-danger col-sm-12 col-md-4" @else class="col-sm-12 col-md-6" @endif id="password-confirm" type="password" name="password_confirmation" required>
        </div>
        <div class="row">
        <label for="sabt" class="col-sm-12 col-md-5"></label>
        <input type="submit" value="ثبت نام" name="sabt" class="submit col-sm-12 col-md-6">
        </div>

    </form>

</div>

@endsection