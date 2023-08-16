<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

{{--            <a href="{{ route('customer.home') }}" class="sidebar-link" target="_blank">--}}
{{--                <i class="fas fa-shopping-cart"></i>--}}
{{--                <span>فروشگاه</span>--}}
{{--            </a>--}}

            <hr>

            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <section class="sidebar-part-title">بخش فروش</section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>بخش کالا</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.product.index') }}">کالاها</a>
                </section>
            </section>

            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>تخفیف ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.market.buy.instalment') }}">قسط</a>
                    <a href="{{ route('admin.market.offer.discount') }}">تخفیفات</a>
                </section>
            </section>

        </section>
    </section>
</aside>
