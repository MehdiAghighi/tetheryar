@extends('client.layouts.master')

@section('content')

    <!-- Hero Start -->
    <section class="bg-half bg-header d-table w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="">
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('client.index')}}">تتریار</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ورود / ثبت نام</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->
    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <div class="container">
        <div class="row mt-5 mb-5" dir="rtl">
            <div class="col-sm-6 mx-auto">
                <div class="card rounded border-0 shadow-lg ms-lg-5">
                    <div class="card-body">

                        <div class="content mt-4 pt-2">
                            <form action="{{route('client.login.SendOtpCode')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">شماره همراه خود را وارد نمایید <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="number"  name="mobile" value="{{old('mobile')}}" placeholder="شماره موبایل" pattern=".{5,10}" id="mobile"  oninvalid="setCustomValidity('لطفا شماره موبایل را وارد کنید')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="row mt-5 mb-2">
                                        <label for="exampleInputEmail1" class="float-right">
                                            <img src="{{captcha_src()}}" id="captcha" alt="فروش تتر">
                                            <a href="javascript:void(0)"><i onclick="loadCaptcha()" class="uil-refresh  mr-3" style="font-size: 25px"></i></a>
                                        </label>
                                        <div class="input-group col-md-12" dir="rtl">

                                            <input class="form-control ps-5" type="number" autocomplete="off"  name="captcha" placeholder="عبارت امنیتی" oninvalid="setCustomValidity('لطفا عبارت امنیتی را وارد نمایید')"
                                                   oninput="setCustomValidity('')"
                                                   required>
                                        </div>
                                    </div>
                                    @include('client.layouts.errors')
                                    <div class="col-lg-12 mt-2">
                                        <div class="d-grid">
                                            <button class="btn btn-success">ارسال کد<i class="uil uil-angle-left-b align-middle"></i></button>
                                        </div>
                                    </div><!--end col-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

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
