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
                                    <li class="breadcrumb-item active" aria-current="page">وارد کردن آدرس ولت</li>
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
                            <form action="{{route('client.buy.step4.store')}}" method="post">
                                @csrf
                                <label class="form-label">شبکه تتر مورد نظر را انتخاب کنید <span class="text-danger">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tether_type" value="TRC-20" id="inlineRadio1" checked>
                                    <label class="form-check-label" for="inlineRadio1">TRC-20</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tether_type" value="ERC-20" id="inlineRadio2">
                                    <label class="form-check-label" for="inlineRadio2">ERC-20</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="" id="inlineRadio3" value="option3" disabled>
                                    <label class="form-check-label" for="inlineRadio3">OMNI</label>
                                </div>
                                <div class="row mt-3">

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">آدرس کیف پول خود را وارد نمایید <span class="text-danger">*</span></label>
                                            <div class="form-icon position-relative">
                                                <i data-feather="bag" class="fea icon-sm icons"></i>
                                                <input class="form-control ps-5" type="text"  name="walletAddress" value="{{old('walletAddress')}}" placeholder="آدرس ولت" id="walletAddress" oninvalid="setCustomValidity('وارد کردن آدرس ولت الزامی است')"
                                                       oninput="setCustomValidity('')"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check mb-3" >
                                            <input class="form-check-input" type="checkbox" name="rules" value="rules" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <a href="#" class="text-primary"> قوانین و مقررات </a>سایت تتریار را خوانده ام و با کلیه قوانین موافقم .
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-2">
                                        <label for="exampleInputEmail1" class="float-right">
                                            <img src="{{captcha_src()}}" id="captcha" alt="خرید تتر">
                                            <a href="javascript:void(0)"><i onclick="loadCaptcha()" class="uil-refresh  mr-3" style="font-size: 25px"></i></a>
                                        </label>
                                        <div class="input-group col-md-12" dir="rtl">

                                            <input class="form-control ps-5" type="number" autocomplete="off"  name="captcha" placeholder="عبارت امنیتی" oninvalid="setCustomValidity('لطفا عبارت امنیتی را وارد نمایید')"
                                                   oninput="setCustomValidity('')"
                                                   required>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    @include('client.layouts.errors')
                                    <div class="col-lg-12 mt-2">
                                        <div class="d-grid">
                                            <button class="btn btn-success">تایید و اتصال به درگاه<i class="uil uil-angle-left-b align-middle"></i></button>
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
        function loadCaptcha(){
            $.ajax({
                url: '/captcha/load' ,
                type : 'post' ,
                data: {
                    _token : "{{csrf_token()}}"
                },
                success : function (data){
                    $('#captcha').attr('src' , data.imageSource)
                }
            });
        }
    </script>
@endsection
