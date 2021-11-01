<div class="col-lg-4 col-md-6 col-12 d-lg-block">
    <div class="sidebar sticky-bar p-4 rounded shadow">
        <div class="widget mt-4">
            <ul class="list-unstyled sidebar-nav mb-0" id="navmenu-nav">
                <li class="navbar-item account-menu px-0">
                    <a href="{{route('client.profile')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                        <span class="h4 mb-0"><i class="uil uil-dashboard"></i></span>
                        <h6 class="mb-0 ms-2">اطلاعات حساب کاربری </h6>
                    </a>
                </li>

                <li class="navbar-item account-menu px-0 mt-2">
                    <a href="{{route('client.auth.edit')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                        <span class="h4 mb-0"><i class="uil uil-envelope-star"></i></span>
                        <h6 class="mb-0 ms-2">احراز هویت</h6>
                    </a>
                </li>

                <li class="navbar-item account-menu px-0 mt-2">
                    <a href="{{route('client.profile.buyLogs')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                        <span class="h4 mb-0"><i class="uil uil-users-alt"></i></span>
                        <h6 class="mb-0 ms-2">سوابق خرید تتر از سایت </h6>
                    </a>
                </li>

                <li class="navbar-item account-menu px-0 mt-2">
                    <a href="{{route('client.profile.sellLogs')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                        <span class="h4 mb-0"><i class="uil uil-file"></i></span>
                        <h6 class="mb-0 ms-2">سوابق فروش تتر به سایت</h6>
                    </a>
                </li>



                <li class="navbar-item account-menu px-0 mt-2">
                    <a href="{{route('client.profile.referrals')}}" class="navbar-link d-flex rounded shadow align-items-center py-2 px-4">
                        <span class="h4 mb-0"><i class="uil uil-transaction"></i></span>
                        <h6 class="mb-0 ms-2">کاربران دعوت شده توسط من</h6>
                    </a>
                </li>

                <li class="navbar-item account-menu px-0 mt-2">
                   <form method="post" action="{{route('client.logout')}}">
                       @csrf
                       @method('DELETE')
                       <input type="submit" class="btn btn-danger d-block" value="خروج از حساب">
                   </form>
                </li>
            </ul>

        </div>

    </div>
</div><!--end col-->
