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
                                    <li class="breadcrumb-item active" aria-current="page">آموزش خرید و فروش تتر</li>
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

<div class="container mt-100 mt-60">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="section-title text-center mb-4 pb-2">
                <h4 class="title mb-4">آموزش <a href="{{route('client.buy.step1.create')}}"><span class="text-success">خرید تتر</span></a>  در سایت تتریار</h4>
            </div>
        </div><!--end col-->
    </div><!--end row-->
    <div class="row align-items-center">
        <div class="col-md-5 mt-4 pt-2">
            <ul class="nav nav-pills bg-white nav-justified flex-column mb-0" id="pills-tab" role="tablist">
                <li class="nav-item bg-light rounded-md">
                    <a class="nav-link rounded-md active" id="dashboard" data-bs-toggle="pill" href="#buy-main-page" role="tab" aria-controls="dash-board" aria-selected="false">
                        <div class="p-3 text-start">
                            <h5 class="title">صفحه اصلی</h5>
                            <p class="text-muted tab-para mb-0">پس از ورود به سایت یا اپلیکیشن تتریار، گزینه 'میخواهم تتر بخرم' را انتخاب کنید .</p>
                        </div>
                    </a><!--end nav link-->
                </li><!--end nav item-->

                <li class="nav-item bg-light rounded-md mt-4">
                    <a class="nav-link rounded-md" id="timeline" data-bs-toggle="pill" href="#buy-step1" role="tab" aria-controls="time-line" aria-selected="false">
                        <div class="p-3 text-start">
                            <h5 class="title">مرحله اول : وارد کردن مقدار تتر موردنظر</h5>
                            <p class="text-muted tab-para mb-0">مقدار تتر که قصد خرید آن را دارید را وارد نمایید و گزینه تایید را بزنید .</p>
                        </div>
                    </a><!--end nav link-->
                </li><!--end nav item-->

                <li class="nav-item bg-light rounded-md mt-4">
                    <a class="nav-link rounded-md" id="paymentmanagement" data-bs-toggle="pill" href="#buy-step2" role="tab" aria-controls="payment-management" aria-selected="false">
                        <div class="p-3 text-start">
                                <h5 class="title">مرحله دوم : ورود به حساب کاربری یا ایجاد حساب</h5>
                            <p class="text-muted tab-para mb-0"> با وارد کردن شماره همراه و دریافت کد تاییدیه وارد حساب کاربری خود شوید (در صورت نداشتن حساب کاربری به صورت خودکار برای شما ساخته می شود.)</p>
                        </div>
                    </a><!--end nav link-->
                </li><!--end nav item-->

                <li class="nav-item bg-light rounded-md mt-4">
                    <a class="nav-link rounded-md" id="fileintegrate" data-bs-toggle="pill" href="#buy-step3" role="tab" aria-controls="file-integrate" aria-selected="false">
                        <div class="p-3 text-start">
                            <h5 class="title">مرحله سوم : احرازهویت</h5>
                            <p class="text-muted tab-para mb-0">در صورتی که احراز هویت خود را قبلا انجام نداده اید ، فرم احراز هویت را تکمیل کرده و به همراه تصویر کارت ملی ارسال کنید .</p>
                        </div>
                    </a><!--end nav link-->
                </li><!--end nav item-->

                <li class="nav-item bg-light rounded-md mt-4">
                    <a class="nav-link rounded-md" id="fileintegrate" data-bs-toggle="pill" href="#buy-step4" role="tab" aria-controls="file-integrate" aria-selected="false">
                        <div class="p-3 text-start">
                            <h5 class="title">مرحله چهارم : وارد کردن آدرس کیف پول</h5>
                            <p class="text-muted tab-para mb-0">پس از تایید مدارک احراز هویت ، با وارد کردن آدرس کیف پول و پذیرفتن قوانین و مقررات سایت تتریار به درگاه پرداخت متصل می شوید . پس از واریز وجه و با دریافت شماره پیگیری واریز تتر به کیف پول شما در سریع ترین زمان ممکن صورت می پذیرد</p>
                        </div>
                    </a><!--end nav link-->
                </li><!--end nav item-->

            </ul><!--end nav pills-->
        </div><!--end col-->

        <div class="col-md-7 col-12 mt-4 pt-2">
            <div class="tab-content ms-lg-4" id="buy-main-page">
                <div class="tab-pane fade show active" id="main_page" role="tabpanel" aria-labelledby="dashboard">
                    <img src="/assets/images/edu/b1.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                </div><!--end teb pane-->

                <div class="tab-pane fade" id="buy-step1" role="tabpanel" aria-labelledby="timeline">
                    <img src="/assets/images/edu/b2.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                </div><!--end teb pane-->

                <div class="tab-pane fade" id="buy-step2" role="tabpanel" aria-labelledby="paymentmanagement">
                    <img src="/assets/images/edu/b5.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                </div><!--end teb pane-->

                <div class="tab-pane fade" id="buy-step3" role="tabpanel" aria-labelledby="fileintegrate">
                    <img src="/assets/images/edu/b3.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                </div><!--end teb pane-->

                <div class="tab-pane fade" id="buy-step4" role="tabpanel" aria-labelledby="fileintegrate">
                    <img src="/assets/images/edu/b4.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                </div><!--end teb pane-->
            </div><!--end tab content-->
        </div><!--end col-->
    </div><!--end row-->
