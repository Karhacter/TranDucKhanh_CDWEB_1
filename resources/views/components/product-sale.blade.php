  <section class="kah-product-sale">
      <div class="row">
          <div class="col">
              <h2 class="text-center pt-5 mt-5"><a href="{{ route('site.product.index') }}"
                      class="text-decoration-none text-dark font-weight-bold">Sản
                      phẩm
                      <br />Khuyến
                      mãi</a>
              </h2>
              <h5 class="text-center mt-4">
                  <p class="text-danger">Từ khung giờ <time>10:00</time> đến <time>21:00</time> hàng tuần. Vào các ngày:
                  </p>
                  <br> Thứ 2 &nbsp; | &nbsp; Thứ 5 &nbsp; | &nbsp; Thứ 7
                  </p>
              </h5>
          </div>
          <div class="col">
              <div class="container">
                  <div class="container pt-4">
                      <div class="row">
                          @foreach ($product_sale as $row)
                              <div class="col-md ">
                                  <x-product-card-home :productitem="$row" />
                              </div>
                          @endforeach
                      </div>
                  </div>
                  <div class="background-overlay"></div>
              </div>
          </div>
      </div>
  </section>
