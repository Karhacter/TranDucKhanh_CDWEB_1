<div id="carouselExampleIndicators" class="carousel slide">



    <div class="carousel-inner">
        <div class="carousel-item active">
            <section class="section_slider section_slider_text position-relative d-block">
                <div class="slider_text">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="line-1 font-weight-bold mb-4"><b class="text-warning">Nội thất</b> nâng tầm
                                    không gian
                                    sống</div>
                                <div class="line-2 mb-4 text-white font-weight-bold">Khám phá nội thất thiết kế đương
                                    đại mang đến
                                    cảm giác thoải mái,
                                    sang
                                    trọng. Cá nhân hoá trong từng sản phẩm phù hợp với mọi không gian sống.</div>
                                <a href="{{ route('site.product.index') }}"
                                    class="buy d-inline-block font-weight-bold py-2 py-lg-3 px-3 mb-3 mb-lg-5 btn btn-warning"
                                    title="Mua sắm ngay">

                                    <i class="fa-solid fa-cart-shopping"></i> Mua sắm ngay
                                </a>
                                <div class="d-flex text-center text-white">
                                    <div class="item font-weight-bold m-3 mt-0"><b class="d-block"><span
                                                class="count text-warning fs-3">15.000+</span></b>Sản
                                        phẩm đa dạng</div>
                                    <div class="item font-weight-bold m-3 mt-0"><b class="d-block"><span
                                                class="count text-warning fs-3">10+</span></b>Hệ
                                        thống cửa hàng</div>
                                    <div class="item font-weight-bold m-3 mt-0"><b class="d-block"><span
                                                class="count text-warning fs-3">2020+</span></b>Giải
                                        thưởng</div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <a href="{{ route('site.product.index') }}" class="d-block">
                                    <img src="//bizweb.dktcdn.net/100/501/740/themes/929449/assets/slider_text_image.png?1718333058023"
                                        data-src="//bizweb.dktcdn.net/100/501/740/themes/929449/assets/slider_text_image.png?1718333058023"
                                        class="image position-absolute lazyload loaded"
                                        alt="<b>Nội thất</b> nâng tầm không gian sống">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @foreach ($list_slider as $item)
            <div class="carousel-item">
                <img src="{{ asset('images/banners/' . $item->image) }}" class="d-block w-100" alt="...">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>
