@extends('home')
@section('content')

<div class="container iran" style="max-width: 1200px;">
    @if(isset($data_shakhsi[0]))
        <div class="card">
            <div class="card-header border-blue"><label class="blue-label font-lg">اطلاعات شخصی</label></div>
            <div class="card-body font-lg" style="padding-right: 40px;">

                    <span>نام : </span>&nbsp;{{$data_shakhsi[0]['name']}} <br>
                    <span>نام خانوادگی : </span>&nbsp;{{$data_shakhsi[0]['family']}}<br>
                @if(isset($data_shakhsi[0]['birthday']))
                    <span>تاریخ تولد : </span>&nbsp;{{$data_shakhsi[0]['birthday']}}<br>
                @endif
                <span>وضعیت تاهل : </span>
                @if($data_shakhsi[0]['married']=='1')
                    <span>مجرد</span>
                @elseif($data_shakhsi[0]['married']=='2')
                    <span>متاهل</span>
                @endif
                <br>
                @if($data_shakhsi[0]['khedmat'] != '0')
                    <span>وضعیت نظام وظیفه : </span>
                    @if($data_shakhsi[0]['married']=='1')
                        <span>پایان خدمت دارم</span>
                    @elseif($data_shakhsi[0]['married']=='2')
                        <span>کارت معافیت دارم</span>
                    @elseif($data_shakhsi[0]['married']=='3')
                        <span>در حال خدمت هستم</span>
                    @elseif($data_shakhsi[0]['married']=='4')
                        <span>انجام نشده</span>
                    @endif
                    <br>
                @endif
                @if($data_shakhsi[0]['phone'] !='')
                    <span>شماره تماس : </span>
                    <span>{{$data_shakhsi[0]['phone']}}</span><br>
                @endif
                @if($data_shakhsi[0]['email'] !='')
                    <span>ایمیل : </span>
                    <span>{{$data_shakhsi[0]['email']}}</span><br>
                @endif
                @if($data_shakhsi[0]['address'] !='')
                    <span>نشانی محل سکونت : </span>
                    <span>{{$data_shakhsi[0]['address']}}</span><br>
                @endif
            </div>
        </div>

    @endif

        @if(isset($data_tahsily[0]))
            <div class="card" style="margin-top: 10px">
                <div class="card-header border-blue"><label class="blue-label font-lg">اطلاعات تحصیلی</label></div>
                <div class="card-body font-lg" style="padding-right: 40px;">
                    @foreach($data_tahsily as $madrak)
                        @if($madrak['maqta']=='1')
                            <span>کاردانی </span>
                        @elseif($madrak['maqta']=='2')
                            <span>کارشناسی </span>
                        @elseif($madrak['maqta']=='3')
                            <span>کارشناسی ارشد </span>
                        @elseif($madrak['maqta']=='4')
                            <span>دکترا </span>
                        @endif
                        <b>{{$madrak['reshte']}}</b>
                        <span> - دانشگاه </span>
                        {{$madrak['daneshgah']}}
                        <span> - از سال </span>
                        {{$madrak['start_year']}}
                        <span> تا سال </span>
                        {{$madrak['end_year']}}
                        <br><br>
                    @endforeach
                </div>
            </div>
        @endif
        @if(isset($data_dore[0]))
            <div class="card" style="margin-top: 10px">
                <div class="card-header border-blue"><label class="blue-label font-lg">دوره های آموزشی</label></div>
                <div class="card-body font-lg" style="padding-right: 40px;">
                    @foreach($data_dore as $madrak)
                        <span><b>{{$madrak['dore']}}</b></span>
                        <br>
                        <span>آموزشگاه : {{$madrak['amuzeshgah']}}</span>
                        <br>
                        <span>به مدت {{$madrak['time']}} ساعت</span>
                        <br>
                        <span>سال اخذ مدرک : {{$madrak['date']}}</span>
                        <br><br>
                    @endforeach
                </div>
            </div>
        @endif
        @if(isset($data_takmily[0]))
            @foreach($data_takmily as $data)
                @if($data['type']=='1')
                    <div class="card" style="margin-top: 10px">
                        <div class="card-header border-blue"><label class="blue-label font-lg">زبان های خارجه</label>
                        </div>
                        <div class="card-body font-lg" style="padding-right: 40px;">
                            @foreach($data_takmily as $data)
                                @if($data['type']=='1')
                                    <span style="font-size: 12pt"><b>{{$data['name']}}</b></span>
                                    <span>- میزان مهارت : {{$data['maharat']}}</span>
                                    <br>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @break
                @endif
            @endforeach
                @foreach($data_takmily as $data)
                    @if($data['type']=='2')
                        <div class="card" style="margin-top: 10px">
                            <div class="card-header border-blue"><label class="blue-label font-lg">سایر مهارت ها</label>
                            </div>
                            <div class="card-body font-lg" style="padding-right: 40px;">
                                @foreach($data_takmily as $data)
                                    @if($data['type']=='2')
                                        <span style="font-size: 12pt"><b>{{$data['name']}}</b></span>
                                        <span>- میزان مهارت : {{$data['maharat']}}</span>
                                        <br>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @break
                    @endif
                @endforeach
        @endif
        @if(isset($data_work[0]))
            <div class="card" style="margin-top: 10px">
                <div class="card-header border-blue"><label class="blue-label font-lg">پیشینه شغلی</label></div>
                <div class="card-body font-lg" style="padding-right: 40px;">
                    @foreach($data_work as $data)
                        <span>عنوان شغل : </span>
                        <span><b>{{$data['job']}}</b></span>
                        <br>
                        <span>نام شکرت : </span>
                        <span>{{$data['company']}}</span>
                        <br>
                        <span>محل کار : </span>
                        <span>{{$data['country']}} - {{$data['city']}}</span>
                        <br>
                        <span>شرح وضایف من در این شکرت :</span>
                        <span class="font-sm">{{$data['job_comment']}}</span>
                        <br>
                        <span>زمینه کاری شرکت :</span>
                        <span class="font-sm">{{$data['company_comment']}}</span>
                        <br><br>
                    @endforeach
                </div>
            </div>
        @endif
        @if(isset($data_about[0]))

            <div class="card" style="margin-top: 10px">
                <div class="card-header border-blue"><label class="blue-label font-lg">درباره من</label></div>
                <div class="card-body font-lg" style="padding-right: 40px;">
                    <?php echo $data_about[0]['about_me'] ?>
                </div>
            </div>
        @endif

        <br><br>
        <div style="text-align: center">
            <span style="font-size: 8pt;">با اسکن نمودن بارکد زیر می توانید به صورت آنلاین رزومه AshaPage من را مشاهده کنید</span>
            <br>
            <?php
            $barkod_text=config('global.hostname').'resume/'.$username;
            echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG("$barkod_text", "QRCODE") . '" alt="barcode"/>';
            ?>
            <br><br>
            <span style="font-size: 10pt;">صفحه من در AshaPage</span>
            <br>
            <a href="{{$barkod_text}}">{{$barkod_text}}</a>

        </div>
</div>

@endsection