<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon"
        href="{{ asset('https://www.pngfind.com/pngs/m/384-3845005_home-decor-icon-png-png-download-decor-icon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"
        integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    @yield('header')
</head>

<body>
    <header class="kah-header">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-2 py-4">
                    <a href="http://localhost/TranDucKhanh_2122110588/public">
                        <img src="https://bizweb.dktcdn.net/100/501/740/themes/929449/assets/logo.png?1714981317000"
                            class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="col-12 col-sm-9 d-none d-md-block col-md-7 py-3">
                    <nav class="navbar navbar-expand-lg bg-main">
                        <div class="container-fluid">
                            <a class="navbar-brand d-block d-sm-none text-white" href="index.php">KARHACTER</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <x-main-menu />
                        </div>
                    </nav>
                </div>
                <div class="col-6 col-sm-6 col-md-2 py-4 border-rounded">
                    <form action="{{ route('site.search') }}" method="get" class="form-search position-relative"
                        role="search">
                        <input type="text" name="search" class="search-auto form-control"
                            placeholder="Tìm kiếm sản phẩm" autocomplete="off">
                        <button class="btn btn-default position-absolute p-0" type="submit"
                            aria-label="Tìm kiếm"></button>

                    </form>
                </div>

                <div class="account position-relative pt-4 pe-5" style="width: 0px">
                    @if (Auth::check())
                        <a href="#" class="pe-3">
                            <i class="fa fa-user" style="font-size:29px;color:#fff"></i>
                        </a>
                        <div class="link position-absolute d-block px-4 py-2">
                            @php
                                $user = Auth::user();
                            @endphp
                            <a href="#" class="d-block py-2 text-center text-decoration-none text-dark"
                                style="font-size: 13px" title="Đăng nhập">{{ $user->name }}</a>
                            <a href="#" class="d-block py-2 text-center text-decoration-none text-dark"
                                style="font-size: 13px" title="Đăng nhập">Tài khoản</a>
                            <a href="{{ route('site.cart.index') }}"
                                class="d-block py-2 text-center text-decoration-none text-dark" style="font-size: 13px"
                                title="Đăng nhập">Đổi Mật Khẩu</a>
                            <a href="{{ route('website.logout') }}"
                                class="d-block py-2 text-center text-decoration-none text-dark" style="font-size: 13px"
                                title="Đăng nhập">Đăng xuất</a>
                        </div>
                    @else
                        <a href="#" class="pe-3">
                            <i class="fa fa-user" style="font-size:29px;color:#fff"></i>
                        </a>
                        <div class="link position-absolute d-block px-4">
                            <a href="{{ route('website.getlogin') }}"
                                class="d-block py-2 text-center text-decoration-none text-dark" style="font-size: 13px"
                                title="Đăng nhập">Đăng nhập</a>
                            <a href="{{ asset('/tai-khoan/dang-ky') }}"
                                class="d-block py-2 text-center text-decoration-none text-dark" style="font-size: 13px"
                                title="Đăng ký">Đăng ký</a>

                        </div>
                    @endif
                </div>

                <div class="cart position-relative pt-4" style="width: 0px">
                    <a href="{{ route('site.cart.index') }}" class="header-cart position-relative" title="Giỏ hàng">
                        <i class="fa fa-shopping-bag" aria-hidden="true" style="font-size: 30px;color:#fff"></i>
                        @php
                            $carts = session('carts', []);
                            $countqty = is_array($carts) ? count($carts) : 0;
                        @endphp
                        <span id="showqty" class="count position-absolute">{{ $countqty }}</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <div class="kah-footer py-4">
        <div class="container">
            <div class="row p-3">
                <div class="col-12 pt-5 text-white col-lg-4 position-relative">
                    <h4 class="widgettilte">THÔNG TIN</h4>
                    <p class="pt-3">
                        Chúng tôi luôn trân trọng và mong đợi nhận được mọi ý kiến đóng
                        góp từ khách hàng để có thể nâng cấp trải nghiệm dịch vụ và sản
                        phẩm tốt hơn nữa.
                    </p>
                    <div class="row pt-3">
                        <div class="col-12 col-sm-6">
                            <p>
                                <a href="#"
                                    class="text-decoration-none text-white link-underline link-underline-opacity-0">
                                    <i style='font-size:20px' class='fas'>&#xf11e;</i>
                                    8 Duong van cam
                                </a>
                            </p>
                            <p class="pt-3">
                                <a class="text-decoration-none text-white link-underline link-underline-opacity-0"
                                    href="#" class="text-white link-underline link-underline-opacity-0">
                                    <i style="font-size:24px" class="fa">&#xf095;</i>
                                    03781.73109
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <x-footer-menu />
                <div class="col-12 pt-5 text-white col-lg-3">
                    <h4 class="widgettilte">KẾT NỐI</h4>
                </div>
            </div>
            <div class="row border-top">
                <div class="col">
                    <a href="{{ route('site.home') }}">
                        <img src="https://bizweb.dktcdn.net/100/501/740/themes/929449/assets/logo.png?1714981317000"
                            class="img-fluid pt-3" alt="Logo" style="width: 200px">
                    </a>
                </div>
                <div class="col">
                    <p class="pt-2 text-end text-white fs-4">© Bản quyền thuộc về Karhacter. Cung cấp bởi Sapo</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>
