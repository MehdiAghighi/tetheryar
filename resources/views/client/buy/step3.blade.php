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
                                    <li class="breadcrumb-item active" aria-current="page">تاییدیه شماره همراه</li>
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

                        <div class="content mt-4 pt-2">
                            <form action="{{route('client.buy.step3.store' , $user)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">کد ارسال شده را وارد نمایید <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mobile" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="number"  name="otpCode" value="{{old('otpCode')}}" placeholder="کد ارسال شده به شماره موبایل" id="mobile" oninvalid="setCustomValidity('کد ارسال شده را وارد نمایید')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    @include('client.layouts.errors')
                                    <div class="col-lg-12 mt-2">
                                        <div class="d-grid">
                                            <button class="btn btn-success"> تایید کد<i class="uil uil-angle-left-b align-middle"></i></button>
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


@endsection
