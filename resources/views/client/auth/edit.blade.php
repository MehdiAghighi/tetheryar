@extends('client.layouts.master')

@section('content')

    <!-- Hero Start -->
    <section class="bg-profile d-table w-100 bg-primary" style="background: url('/assets/images/account/bg.png') center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card public-profile border-0 rounded shadow" style="z-index: 1;">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-md-3 text-md-start text-center">
                                    <img src="/assets/images/avatar.png" class="avatar avatar-large rounded-circle shadow d-block mx-auto" alt="">
                                </div><!--end col-->

                                <div class="col-lg-10 col-md-9">
                                    <div class="row align-items-end">
                                        <div class="col-md-7 text-md-start text-center mt-4 mt-sm-0">
                                            <h3 class="title mb-0">{{$fullName}}</h3>
                                            <small class="text-muted h6 me-2">کاربر عادی</small>
                                            <ul class="list-inline mb-0 mt-3">
                                                <li class="list-inline-item me-2"><a href="javascript:void(0)" class="text-muted" title="اینستاگرام"><i data-feather="instagram" class="fea icon-sm me-2"></i>
                                                        موجودی کیف پول من :<span class="text-info">{{$userCash->cash}}</span>
                                                    </a></li>
                                            </ul>
                                        </div><!--end col-->

                                    </div><!--end row-->
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--ed container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Profile Start -->
    <section class="section mt-60">
        <div class="container mt-lg-3">
            <div class="row">

                @include('client.layouts.profile')

                <div class="col-lg-8 col-12">
                    <div class="card border-0 rounded shadow">
                        <div class="card-body">
                            <h5 class="text-md-start text-center">احراز هویت جدید :</h5>
                            @if($authCondition['status'] == 'not approved')

                                <div class="alert alert-warning">

                                    اطلاعات شما به زودی توسط همکاران ما بررسی خواهد شد . لطفا منتظر بمانید .

                                </div>

                            @elseif($authCondition['status']=='rejected')
                                <div class="alert alert-danger text-right small">
                                    اطلاعات احراز هویت شما به دلایل زیر تایید نشده است . لطفا نسبت به تصحیح آن ها اقدام فرمایید:
                                    <br>
                                    @foreach($authMessages as $authMessage)

                                        <span class="text-right"> <i class="uil uil-arrow-left"></i>
                                            {{$authMessage['message']}}
                                        </span><br>

                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-success">
                                    اطلاعات شما تایید شده است . می توانید درخواست خرید تتر خود را تکمیل کنید .
                                    @if(session()->exists('tetherAmount'))
                                        <a href="{{route('client.buy.step4.create')}}" class="text-danger font-weight-bold">ادامه فرآیند خرید</a>
                                    @endif
                                </div>

                            @endif
                            @include('client.layouts.errors')

                            <form action="{{route('client.auth.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">نام </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="text"  name="first_name" value="{{$authCondition->first_name}}" placeholder="نام مطابق کارت ملی" id="name" style="height: 40px" oninvalid="setCustomValidity('وارد کردن نام الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required
                                                       @if($authCondition['status'] != 'rejected') disabled  @endif>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">نام خانوادگی </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="text"  name="last_name" value="{{$authCondition->last_name}}" placeholder="نام خانوادگی مطابق کارت ملی" id="name" style="height: 40px" oninvalid="setCustomValidity('وارد کردن نام الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required
                                                       @if($authCondition['status'] != 'rejected') disabled  @endif>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">کد ملی</label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="number"  name="nationalCode" value="{{$authCondition->nationalCode}}" placeholder="کد ملی" id="nationalCode" style="height: 40px" oninvalid="setCustomValidity('وارد کردن کد ملی الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required
                                                       @if($authCondition['status'] != 'rejected') disabled  @endif>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> شماره تماس ثابت </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="bookmark" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="number"  name="phoneNumber" value="{{$authCondition->phoneNumber}}" value="{{old('phoneNumber')}}" placeholder="شماره تماس ثابت" id="phoneNumber" style="height: 40px" oninvalid="setCustomValidity('وارد کردن شماره تماس ثابت الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required
                                                       @if($authCondition['status'] != 'rejected') disabled  @endif>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label"> زمان تماس با تلفن ثابت جهت احراز هویت </label>
                                            <select class="form-control border rounded small" id="exampleFormControlSelect1"  name="callTime" oninvalid="setCustomValidity('وارد کردن  بازه زمانی الزامی است')"
                                                    oninput="setCustomValidity('')"
                                                    required
                                                    @if($authCondition['status'] != 'rejected') disabled  @endif>
                                                <option value="" disabled selected>لطفا بازه زمانی را انتخاب کنید</option>
                                                <option value="9-11" @if($authCondition->callTime == '9-11')
                                                selected
                                                    @endif>9 الی 11 </option>
                                                <option value="11-13" @if($authCondition->callTime == '11-13')
                                                selected
                                                    @endif>11 الی 13</option>
                                                <option value="13-15" @if($authCondition->callTime == '13-15')
                                                selected
                                                    @endif>13 الی 15</option>
                                                <option value="15-17" @if($authCondition->callTime == '15-17')
                                                selected
                                                    @endif >15 الی 17</option>
                                                <option value="17-19" @if($authCondition->callTime == '17-19')
                                                selected
                                                    @endif>17 الی 19</option>
                                                <option value="19-21" @if($authCondition->callTime == '19-21')
                                                selected
                                                    @endif>19 الی 21</option>
                                                <option value="21-23" @if($authCondition->callTime == '21-23')
                                                selected
                                                    @endif>21 الی 23</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> تصویر کارت ملی </label>
                                            <div class="form-icon position-relative">

                                                @if($authCondition['status'] == 'rejected')
                                                <input class="form-control ps-5" type="file"  name="nationalCardPicture"  oninvalid="setCustomValidity('بارگزاری کارت ملی الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                                @endif
                                                <img class="mx-auto mt-3" src="{{str_replace('public','/storage',$authCondition->nationalCardPicture)}}" width="70%">
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    @if($authCondition['status'] == 'rejected')
                                            <div class="col-sm-6 mt-5 mb-2">
                                                <label for="exampleInputEmail1" class="float-right">
                                                    <img src="{{captcha_src()}}" id="captcha" alt="خرید تتر">
                                                    <a href="javascript:void(0)"><i onclick="loadCaptcha()" class="uil-refresh  mr-3" style="font-size: 25px"></i></a>
                                                </label>
                                                <div class="input-group col-md-12" dir="rtl">

                                                    <input class="form-control  ps-5" type="number" autocomplete="off"  name="captcha" placeholder="عبارت امنیتی" oninvalid="setCustomValidity('لطفا عبارت امنیتی را وارد نمایید')"
                                                           oninput="setCustomValidity('')"
                                                           required>
                                                </div>
                                            </div>
                                        </div><!--end row-->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="submit" id="submit" name="send" class="btn btn-primary" value="ارسال جهت بررسی">
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    @endif
                            </form><!--end form-->

                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Profile End -->

@endsection

@section('script')

    <script>
        function loadCaptcha(){
            $.ajax({
                url: '/captcha/load' ,
                type : 'post' ,
                data: {
                    _token : "{{csrf_token()}}"
                },
                success : function (data){
                    $('#captcha').attr('src' , data.imageSource)
                }
            });
        }
    </script>

@endsection
