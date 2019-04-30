<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="direction: rtl;text-align: right;font-family: iran ">

<div style="width: 1200px;">
    @if(isset($data_shakhsi[0]['name']))
    <div style="border-top: 3px solid #448AFF;">
        <div style="padding: 10px;background-color: #448AFF;width: 90px;height: 20px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; ">
            <span style="color: #ECF3FF;font-size: 10pt;">اطلاعات شخصی</span>
        </div>
        <div style="width: 1080px;margin-top: 10px;margin-right: 110px; font-size: 10pt">
            @if(isset($data_shakhsi[0]['name']))
                <span>نام : </span>
                <span>{{$data_shakhsi[0]['name']}}</span>
            @endif
            <br>
            @if(isset($data_shakhsi[0]['family']))
                <span>نام خانوادگی : </span>
                <span>{{$data_shakhsi[0]['family']}}</span>
            @endif
                <br>
            @if(isset($data_shakhsi[0]['birthday']))
                <span>تاریخ تولد : </span>
                <span>{{$data_shakhsi[0]['birthday']}}</span>
            @endif
            <br>
                @if(isset($data_shakhsi[0]['married']))
                    <span>وضعیت تاهل : </span>
                @if($data_shakhsi[0]['married']=='1')
                    <span>مجرد</span>
                    @elseif($data_shakhsi[0]['married']=='2')
                        <span>متاهل</span>
                    @endif
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

                @if(isset($data_shakhsi[0]['phone']))
                    <span>شماره تماس : </span>
                    <span>{{$data_shakhsi[0]['phone']}}</span>
                @endif
                <br>
                @if(isset($data_shakhsi[0]['email']))
                    <span>ایمیل : </span>
                    <span>{{$data_shakhsi[0]['email']}}</span>
                @endif
                <br>
                @if(isset($data_shakhsi[0]['address']))
                    <span>نشانی محل سکونت : </span>
                    <span>{{$data_shakhsi[0]['address']}}</span>
                @endif
                <br>
        </div>
        <br>
    </div>
    @endif
    @if(isset($data_tahsily[0]))
    <div style="border-top: 3px solid #448AFF;">
        <div style="padding: 10px;background-color: #448AFF;width: 90px;height: 20px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; ">
            <span style="color: #ECF3FF;font-size: 10pt;">اطلاعات تحصیلی</span>
        </div>

        <div style="width: 1080px;margin-top: 10px;margin-right: 110px; font-size: 10pt">
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
            {{$madrak['reshte']}}
            <span> - دانشگاه </span>
                {{$madrak['daneshgah']}}
                <span> - از سال </span>
                {{$madrak['start_year']}}
                <span> تا سال </span>
                {{$madrak['end_year']}}
                <br>
            @endforeach
        </div>
    </div>
        <br>
    @endif
        @if(isset($data_dore[0]))
            <div style="border-top: 3px solid #448AFF;">
                <div style="padding: 10px;background-color: #448AFF;width: 100px;height: 20px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; ">
                    <span style="color: #ECF3FF;font-size: 10pt;">دوره های آموزشی</span>
                </div>

                <div style="width: 1080px;margin-top: 10px;margin-right: 110px; font-size: 10pt">
                    @foreach($data_dore as $madrak)
                        <span style="font-size: 12pt"><b>{{$madrak['dore']}}</b></span>
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
            <div style="border-top: 3px solid #448AFF;">
                <div style="padding: 10px;background-color: #448AFF;width: 100px;height: 20px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; ">
                    <span style="color: #ECF3FF;font-size: 10pt;">زبان های خارجه</span>
                </div>
                <div style="width: 1080px;margin-top: 10px;margin-right: 110px; font-size: 10pt">
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
            <br>
                @foreach($data_takmily as $data)
                    @if($data['type']=='2')
                        <div style="border-top: 3px solid #448AFF;">
                            <div style="padding: 10px;background-color: #448AFF;width: 100px;height: 20px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; ">
                                <span style="color: #ECF3FF;font-size: 10pt;">سایر مهارت ها</span>
                            </div>
                            <div style="width: 1080px;margin-top: 10px;margin-right: 110px; font-size: 10pt">
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
            <br>

        @endif

        @if(isset($data_work[0]))
            <div style="border-top: 3px solid #448AFF;">
                <div style="padding: 10px;background-color: #448AFF;width: 100px;height: 20px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; ">
                    <span style="color: #ECF3FF;font-size: 10pt;">پیشینه شغلی</span>
                </div>
                <div style="width: 1080px;margin-top: 10px;margin-right: 110px; font-size: 10pt">
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
                        <span>{{$data['job_comment']}}</span>
                        <br>
                        <span>زمینه کاری شرکت :</span>
                        <span>{{$data['company_comment']}}</span>
                        <br>

                    @endforeach
                </div>

            </div>
            <br>
        @endif
    @if(isset($data_about[0]))
            <div style="border-top: 3px solid #448AFF;">
                <div style="padding: 10px;background-color: #448AFF;width: 100px;height: 20px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px; ">
                    <span style="color: #ECF3FF;font-size: 10pt;">درباره من</span>
                </div>
                <div style="width: 1080px;margin-top: 10px;margin-right: 110px; font-size: 10pt">
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


</body>
</html>
