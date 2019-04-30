@extends('home')
@section('content')

<div class="container iran" style="max-width: 1200px;">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 ">
            <div class="back-blue profile_item">
                <div style="width: 100%; height: 90px">
            <?php
                $barkod_text=config('global.hostname').'resume/'.auth()->user()->username;
                $barkod_download=config('global.hostname').'resume/download/'.auth()->user()->username;
            echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG("$barkod_text", "QRCODE") . '" alt="barcode"/>';
            ?>
                </div>
                <div style="width: 100%;height: 22px;">
                <span class="blue-label font-md">بارکد اختصاصی شما</span>
                </div>
                <p class="font-sm" style="text-align: justify">شما می توانید از طریق لینک زیر بارکد خود را دانلود کنید و از آن در جاهایی مانند کارت ویزیت خود استفاده نمایید. کاربران با اسکن نمودن این بارکد میتوانند رزومه شما را مشاهده نمایند</p>
                <a class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF;  border: 2px outset #cccccc; padding: 4px; cursor: pointer" href="<?php echo DNS2D::getBarcodePNGPath("$barkod_text", 'QRCODE',10,10); ?>" download >دریافت بارکد</a>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="back-blue profile_item" >
                <div style="width: 100%;height: 90px;">
                    <a class="font-sm" href="{{$barkod_text}}" style="padding-top: 20px;text-align: center;display:block">{{$barkod_text}}</a>
                </div>
                <div style="width: 100%;height: 22px;">
                    <span class="font-md blue-label">لینک رزومه شما</span>
                </div>
                <p class="font-sm" style="text-align: justify">شما میتوانید با استفاده از این لینک مستقیما وارد صفحه رزومه خود شده و یا با اشتراک گذاری این لینک کاربران را به صفحه خود هدایت نمایید.</p>

            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="back-blue profile_item" >
                <div style="width: 100%;height: 90px;">
                    <i style="width: 65px; height: 65px; background-position: -67px -81px; display: block; margin: 0 auto"></i>
                </div>
                <div style="width: 100%;height: 22px;">
<span class="blue-label font-md">ساخت و ویرایش رزومه</span>
                </div>
                <p class="font-sm" style="text-align: justify;">شما میتوانید باکلیک کردن بر روی دکمه زیر وارد صفحه ساخت و ویرایش رزومه شوید و رزومه خود را کامل نمایید.</p>
                <a class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF;  border: 2px outset #cccccc; padding: 4px; cursor: pointer" href="{{route('step1')}}">ساخت و ویرایش رزومه</a>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="back-blue profile_item">
                <div style="width: 100%;height: 90px;">
                    <i style="width: 65px; height: 65px; background-position: -338px -84px; display: block; margin: 0 auto"></i>
                </div>
                <div style="width: 100%;height: 22px;">
                    <span class="font-md blue-label">فایل pdf رزومه</span>
                </div>
                <p class="font-sm" style="text-align: justify;">با استفاده از لینک زیر میتوانید فایل PDF رزومه خود را دانلود نمایید</p>
                <a class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF;  border: 2px outset #cccccc; padding: 4px; cursor: pointer" href="{{$barkod_download}}">دانلود رزومه</a>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="back-blue profile_item">
                <div style="width: 100%;height: 90px;">
                    <i style="width: 65px; height: 65px; background-position: 0 -156px; display: block; margin: 0 auto"></i>
                </div>
                <div style="width: 100%;height: 22px;">
                    <span class="font-md blue-label">مشاهده رزومه</span>
                </div>
                <p class="font-sm" style="text-align: justify;">با استفاده از لینک زیر میتوانید رزومه آنلاین خود را مشاهده کنید.</p>
                <a class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF;  border: 2px outset #cccccc; padding: 4px; cursor: pointer" href="{{$barkod_text}}">مشاهده رزومه</a>
            </div>
        </div>

        {{--<div class="col-sm-12 col-md-6 col-lg-4">--}}
            {{--<div class="back-blue profile_item" >--}}
                {{--<div style="width: 100%;height: 90px;"></div>--}}
                {{--<div style="width: 100%;height: 22px;"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</div>


@endsection