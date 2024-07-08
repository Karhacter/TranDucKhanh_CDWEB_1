@extends('layouts.site')
@section('content')
    <section class="bg-light">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb py-2 my-0">
                    <li class="breadcrumb-item">
                        <a class="text-main" href="http://localhost/TranDucKhanh_2122110588/public">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        Thương hiệu
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $row_brand->name }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="kah-baner">
        <div class="container">
            <h1 class="font-weight-bold p-5 mt-4"
                style="background-image: url(&quot;//bizweb.dktcdn.net/100/501/740/themes/929449/assets/coll_bg.jpg?1715658677580&quot;);border-radius:20px">
                {{ $row_brand->name }}
            </h1>
            <div class="row">
                <x-product-fliter />
                <div class="block-collection col-lg-9 col-12 mb-5 pt-5">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <form action="{{ route('site.product.brand', ['slug' => $row_brand->slug]) }}" method="GET">
                                <div class="input-group">
                                    <select name="sort_field" id="sort_field" class="form-control">
                                        <option value="created_at"
                                            {{ request('sort_field') == 'created_at' ? 'selected' : '' }}>Ngày sản xuất
                                        </option>
                                        <option value="price" {{ request('sort_field') == 'price' ? 'selected' : '' }}>
                                            Giá</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <select name="sort_order" id="sort_order" class="form-control">
                                        <option value="desc"
                                            {{ request('sort_order', 'desc') == 'desc' ? 'selected' : '' }}>Z - A
                                        </option>
                                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>
                                            A - Z </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Sắp xếp</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="{{ route('site.product.brand', ['slug' => $row_brand->slug]) }}" method="GET">
                                <div class="input-group">
                                    <input type="number" name="price_min" id="price_min" class="form-control"
                                        placeholder="Min Price" value="{{ request('price_min') }}" hidden>
                                    <input type="number" name="price_max" id="price_max" class="form-control"
                                        placeholder="Max Price" value="{{ request('price_max') }}" hidden>

                                    <button type="submit" class="btn btn-primary">Lọc</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="category-products">
                        <div class="products-view products-view-grid list_hover_pro">

                            <div class="row">
                                @foreach ($product_list as $productitem)
                                    <div class="col-6 col-md-4 mb-4">
                                        <x-product-card-home :$productitem />
                                    </div>
                                @endforeach
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $product_list->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function filterProducts(checkbox) {
                        let priceRange = checkbox.value.split(',');
                        let priceMin = priceRange[0];
                        let priceMax = priceRange[1] || '';

                        document.getElementById('price_min').value = priceMin;
                        document.getElementById('price_max').value = priceMax;

                        checkbox.form.submit();
                    }
                </script>
    </section>
@endsection
@section('title', 'Sản phẩm')
