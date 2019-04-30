@extends('/home')
@section('content')
    <div class="container iran" style="max-width: 1200px;">
        @if( count( $errors ) > 0 )
            <ul class="alert alert-danger iran font-md">
                @foreach( $errors -> all()  as  $error )
                    <li> * {{ $error }}  </li>
                @endforeach
            </ul>
        @endif
        <div class="card border-blue">
            <div class="card-header border-blue back-blue"><label class="blue-label font-lg">اطلاعات تحصیلی</label></div>
            <div class="card-body">
<form method="post" action="{{route('setDataTahsil')}}">
    {{csrf_field()}}
                <div class="row" style="margin-bottom: 10px;">
                    <label class="font-md blue-label col-sm-12 col-md-12 col-lg-auto">مقطع تحصیلی</label>
                    <div class="col-sm-6 col-md-auto col-lg-auto">
                      <label class="font-md">کاردانی</label>
                        <input name="maqta" id="maqta" type="radio" value="1">
                    </div>
                    <div class="col-sm-6 col-md-auto col-lg-auto">
                        <label class="font-md">کارشناسی</label>
                        <input name="maqta" id="maqta" type="radio" value="2">
                    </div>
                    <div class="col-sm-6 col-md-auto col-lg-auto">
                        <label class="font-md">کارشناسی ارشد</label>
                        <input name="maqta" id="maqta" type="radio" value="3">
                    </div>
                    <div class="col-sm-6 col-md-auto col-lg-auto">
                        <label class="font-md">دکترا</label>
                        <input name="maqta" id="maqta" type="radio" value="4">
                    </div>
                </div>

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-sm-12 col-md-6">
                        <label class="blue-label font-md col-sm-12 col-md-4">رشته تحصیلی</label>
                        <input type="text" id="reshte" name="reshte" class="border-blue border1 rounded col-sm-12 col-md-6">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label class="blue-label font-md col-sm-12 col-md-4">دانشگاه</label>
                        <input type="text" id="daneshgah" name="daneshgah" class="border-blue border1 rounded col-sm-12 col-md-6">
                    </div>


                </div>

                <div class="row" style="margin-bottom: 15px">
                    <div class="col-sm-12 col-md-6">
                        <label class="blue-label font-md col-sm-12 col-md-4">سال شروع تحصیل</label>
                        <input type="text" id="start_year" name="start_year" class="border-blue border1 rounded col-sm-12 col-md-6">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label class="blue-label font-md col-sm-12 col-md-4">سال اتمام تحصیل</label>
                        <input type="text" id="end_year" name="end_year" class="border-blue border1 rounded col-sm-12 col-md-6">
                    </div>
                </div>

                <input type="submit" class="d-block rounded font-md" style="margin: 0 auto;color: #FFFFFF;line-height: 29px;width: 100px;height:30px;text-align: center;background-color: #53d318" value="افزودن به رزومه">
</form>

                <ul>
                    @if(isset($dataTahsil))

                        @foreach($dataTahsil as $data)
                            <li style="background-color: #cccccc; border: 1px solid #8c8c8c; border-radius: 5px; padding: 5px; margin: 5px; font-size: .75rem;">
                                <div class="row">
                                    <div class="col-sm-10">
@if($data['maqta']==1) کاردانی @elseif($data['maqta']==2) کارشناس @elseif($data['maqta']==3) کارشناسی ارشد @else دکترا @endif {{$data['reshte']}}
                                        <br>
                                        دانشگاه {{$data['daneshgah']}}
                                        <br>
                                        از سال {{$data['start_year']}} تا {{$data['end_year']}}
                                    </div>
                                    <div class="col-sm-2">
                                        <i style="width: 22px; height: 30px; display: block; background-position: -121px -45px; float: left; cursor: pointer;" title="حذف" data-madrak="{{$data['id']}}" onclick="deleteMadrak(this)"></i>
                                    </div>
                                </div>
                            </li>

                        @endforeach

                    @endif

                </ul>

                <a href="{{route('step1')}}" class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF; width: 100px;height: 22px; border: 2px outset #cccccc; margin-top: 10px; cursor: pointer" > < بازگشت</a>

                <a href="{{'step3'}}" class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF; width: 100px;height: 22px; border: 2px outset #cccccc; margin-top: 10px; cursor: pointer" >ثبت و ادامه ></a>
            </div>
        </div>

            <div class="row" style="margin: 10px auto">
                <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
                <div class="d-sm-none d-md-block col-md-2 step select" ></div>
                <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
                <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
                <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
            </div>

    </div>

    <script>
        function deleteMadrak($request) {
            var madrakId= $($request).attr('data-madrak');
            $.ajax({
                    type: "POST",
                    url: "{{route('deleteDataTahsil')}}",
                    data: { '_token' : "{{csrf_token()}}" ,'id':madrakId
                },
                success: function( msg ) {
                    $($request).parents('li').remove();
                }
            });
        }
    </script>



@endsection