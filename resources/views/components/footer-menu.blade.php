 <div class="col-12 pt-5 text-white col-lg-5">
     <div class="row">
         <div class="col-12 col-sm-6">
             <h4 class="widgettilte">CHÍNH SÁCH</h4>
             <ul class="navbar-nav">
                 <li class="nav-item me-2 pt-3">
                     Thời gian hỗ trợ <br>
                     24/7 không kể ngày lễ
                 </li>
                 <li class="nav-item me-2 pt-3" hover>
                     Hotline:
                     <p class="pt-2"><a href="{{ asset('/lien-he') }}"
                             class="text-decoration-none text-white">0912.345.678</a></p>
                 </li>
             </ul>
         </div>

         <div class="footermenu col-12 col-sm-6">
             <h4 class="widgettilte">HƯỚNG DẪN</h4>
             <ul class=" navbar-nav">
                 @foreach ($list_menu as $row)
                     <x-footer-menu-item :rowmenu="$row" />
                 @endforeach
             </ul>
         </div>
     </div>
 </div>
