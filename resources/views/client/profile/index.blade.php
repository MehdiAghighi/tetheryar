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
                                                        کد معرف :
                                                        @if($authentication != 'no authentication')
                                                            <span class="text-dark fw-bolder">{{$user->identifier_code}}</span>
                                                        @else
                                                            برای دریافت کد معرف لازم است احراز هویت خود را تکمیل کنید .
                                                        @endif
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
                    <div class="border-bottom pb-4">
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <h5>جزئیات حساب کاربری :</h5>
                                <div class="mt-4">
                                    <div class="d-flex align-items-center">
                                        <i data-feather="mail" class="fea icon-ex-md text-primary me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-muted mb-0">نام و نام خانوادگی :</h6>
                                            <a href="javascript:void(0)" class="text-primary">

                                                @if($authentication != 'no authentication')
                                                    {{$user->authRequest->first_name . ' ' . $user->authRequest->last_name}}
                                                @else
                                                    <span class="text-warning">احراز هویت نشده</span>
                                                @endif

                                            </a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-primary me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-muted mb-0">کد ملی :</h6>
                                            <a href="javascript:void(0)" class="text-primary">

                                                @if($authentication != 'no authentication')
                                                    {{$user->authRequest->nationalCode}}
                                                @else
                                                    <span class="text-warning">احراز هویت نشده</span>
                                                @endif

                                            </a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-primary me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-muted mb-0">شماره همراه ثبت شده :</h6>
                                            <a href="javascript:void(0)" class="text-primary">
                                               {{$user->mobile}}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-primary me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-muted mb-0">کد معرف جهت دعوت دوستان :</h6>
                                            <a href="javascript:void(0)" class="text-primary">

                                                @if($authentication != 'no authentication')
                                                    {{$user->identifier_code}}
                                                @else
                                                    <span class="text-warning">برای دریافت کد معرف لازم است احرازهویت خود را تکمیل کنید !</span>
                                                @endif

                                            </a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-primary me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-muted mb-0">لینک دعوت از دوستان :</h6>
                                            <a href="javascript:void(0)" class="text-primary">

                                                @if($authentication != 'no authentication')
                                                  https://tetheryar.com/register/{{$user->identifier_code}}
                                                @else
                                                    <span class="text-warning">برای دریافت لینک معرف لازم است احرازهویت خود را تکمیل کنید !</span>
                                                @endif

                                            </a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mt-3">
                                        <i data-feather="mail" class="fea icon-ex-md text-primary me-3"></i>
                                        <div class="flex-1">
                                            <h6 class="text-muted mb-0">تعداد کاربران دعوت شده توسط من :</h6>
                                            <a href="javascript:void(0)" class="text-primary">
                                                {{$invitedUserNumber}}

                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div><!--end col-->

                        </div><!--end row-->
                    </div>

                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Profile End -->


@endsection
