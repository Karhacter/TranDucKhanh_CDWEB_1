@extends('layouts.site')

@section('title', 'Tìm kiếm')

@section('content')
    <section class="bg-light">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb py-2 my-0">
                    <li class="breadcrumb-item">
                        <a class="text-main" href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tìm kiếm
                    </li>
                </ol>
            </nav>

            <div class="row mt-4">
                @if (!empty($products))
                    @foreach ($products as $product)
                        <div class="col-6 col-md-3 mb-4">
                            <div class="product-item item border">
                                <div class="product-item-image">
                                    <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
                                        <img class="img-fluid w-100" src="{{ asset('images/products/' . $product->image) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <h2 class="product-item-name text-main fs-5 ps-2 pt-2">
                                    <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"
                                        class="text-decoration-none text-dark">
                                        {{ $product->name }}
                                    </a>
                                </h2>
                                <h3 class="product-item-price fs-6 d-flex">
                                    @if ($product->pricesale > 0)
                                        <del
                                            class="text-muted ms-2">{{ number_format($product->price, 0, ',', '.') }}₫</del>
                                        <span
                                            class="text-danger ms-5 ps-5">{{ number_format($product->pricesale, 0, ',', '.') }}₫</span>
                                    @else
                                        <span>{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                    @endif
                                </h3>
                                <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
                                    <button class="border border-dark rounded-pill mb-3 mt-2 bg-white p-2 ms-1"
                                        style="width: 250px;">
                                        <i class="fa fa-gear fa-spin me-2" style="font-size:18px"></i>Tùy
                                        Chọn
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p class="text-center">Không tìm thấy sản phẩm nào phù hợp với tìm kiếm của bạn.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
