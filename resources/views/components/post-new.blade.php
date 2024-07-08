   <section class="kah-post mt-5 pt-4">
       <div class="container">
           <h2 class="block-title position-relative text-center bold mb-4">
               <a href="tin-tuc" class="text-decoration-none text-dark" title="Blog chia sẻ">Tin tức mới nhất</a>
           </h2>
           <div class="row">
               @foreach ($post_new as $row)
                   <div class="col-lg-4">
                       <div class="item-blog mb-md-4 mb-2">
                           <a class="{{ url('tin-tuc/' . $row->slug) }}" href="#">
                               <img class="rounded-3"
                                   src="https://bizweb.dktcdn.net/100/501/740/articles/1-15da8b7a-69a1-43cc-a22b-26b1f9d7371a.jpg?v=1701363821503"
                                   style="width: 485px">
                           </a>
                           <div class=" bg-light border rounded-3 p-2">
                               <div class="mb-2">{{ $row->created_at->translatedFormat('l, d/m/Y') }}</div>
                               <h5 class="post-title bold">
                                   <a href="{{ url('tin-tuc/' . $row->slug) }}"
                                       class="text-decoration-none">{{ $row->title }}</a>
                               </h5>
                               <p>{{ Str::limit($row->detail) }}</p>
                           </div>
                       </div>
                   </div>
               @endforeach
           </div>
       </div>
   </section>
