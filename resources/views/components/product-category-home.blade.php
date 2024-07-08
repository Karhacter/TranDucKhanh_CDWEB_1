<section class="kah-product-collection section_product_tab">
    <h2 class="text-center pt-5">
        <a href="#" class="text-decoration-none text-dark font-weight-bold">Bộ sưu tập</a>
    </h2>
    <div class="container-fluid tabContainer">
        <div class="group-module d-flex justify-content-center pt-1">
            {{-- tabtitle ajax clearfix --}}
            <ul class="tabs tabs-title tab-pc d-flex list-unstyled mb-md-4 mt-3">
                @foreach ($category_list as $index => $cat_row)
                    <li class="tab-link tab_cate p-1 ps-4 pe-4 me-4 mb-md-2 has-content {{ $index == 0 ? 'current' : '' }} border rounded-pill"
                        data-tab="tab-{{ $index }}" data-url="#">{{ $cat_row->name }}</li>
                @endforeach
            </ul>
        </div>
        @foreach ($category_list as $index => $cat_row)
            <div class="tab-content tab-{{ $index }} container {{ $loop->first ? 'current' : '' }}">
                @if ($loop->first)
                    <x-product-category :catrow="$cat_row" />
                @else
                    <x-product-category :catrow="$cat_row" />
                @endif
            </div>
        @endforeach
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('.tabs-title li').click(function() {
            var $this2 = $(this),
                tab_id = $this2.attr('data-tab'),
                url = $this2.attr('data-url');

            // Clear current class from all tabs and tab contents
            $('.tabs-title li').removeClass('current');
            $('.tab-content').removeClass('current');

            // Add current class to the clicked tab and corresponding content
            $this2.addClass('current');
            $(".tab-content." + tab_id).addClass('current');

            // If the content is not loaded yet, load it via AJAX
            if (!$this2.hasClass('has-content')) {
                $this2.addClass('has-content');
                loadTabContent(url, tab_id);
            }
        });

        function loadTabContent(url, tab_id) {
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $(".tab-content." + tab_id).html(data);
                },
                error: function() {
                    $(".tab-content." + tab_id).html(
                        '<p>Error loading content. Please try again later.</p>');
                }
            });
        }
    });
</script>

{{-- Trợ giúp từ chatgpt --}}
