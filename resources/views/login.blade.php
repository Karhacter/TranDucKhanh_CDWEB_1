<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Đăng nhập</title>
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('login-css/bootstrap-login-form.min.css') }}" />
</head>

<style>
    .gradient-custom {
        background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
    }

    /* Customize the background color of the error notification */
    #toast-container>div.toast-error {
        background-color: #f44336;
        /* Red */
    }

    /* Customize the text color of the error notification */
    #toast-container>div.toast-error>.toast-message {
        color: #ffffff;
        /* White */
    }
</style>

</style>

<body>

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light text-black" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="{{ route('website.dologin') }}" method="post">
                                @csrf
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase text-success">ĐĂNG NHẬP</h2>
                                    <div class="mb-3">
                                        <p class="text-danger mb-5">Chú ý:(*) Bắt buộc phải điền thông tin</p>
                                    </div>
                                    <div class="form-outline form-black mb-4">
                                        <input type="text" class="form-control form-control-lg" name="username"
                                            id="username" />
                                        <label class="form-label" for="username">Tên đăng nhập hoặc Email</label>
                                    </div>
                                    <div class="form-outline form-black mb-4">
                                        <input type="password" id="password" class="form-control form-control-lg"
                                            name="password" />
                                        <label class="form-label" for="password">Mật khẩu</label>
                                    </div>
                                    <br>
                                    <button class="btn btn-outline-black btn-lg px-5" type="submit"
                                        name="DANGNHAP">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.error("{{ Session::get('message') }}");
        </script>
    @endif
    <script type="text/javascript" src="{{ asset('login-css/mdb.min.js') }}"></script>
</body>

</html>