</div>

    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-4">آموزش <a href="{{route('client.sell.step1.create')}}"><span class="text-danger">فروش تتر</span></a>  در سایت تتریار</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="row align-items-center">
            <div class="col-md-5 mt-4 pt-2">
                <ul class="nav nav-pills bg-white nav-justified flex-column mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item bg-light rounded-md">
                        <a class="nav-link rounded-md active" id="dashboard" data-bs-toggle="pill" href="#sell-main-page" role="tab" aria-controls="dash-board" aria-selected="false">
                            <div class="p-3 text-start">
                                <h5 class="title">صفحه اصلی</h5>
                                <p class="text-muted tab-para mb-0">پس از ورود به سایت یا اپلیکیشن تتریار، گزینه 'میخواهم تتر بفروشم' را انتخاب کنید .</p>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item bg-light rounded-md mt-4">
                        <a class="nav-link rounded-md" id="timeline" data-bs-toggle="pill" href="#sell-step1" role="tab" aria-controls="time-line" aria-selected="false">
                            <div class="p-3 text-start">
                                <h5 class="title">مرحله اول : وارد کردن مقدار تتر موردنظر جهت فروش</h5>
                                <p class="text-muted tab-para mb-0"> مقدار تتر که قصد فروش آن را دارید را وارد نمایید و گزینه تایید را بزنید .</p>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item bg-light rounded-md mt-4">
                        <a class="nav-link rounded-md" id="paymentmanagement" data-bs-toggle="pill" href="#sell-step2" role="tab" aria-controls="payment-management" aria-selected="false">
                            <div class="p-3 text-start">
                                <h5 class="title">مرحله دوم : وارد کردن اطلاعات فروشنده</h5>
                                <p class="text-muted tab-para mb-0"> اطلاعات خواسته شده را به درستی وارد نمایید و کلید تایید را بزنید . (فروش تتر نیاز به احراز هویت ندارد. )</p>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item bg-light rounded-md mt-4">
                        <a class="nav-link rounded-md" id="fileintegrate" data-bs-toggle="pill" href="#sell-step3" role="tab" aria-controls="file-integrate" aria-selected="false">
                            <div class="p-3 text-start">
                                <h5 class="title">مرحله سوم : وارد کردن اطلاعات بانکی</h5>
                                <p class="text-muted tab-para mb-0">شماره شبا و نام بانک خود را با دقت وارد نمایید و سپس کلید تایید را بزنید .</p>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item bg-light rounded-md mt-4">
                        <a class="nav-link rounded-md" id="fileintegrate" data-bs-toggle="pill" href="#sell-step4" role="tab" aria-controls="file-integrate" aria-selected="false">
                            <div class="p-3 text-start">
                                <h5 class="title">مرحله چهارم : تایید اطلاعات</h5>
                                <p class="text-muted tab-para mb-0">در صورت درستی اطلاعات نمایش داده شده در این مرحله ، با قبول قوانین و مقررات تتریار ، گزینه تایید را بزنید . </p>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                    <li class="nav-item bg-light rounded-md mt-4">
                        <a class="nav-link rounded-md" id="fileintegrate" data-bs-toggle="pill" href="#sell-step5" role="tab" aria-controls="file-integrate" aria-selected="false">
                            <div class="p-3 text-start">
                                <h5 class="title">مرحله پنجم : تایید اطلاعات</h5>
                                <p class="text-muted tab-para mb-0">شبکه ای که قصد دارید با آن تتر را منتقل کنید، انتخاب کرده و مقدار تتر خواسته شده را به آدرس ولت تتریار انتقال دهید . ( توجه فرمایید تتر ارسالی پس از کسر کارمزد تعداد تتر خواسته شده باشد . )پس از انتقال تتر شناسه تراکنش یا همان TXID را از قسمت تاریخچه تراکنش های کیف پول خودتان کپی کرده و در کادر مربوطه وارد نمایید . </p>
                            </div>
                        </a><!--end nav link-->
                    </li><!--end nav item-->

                </ul><!--end nav pills-->
            </div><!--end col-->

            <div class="col-md-7 col-12 mt-4 pt-2">
                <div class="tab-content ms-lg-4" id="sell-main-page">
                    <div class="tab-pane fade show active" id="main_page" role="tabpanel" aria-labelledby="dashboard">
                        <img src="/assets/images/edu/s1.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                    </div><!--end teb pane-->

                    <div class="tab-pane fade" id="sell-step1" role="tabpanel" aria-labelledby="timeline">
                        <img src="/assets/images/edu/s2.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                    </div><!--end teb pane-->

                    <div class="tab-pane fade" id="sell-step2" role="tabpanel" aria-labelledby="paymentmanagement">
                        <img src="/assets/images/edu/s3.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                    </div><!--end teb pane-->

                    <div class="tab-pane fade" id="sell-step3" role="tabpanel" aria-labelledby="fileintegrate">
                        <img src="/assets/images/edu/s4.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                    </div><!--end teb pane-->

                    <div class="tab-pane fade" id="sell-step4" role="tabpanel" aria-labelledby="fileintegrate">
                        <img src="/assets/images/edu/s5.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                    </div><!--end teb pane-->

                    <div class="tab-pane fade" id="sell-step5" role="tabpanel" aria-labelledby="fileintegrate">
                        <img src="/assets/images/edu/s6.png" class="img-fluid mx-auto rounded-md shadow-lg d-block" alt="">
                    </div><!--end teb pane-->
                </div><!--end tab content-->
            </div><!--end col-->
        </div><!--end row-->
    </div>




@endsection
