@extends('layouts.site')
@section('title', 'Chủ đề')
@section('content')
    <section class="maincontent my-3">
        <div class="container">
            <h1 class="title text-center pb-3 text-info">CHỦ ĐỀ BÀI VIẾT</h1>
            <div class="row">
                <div class="col-lg-6 col-6 mb-4">
                    <a href="{{ asset('chu-de/nghe-thuat') }}"
                        class="lazyload_bg text-center d-block p-5 text-decoration-none"
                        style="background-image: url(&quot;https://img.idesign.vn/w1800/2020/12/idesign_nghethuathiendai_thumb.jpg&quot;); border-radius: 36px; box-sizing: border-box; overflow: hidden;">
                        <span class="title d-inline-block bold p-5 text-warning" style="font-size: 48px;">NGHỆ THUẬT</span>

                    </a>
                </div>
                <div class="col-lg-6 col-6 mb-4">
                    <a href="{{ asset('chu-de/thoi-trang') }}"
                        class="lazyload_bg text-center d-block p-5 text-decoration-none"
                        style="background-image: url(&quot;https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Carolina_Herrera_AW14_12.jpg/640px-Carolina_Herrera_AW14_12.jpg&quot;); border-radius: 36px; box-sizing: border-box; overflow: hidden;">
                        <span class="title d-inline-block bold p-5 text-warning" style="font-size: 48px;">THỜI TRANG</span>

                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-6 mb-4">
                    <a href="{{ asset('chu-de/thiet-ke-noi-that') }}"
                        class="lazyload_bg text-center d-block p-5 text-decoration-none"
                        style="background-image: url(&quot;https://www.akafurniture.com.vn/uploads/8/2/7/3/82738714/nha-xinh-baner-web-aka-final-2022-6_orig.jpg&quot;); border-radius: 36px; box-sizing: border-box; overflow: hidden;">
                        <span class="title d-inline-block bold p-5 text-warning" style="font-size: 48px;">NỘI
                            THẤT</span>
                    </a>
                </div>
                <div class="col-lg-6 col-6 mb-4">
                    <a href="{{ asset('chu-de/decor-pc') }}"
                        class="lazyload_bg text-center d-block p-5 text-decoration-none"
                        style="background-image: url(&quot;https://i.pinimg.com/originals/7f/97/60/7f97608101798afde7b316558ae1fdc0.jpg&quot;); border-radius: 36px; box-sizing: border-box; overflow: hidden;">
                        <span class="title d-inline-block bold p-5 text-warning" style="font-size: 48px;">DECOR PC</span>

                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
