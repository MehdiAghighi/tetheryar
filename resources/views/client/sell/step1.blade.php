@extends('client.layouts.master')

@section('content')


    <script src="{{asset('assets/js/num2persian/dist/num2persian.js')}}"></script>

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
                                    <li class="breadcrumb-item active" aria-current="page">وارد کردن مقدار</li>
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
                                    قیمت فروش تتر به سایت : <span class="fw-bolder"> {{number_format($sellPrice)}} تومان</span>
                                </p>
                            </div>
                        </div>
                        <input type="hidden" id="sellTetherPrice" value="{{$sellPrice}}">
                        <div class="content mt-4 pt-2">
                            <form action="{{route('client.sell.step1.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">مقدار تتر مورد نظر را وارد نمایید <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="money" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" name="tether_amount" autocomplete="off" type="number" step="0.01" value="{{old('tether_amount')}}" placeholder="مقدار تتر" id="tether_amount">
                                                <div class="mt-1">
                                                    <div id="tether_persian" class="small d-inline"> </div>
                                                    <span id="tether" class="small mr-1 text-danger" style="display: none">تتر می دهید</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">مبلغ مورد نظر را به تومان وارد کنید <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" name="toman_amount" autocomplete="off" type="number" value="{{old('toman_amount')}}" placeholder="مبلغ به تومان" id="toman_amount">
                                                <div class="mt-1">
                                                    <div id="toman_persian" class="small d-inline"> </div>
                                                    <span id="toman" class="small mr-1 text-success" style="display: none">تومان دریافت می کنید</span>
                                                </div>
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

@section('script')

    <script>

        onload = function () {
            var e = document.getElementById('toman_amount');
            e.oninput = myHandler;
            e.onpropertychange = e.oninput; // for IE8
            function myHandler() {
                document.getElementById('toman_persian').innerHTML = e.value.toPersianLetter();
            }
        }

        $('#toman_amount').keyup(function() {



            var tetherPrice =$('#sellTetherPrice').val();
            var tomanAmount =$('#toman_amount').val();


            tetherAmount= tomanAmount/tetherPrice ;
            if(tetherAmount < 0.1)
            {
                tetherAmount = 0 ;
            }else {
                tetherAmount = tetherAmount.toFixed(2);
            }
            $('#tether_amount').val(tetherAmount);


            if(!$(this).val())
            {
                $('#tether_amount').val("");
                $('#toman').hide();
                $('#toman_persian').empty();
            }else {
                $('#toman').show();
            }


        });

        $('#tether_amount').keyup(function() {

            var tetherPrice =parseInt($('#sellTetherPrice').val());
            var tetherAmount =parseInt($('#tether_amount').val());
            tomanAmount= tetherPrice*tetherAmount ;

            $('#toman_amount').val(tomanAmount);

            var e = document.getElementById('tether_amount');
            e.oninput = myHandler;
            e.onpropertychange = e.oninput; // for IE8
            function myHandler() {
                document.getElementById('tether_persian').innerHTML = e.value.toPersianLetter();
            }

            if(!$(this).val())
            {
                $('#toman_amount').val("");
                $('#tether').hide();
                $('#tether_persian').empty();
            }else {
                $('#tether').show();
            }
        });




    </script>

@endsection
