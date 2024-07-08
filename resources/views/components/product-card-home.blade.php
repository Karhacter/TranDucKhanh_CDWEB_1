 <div class="row">
     <div class="col-6 col-md-3 mb-4 ut2-gl__body content-on-hover  ">

         <div class="product-item item border">
             <div class="product-item-image">
                 <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
                     <img id="productimage" class="img-fluid w-100" src="{{ asset('images/products/' . $product->image) }}"
                         alt="{{ $product->image }}">
                 </a>
             </div>
             <h2 class="product-item-name text-main fs-5 ps-2 pt-2">
                 <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"
                     class="text-decoration-none text-dark">
                     {{ $product->name }}
                 </a>
             </h2>
             <h3 class="product-item-price fs-6 d-flex">
                 @if ($product->pricesale > 0)
                     <del class="text-muted pricesale ps-2">{{ number_format($product->price, 0, ',', '.') }}₫</del>
                     <h5 class=" text-start ps-2 text-danger">
                         {{ number_format($product->pricesale, 0, ',', '.') }}₫
                     </h5>
                 @else
                     <h5 class="text-start ps-2 text-danger" style="padding-top: 20px">
                         {{ number_format($product->price, 0, ',', '.') }}₫
                     </h5>
                 @endif
             </h3>
             <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}"> <button
                     class="border border-dark rounded-pill mb-3 mt-2 bg-white p-2 ms-1" style="width: 250px;"><i
                         class="fa fa-gear fa-spin me-2" style="font-size:18px"></i>Tùy
                     Chọn</button></a>
         </div>
     </div>
 </div>
