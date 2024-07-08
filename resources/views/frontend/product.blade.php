@extends('layouts.site')

@section('content')
    <section class="bg-light">
        <div class="container">
            <!-- Breadcrumb navigation -->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb py-2 my-0">
                    <li class="breadcrumb-item">
                        <a class="text-main" href="{{ url('/') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tất cả sản phẩm
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Banner section -->
    <section class="kah-baner">
        <div class="container">
            <h1 class="font-weight-bold p-5 mt-4"
                style="background-image: url('//bizweb.dktcdn.net/100/501/740/themes/929449/assets/coll_bg.jpg?1715658677580'); border-radius: 20px;">
                Tất cả sản phẩm
            </h1>
            <div class="row">
                <!-- Sidebar for filters -->
                <x-product-fliter />


                <!-- Products display area -->
                <div class="block-collection col-lg-9 col-12 mb-5 pt-5">
                    <!-- Sorting and Filtering Form -->
                    <!-- Sorting and Filtering Form -->
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <form action="{{ route('site.product.index') }}" method="GET">
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
                                            A - Z</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary">Sort</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <form action="{{ route('site.product.index') }}" method="GET">
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
                    <!-- Product Items -->
                    <div class="category-products">
                        <div class="products-view products-view-grid list_hover_pro">
                            <div class="row" id="product-items">
                                @foreach ($products as $productitem)
                                    <div class="col-lg-4 col-md-6 mb-4 product-item">
                                        <x-product-card-home :$productitem />
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination -->
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $products->links() }}
                                </div>
                            </div>
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
