@extends('client.layouts.master')

@section('content')

    <!-- Hero Start -->
    

    <!-- Profile Start -->
    <section class="section mt-60">
        <div class="container mt-lg-3">
            <div class="row">


                <div class="col-lg-8 col-12">
                    <div class="card border-0 rounded shadow">
                        <div class="card-body">
                            <h5 class="text-md-start text-center">احراز هویت جدید :</h5>
                            <p class="small">برای خرید تتر لازم است یکبار احراز هویت انجام دهید.</p>
                            @include('client.layouts.errors')
                            <form action="{{route('client.auth.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">نام </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="text"  name="first_name" value="{{old('first_name')}}" placeholder="نام مطابق کارت ملی" id="name" oninvalid="setCustomValidity('وارد کردن نام الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">نام خانوادگی </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user-check" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="text"  name="last_name" value="{{old('last_name')}}" placeholder="نام خانوادگی مطابق کارت ملی" id="name" oninvalid="setCustomValidity('وارد کردن نام خانوادگی الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">کد ملی</label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="number"  name="nationalCode" value="{{old('nationalCode')}}" placeholder="کد ملی" id="nationalCode" oninvalid="setCustomValidity('وارد کردن کدملی الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> شماره تماس ثابت </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="bookmark" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="number"  name="phoneNumber" value="{{old('phoneNumber')}}" placeholder="شماره تماس ثابت" id="phoneNumber" oninvalid="setCustomValidity('وارد کردن شماره تماس ثابت الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label"> زمان تماس با تلفن ثابت جهت احراز هویت </label>
                                            <select class="form-control border rounded small" id="exampleFormControlSelect1"  name="callTime" oninvalid="setCustomValidity('وارد کردن  بازه زمانی الزامی است')"
                                                    oninput="setCustomValidity('')"
                                                    required>
                                                <option value="" disabled selected>لطفا بازه زمانی را انتخاب کنید</option>
                                                <option value="9-11" >9 الی 11 </option>
                                                <option value="11-13" >11 الی 13</option>
                                                <option value="13-15" >13 الی 15</option>
                                                <option value="15-17" >15 الی 17</option>
                                                <option value="17-19" >17 الی 19</option>
                                                <option value="19-21" >19 الی 21</option>
                                                <option value="21-23" >21 الی 23</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> تصویر کارت ملی </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="bookmark" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="file"  name="nationalCardPicture"  oninvalid="setCustomValidity('بارگزاری کارت ملی الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label"> کد معرف (در صورت تمایل) </label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="bookmark" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="number"  name="identifier_code" value="{{old('identifier_code')}}" placeholder="در صورت تمایل کد معرف خود را وارد نمایید">
                                            </div>
                                        </div>
                                    </div><!--end col-->
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
