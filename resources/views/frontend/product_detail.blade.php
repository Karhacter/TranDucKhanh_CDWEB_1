@extends('layouts.site')
@section('title')
    {!! $productitem->name !!}
@endsection
@section('content')
    <section class="bg-light">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb py-2 my-0">
                    <li class="breadcrumb-item">
                        <a class="text-main" href="http://localhost/TranDucKhanh_2122110588/public">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="{{ url('san-pham') }}">Sản phẩm</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $productitem->name }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="hdl-maincontent py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image">
                        <img class="img-fluid w-100" src="{{ asset('images/products/' . $productitem->image) }}"
                            alt="{{ $productitem->image }}">
                    </div>
                    <div class="list-image mt-3">
                        <div class="row">
                            <div class="col-3">
                                <img class="img-fluid w-100" src="{{ asset('images/products/' . $productitem->image) }}"
                                    alt="{{ $productitem->image }}" onclick="changeimage(src)">
                            </div>
                            <div class="col-3">
                                <img class="img-fluid" src="public/images/product/" alt=""
                                    onclick="changeimage(src)">
                            </div>
                            <div class="col-3">
                                <img class="img-fluid" src="public/images/product/" alt=""
                                    onclick="changeimage(src)">
                            </div>
                        </div>
                    </div>
                    <script>
                        function changeimage(src) {
                            document.getElementById("productimage").src = src;
                        }
                    </script>
                </div>
                <div class="col-md-6">
                    <h1 class="text-main">
                        {{ $productitem->name }}
                    </h1>
                    <h3 class="pt-5">
                        @if ($productitem->pricesale > 0)
                            <del class="text-muted pricesale">{{ number_format($productitem->price, 0, ',', '.') }}₫</del>
                            <h2 class="price text-start ps-2 text-danger">
                                {{ number_format($productitem->pricesale, 0, ',', '.') }}₫
                            </h2>
                        @else
                            <h2 class="price text-start ps-2 text-danger" style="padding-top: 20px">
                                {{ number_format($productitem->price, 0, ',', '.') }}₫
                            </h2>
                        @endif
                    </h3>
                    <h5 class="pt-3 border-top border-muted text-muted">Mô tả</h5>
                    <p class="pb-3">{{ Str::Limit($productitem->detail) }}</p>
                    <div class="mb-3">
                        <label for="">Số lượng</label> <br>
                        <div class=" mb-3">
                            <button class=" btn-button" onclick="changeNumber('sub')" type="button">-</button>
                            <input type="text" value="1" id="qty" class="number_qty" size="3"
                                size="1" oninput="validateQuantity()">
                            <button class="btn-button" id="add" onclick="changeNumber('add')">+</button>

                            <button onclick="AddCart({{ $productitem->id }})"
                                class="border border-dark rounded-pill mb-3 mt-2 bg-white p-3 ms-4" style="width: 150px;"><i
                                    style='font-size:18px' class='fas'>&#xf291;</i> Đặt
                                Mua</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h2 class="text-main fs-4 pt-4">Chi tiết sản phẩm</h2>
                <div id="tab-1" class="tab-content rte active">
                    {{ $productitem->detail }}
                </div>
            </div>

            <div class="row pt-4">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                            type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sản phẩm
                            khác</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                            type="button" role="tab" aria-controls="profile-tab-pane"
                            aria-selected="false">Profile</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                        tabindex="0">
                        <div class="row">
                            @foreach ($list_product as $productitem)
                                <div class="col mb-4">
                                    <x-product-card-home :$productitem />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">Context</div>

                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function changeNumber(action) {
        var qtyInput = document.getElementById('qty');
        var qty = parseInt(qtyInput.value);

        if (action === 'sub' && qty > 1) {
            qtyInput.value = qty - 1;
        } else if (action === 'add') {
            qtyInput.value = qty + 1;
        }
    }

    function validateQuantity() {
        var qtyInput = document.getElementById('qty');
        var qty = parseInt(qtyInput.value);

        if (isNaN(qty) || qty < 1) {
            qtyInput.value = 1;
        }
    }

    document.getElementById('qty').addEventListener('keypress', function(event) {
        if (isNaN(event.key) && event.key !== 'Backspace' && event.key !== 'Delete') {
            event.preventDefault();
        }
    });

    function AddCart(productid) {
        let qty = document.getElementById("qty").value;
        //
        $.ajax({
            url: "{{ route('site.cart.addcart') }}",
            type: "GET",
            data: {
                productid: productid,
                qty: qty
            },
            success: function(result, status, xhr) {
                alert("Thêm sản phẩm vào giỏ hàng thành công")
                document.getElementById("showqty").innerHTML = result;
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        });
    }
</script>
