
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>تتریار-tetheryar | خرید و فروش تتر USDT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="تتریار(tetheryar) مطمئن ترین و سریع ترین مرجع تخصصی خرید و فروش تتر (USDT) در ایران با بهترین قیمت تتر در بازار." name="description">
    <meta content="'خرید تتر','فروش تتر','خرید سریع تتر','خرید راحت تتر','خرید تتر با کارمزد کم','فروش تتر با کارمزد کم','خرید تتر بدون احراز هویت','تبدیل ریال به تتر','تبدیل تتر به ریال','فروش سریع تتر','فروش تتر بدون احراز هویت',"  name="keywords">

    <meta name="author" content="tetheryar" />
     <meta name="website" content="https://tetheryar.com" />
    <meta name="Version" content="v2.2.1" />
    <!-- favicon -->
    <link rel="shortcut icon" href="/assets/images/logo.png">
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- tobii css -->
    <link href="/assets/css/tobii.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="/assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Slider -->
    <link rel="stylesheet" href="/assets/css/tiny-slider.css"/>
    <!-- Main Css -->
    <link href="/assets/css/style.min.css?version=3" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="/assets/css/colors/default.css" rel="stylesheet" id="color-opt">
    <script type="text/javascript">
        !function(){var i="knu28J",a=window,d=document;function g(){var g=d.createElement("script"),s="https://www.goftino.com/widget/"+i,l=localStorage.getItem("goftino_"+i);g.async=!0,g.src=l?s+"?o="+l:s;d.getElementsByTagName("head")[0].appendChild(g);}"complete"===d.readyState?g():a.attachEvent?a.attachEvent("onload",g):a.addEventListener("load",g,!1);}();
    </script>
</head>

<body>
<!-- Loader -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader -->

<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <!-- Logo container-->
        <div>
            <a class="logo" href="{{route('client.index')}}">
{{--               <h2 class="text-white">تتریار</h2>--}}
                <img src="/assets/images/logo2.png" class="l-light" height="60">
                <img src="/assets/images/logo2.png" class="l-dark" height="60">
            </a>
        </div>
        @auth()
            <div class="buy-button">
                <a href="{{route('client.profile')}}" >
                    <div class="btn btn-primary login-btn-primary">{{$fullName}}</div>
                    <div class="btn btn-light login-btn-light">{{$fullName}}</div>
                </a>
            </div>
        @else
            <div class="buy-button">
                <a href="{{route('client.login')}}" >
                    <div class="btn btn-primary login-btn-primary">ورود / ثبت نام</div>
                    <div class="btn btn-light login-btn-light">ورود / ثبت نام</div>
                </a>
            </div>
        @endauth

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{route('client.index')}}" class="sub-menu-item">صفحه اصلی </a></li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">خرید و فروش تتر</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{route('client.buy.step1.create')}}" class="sub-menu-item">خرید تتر</a></li>
                        <li><a href="{{route('client.sell.step1.create')}}" class="sub-menu-item">فروش تتر</a></li>
                    </ul>
                </li>
                <li><a href="{{route('client.education')}}" class="sub-menu-item">آموزش خرید و فروش تتر </a></li>
                <li><a href="{{route('client.rules')}}" class="sub-menu-item">قوانین</a></li>
                <li><a href="/blog" class="sub-menu-item">وبلاگ</a></li>
                <li><a href="{{route('client.contact.create')}}" class="sub-menu-item">تماس با ما</a></li>
                 @if(! \Illuminate\Support\Facades\Auth::check())
                     <li><a href="{{route('client.about')}}" class="sub-menu-item">درباره ما</a></li>
                @endif
               
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li><a href="{{route('client.index')}}" class="sub-menu-item">
                            موجودی کیف پول :<span class="text-info">{{$userCash->cash}}</span>
                        </a>
                    </li>
                @endif
            </ul><!--end navigation menu-->

        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

@yield('content')

< <!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-footer">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->
<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="#" class="logo-footer">
                    <img src="/assets/images/logo2.png" height="100" alt="">
                </a>
                <p class="mt-4">تتریار مطمئن ترین و سریع ترین مرجع تخصصی خرید تتر و فروش تتر (USDT) در ایران با بهترین قیمت تتر در بازار</p>

            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">لینک های مفید </h5>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="{{route('client.buy.step1.create')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i>خرید تتر</a></li>
                    <li><a href="{{route('client.sell.step1.create')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i>فروش تتر</a></li>
                    <li><a href="{{route('client.rules')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i>قوانین تتریار</a></li>
                    <li><a href="{{route('client.contact.create')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i>ارتباط با ما</a></li>
                    <li><a href="{{route('client.education')}}" class="text-foot"><i class="uil uil-angle-left-b me-1"></i>آموزش خرید و فروش تتر</a></li>
                </ul>
            </div><!--end col-->

            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h5 class="text-light footer-head">خبرنامه </h5>
                <p class="mt-4">ثبت نام کنید و آخرین اخبار را از طریق ایمیل دریافت کنید.</p>
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="foot-subscribe mb-3">
                                <label class="form-label">ایمیل خود را بنویسید <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <input type="email" name="email" id="emailsubscribe" class="form-control ps-5 rounded" placeholder="ایمیل شما: " required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-grid">
                                <input type="submit" id="submitsubscribe" name="send" class="btn btn-soft-primary" value="خبرنامه">
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-start">
                    <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> کلیه حقوق مادی و معنوی این سایت متعلق به   <a href="{{route('client.index')}}" target="_blank" class="text-reset"> تتریار</a> است.</p></br>
                    <span style="font-size:4px">آراد تدبیر نوآوران سپنتا</span>
                </div>
            </div><!--end col-->

            <div class="col-sm-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <ul class="list-unstyled text-sm-end mb-0">
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/american-ex.png" class="avatar avatar-ex-sm" title="آمریکن اکسپرس" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/discover.png" class="avatar avatar-ex-sm" title="کشف کردن" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/master-card.png" class="avatar avatar-ex-sm" title="مستر کارت" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/paypal.png" class="avatar avatar-ex-sm" title="پی پال" alt=""></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/payments/visa.png" class="avatar avatar-ex-sm" title="ویزا" alt=""></a></li>
                </ul>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<!-- Footer End -->
<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
<!-- Back to top -->
<a href="https://wa.me/+989383972430" class="whatsapp-support shadow-lg" target="_blank"><i class="uil uil-whatsapp" style="font-size: 24px"></i></a>

<!-- javascript -->
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<!-- SLIDER -->
<script src="/assets/js/tiny-slider.js"></script>
<!-- tobii js -->
<script src="/assets/js/tobii.min.js"></script>
<!-- Icons -->
<script src="/assets/js/feather.min.js"></script>
<!-- Switcher -->
<script src="/assets/js/switcher.js"></script>
<!-- Main Js -->
<script src="/assets/js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
<script src="/assets/js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@yield('script')
</body>

</html>
