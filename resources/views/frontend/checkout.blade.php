@extends('layouts.site')
@section('title', 'Thanh toán')
@section('content')
    <section class="bg-light">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb py-2 my-0">
                    <li class="breadcrumb-item">
                        <a class="text-main" href="index.php">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Thanh toán
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="hdl-maincontent py-2">
        <div class="container">

            <div class="row">
                <h1 class="text-main">Thông tin giao hàng</h1>

                @if (!Auth::check())
                    <div class="col-md-6">
                        <p>Bạn có tài khoản chưa? <a href="{{ route('website.getlogin') }}">Đăng nhập</a></p>
                    </div>
                @else
                    <div class="col-md-6">
                        <form action="{{ route('site.cart.docheckout') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Họ tên</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ Auth::user()->name }}" placeholder="Nhập họ tên">
                            </div>
                            <div class="mb-3">
                                <label for="phone">Điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ Auth::user()->address }}">
                            </div>
                            <div class="mb-3">
                                <label for="note">Chú ý</label>
                                <textarea name="note" id="note" rows="4" class="form-control"></textarea>
                            </div>
                            <h4 class="fs-6 text-main mt-4">Phương thức thanh toán</h4>
                            <div class="thanhtoan mb-4">
                                <div class="p-4 border">
                                    <input name="typecheckout" onchange="showbankinfo(this.value)" type="radio"
                                        value="1" id="check1" />
                                    <label for="check1">Thanh toán khi giao hàng</label>
                                </div>
                                <div class="p-4 border">
                                    <input name="typecheckout" onchange="showbankinfo(this.value)" type="radio"
                                        value="2" id="check2" />
                                    <label for="check2">Chuyển khoản qua ngân hàng</label>
                                </div>
                                <div class="p-4 border bankinfo">
                                    <p>Ngân Hàng Techcombank </p>
                                    <p>STK: 10042004004</p>
                                    <p>Chủ tài khoản: Trần Đức Khánh</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-success px-4" name="XACNHAN">XÁC NHẬN</button>
                            </div>

                        </form>
                    </div>
                @endif
                <script>
                    function showbankinfo(value) {
                        var elementbank = document.querySelector(".bankinfo");
                        if (value == 1) {
                            elementbank.style.display = "none";
                        } else {
                            elementbank.style.display = "block";
                        }
                    }
                </script>

                <div class="col-md-6">
                    <h2 class="fs-5 text-main">Thông tin đơn hàng</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-light">

                                <th style="width:100px;">Hình</th>
                                <th>Tên sản phẩm</th>
                                <th style="width:100px;" class='text-center'>Số lượng</th>
                                <th class="text-center" style="width:100px;">Giá</th>
                                <th class="text-center" style="width:100px;">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($list_cart as $item)
                                <tr>
                                    <td>
                                        <img style="max-width: 100%;max-height: 100%;" class="img-fluid"
                                            src="{{ asset('images/products/' . $item['image']) }}"
                                            alt="{{ $item['image'] }}">
                                    </td>
                                    <td class="align-middle">{{ Str::limit($item['name'], 40, '...') }}</td>

                                    <td class="pt-4">
                                        <div class="input-group">
                                            <p class="d-flex justify-content-center">{{ $item['qty'] }}</p>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        {{ number_format($item['price']) }} ₫
                                    </td>
                                    <td class="text-center align-middle ">
                                        {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }} ₫
                                    </td>

                                </tr>
                                @php
                                    $total += $item['price'] * $item['qty'];
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" class="text-end">
                                    <strong>Tổng tiền: {{ number_format($total) }}</strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Mã giảm giá" id="sale"
                                aria-describedby="basic-addon2">
                            <button class="input-group-text" id="applyDiscount">Sử dụng</button>
                        </div>
                    </div>
                    <table class="table table-borderless">
                        <tr>
                            <th>Tạm tính</th>
                            <td class="text-end" id="subtotal">{{ number_format($total) }} đ</td>
                        </tr>
                        <tr>
                            <th>Phí vận chuyển</th>
                            <td class="text-end">0 đ</td>
                        </tr>
                        <tr>
                            <th>Giảm giá</th>
                            <td class="text-end" id="discount">0 đ</td>
                        </tr>
                        <tr>
                            <th>Tổng cộng</th>
                            <td class="text-end font-weight-bold" id="total">{{ number_format($total) }} đ</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
    </section>
@endSection
