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
                                    <li class="breadcrumb-item"><a href="{{route('client.sell.step1.create')}}">فروش تتر </a></li>
                                    <li class="breadcrumb-item"><a href="{{route('client.sell.step1.create')}}">وارد کردن مقدار </a></li>
                                    <li class="breadcrumb-item"><a href="{{route('client.sell.step2.create')}}">وارد کردن مشخصات فروشنده </a></li>
                                    <li class="breadcrumb-item"><a href="{{route('client.sell.step3.create')}}">وارد کردن اطلاعات بانکی </a></li>
                                    <li class="breadcrumb-item active" aria-current="page">تاییدیه اطلاعات</li>

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
                        <div class="text-center">

                            <div class="section-title">
                                <h3 class="my-3 text-danger">فروش تتر</h3>
                            </div>
                        </div>

                        <div class="content mt-4 pt-2">
                            <form action="{{route('client.sell.step4.store')}}" method="post">
                                @csrf
                                <div class="row">

                                    <p class="text-justify" style="line-height: 2.2">اینجانب <span class="font-weight-bold text-info"> {{$name}} </span>
                                        به شماره موبایل <span class="font-weight-bold text-info"> {{$mobile}} </span>
                                        و ایمیل <span class=" font-weight-bold text-info"> {{$mail}} </span>
                                        مایل هستم در ازای تبادل <span class="font-weight-bold text-danger"> {{$tetherAmount}} </span> تتر به سایت تتریار
                                        مبلغ <span class="font-weight-bold text-success"> {{$tomanAmountPersian}} تومان</span>   را
                                        @if($shaba != null)
                                            به شماره شبا <span class="font-weight-bold text-info"> {{$shaba}}</span>
                                        @else
                                            به شماره کارت <span class="font-weight-bold text-info"> {{$cart}}</span>
                                        @endif
                                        مربوط به <span class="font-weight-bold text-info"> {{$bank}} </span>دریافت نمایم .


                                    </p>
                                    <div class="form-check-inline text-right mb-3" >
                                        <label class="form-check-label" >
                                            <input type="checkbox" class="form-check-input ml-2" name="rules" value="rules" style="width: 17px;height: 17px;">
                                            کلیه اطلاعات فوق را تایید کرده و <a href="{{route('client.rules')}}" target="_blank"> قوانین و مقررات تتریار</a> را خوانده و با آن موافق هستم .
                                        </label>
                                    </div>
                                    @include('client.layouts.errors')
                                    <div class="row mt-5 mb-2">
                                        <label for="exampleInputEmail1" class="float-right">
                                            <img src="{{captcha_src()}}" id="captcha" alt="خرید تتر">
                                            <a href="javascript:void(0)"><i onclick="loadCaptcha()" class="uil-refresh  mr-3" style="font-size: 25px"></i></a>
                                        </label>
                                        <div class="input-group col-md-12" dir="rtl">

                                            <input class="form-control ps-5" type="number" autocomplete="off"  name="captcha" placeholder="عبارت امنیتی" oninvalid="setCustomValidity('لطفا عبارت امنیتی را وارد نمایید')"
                                                   oninput="setCustomValidity('')"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="d-grid">
                                            <button class="btn btn-success">تایید و مرحله بعد<i class="uil uil-angle-left-b align-middle"></i></button>
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
