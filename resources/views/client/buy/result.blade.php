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
                                    <li class="breadcrumb-item"><a href="{{route('client.index')}}">خرید تتر</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('client.buy.step1.create')}}">وارد کردن مقدار</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">نتیجه تراکنش</li>
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
                                <h3 class="my-3 text-success">خرید تتر</h3>
                            </div>
                        </div>

                        <div class="container">

                            @if($result->payment_status == 'OK')
                                <div class="alert alert-success" style="line-height: 2">
                                    <strong>   پرداخت شما با موفقیت انجام شد! </strong>
                                    همکاران ما به زودی با شما در تماس خواهند بود .
                                    شماره پیگیری شما :
                                    <p class="mt-3" style="letter-spacing: 2px">
                                        {{substr($result->transaction_id , -6)}}
                                    </p>


                                </div>
                                <div class="form-group mt-5">
                                    <a href="{{route('client.index')}}">
                                        <div class="col-lg-12 mt-2">
                                            <div class="d-grid">
                                                <button class="btn btn-success">جزئیات تراکنش های من<i class="uil uil-angle-left-b align-middle"></i></button>
                                            </div>
                                        </div>
                                    </a>

                                </div>

                            @else

                                <div class="alert alert-danger" style="line-height: 2">
                                    <strong>پرداخت شما ناموفق بود!</strong>
                                    در صورت برداشت پول از حساب شما نهایتا تا 72 ساعت وجه به حساب شما بازگردانده خواهد شد . در غیر این صورت با پشتیبان سایت تماس حاصل فرمایید .


                                    <p class="mt-3" style="letter-spacing: 2px;line-height: 2">
                                        شماره پیگیری شما :
                                        {{substr($result->transaction_id , -6)}}
                                    </p>



                                </div>
                                <div class="form-group mt-5">
                                    <a href="{{route('client.index')}}">
                                        <div class="col-lg-12 mt-2">
                                            <div class="d-grid">
                                                <button class="btn btn-success"><i class="uil uil-angle-right-b align-middle"></i> جزئیات تراکنش های من </button>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endif

                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

@endsection

@section('script')


@endsection
