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
                                    <li class="breadcrumb-item active" aria-current="page">وارد کردن اطلاعات بانکی</li>
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
                            <form action="{{route('client.sell.step3.store')}}" method="post">
                                @csrf
                                <div class="row">
                                @if($tomanAmount >= 10000000)
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">شماره شبا <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input class="form-control ps-5" name="shaba" type="number" step="1"
                                                           value="@if($sellRequest==null){{old('shaba')}}@else{{$sellRequest->shaba}}@endif"
                                                           placeholder="شماره شبا که میخواهید واریز انجام شود ." id="shaba" oninvalid="setCustomValidity('لطفا شماره شبا را وارد کنید')"
                                                           oninput="setCustomValidity('')"
                                                           required>
                                                </div>
                                            </div>
                                        </div><!--end col-->
                                @endif

                                    @if($tomanAmount < 10000000)

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">شماره کارت <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="cart" class="fea icon-sm icons"></i>
                                                    <input class="form-control ps-5" name="cart" type="number" step="1"
                                                           value="@if($sellRequest==null){{old('cart')}}@else{{$sellRequest->cart}}@endif"
                                                           placeholder="شماره کارتی که میخواهید واریز انجام شود ." id="cart" style="height: 40px" oninvalid="setCustomValidity('لطفا شماره کارت را وارد کنید')"
                                                           oninput="setCustomValidity('')"
                                                           required>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                    @endif

                                    <div class="row mt-2 mb-2">

                                        <label class="form-label">نام بانک <span class="text-danger">*</span></label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="bank" oninvalid="setCustomValidity('لطفا بانک مقصد را مشخص نمایید')"
                                                oninput="setCustomValidity('')"
                                                required>
                                            <option value="" disabled selected>لطفا نام بانک را انتخاب کنید</option>
                                            <option value="بانک ملی ایران" >بانک ملی ایران</option>
                                            <option value="بانک سپه" >بانک سپه</option>
                                            <option value="بانک صنعت و معدن" >بانک صنعت و معدن</option>
                                            <option value="بانک کشاورزی" >بانک کشاورزی</option>
                                            <option value="بانک مسکن" >بانک مسکن</option>
                                            <option value="بانک توسعه صادرات ایران" >بانک توسعه صادرات ایران</option>
                                            <option value="بانک توسعه تعاون" >بانک توسعه تعاون</option>
                                            <option value="پست بانک ایران" >پست بانک ایران</option>
                                            <option value="بانک اقتصاد نوین" >بانک اقتصاد نوین</option>
                                            <option value="بانک پارسیان" >بانک پارسیان</option>
                                            <option value="بانک کارآفرین" >بانک کارآفرین</option>
                                            <option value="بانک سامان" >بانک سامان</option>
                                            <option value="بانک سینا" >بانک سینا</option>
                                            <option value="بانک خاورمیانه" >بانک خاورمیانه</option>
                                            <option value="بانک شهر" >بانک شهر</option>
                                            <option value="بانک دی" >بانک دی</option>
                                            <option value="بانک صادرات" >بانک صادرات</option>
                                            <option value="بانک ملت" >بانک ملت</option>
                                            <option value="بانک تجارت" >بانک تجارت</option>
                                            <option value="بانک رفاه" >بانک رفاه</option>
                                            <option value="بانک حکمت ایرانیان" >بانک حکمت ایرانیان</option>
                                            <option value="بانک گردشگری" >بانک گردشگری</option>
                                            <option value="بانک ایران زمین" >بانک ایران زمین</option>
                                            <option value="بانک قوامین" >بانک قوامین</option>
                                            <option value="بانک انصار" >بانک انصار</option>
                                            <option value="بانک سرمایه" >بانک سرمایه</option>
                                            <option value="بانک پاسارگاد" >بانک پاسارگاد</option>
                                            <option value="بانک قرض الحسنه مهر ایران" >بانک قرض الحسنه مهر ایران</option>
                                            <option value="بانک قرض الحسنه رسالت" >بانک قرض الحسنه رسالت</option>

                                        </select>

                                    </div>

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


