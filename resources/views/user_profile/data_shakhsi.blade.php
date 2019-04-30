@extends('home')
@section('content')

    <div class="container" style="max-width: 1200px">
        @if( count( $errors ) > 0 )
            <ul class="alert alert-danger iran font-md">
                @foreach( $errors -> all()  as  $error )
                    <li> * {{ $error }}  </li>
                @endforeach
            </ul>
        @endif
       <?php

                $update=true;
                if ($datapanel =='notupdate'){
                    $update=false;
                }


                ?>
        <form class="iran" method="post" action="{{route('setShakhsi')}}">
            {{csrf_field()}}
            <div class="card border-blue">
                <div class="card-header border-blue back-blue">
                    <label class="blue-label font-lg">
                        فرم اطلاعات شخصی
                    </label>
                    <span class="font-sm">(اطلاعات وارد شده در این فرم جهت نمایش در رزومه شما استفاده میشود. لذا در تکمیل آنها دقت نمایید.)</span>
                </div>
                <div class="card-body font-md">

                    <div class="row" style="margin-bottom: 10px; ">
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <label class="blue-label col-sm-12 col-md-4" for="name">نام</label>
                                <input type="text" name="name" id="name" class="border-blue border1 rounded col-sm-12 col-md-6" value="@if($update==true){{$datapanel[0]['name']}}@else{{old('name')}}@endif">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                            <label class="blue-label col-sm-12 col-md-4" for="family">نام خانوادگی</label>
                            <input type="text" name="family" id="family" class="border-blue border1 rounded col-sm-12 col-md-6" value="@if($update==true){{$datapanel[0]['family']}}@else{{old('family')}}@endif">
                            </div>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                        <label class="blue-label col-sm-4" >جنسیت</label>
                                <div class="col-sm-6">
                        <label>مرد</label>
                        <input type="radio" name="gender" id="gender" value="1" @if($update==true) @if($datapanel[0]['gender']==1) checked @endif @endif>
                        <label style="margin-right: 5px">زن</label>
                        <input type="radio" name="gender" id="gender" value="2" @if($update==true) @if($datapanel[0]['gender']==2) checked @endif @endif>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <label class="blue-label col-sm-4">وضعیت تاهل</label>
                                <div class="col-sm-6" >
                                    <label>مجرد</label>
                                    <input type="radio" name="married" id="married" value="1"
                                           @if($update==true) @if($datapanel[0]['married']==1) checked @endif @endif>
                                    <label style="margin-right: 5px">متاهل</label>
                                    <input type="radio" name="married" id="married" value="2"
                                           @if($update==true) @if($datapanel[0]['married']==2) checked @endif @endif>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <label class="blue-label col-sm-12 col-md-4" style="margin-top: 10px">وضعیت خدمت</label>
                                <select name="khedmat" id="khedmat" class="border-blue rounded col-sm-12 col-md-6" style="height: 30px;">
                                    <option value="0">--</option>
                                    <option value="1"
                                            @if($update==true) @if($datapanel[0]['khedmat']==1) selected @endif @endif>
                                        پایان خدمت دارم
                                    </option>
                                    <option value="2"
                                            @if($update==true) @if($datapanel[0]['khedmat']==2) selected @endif @endif>
                                        کارت معافیت دارم
                                    </option>
                                    <option value="3"
                                            @if($update==true) @if($datapanel[0]['khedmat']==3) selected @endif @endif>
                                        در حال خدمت هستم
                                    </option>
                                    <option value="4"
                                            @if($update==true) @if($datapanel[0]['khedmat']==4) selected @endif @endif>
                                        انجام نشده
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                    <label class="blue-label col-sm-12 col-md-4">شماره تماس</label>
                                    <input type="text" name="phone" id="phone" maxlength="11" class="border-blue border1 rounded col-sm-12 col-md-6" value="@if($update==true){{$datapanel[0]['phone']}}@else{{old('phone')}}@endif">
                            </div>

                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                                <label class="blue-label col-sm-12 col-md-4">تاریخ تولد</label>
                                <input name="birthday" id="birthday" class="col-sm-12 col-md-6 border-blue border1 rounded"
                                       @if($update==true) value="{{$datapanel[0]['birthday']}}" @endif>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="row">
                            <label class="blue-label col-sm-12 col-md-4">ایمیل</label>
                            <input type="email" name="email" id="email" class="border-blue border1 rounded col-sm-12 col-md-6" value="@if($update==true){{$datapanel[0]['email']}}@else{{old('email')}}@endif">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="blue-label col-sm-12 col-md-2">نشانی محل سکونت</label>
                        <input type="text" name="address" id="address" class="border-blue border1 rounded col-sm-12 col-md-9" value="@if($update==true){{$datapanel[0]['address']}}@else{{old('email')}}@endif">


                    </div>
                    <input type="submit" value="ثبت و ادامه" class="rounded" style="background-color: #448AFF; color: #ECF3FF; width: 100px; ">

                </div>
            </div>

        </form>

        <div class="row" style="margin: 10px auto">
            <div class="d-sm-none d-md-block col-md-2 step select" ></div>
            <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
            <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
            <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
            <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
        </div>


    </div>

    <script>
        $('#birthday').persianDatepicker();
    </script>

@endsection