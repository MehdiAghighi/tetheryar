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
                                    <li class="breadcrumb-item active" aria-current="page">مشخصات فروشنده</li>
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
                                <p>
                                    مقدار تتر قابل فروش شما : <span class="font-weight-bold text-info"> {{$tetherAmount}} تتر </span>

                                </p>
                            </div>
                        </div>

                        <div class="content mt-4 pt-2">
                            <form action="{{route('client.sell.step2.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">نام و نام خانوادگی <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" name="name" value="@if(auth()->check() && $authStatus == 'approved'){{auth()->user()->authRequest->first_name . ' ' . auth()->user()->authRequest->last_name}}
                                                @endif"
                                                       placeholder="نام و نام خانوادگی مطابق کارت ملی" id="name" style="height: 50px" oninvalid="setCustomValidity('لطفا نام خود را وارد کنید')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">شماره همراه <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mobile" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" name="mobile" type="number"
                                                       value="@if(auth()->check()){{auth()->user()->mobile}}@endif" placeholder="شماره همراه" id="mobile" style="height: 50px"oninvalid="setCustomValidity('لطفا شماره موبایل را وارد کنید')"
                                                       oninput="setCustomValidity('')"
                                                       required >
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">ایمیل<span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" name="mail" type="email"
                                                       value="{{old('mail')}}" placeholder="ایمیل" id="mail" style="height: 50px" oninvalid="setCustomValidity('ایمیل معتبر نیست')"
                                                       oninput="setCustomValidity('')"
                                                       required >
                                            </div>
                                        </div>
                                    </div><!--end col-->


                                    @include('client.layouts.errors')
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

