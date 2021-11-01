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
                                    <li class="breadcrumb-item"><a href="{{route('client.index')}}">تتریار </a></li>
                                    <li class="breadcrumb-item"><a href="{{route('client.sell.step1.create')}}">فروش تتر </a></li>
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

                        <p class="container">

                            <p class="text-justify" style="line-height: 2.2">

                                اطلاعات درخواستی شما ذخیره شد . همکاران ما پس از بررسی اطلاعات با شما تماس خواهند گرفت .
                                کد پیگیری شما :
                            <p class="text-info fw-bolder text-center" style="letter-spacing: 3px;"> {{$trackingCode}}
                            </p>
                        </p>
                        <div class="form-group mt-5">
                            <a href="{{route('client.index')}}">
                                <div class="col-lg-12 mt-2">
                                    <div class="d-grid">
                                        <button class="btn btn-success"><i class="uil uil-angle-right-b align-middle"></i> جزئیات تراکنش های من </button>
                                    </div>
                                </div>
                            </a>

                        </div>

                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

@endsection

@section('script')


@endsection
