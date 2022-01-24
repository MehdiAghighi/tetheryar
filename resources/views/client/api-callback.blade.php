<html>
<head>
    <title> Payment {{ \Illuminate\Support\Str::ucfirst($status) }} ! </title>
    <link href="/assets/css/style.min.css?version=3" rel="stylesheet" type="text/css" id="theme-opt" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans' : [ 'IRANSansfanum' ]
                    }
                }
            }
        }
    </script>
</head>
</html>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white">

    <main class="flex h-screen bg-gray-100">
        <div class="m-auto">
            <!-- Hero card -->
            <div class="relative">
                <div class="absolute inset-x-0 bottom-0 h-1/2"></div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="relative shadow-xl bg-white sm:rounded-2xl sm:overflow-hidden">
                        <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                            <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                                <span class="block text-black">خرید شما</span>
                                <span class="block @if ($status == 'successful') text-indigo-700 @else text-red-500 @endif">
                                    @if ( $status == 'successful' )
                                        با موفقیت انجام شد.
                                    @else
                                        دچار مشکل شد.
                                    @endif
                                </span>
                            </h1>
                            <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-600 sm:max-w-3xl">
                                @if ( $status == 'successful' )
                                    از حسن انتخاب شما متشکریم.
                                @else
                                    لطفا با پشتیبانی تماس بگیرید.
                                @endif
                            </p>
                            <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                                <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-1 sm:gap-5">
                                    <a @if(!request()->query("webapp", false)) href="app://tetheryar/payment" @else href="{{ env('WEBAPP_PAYMENT_CALLBACK') }}" @endif class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 bg-opacity-80 hover:bg-opacity-70 sm:px-8">
                                        بازگشت به اپلیکیشن
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- More main page content here... -->
    </main>
</div>
