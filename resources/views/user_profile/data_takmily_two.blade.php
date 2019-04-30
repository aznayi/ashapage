
@extends('home')
@section('content')

    <div class="container iran" style="max-width: 1200px">
        <div class="card border-blue">
            <div class="card-header blue-label border-blue">
                <label class="blue-label font-lg">فرم اطلاعات تکمیلی</label>
            </div>
            <div class="card-body">

                <div class="card card2">
                    <div class="card-header">
                        <label class="blue-label font-md">دوره های آموزشی</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label class="font-md col-sm-12 col-md-6">عنوان دوره</label>
                                <input type="text" name="dore" id="dore" class="border1 border-blue rounded col-sm-12 col-md-5">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="font-md col-sm-12 col-md-6">نام آموزشگاه</label>
                                <input type="text" name="amuzeshgah" id="amuzeshgah" class="border1 border-blue rounded col-sm-12 col-md-5">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label class="font-md col-sm-12 col-md-6">طول دوره بر حسب ساعت</label>
                                <input type="text" name="time" id="time" class="border1 border-blue rounded col-sm-12 col-md-5">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="font-md col-sm-12 col-md-6">سال دریافت مدرک</label>
                                <input type="text" name="date" id="date" class="border1 border-blue rounded col-sm-12 col-md-5">
                            </div>
                        </div>

                        <div class="row">
                            <span class="d-block rounded font-md" style="color: #FFFFFF;line-height: 29px;width: 100px;height:30px;text-align: center;background-color: #53d318;margin: 10px auto;cursor: pointer;" onclick="addMadrak()">افزودن به رزومه</span>

                        </div>

                        <div id="madrak_list" class="row">

                            @if(isset($data_dore))
                                @foreach($data_dore as $dore)
                                    <div class="col-sm-12 col-md-6">
                                        <div class="row rounded" style="background-color: #e0e0e0; border: 1px solid #cccccc;padding: 5px; margin: 1px">
                                            <div class="col-sm-10 font-md">
                                                <span><b>{{$dore['dore']}}</b></span><br>
                                                <span>آموزشگاه </span>
                                                <span>{{$dore['amuzeshgah']}}</span><br>
                                                <span>به مدت</span>
                                                <span>{{$dore['time']}}</span>
                                                <span>ساعت</span><br>
                                                <span><b>{{$dore['date']}}</b></span>
                                            </div>
                                            <div class="col-sm-2">
                                                <i style="width: 22px; height: 30px; display: block; background-position: -121px -45px; float: left; cursor: pointer;" title="حذف" onclick="deleteMadrak(this)"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>

                </div>
                <form method="post" action="{{route('about_me')}}">
                    {{csrf_field()}}
                <div class="card card2" style="margin-top: 20px;">
                    <div class="card-header">
                        <label class="blue-label font-md">درباره من</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <textarea name="about_me" id="about_me">@if(isset($data_user[0])) {{$data_user[0]['about_me']}} @endif</textarea>
                        </div>
                    </div>
                </div>

                <a href="{{route('step4')}}" class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF; width: 100px;height: 22px; border: 2px outset #cccccc; margin-top: 10px; cursor: pointer" > < بازگشت</a>

                <input type="submit" class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF; width: 100px;height: 22px; border: 2px outset #cccccc; margin-top: 10px; cursor: pointer"  value="ثبت و ادامه">
                </form>

            </div>

        </div>
        <div class="row" style="margin: 10px auto">
            <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
            <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
            <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
            <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
            <div class="d-sm-none d-md-block col-md-2 step select" ></div>
        </div>
    </div>



    <script>

        CKEDITOR.replace('about_me',{

        });

        function addMadrak() {
            var dore = $('#dore').val();
            var amuzeshgah = $('#amuzeshgah').val();
            var time = $('#time').val();
            var date = $('#date').val();
            if (dore == '') {
                alert('لطفا عنوان دوره را وارد نمایید');
            }
             else if (amuzeshgah == '')
            {
                alert('لطفا نام آموزشگاه را وارد نمایید');
            }
             else if (time == '')
            {
                alert('لطفا مدت زمان دوره را وارد نمایید');
            }
             else if (date == '')
            {
                alert('لطفا سال دریافت مدرک را وارد نمایید');
            }
            else
            {
                var tag = '<div class="col-sm-12 col-md-6"><div class="row rounded" style="background-color: #e0e0e0; border: 1px solid #cccccc;padding: 5px; margin: 1px"><div class="col-sm-10 font-md"><span><b>'+dore+'</b></span><br><span>آموزشگاه </span><span>'+amuzeshgah+'</span><br><span>به مدت</span><span>'+time+'</span><span>ساعت</span><br><span><b>'+date+'</b></span></div><div class="col-sm-2"><i style="width: 22px; height: 30px; display: block; background-position: -121px -45px; float: left; cursor: pointer;" title="حذف" onclick="deleteMadrak(this)"></i></div></div></div>';
                $.ajax({
                    type:'POST',
                    url:"{{route('setDore')}}",
                    data:{'_token':"{{csrf_token()}}",'dore':dore,'amuzeshgah':amuzeshgah,'time':time,'date':date},
                    success:function (msg) {
                        $('#madrak_list').append(tag);
                    }
                });
            }
        }

        function deleteMadrak(tag) {
            var ptag=$(tag).parent().parent();
            var dore=$(ptag).children('div').eq(0).children('span').eq(0).text();
            var amuzeshgah=$(ptag).children('div').eq(0).children('span').eq(2).text();
            var time=$(ptag).children('div').eq(0).children('span').eq(4).text();
            var date=$(ptag).children('div').eq(0).children('span').eq(6).text();
            $.ajax({
                type:'POST',
                url:"{{route('deleteDore')}}",
                data:{'_token':"{{csrf_token()}}",'dore':dore,'amuzeshgah':amuzeshgah,'time':time,'date':date},
                success:function (msg) {
                    $(tag).parent().parent().parent().remove();
                }
            });

        }

    </script>

@endsection


