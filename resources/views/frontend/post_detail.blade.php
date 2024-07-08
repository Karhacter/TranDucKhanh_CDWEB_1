@extends('layouts.site')
@section('title')
    {!! $postitem->title !!}
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
                        Tin tức
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $postitem->title }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="blog container">
        <div class="container">
            <div class="row">
                {{-- category --}}
                <div class="col-lg-3 col-12 order-lg-1  pt-4">
                    <h4 class="aside-title-module pb-2 mb-2 bold border-bottom">Danh mục sản phẩm</h4>
                    <div class="aside-item mb-4">
                        <nav class="nav-category">
                            <ul class="navbar-pills" style="background: white">
                                <li class="nav-item  position-relative">
                                    <a title="Hiện đại" href="{{ url('danh-muc/hien-dai') }}"
                                        class="nav-link pr-5 text-dark">Hiện
                                        đại</a>

                                </li>
                                <li class="nav-item  position-relative">
                                    <a title="Cổ điển" href="{{ url('danh-muc/co-dien') }}"
                                        class="nav-link pr-5  text-dark">Cổ
                                        điển</a>
                                </li>
                                <li class="nav-item  position-relative">
                                    <a title="Đơn giản" href="{{ url('danh-muc/don-gian') }}"
                                        class="nav-link pr-5  text-dark">Đơn
                                        giản</a>
                                </li>
                                <li class="nav-item  position-relative">
                                    <a title="Sang trọng" href="{{ url('danh-muc/sang-trong') }}"
                                        class="nav-link pr-5 text-dark">Sang
                                        trọng</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="right-content col-lg-9 col-12 order-lg-2 mb-5 mb-lg-0">
                    <h2 class="title-page font-weight-bold "> {{ $postitem->title }}</h2>
                    <div class="time-post mb-2 d-inline-block">
                        <span>{{ $postitem->created_at->translatedFormat('l, d/m/Y') }}</span>
                    </div>
                    <div class="list-blogs">
                        <div class="row">
                            {!! $postitem->detail !!}
                        </div>
                    </div>
                    <div class="container pt-5">
                        <h2 class="text-main text-primary">Bài viết cùng chủ đề</h2>
                        <div class="row">
                            @foreach ($list_post as $item)
                                <h4 class="p-2">
                                    <a href="{{ url('tin-tuc/' . $item->slug) }}" class="text-decoration-none text-dark">
                                        {{ $item->title }}
                                    </a>
                                </h4>
                                <p class="text-warning">{{ Str::limit($item->detail) }}</p>
                                <!-- Adjust the character limit as needed -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
