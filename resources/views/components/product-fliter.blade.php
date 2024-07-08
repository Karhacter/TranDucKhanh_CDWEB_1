  <aside class="sidebar sidebar-collection col-lg-3 col-12 mb-5 pt-5">
      <h4 class="aside-title-module pb-2 mb-2 bold border-bottom">Danh mục sản phẩm</h4>
      <div class="aside-item mb-4">
          <nav class="nav-category">
              <ul class="navbar-pills" style="background: white">
                  @foreach ($list_category as $item_cate)
                      <li class="nav-item  position-relative">
                          <a href="{{ url('danh-muc/' . $item_cate->slug) }}"
                              class="nav-link pr-5 text-dark">{{ $item_cate->name }}</a>
                          <i class="open_mnu down_icon"></i>
                      </li>
                  @endforeach

              </ul>
          </nav>

      </div>
      <h4 class="aside-title-module pb-2 mb-2 bold border-bottom">Thương hiệu</h4>
      <div class="aside-item mb-4">
          <nav class="nav-brand">
              <ul class="navbar-pills" style="background: white">
                  @foreach ($list_brand as $item_brand)
                      <li class="nav-item  position-relative">
                          <a href="{{ url('thuong-hieu/' . $item_brand->slug) }}"
                              class="nav-link pr-5 text-dark">{{ $item_brand->name }}</a>
                          <i class="open_mnu down_icon"></i>
                      </li>
                  @endforeach

              </ul>
          </nav>
      </div>
      <h4 class="aside-title-module pb-2 mb-2 bold border-bottom">Lọc theo giá</h4>
      <div class="aside-content filter-group content_price">
          <ul class="list-unstyled m-0">
              <li class="filter-item filter-item--check-box filter-item--green">
                  <span>
                      <label for="filter-duoi-1-000-000d">
                          <input type="checkbox" id="filter-duoi-1-000-000d" onclick="filterProducts(this)"
                              data-filter="1-000-000d" data-group="Khoảng giá" data-field="price_min"
                              data-text="Dưới 1.000.000đ" value="0,1000000">
                          Dưới 1 triệu
                      </label>
                  </span>
              </li>
              <li class="filter-item filter-item--check-box filter-item--green">
                  <span>
                      <label for="filter-1-000-000d-2-000-000d">
                          <input type="checkbox" id="filter-1-000-000d-2-000-000d" onclick="filterProducts(this)"
                              data-filter="1-000-000d-2-000-000d" data-group="Khoảng giá" data-field="price_min"
                              data-text="1.000.000đ - 2.000.000đ" value="1000000,2000000">
                          Từ 1 triệu - 2 triệu
                      </label>
                  </span>
              </li>
              <li class="filter-item filter-item--check-box filter-item--green">
                  <span>
                      <label for="filter-2-000-000d-3-000-000d">
                          <input type="checkbox" id="filter-2-000-000d-3-000-000d" onclick="filterProducts(this)"
                              data-filter="2-000-000d-3-000-000d" data-group="Khoảng giá" data-field="price_min"
                              data-text="2.000.000đ - 3.000.000đ" value="2000000,3000000">
                          Từ 2 triệu - 3 triệu
                      </label>
                  </span>
              </li>
              <li class="filter-item filter-item--check-box filter-item--green">
                  <span>
                      <label for="filter-3-000-000d-5-000-000d">
                          <input type="checkbox" id="filter-3-000-000d-5-000-000d" onclick="filterProducts(this)"
                              data-filter="3-000-000d-5-000-000d" data-group="Khoảng giá" data-field="price_min"
                              data-text="3.000.000đ - 5.000.000đ" value="3000000,5000000">
                          Từ 3 triệu - 5 triệu
                      </label>
                  </span>
              </li>
              <li class="filter-item filter-item--check-box filter-item--green">
                  <span>
                      <label for="filter-tren5-000-000d">
                          <input type="checkbox" id="filter-tren5-000-000d" onclick="filterProducts(this)"
                              data-filter="tren5-000-000d" data-group="Khoảng giá" data-field="price_min"
                              data-text="Trên 5.000.000đ" value="5000000">
                          Trên 5 triệu
                      </label>
                  </span>
              </li>
          </ul>
      </div>
      <script>
          $(".open_mnu").click(function() {
              $(this).toggleClass('cls_mn').next().slideToggle();
          });
      </script>

  </aside>
