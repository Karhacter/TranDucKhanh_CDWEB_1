@extends('layouts.site')
@section('content')
    <x-slider xl="12" lg="12" md="12" sm="12" xs="12" />
    <x-product-collection />
    <x-product-category-home />


    <section class="kah-banner pt-5">
        <div class="container">
            <a href="{{ asset('/san-pham') }}" class="lazyload_bg text-center d-block p-5 text-decoration-none"
                data-src="//bizweb.dktcdn.net/100/501/740/themes/929449/assets/m_banner.jpg?1715658677580"
                title="NGUỒN CẢM HỨNG VÔ TẬN"
                style="background-image: url(&quot;//bizweb.dktcdn.net/100/501/740/themes/929449/assets/m_banner.jpg?1715658677580&quot;); border-radius: 36px; box-sizing: border-box; overflow: hidden;">
                <span class="title d-inline-block bold pt-5 text-warning" style="font-size: 48px;">NGUỒN CẢM HỨNG VÔ
                    TẬN</span>
                <span class="desc d-block m-0 mx-auto text-white pb-2"
                    style="width: 520px;
                    max-width: 100%;
                    font-size: 20px">Khám phá
                    nội
                    thất thiết kế đương đại mang đến cảm giác thoải mái, sang trọng. Cá nhân hoá trong từng sản phẩm phù
                    hợp với mọi không gian sống.</span>
            </a>
        </div>
    </section>

    <x-product-new />

    <x-product-sale />


    <section class="section_brand pt-5">
        <div class="container brand-container pt-3 pb-3">
            <div class="swiper-container-multirow" style="cursor: grab;">
                <div class="swiper-wrapper" style="width: 1250px; transform: translate3d(0px, 0px, 0px);">
                    <div class="swiper-slide swiper-slide-active" style="width: 230px; margin-right: 20px;">
                        <a href="{{ asset('/thuong-hieu/noi-that-a-concept') }}" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_1.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide swiper-slide-next" style="width: 230px; margin-right: 20px;">
                        <a href="{{ asset('/thuong-hieu/noi-that-baya') }}" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_2.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide" style="width: 230px; margin-right: 20px;">
                        <a href="{{ asset('/thuong-hieu/zxc') }}" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_3.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide" style="width: 230px; margin-right: 20px;">
                        <a href="{{ asset('/thuong-hieu/interroll') }}" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_4.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide" style="width: 230px; margin-right: 20px;">
                        <a href="{{ asset('/thuong-hieu/iga') }}" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_5.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide" style="margin-top: 20px; width: 230px; margin-right: 20px;">
                        <a href="{{ asset('/thuong-hieu/zcypzhenchuang-youpin') }}" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_6.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide" style="margin-top: 20px; width: 230px; margin-right: 20px;">
                        <a href="#" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_7.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide" style="margin-top: 20px; width: 230px; margin-right: 20px;">
                        <a href="#" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_8.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide" style="margin-top: 20px; width: 230px; margin-right: 20px;">
                        <a href="#" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_9.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                    <div class="swiper-slide" style="margin-top: 20px; width: 230px; margin-right: 20px;">
                        <a href="#" title="brand">
                            <img src="//bizweb.dktcdn.net/thumb/medium/100/501/740/themes/929449/assets/img_brand_10.png?1718333058023"
                                alt="brand" width="10" height="10" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_feedback pb-5">
        <div class="container">
            <div class="list-feedback">
                <h2 class="text-center pt-5">
                    Khách hàng nói gì về chúng tôi
                </h2>
                <p class="block-desc text-center mb-4">Hơn 1.000 khách hàng đã hài lòng về dịch vụ và sản phẩm của chúng
                    tôi</p>
                <div class="swiper-container" style="cursor: grab;">
                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">


                        <div class="swiper-slide" style="width: 392px; margin-right: 20px;">
                            <span class="vote d-inline-block mb-2"></span>
                            <p class="mb-md-5 mb-2">Mình rất đánh giá cao về độ hoàn thiện của sản phẩm. Mẫu mã và màu sắc
                                cũng rất đa dạng, nhiều lựa chọn.</p>
                            <div class="info position-relative py-4">
                                <img width="89" height="89" class="lazyload position-absolute loaded"
                                    src="//bizweb.dktcdn.net/thumb/small/100/501/740/themes/929449/assets/feedback_1.jpg?1718333058023"
                                    alt="brand">
                                <span class="bold">Bạn Diễm Hằng</span><span class="block-xs"> - </span><span
                                    class="work">Hà Nội</span>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 392px; margin-right: 20px;">
                            <span class="vote d-inline-block mb-2"></span>
                            <p class="mb-md-5 mb-2">Nhân viên của OH!Decor rất nhiệt tình và chuyên nghiệp, mình có thiện
                                cảm ngay từ khi được tư vấn sản phẩm.</p>
                            <div class="info position-relative py-4">
                                <img width="89" height="89" class="lazyload position-absolute loaded"
                                    src="//bizweb.dktcdn.net/thumb/small/100/501/740/themes/929449/assets/feedback_2.jpg?1718333058023"
                                    alt="brand">
                                <span class="bold">Anh Trần Hà</span><span class="block-xs"> - </span><span
                                    class="work">Hồ Chí Minh</span>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 392px; margin-right: 20px;">
                            <span class="vote d-inline-block mb-2"></span>
                            <p class="mb-md-5 mb-2">Chất lượng dịch vụ khi mình đến lựa chọn sản phẩm là điều mình cảm thấy
                                ấn tượng khi đến với OH!Decor </p>
                            <div class="info position-relative py-4">
                                <img width="89" height="89" class="lazyload position-absolute loaded"
                                    src="//bizweb.dktcdn.net/thumb/small/100/501/740/themes/929449/assets/feedback_3.jpg?1718333058023"
                                    alt="brand">
                                <span class="bold">Bạn Hà Thu</span><span class="block-xs"> - </span><span
                                    class="work">Đà Nẵng</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets"><span
                            class="swiper-pagination-bullet swiper-pagination-bullet-active"></span></div>
                </div>
            </div>
        </div>
    </section>
    <x-post-new />
@endsection
@section('title', 'Trang chủ')
