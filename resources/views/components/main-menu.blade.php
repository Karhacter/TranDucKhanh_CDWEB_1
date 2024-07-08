  <nav class="navbar-collapse navbar navbar-expand-lg pt-0">
      <ul class="navbar-nav me-auto mb-lg-0 ">
          @foreach ($list_menu as $row)
              <x-main-menu-item :rowmenu="$row" />
          @endforeach
      </ul>
  </nav>
