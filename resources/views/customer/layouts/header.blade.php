<!-- start header -->
<header class="header mb-4">


    <!-- start top-header logo, searchbox and cart -->
    <section class="top-header">
        <section class="container-xxl ">
            <section class="d-md-flex justify-content-md-between align-items-md-center py-3">

                <section class="d-flex justify-content-between align-items-center d-md-block">
                    <a class="text-decoration-none" href=""></a>
                    <button class="btn btn-link text-dark d-md-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="fa fa-bars me-1"></i>
                    </button>
                </section>

                <section class="header-cart d-inline ps-3 border-start position-relative">
                    <a class="btn btn-link position-relative text-dark header-cart-link"
                       href="{{ route('customer.cart') }}">
                        <i class="fa fa-shopping-cart"></i> <span style="top: 80%;" class="position-absolute start-0 translate-middle badge rounded-pill bg-danger">{{ $orderItems->count() }}</span>
                    </a>
                </section>
            </section>
        </section>
    </section>
    </section>
    <!-- end top-header logo, searchbox and cart -->


</header>
<!-- end header -->
