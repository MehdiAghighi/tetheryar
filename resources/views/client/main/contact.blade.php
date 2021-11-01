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
                                    <li class="breadcrumb-item"><a href="{{route('client.index')}}">تتریار</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">ارتباط با تتریار</li>
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

    <!-- Start Contact -->
    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">آدرس 1 </h5>
                            <p class="text-muted">دانشگاه علوم و تحقیقات</p>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">آدرس 2 </h5>
                            <p class="text-muted">میدان پونک - خیابان شهید رمضانی - پلاک 26 - واحد 5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">تلفن تماس </h5>
                            <a class="text-primary" dir="ltr">۰۲۱ - ۲۸۴۲۹۰۸۵</a>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-map-marker d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">کانال تلگرام </h5>
                            <a href="https://t.me/tetheryar" class=" text-primary " target="_blank" dir="ltr">@tetheryar</a>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <div class="container">
             <div class="row">
                 <div class="col-md-3 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 text-center features feature-clean">
                        <div class="icons text-primary text-center mx-auto">
                            <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                        </div>
                        <div class="content mt-3">
                            <h5 class="fw-bold">ایمیل </h5>
                            <a href="mailto:contact@example.com" class="text-primary">info@tetheryar.com</a>
                        </div>
                    </div>
                </div><!--end col-->
               


            </div>
        </div>
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 pt-2 pt-sm-0 order-2 order-md-1">
                    <div class="card shadow rounded border-0">
                        <div class="card-body py-5">
                            <h4 class="card-title">برای ارتباط با پشتیانی از طرق فرم زیر اقدام نمایید</h4>
                            <div class="custom-form mt-3">
                                @include('client.layouts.errors')
                                @if(session()->has('success-message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success-message') }}
                                    </div>
                                @endif
                                <form method="post" action="{{route('client.contact.store')}}" >
                                    @csrf
                                    <p id="error-msg" class="mb-0"></p>
                                    <div id="simple-msg"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">نام شما <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                                    <input name="name" id="name" type="text" class="form-control ps-5" placeholder="نام شما" data-rule="minlen:5" data-msg="نام باید حداقل 5 کارکتر باشد" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">موبایل شما <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                                    <input name="mobile" id="email" type="number" class="form-control ps-5" placeholder="شماره تماس" data-rule="minlen:11" data-msg="شماره تماس باید 11 رقمی باشد" >
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">موضوع </label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="book" class="fea icon-sm icons"></i>
                                                    <input name="subject" id="subject" class="form-control ps-5" placeholder="موضوع" data-rule="minlen:5" data-msg="موضوع حداقل باید 5 کارکتر باشد">
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">نظرات  <span class="text-danger">*</span></label>
                                                <div class="form-icon position-relative">
                                                    <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                    <textarea name="message" id="comments" rows="4" class="form-control ps-5" data-rule="required" data-msg="پیام خود را وارد کنید ." placeholder="پیام شما ..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" id="submit" name="send" class="btn btn-primary">ارسال پیام</button>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end custom-form-->
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-7 col-md-6 order-1 order-md-2">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <img src="/assets/images/contact.svg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container-fluid mt-100 mt-60">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="card map border-0">
                        <div class="card-body p-0">
                            <iframe src="https://maps.google.com/maps?q=tehran%20,%20pounak%20,%20ramezani&t=&z=13&ie=UTF8&iwloc=&output=embed" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End contact -->

@endsection
