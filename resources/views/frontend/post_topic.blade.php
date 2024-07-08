@extends('layouts.site')
@section('title', 'Chủ đề')
@section('content')
    <section class="bg-light">
        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb py-2 my-0">
                    <li class="breadcrumb-item">
                        <a class="text-main" href="{{ route('site.home') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a class="text-main" href="{{ route('site.post.index') }}"> Tin tức</a>

                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Chủ đề
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $row_topic->name }}
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="blog container">
        <div class="container">
            <div class="row">
                {{-- category product --}}
                <div class="col-lg-6 col-12 order-lg-1  pt-4">
                    <h4 class="aside-title-module pb-2 mb-2 bold border-bottom text-center">Danh mục sản phẩm</h4>
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
                {{-- topic --}}
                <div class="col-lg-6 col-12 order-lg-1  pt-4">
                    <h4 class="aside-title-module pb-2 mb-2 bold border-bottom text-center">Chủ đề bài viết</h4>
                    <div class="aside-item mb-4">
                        <nav class="nav-category">
                            <ul class="navbar-pills" style="background: white">
                                <li class="nav-item  position-relative">
                                    <a title="Hiện đại" href="{{ url('chu-de/nghe-thuat') }}"
                                        class="nav-link pr-5 text-dark">Nghệ thuật</a>

                                </li>
                                <li class="nav-item  position-relative">
                                    <a title="Cổ điển" href="{{ url('chu-de/thiet-ke-noi-that') }}"
                                        class="nav-link pr-5  text-dark"> Thiết kế nội thất </a>
                                </li>
                                <li class="nav-item  position-relative">
                                    <a title="Đơn giản" href="{{ url('chu-de/thoi-trang') }}"
                                        class="nav-link pr-5  text-dark">Thời trang
                                    </a>
                                </li>
                                <li class="nav-item  position-relative">
                                    <a title="Sang trọng" href="{{ url('chu-de/decor-pc') }}"
                                        class="nav-link pr-5 text-dark">
                                        Decor Pc </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="right-content col-lg-12 col-12 order-lg-2 mb-5 mb-lg-0 pt-4">
                    <h2 class="title-page font-weight-bold ">{{ $row_topic->name }}</h2>
                    <div class="list-blogs">
                        <div class="row">
                            @foreach ($list_post as $row)
                                <div class="col-md-6">
                                    <div class="item-blog mb-md-4 mb-2">
                                        <a class="thumb ratioblog d-block position-relative rounded-10"
                                            href="{{ url('tin-tuc/' . $row->slug) }}">
                                            <img class="rounded-3" src="{{ asset('images/posts/' . $row->image) }}"
                                                alt="{{ $row->image }}">
                                        </a>
                                        <div class="content py-3">
                                            <div class="time-post mb-2 d-md-block d-none">
                                                {{ $row->created_at->translatedFormat('l, d/m/Y') }}6</div>
                                            <h5 class="post-title bold">
                                                <a href="{{ url('tin-tuc/' . $row->slug) }}"
                                                    class="text-decoration-none">{{ $row->title }}</a>
                                            </h5>
                                            <p>{{ Str::limit($row->detail) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $list_post->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('title', 'Tin tuc')
