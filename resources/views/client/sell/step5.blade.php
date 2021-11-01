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
                                    <li class="breadcrumb-item active" aria-current="page">وارد کردن TXID</li>

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

                        <div class="order-2 order-md-1 mt-4 pt-2 mt-sm-0 pt-sm-0">
                            <div class="bg-white shadow rounded position-relative overflow-hidden">
                                <div class="text-center">
                                    <ul class="nav nav-pills nav-justified flex-sm-row mb-0" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link py-2 active rounded-0" id="User-login" data-bs-toggle="pill" href="#TRC-20" role="tab" aria-controls="user" aria-selected="false">
                                                <div class="text-center py-2">
                                                    <h6 class="mb-0">TRC-20 </h6>
                                                </div>
                                            </a><!--end nav link-->
                                        </li><!--end nav item-->

                                        <li class="nav-item">
                                            <a class="nav-link py-2 rounded-0" id="Driver-login" data-bs-toggle="pill" href="#ERC-20" role="tab" aria-controls="driver" aria-selected="false">
                                                <div class="text-center py-2">
                                                    <h6 class="mb-0">ERC-20 </h6>
                                                </div>
                                            </a><!--end nav link-->
                                        </li><!--end nav item-->
                                    </ul>
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="card border-0 tab-pane fade show active" id="TRC-20" role="tabpanel" aria-labelledby="User-login">
                                        <form class="card-body" action="{{route('client.sell.step5.store')}}" method="post">
                                            @csrf
                                            <p class="" style="line-height: 2.2">
                                                لطفا مقدار <span class="font-weight-bold text-info"> {{$sellRequest->tetherAmountSend}} </span> تتر TRC-20 به آدرس ولت زیر واریز نمایید سپس TXID مربوطه را وارد کنید .
                                            </p>
                                            <p class="text-right small text-danger">
                                                توجه فرمایید تتر ارسالی پس از کسر کارمزد تعداد {{$sellRequest->tetherAmountSend}}تتر  باشد .
                                            </p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">آدرس ولت </label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" value="{{$wallet[0]['wallet_address']}}" disabled>

                                                            <i class="uil-qrcode-scan" style="font-size: 2rem;" data-toggle="popover" title="کیف پول TRC-20"></i>

                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">TXID <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="txid" value="{{old('txid')}}" placeholder="TXID" id="bank" style="height: 50px" oninvalid="setCustomValidity('لطفا TXID را وارد کنید')"
                                                                   oninput="setCustomValidity('')"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                @include('client.layouts.errors')
                                                <div class="col-md-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary">ثبت درخواست</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form><!--end form-->
                                    </div><!--end teb pane-->

                                    <div class="card border-0 tab-pane fade" id="ERC-20" role="tabpanel" aria-labelledby="Driver-login">
                                        <form class="card-body" action="{{route('client.sell.step5.store')}}" method="post">
                                            @csrf
                                            <p class="" style="line-height: 2.2">
                                                لطفا مقدار <span class="font-weight-bold text-info"> {{$sellRequest->tetherAmountSend}} </span> تتر ERC-20 به آدرس ولت زیر واریز نمایید سپس TXID مربوطه را وارد کنید .
                                            </p>
                                            <p class="text-right small text-danger">
                                                توجه فرمایید تتر ارسالی پس از کسر کارمزد تعداد {{$sellRequest->tetherAmountSend}}تتر  باشد .
                                            </p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">آدرس ولت </label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="user" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" value="{{$wallet[1]['wallet_address']}}" disabled>

                                                            <i class="uil-qrcode-scan mr-2" style="font-size: 2rem;" data-toggle="popover2" title="کیف پول ERC-20"></i>

                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">TXID <span class="text-danger">*</span></label>
                                                        <div class="form-icon position-relative">
                                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                                            <input type="text" class="form-control ps-5" name="txid" value="{{old('txid')}}" placeholder="TXID" id="bank" style="height: 50px" oninvalid="setCustomValidity('لطفا TXID را وارد کنید')"
                                                                   oninput="setCustomValidity('')"
                                                                   required>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->
                                                @include('client.layouts.errors')
                                                <div class="col-md-12">
                                                    <div class="d-grid">
                                                        <button class="btn btn-primary">ثبت درخواست</button>
                                                    </div>
                                                </div><!--end col-->
                                            </div><!--end row-->
                                        </form><!--end form-->
                                    </div><!--end teb pane-->
                                </div><!--end tab content-->
                            </div>
                        </div><!--end col-->
                    </div>
                </div>


            </div>

        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover({
                // placement : 'top',
                trigger : 'hover',
                html : true,
                content : '<div class="media"><img src="/wallets/trc20.jpg" style="width: 40% !important;" class="mr-3" ></div>'
            });

            $('[data-toggle="popover2"]').popover({
                // placement : 'top',
                trigger : 'hover',
                html : true,
                content : '<div class="media"><img src="/wallets/erc20.jpg" style="width: 40% !important;" class="mr-3" ></div>'
            });
        });
    </script>
@endsection
