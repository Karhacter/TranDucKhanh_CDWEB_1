  <div class="container current">
      <div class="row">
          @foreach ($product_list as $row)
              <div class="col-md">
                  <x-product-card-home :productitem="$row" />
              </div>
          @endforeach
      </div>
      <div class="more text-center pt-4">
          <a class="text-decoration-none text-dark" href="{{ url('danh-muc/' . $cat->slug) }}">Xem
              thêm
              <i class='fas fa-arrow-right'></i></a>
      </div>
  </div>
