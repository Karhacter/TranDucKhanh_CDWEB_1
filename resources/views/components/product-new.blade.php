<section class="kah-product-new pb-4">
    <h2 class="text-center pt-5"><a href="#" class="text-decoration-none text-dark font-weight-bold">Sản phẩm mới</a>
    </h2>
    <div class="container-fluid">
        <div class="container pt-4">
            <div class="row">
                @foreach ($product_new as $row)
                    <div class="col-md">

                        <x-product-card :productitem="$row" />
                    </div>
                @endforeach
            </div>

            <div class="more text-center pt-4">
                <a class="text-decoration-none text-dark"
                    href="http://localhost/TranDucKhanh_2122110588/public/product">Xem thêm <i
                        class='fas fa-arrow-right'></i></a>
            </div>
        </div>
    </div>
</section>
