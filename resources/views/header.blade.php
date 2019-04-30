<style>
    header{
        width: 100%;
    }

    nav li{
        width: 115px;
        height: 115px;
        background: rgba(68 ,138,255,.1) ;
        border-radius: 100%;
        display: block;
        float: right;
        margin: 12px;
        text-align: center;
        transition: box-shadow 1000ms;
        cursor: pointer;
    }
    nav li i{
        width: 65px;
        height: 65px;
        display: inline-block;
        margin-top: 10px;

    }
    nav li span{
        display: block;
        font-family: yekan;
        font-size: 10pt;
        color: #448AFF;
        text-align: center;
    }

    .btn1 span {
        width: 100px;
        height: 40px;
        display: inline-block;
        text-align: center;
        margin: 2px;
        font-family: iranBold;
        font-size: 12pt;
        color: #4568d0;
        line-height: 38px;
        transition: background 1s;
        cursor: pointer;
        border-radius: 5px;
        border: 2px outset #448AFF;
    }
    .moseon{
        border: 1px solid #4568d0 !important;
        box-shadow: 0 0 20px #4568d0 !important;
    }
    .activemenu{
        border: 3px inset #4568d0;
        box-shadow: 0 0 9px #4568d0
    }
    .leftmoseon{
        background: #448AFF !important;
        color: #FFFFFF !important;
        border-radius: 5px;
    }
    #small_menu_icon{
        height: 41px;
        width: 41px;
        margin: 2px;
        float: right;
    }
    #small_menu{
        width: 90%;
        background-color: #2e65a3;
        position: relative;
        z-index: 2;
        font-family: yekan;
        padding: 10px;
        margin: 0 auto;
    }
    #small_menu li{
        color: #ECF3FF;
        border-bottom: 1px solid #448aff;
    }
</style>

<header>
    <div class="continer">
        <div class="row" style="line-height: 30px;">
            <div class="col-12" style="background:#448AFF;position: relative;height: 30px;">
                <div class="row">


                        <span class="iran font-md col-sm-12 col-md-4" style="color: #FFFFFF;text-align: center;">@if(auth()->check()) {{auth()->user()->username}} عزیز به آشا پیج خوش آمدید @endif</span>


                    <span class="iran font-md d-sm-none d-md-inline-block col-md-8" style="color: #FFFFFF;">بیشتر از آنچه برای موفق بودن تلاش میکنی ، برای با ارزش بودن تلاش کن. (آلبرت اینشتین)</span>

                </div>
            </div>
        </div>


        <div class="row" style="max-width: 1200px;margin: 0 auto;border-bottom: 2px solid #448AFF;">
            <div class="col-lg-9 d-sm-none d-md-none d-lg-block">
                <nav>
                    <ul>
                        <a href="/"> <li data-page="page1">
                                <i style="background-position: -2px -81px"></i>
                                <span>صفحه اصلی</span>
                            </li></a>
                        <a href="{{route('step1')}}"><li data-page="page2">
                                <i style="background-position: -67px -81px"></i>
                                <span>ساخت رزومه</span>
                            </li></a>
                        <li data-page="page3">
                            <i style="background-position: -138px -81px"></i>
                            <span>کارت ویزیت</span>
                        </li>
                        <li data-page="page4">
                            <i style="background-position: -206px -83px"></i>
                            <span>راهنما </span>
                        </li>
                        <li data-page="page5">
                            <i style="background-position: -274px -83px"></i>
                            <span>پشتیبانی</span>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="d-sm-none d-md-none d-lg-block col-lg-2">
                <i id="small_menu_icon" class="d-sm-block d-md-none" data-select="0" style="background-position: -71px -156px;">
                </i>
                @if(auth()->check())
                    <a class="largbutton" href="{{route('profile')}}" style="margin-top: 20px;display: inline-block">
                        <div style="width: 120px; height: 40px;position: relative">
                            <div><b><span style="margin-right: 10px">پنل کاربری</span></b></div>
                            <div class="righticon">
                                <div><i style="background-position: -15px -43px"></i></div>
                            </div>
                        </div>
                    </a>

                    <a class="largbutton" href="{{route('logout')}}" style="margin-top: 20px;display: inline-block;margin-right: 10px">
                        <div style="width: 120px; height: 40px;position: relative">
                            <div><b><span style="margin-right: 50px">خروج</span></b></div>
                            <div class="lefticon">
                                <div><i style="background-position: -174px -154px"></i></div>
                            </div>
                        </div>
                    </a>

                    @else
                <a class="largbutton" href="/login" style="margin-top: 20px;display: inline-block">
                <div style="width: 120px; height: 40px;position: relative">
                    <div><b><span style="margin-right: 25px">ورود</span></b></div>
                    <div class="righticon">
                        <div><i style="background-position: -15px -43px"></i></div>
                    </div>
                </div>
                </a>

                <a class="largbutton" href="register" style="margin-top: 20px;display: inline-block;margin-right: 10px">
                    <div style="width: 120px; height: 40px;position: relative">
                        <div><b><span style="margin-right: 45px">ثبت نام</span></b></div>
                        <div class="lefticon">
                            <div><i style="background-position: -174px -154px"></i></div>
                        </div>
                    </div>
                </a>
                @endif


            </div>
            <div id="small_menu" style="display: none;">
                <ul>
                    <a href="/"> <li data-page="page1">
                            صفحه اصلی
                        </li></a>
                    <a href="{{route('step1')}}"><li data-page="page2">
                            ساخت رزومه
                        </li></a>
                    <a><li data-page="page3">
                            کارت ویزیت
                        </li></a>
                    <a><li data-page="page4">
                            راهنما
                        </li></a>
                    <a><li data-page="page5">
                            پشتیبانی
                        </li></a>
                </ul>
            </div>
        </div>

    </div>

</header>

<script>
    $('nav li').hover(function () {
        $(this).addClass('moseon');
    },function () {
        $(this).removeClass('moseon');
    });

    $('nav div a span').hover(function () {
        $(this).addClass('leftmoseon');
    },function () {
        $(this).removeClass('leftmoseon');
    });
    $('#small_menu_icon').click(function () {
       $('#small_menu').slideToggle();
       var x=$('#small_menu_icon').attr('data-select');
       if(x=='0'){
           $('#small_menu_icon').css('background-position','-120px -156px');
           $('#small_menu_icon').attr('data-select','1');
       }else {
           $('#small_menu_icon').css('background-position','-71px -156px');
           $('#small_menu_icon').attr('data-select','0');
       }
    });
    $('#small_menu a').click(function () {
        $('#small_menu').slideUp();
    });

    @if(isset($pagenum))
        $('nav li[data-page={{  $pagenum }}]').addClass('activemenu');
    @endif
</script>