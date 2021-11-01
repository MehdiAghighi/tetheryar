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
                                                        موجودی کیف پول من :<span class="text-info">{{$userCash->cash}}</span>
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
                    <div class="card border-0 rounded shadow">
                        <div class="card-body">

                            <div class="table-responsive bg-white shadow rounded">
                                <table class="table mb-0 table-center table-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-bottom">شماره همراه</th>
                                        <th scope="col" class="border-bottom">احراز هویت</th>
                                        <th scope="col" class="border-bottom">مقدار تتر دریافتی</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Referrals as $Referral)
                                        <tr>
                                            <td dir="ltr">*******{{substr($Referral->user->mobile , -4)}}</td>
                                            <td>
                                                @if($Referral->user->auth )
                                                    <span class="text-success">احراز هویت شده</span>
                                                @else
                                                    <span class="text-danger">عدم احراز هویت</span>
                                                @endif
                                            </td>
                                            <td>{{$Referral->prize}} تتر</td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                            </div>

                        </div>

                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Profile End -->
@endsection
