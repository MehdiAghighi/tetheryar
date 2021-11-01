@extends('client.layouts.master')

@section('content')

    <!-- Hero Start -->
    <section class="bg-half-260 pb-lg-0 pb-md-4 bg-primary d-table w-100">
        <div class="bg-overlay bg-black" style="opacity: 0.8;"></div>
        <div class="container">
            <div class="row position-relative" style="z-index: 1;">
                <div class="col-md-6 col-12 mt-lg-5">
                            <div class="card event-schedule rounded border">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <!--<img src="/assets/images/logo2.png" style="width: 20%">-->
                                        <div class="flex-1 content text-center">
                                            <h4><a href="javascript:void(0)" class="text-dark title">قیمت خرید تتر از سایت</a></h4>
                                            <h3 class="text-success"><span id="buyPrice"> </span> تومان</h3>
                                            <a href="{{route('client.buy.step1.create')}}" class="btn btn-outline-primary">میخواهم تتر بخرم </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <div class="card event-schedule rounded border mt-3">
                        <div class="card-body">
                            <div class="d-flex">
                                <!--<img src="/assets/images/logo2.png" style="width: 20%">-->
                                <div class="flex-1 content text-center">
                                    <h4><a href="javascript:void(0)" class="text-dark title">قیمت فروش تتر به سایت</a></h4>
                                    <h3 class="text-danger"><span id="sellPrice"> </span> تومان</h3>
                                    <a href="{{route('client.sell.step1.create')}}" class="btn btn-outline-primary">میخواهم تتر بفروشم </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!--end col-->
                <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="classic-app-image position-relative">
                        <div class="app-images d-none d-md-block">
                            <img src="/assets/images/shapes/shape1.png" class="img-fluid" alt="">
                        </div>
                        <div class="position-relative">
                            <img src="/assets/images/tetheryar.png" class="img-fluid mover mx-auto d-block " alt="">
                        </div>

                    </div>
                </div><!--end col-->

            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Hero End -->


    <section class="section overflow-hidden ">

        <div class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="text-center">
                        <img src="/assets/images/logo2.png" class="img-fluid" alt="قیمت تتر" style="width: 60%">
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-6 col-12 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <div class="section-title ms-lg-4">

                        <h4 class="title mb-3">تتریار <br> <span class="text-primary">مطمئن ترین و سریع ترین </span> پلتفرم خرید و فروش تتر با بهترین قیمت </h4>
                        <ul dir="rtl"  class="list-unstyled">
                            <li><i class="uil uil-check-circle align-middle ml-2"></i> در تتریار با <b>کمترین قیمت</b> تتر بخرید و با <b>بیشترین قیمت</b> بفروشید . </li>
                            <li><i class="uil uil-check-circle align-middle ml-2"></i>تتریار، آسان ترین روش خرید و فروش تتر  </li>
                            <li><i class="uil uil-check-circle align-middle ml-2"></i> تتریار، سریع ترین و مطمئن ترین پلتفرم خرید و فروش تتر  </li>
                        </ul>                        <div class="mt-4">
                            <a href="{{route('client.buy.step1.create')}}" class="btn btn-primary">خرید تتر<i class="uil uil-angle-left-b"></i></a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

    </section><!--end section-->

    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-ontent-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-4">احراز هویت تک مرحله ای برای خرید تتر</h4>
                        <p class="text-muted para-desc mb-0 mx-auto"><span class="text-primary fw-bold"> احرازهویت </span>آسان و سریع جهت خرید تتر</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="d-flex key-feature align-items-center p-3 rounded-md shadow" style="background-color: #1A274E;color: #FFFFFF">
                        <div class="icon text-center rounded-circle bg-white me-3">
                            <i  class="uil uil-check fea icon-ex-md text-dark" style="font-size: 35px"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="title mb-0">پشتیبانی شبانه روزی</h4>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="d-flex key-feature align-items-center p-3 rounded-md shadow" style="background-color: #1A274E;color: #FFFFFF">
                        <div class="icon text-center rounded-circle bg-white me-3">
                            <i  class="uil uil-check fea icon-ex-md text-dark" style="font-size: 35px"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="title mb-0">بهترین نرخ معاملات تتر</h4>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="d-flex key-feature align-items-center p-3 rounded-md shadow" style="background-color: #1A274E;color: #FFFFFF">
                       <div class="icon text-center rounded-circle bg-white me-3">
                            <i  class="uil uil-check fea icon-ex-md text-dark" style="font-size: 35px"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="title mb-0">ساده ترین روش خرید و فروش تتر</h4>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="d-flex key-feature align-items-center p-3 rounded-md shadow" style="background-color: #1A274E;color: #FFFFFF">
                        <div class="icon text-center rounded-circle bg-white me-3">
                            <i  class="uil uil-check fea icon-ex-md text-dark" style="font-size: 35px"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="title mb-0">تسویه حساب سریع</h4>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="d-flex key-feature align-items-center p-3 rounded-md shadow" style="background-color: #1A274E;color: #FFFFFF">
                        <div class="icon text-center rounded-circle bg-white me-3">
                            <i  class="uil uil-check fea icon-ex-md text-dark" style="font-size: 35px"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="title mb-0">خرید تتر بدون احراز هویت</h4>
                        </div>
                    </div>
                </div><!--end col-->

               
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="d-flex key-feature align-items-center p-3 rounded-md shadow" style="background-color: #1A274E;color: #FFFFFF">
                        <div class="icon text-center rounded-circle bg-white me-3">
                            <i  class="uil uil-check fea icon-ex-md text-dark" style="font-size: 35px"></i>
                        </div>
                        <div class="flex-1">
                             <h4 class="title mb-0">ارزان ترین قیمت تتر</h4>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-12 mt-4 pt-2 text-center">
                    <a href="{{route('client.auth.edit')}}" class="btn btn-primary"> <i class="mdi mdi-arrow-right"></i>شروع احراز هویت</a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--ed container-->

        <div class="container mt-100 mt-60">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title text-center text-lg-start">
                        <h4 class="title mb-4">تتریار ارائه دهنده بهترین نرخ خرید و فروش تتر در ایران<br> </h4>
                        <p class="text-muted mb-0 mx-auto para-desc">تتر خود را <span class="text-primary fw-bold"> با بهترین قیمت بازار  </span> به ما بفروشید</p>
                        <a href="{{route('client.sell.step1.create')}}" class="btn btn-primary">فروش تتر<i class="uil uil-angle-left-b"></i></a>
                    </div>
                </div><!--end col-->

                <!--<div class="col-lg-6">-->
                <!--    <div class="row" id="counter">-->
                <!--        <div class="col-md-6 mt-4 mt-lg-0 pt-2 pt-lg-0">-->
                <!--            <div class="content text-center">-->
                <!--                <h1 class="mb-0"><span class="counter-value" data-target="512">1</span>+</h1>-->
                <!--                <h6>کاربران سایت</h6>-->
                <!--            </div>-->
                <!--        </div>-->

                <!--        <div class="col-md-6 mt-4 mt-lg-0 pt-2 pt-lg-0">-->
                <!--            <div class="content text-center">-->
                <!--                <h1 class="mb-0"><span class="counter-value" data-target="1402">1</span>+</h1>-->
                <!--                <h6>تعداد معاملات </h6>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->

                <!--</div>-->
                <!--end col-->
            </div><!--end row-->
        </div><!--end container-->


        <div class="container mt-100 mt-60">
            <div class="rounded bg-primary bg-gradient p-lg-5 p-4">
                <div class="row align-items-end">
                    <div class="col-md-8">
                        <div class="section-title text-md-start text-center">
                            <h4 class="title mb-3 text-white title-dark">با هر دعوت دوستان خود یک تتر نقد دریافت کنید</h4>
                            <p class="text-white mb-0">با ارسال کد معرف و یا لینک خود برای دوستان ، بعد از اولین تراکنش یک تتر نقد در کیف پول خود دریافت کنید</p>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-4 mt-4 mt-sm-0">
                        <div class="text-md-end text-center">
                            <a href="{{route('client.profile')}}" class="btn btn-light">دریافت کد معرف</a>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div>
        </div><!--end container-->

    </section><!--end section-->
    <!-- End -->
    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-light">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <!-- Start Contact -->
    <section class="section pb-0 mb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">آدرس 1 </h5>
                            <p class="text-muted">دانشگاه علوم و تحقیقات</p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">آدرس 2 </h5>
                            <p class="text-muted">میدان پونک - خیابان شهید رمضانی - پلاک 26 - واحد 5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">تلفن تماس </h5>
                            <a class="text-primary" dir="ltr">۰۲۱ - ۲۸۴۲۹۰۸۵</a>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">کانال تلگرام </h5>
                            <a href="https://t.me/tetheryar" class=" text-primary " target="_blank" dir="ltr">@tetheryar</a>
                        </div>
                    </div>
                </div>
               

                

            </div><!--end col-->
        </div><!--end row-->
        <div class="container">
            <div class="row">
                 <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">ایمیل </h5>
                            <a href="mailto:contact@example.com" class="text-primary">info@tetheryar.com</a>
                        </div>
                    </div>
                </div><!--end col-->
               


            </div>
        </div>
        </div><!--end container-->

        <div class="container-fluid mt-100 mt-60">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="card map border-0">
                        <div class="card-body p-0">
                            <iframe src="https://maps.google.com/maps?q=tehran%20,%20pounak%20,%20ramezani&t=&z=13&ie=UTF8&iwloc=&output=embed" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End contact -->
    
    <section id="clients" class="clients clients">
        <div class="container">

            <div class="row" dir="rtl">
                <div class="col-lg-4 col-md-6 col-12">
                    <img src="/assets/images/client/tehran.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <img src="/assets/images/client/12.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <img src="/assets/images/client/123.png" class="img-fluid" alt="" data-aos="zoom-in">
                </div>

            </div>

        </div>
    </section><!-- End Clients Section -->

@endsection

@section('script')
    <script>

        function buyPrice(){
            $.ajax({
                url: '/buyPrice' ,
                type : 'post' ,
                data: {
                    _token : "{{csrf_token()}}"
                },
                success : function (data){
                    $('#buyPrice').html(data.buyPrice)
                }
            });
        }
        function sellPrice(){
            $.ajax({
                url: '/sellPrice' ,
                type : 'post' ,
                data: {
                    _token : "{{csrf_token()}}"
                },
                success : function (data){
                    $('#sellPrice').html(data.sellPrice)
                }
            });
        }

        buyPrice();
        sellPrice();

        setInterval(function(){
            buyPrice(),
                sellPrice()

        }, 180000);

    </script>

@endsection
