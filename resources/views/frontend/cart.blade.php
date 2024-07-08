@extends('layouts.site')
@section('content')
    <section class="bg-light">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb py-2 my-0">
                    <li class="breadcrumb-item">
                        <a class="text-main" href="index.php">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Giỏ hàng của bạn
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="hdl-maincontent py-2">
        <div class="container">
            <form action="{{ route('site.cart.update') }}" method="POST">
                @csrf
                @includeIf('backend.message')
                <table class="table table-bordered">
                    <thead>
                        <h2 class="title_cart">
                            <span>Giỏ hàng của bạn</span>
                        </h2>

                        <tr>
                            <th style="width:100px">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th style="width:130px" class='text-center'>Số lượng</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Thành tiền</th>
                            <th></th>
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
                                        src="{{ asset('images/products/' . $item['image']) }}" alt="{{ $item['image'] }}">
                                </td>
                                <td class="align-middle">{{ Str::limit($item['name'], 40, '...') }}</td>

                                <td class="pt-4">
                                    <div class="input-group mb-3 ">
                                        <button class="input-group-text" id="sub-{{ $item['id'] }}"
                                            onclick="changeNumber('{{ $item['id'] }}', 'sub')">-</button>
                                        <input type="text" value="{{ $item['qty'] }}" id="qty-{{ $item['id'] }}"
                                            name="qty[{{ $item['id'] }}]" class="text-center" size="2"
                                            oninput="validateQuantity('{{ $item['id'] }}')">
                                        <button class="input-group-text" id="add-{{ $item['id'] }}"
                                            onclick="changeNumber('{{ $item['id'] }}', 'add')">+</button>
                                    </div>
                                </td>
                                <td class="text-center align-middle font-weight-bold">
                                    {{ number_format($item['price']) }} ₫
                                </td>
                                <td class="text-center align-middle font-weight-bold">
                                    {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }} ₫
                                </td>
                                <td class="text-center pt-4">
                                    <a href="{{ route('site.cart.delete', ['id' => $item['id']]) }}"
                                        class="btn btn-danger btn-sm">X</a>
                                </td>
                            </tr>
                            @php
                                $total += $item['price'] * $item['qty'];
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4">
                                <a href="{{ route('site.product.index') }}" class="btn btn-primary px-2">Mua thêm</a>
                                <button href="" class="btn btn-primary px-2">Cập nhật</button>
                                <a href="{{ route('site.cart.checkout') }}" class="btn btn-primary px-2">Thanh Toán</a>
                            </th>
                            <th colspan="3" class="text-end">
                                <div class="font-weight-bold">Tổng tiền: {{ number_format($total) }} ₫</div>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </section>
@endsection
@section('title', 'Giỏ hàng')
<script>
    function changeNumber(id, action) {
        var qtyInput = document.getElementById('qty-' + id);
        var qty = parseInt(qtyInput.value);

        if (action === 'sub' && qty > 1) {
            qtyInput.value = qty - 1;
        } else if (action === 'add') {
            qtyInput.value = qty + 1;
        }
    }

    function validateQuantity(id) {
        var qtyInput = document.getElementById('qty-' + id);
        var qty = parseInt(qtyInput.value);

        if (isNaN(qty) || qty < 1) {
            qtyInput.value = 1;
        }
    }

    document.querySelectorAll('[id^="qty-"]').forEach(function(input) {
        input.addEventListener('keypress', function(event) {
            if (isNaN(event.key) && event.key !== 'Backspace' && event.key !== 'Delete') {
                event.preventDefault();
            }
        });
    });
</script>
