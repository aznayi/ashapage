@extends('home')
@section('content')

<div class="container iran" style="max-width: 1200px;">
    <div class="card">
        <div class="card-header border-blue back-blue">
            <label class="blue-label font-lg">فرم اطلاعات تکمیلی</label>
        </div>
        <div class="card-body border-blue">

            <div class="card card2">
                <div class="card-header">
                    <label class="blue-label font-md">زبان های خارجه</label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="text" id="zaban" class="border1 border-blue rounded font-md col-sm-12 col-md-4 col-lg-3" placeholder="زبان مورد نظر را وارد کنید">
                        <label class="font-md col-sm-12 col-md-auto" style="margin-top: 5px;">میزان تسلط</label>
                        <label class="font-sm">25%</label>
                        <input type="radio" id="maharat_zaban" name="maharat_zaban" value="25%">
                        <label class="font-sm" style="margin-right: 10px;">50%</label>
                        <input type="radio" id="maharat_zaban" name="maharat_zaban" value="50%">
                        <label class="font-sm" style="margin-right: 10px;">75%</label>
                        <input type="radio" id="maharat_zaban" name="maharat_zaban" value="75%">
                        <label class="font-sm" style="margin-right: 10px;">100%</label>
                        <input type="radio" id="maharat_zaban" name="maharat_zaban" value="100%">
                        <span class="d-block rounded font-md" style="color: #FFFFFF;line-height: 29px;width: 100px;height:30px;text-align: center;background-color: #53d318;margin: 0 auto;cursor: pointer;" onclick="addZaban()">افزودن به رزومه</span>
                    </div>
                    <div class="row"><hr style="width: 100%; background-color: #cccccc;"></div>
                    {{--#zaban_list : zabanha dar in tag namayesh dade mishavand    --}}
                    <div class="row" id="zaban_list">
                        @if(isset($dataTakmily))
                            @foreach($dataTakmily as $data_zaban)
                                @if($data_zaban['type']==1)
                                    <div class="border-blue border2 smallbox">
                                        <i onclick="deleteZaban(this)" style="cursor: pointer"></i>
                                        <span class="blue-label font-md">{{$data_zaban['name']}}</span>
                                        <span class="blue-label font-md"> - </span>
                                        <span class="blue-label font-md">{{$data_zaban['maharat']}}</span>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>

                </div>

            </div>






            <div class="card card2" style="margin-top: 20px">
                <div class="card-header">
                    <label class="blue-label font-md">سایر مهارت های تکمیلی</label>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="text" id="takmily" class="border1 border-blue rounded font-md col-sm-12 col-md-4 col-lg-3" placeholder="مثال : برنامه نویسی وب">
                        <label class="font-md col-sm-12 col-md-auto" style="margin-top: 5px;">میزان تسلط</label>
                        <label class="font-sm">25%</label>
                        <input type="radio" id="maharat_takmily" name="maharat_takmily" value="25%">
                        <label class="font-sm" style="margin-right: 10px;">50%</label>
                        <input type="radio" id="maharat_takmily" name="maharat_takmily" value="50%">
                        <label class="font-sm" style="margin-right: 10px;">75%</label>
                        <input type="radio" id="maharat_takmily" name="maharat_takmily" value="75%">
                        <label class="font-sm" style="margin-right: 10px;">100%</label>
                        <input type="radio" id="maharat_takmily" name="maharat_takmily" value="100%">
                        <span class="d-block rounded font-md" style="color: #FFFFFF;line-height: 29px;width: 100px;height:30px;text-align: center;background-color: #53d318;margin: 0 auto;cursor: pointer" onclick="addmaharat()">افزودن به رزومه</span>
                    </div>
                    <div class="row"><hr style="width: 100%; background-color: #cccccc;"></div>
                    {{--#maharat_list : zabanha dar in tag namayesh dade mishavand--}}
                    <div class="row" id="maharat_list">
                        @if(isset($dataTakmily))
                            @foreach($dataTakmily as $data)
                                @if($data['type']==2)
                                    <div class="border-blue border2 smallbox">
                                        <i onclick="deletemaharat(this)" style="cursor: pointer"></i>
                                        <span class="blue-label font-md">{{$data['name']}}</span>
                                        <span class="blue-label font-md"> - </span>
                                        <span class="blue-label font-md">{{$data['maharat']}}</span>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>

                </div>

            </div>


            <a href="{{route('step3')}}" class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF; width: 100px;height: 22px; border: 2px outset #cccccc; margin-top: 10px; cursor: pointer" > < بازگشت</a>

            <a href="{{'step5'}}" class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF; width: 100px;height: 22px; border: 2px outset #cccccc; margin-top: 10px; cursor: pointer" >ثبت و ادامه ></a>



        </div>
    </div>

    <div class="row" style="margin: 10px auto">
        <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
        <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
        <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
        <div class="d-sm-none d-md-block col-md-2 step select" ></div>
        <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
    </div>
</div>

    <script>
        function addZaban() {
            var z=$('#zaban').val();
            var t=$('#maharat_zaban:checked').val();
            var tag='<div class="border-blue border2 smallbox"><i onclick="deleteZaban(this)" style="cursor: pointer"></i><span class="blue-label font-md">'+z+'</span><span class="blue-label font-md"> - </span><span class="blue-label font-md">'+t+'</span></div>';
                if (z !=''){
                    if (t !=undefined){

                        $.ajax({
                            type: "POST",
                            url: "{{route('setDataTakmily')}}",
                            data: { '_token' : "{{csrf_token()}}",'type':'1','name':z,                                'maharat':t
                            },
                            success: function( msg ) {
                                $('#zaban_list').append(tag);
                            }
                        });
                    }else {alert('میزان تسلط خود را مشخص نمایید');}
                }else {alert('زبان خود را وارد کنید');}
        }

        function deleteZaban(tag) {
            var x=$(tag).parent();
            var zaban=$(x).children('span').eq(0).text();
            var maharat=$(x).children('span').eq(2).text();
            $.ajax({
                type: "POST",
                url: "{{route('deleteDataTakmily')}}",
                data: { '_token' : "{{csrf_token()}}" ,'type':'1','name':zaban,'maharat':maharat
                },
                success: function( msg ) {
                    $(tag).parent().remove();
                }
            });
        }




        function addmaharat() {
            var z=$('#takmily').val();
            var t=$('#maharat_takmily:checked').val();
            var tag='<div class="border-blue border2 smallbox"><i onclick="deletemaharat(this)" style="cursor: pointer"></i><span class="blue-label font-md">'+z+'</span><span class="blue-label font-md"> - </span><span class="blue-label font-md">'+t+'</span></div>';
            if (z !=''){
                if (t !=undefined){

                    $.ajax({
                        type: "POST",
                        url: "{{route('setDataTakmily')}}",
                        data: { '_token' : "{{csrf_token()}}",'type':'2','name':z,'maharat':t
                        },
                        success: function( msg ) {
                            $('#maharat_list').append(tag);
                        }
                    });
                }else {alert('میزان تسلط خود را مشخص نمایید');}
            }else {alert('مهارت خود را وارد کنید');}
        }

        function deletemaharat(tag) {
            var x=$(tag).parent();
            var zaban=$(x).children('span').eq(0).text();
            var maharat=$(x).children('span').eq(2).text();
            $.ajax({
                type: "POST",
                url: "{{route('deleteDataTakmily')}}",
                data: { '_token' : "{{csrf_token()}}" ,'type':'2','name':zaban,'maharat':maharat
                },
                success: function( msg ) {
                    $(tag).parent().remove();
                }
            });
        }
    </script>

@endsection