@extends('home')
@section('content')

    <div class="container iran" style="max-width: 1200px;">
        @if( count( $errors ) > 0 )
            <ul class="alert alert-danger iran font-md">
                @foreach( $errors -> all()  as  $error )
                    <li> * {{ $error }}  </li>
                @endforeach
            </ul>
        @endif
        <div class="card">
            <div class="card-header back-blue border-blue">
                <label class="font-lg blue-label">سوابق شغلی</label>
            </div>
            <div class="card-body border-blue">

                <form action="{{route('setDataWork')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12 col-md-6">

                            <label class="col-sm-12 col-md-3 font-md blue-label p-0">عنوان شغل</label>
                            <input name="job" id="job" type="text" class="col-sm-12 col-md-8 border1  border-blue rounded float-left" value="{{old('job')}}">

                        </div>
                        <div class="col-sm-12 col-md-6">

                            <label class="col-sm-12 col-md-3 font-md blue-label p-0">نام سازمان</label>
                            <input name="company" id="company" type="text" class="col-sm-12 col-md-8 border1 border-blue rounded float-left" value="{{old('company')}}">

                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12 col-md-6">

                            <label class="col-sm-12 col-md-3 font-md blue-label p-0">کشور</label>
                            <input name="country" id="country" type="text" class="col-sm-12 col-md-8 border1  border-blue rounded float-left" value="{{old('country')}}">

                        </div>
                        <div class="col-sm-12 col-md-6">

                            <label class="col-sm-12 col-md-3 font-md blue-label p-0">شهر</label>
                            <input name="city" id="city" type="text" class="col-sm-12 col-md-8 border1 border-blue rounded float-left" value="{{old('city')}}">

                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12 col-md-6">
                            <label class="blue-label font-md col-12 p-0">مختصری از شرح وضایف شما در این شرکت</label>
                            <textarea class="border-blue font-md rounded col-12" name="job_comment" rows="3" >{{old('job_comment')}}</textarea>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="blue-label font-md col-12 p-0">مختصری از شرح فعالیت شرکت</label>
                            <textarea class="border-blue font-md rounded col-12" name="company_comment" rows="3" >{{old('company_comment')}}</textarea>
                        </div>

                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12 col-md-6">

                            <label class="col-sm-12 col-md-4 font-md blue-label p-0">تاریخ شروع به کار</label>
                            <input type="text" name="start_at" id="start_at" class="col-sm-6 col-md-7 border1 border-blue rounded float-md-left float-sm-right">

                        </div>
                        <div class="col-sm-12 col-md-6">

                            <label class="blue-label font-md"> هنوز در این شرکت مشغول به کار هستم</label>
                            <input type="checkbox" name="in_work" id="in_work" >

                        </div>
                    </div>

                    <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-12 col-md-6">
                            <label id="for_end_at" class="col-sm-12 col-md-4 font-md blue-label p-0">تاریخ اتمام کار</label>
                            <input type="text" name="end_at" id="end_at" class="col-sm-6 col-md-7 border1 border-blue rounded float-md-left float-sm-right" value="{{old('end_at')}}">
                            <input type="hidden" name="end_at" id="hidden_end_at" value="1" disabled>
                        </div>
                    </div>
                    <input type="submit" class="d-block rounded font-md" style="margin: 10px auto;color: #FFFFFF;line-height: 29px;width: 100px;height:30px;text-align: center;background-color: #53d318" value="افزودن به رزومه">

                </form>

                <ul>
                    @if(isset($dataWork[0]))

                        @foreach($dataWork as $data)
                            <li style="background-color: #cccccc; border: 1px solid #8c8c8c; border-radius: 5px; padding: 5px; margin: 5px; font-size: .75rem;">
                                <div class="row">
                                    <div class="col-sm-10">
                                        عنوان شغلی : {{$data['job']}}
<br>
                                        سازمان : {{$data['company']}}
                                        <br>
                                        شرح وضایف شغلی : {{$data['job_comment']}}
                                        <br>
                                        شرح فعالیت سازمان : {{$data['company_comment']}}
                                        <br>
                                        محل سازمان : {{$data['country']}} - {{$data['city']}}
                                        <br>
                                        مدت فعالیت : از تاریخ {{$data['start_at']}} تا {{$data['end_at']=='1'?'کنون':$data['end_at'] }}

                                    </div>
                                    <div class="col-sm-2">
                                        <i style="width: 22px; height: 30px; display: block; background-position: -121px -45px; float: left; cursor: pointer;" title="حذف" data-work="{{$data['id']}}" onclick="deletework(this)"></i>
                                    </div>
                                </div>
                            </li>

                        @endforeach

                    @endif

                </ul>

                <a href="{{route('step2')}}" class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF; width: 100px;height: 22px; border: 2px outset #cccccc; margin-top: 10px; cursor: pointer" > < بازگشت</a>

                <a href="{{'step4'}}" class="font-md rounded text-center d-inline-block" style="background-color: #448AFF; color: #ECF3FF; width: 100px;height: 22px; border: 2px outset #cccccc; margin-top: 10px; cursor: pointer" >ثبت و ادامه ></a>

            </div>
        </div>

            <div class="row" style="margin: 10px auto">
                <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
                <div class="d-sm-none d-md-block col-md-2 step doing" ></div>
                <div class="d-sm-none d-md-block col-md-2 step select" ></div>
                <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
                <div class="d-sm-none d-md-block col-md-2 step notdo" ></div>
            </div>

    </div>
<script>
    $('#start_at,#end_at').persianDatepicker();

    $('#in_work').change(function () {
if($('#in_work').is(':checked')){
    $('#end_at').attr('disabled','disabled') ;
    $('#hidden_end_at').removeAttr('disabled') ;
    $('#for_end_at').css('color','#cccccc');
}else {
    $('#end_at').removeAttr('disabled') ;
    $('#hidden_end_at').attr('disabled','disabled') ;

    $('#for_end_at').css('color','#448AFF');

}
    });

    function deletework($request) {
        var workId= $($request).attr('data-work');
        $.ajax({
            type: "POST",
            url: "{{route('deleteDataWork')}}",
            data: { '_token' : "{{csrf_token()}}" ,'id':workId
            },
            success: function( msg ) {
                $($request).parents('li').remove();
            }
        });
    }

//

</script>

@endsection