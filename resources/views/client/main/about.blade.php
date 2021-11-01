@extends('client.layouts.master')

@section('content')
    <section class="bg-half bg-header d-table w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="">
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{route('client.index')}}">تتریار</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">درباره تتریار</li>
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

    <div class="container text-justify mt-5" dir="rtl" style="line-height: 2.2">
        <h2 class="text-center">درباره تتریار</h2>
        <p>
            خرید تتر اساس ورود به دنیای ارزهای دیجیتال است.تتریار با توجه به فراگیری و افزایش روز افزون محبوبیت استفاده از ارزهای دیجیتال در سراسر جهان با هدف پاسخگویی به نیاز مردم کشور عزیزمان برخود لازم دانسته تا با توجه به پتانسیل های علمی و فنی بالا ، با بهره گیری از نیروهای جوان ، متخصص و فارغ التحصیلان دانشگاه های برتر کشور( دانشگاه صنعتی شریف،دانشگاه تهران،دانشگاه علم و صنعت )اقدام به ایجادبستری مطمئن، آسان،با بهترین قیمت خرید و فروش تتر در راستای تسهیل معاملات و حفظ دارایی کاربران نموده است. تتریار همواره متعهد به ایجاد بستری مطمئن، آسان و بهترین قیمت خرید و فروش تتر برای کاربران عزیز می باشد.تیم های فنی و پشتیبانی ما آماده ی ارائه ی خدمات به کاربران میباشند.

        </p>
    </div>

     <!-- ======= Clients Section ======= -->
   

@endsection
