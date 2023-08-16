@extends('customer.layouts.master-one-col')

@section('content')
    <!-- start cart -->
    <section class="mb-4" style="margin-top: 20px;">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->

                    @foreach($products as $product)

                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>{{ $product->name }}</span>
                                </h2>
                            </section>
                        </section>

                        <section class="row mt-4">

                            <!-- start product info -->
                            <section class="col-md-7">

                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                    <section class="col-md-4">
                                        <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                            <section class="product-gallery">
                                                <section class="product-gallery-selected-image mb-3">
                                                    <img src="{{ $product->image }}" alt="">
                                                </section>
                                            </section>
                                        </section>
                                    </section>
                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                {{ $product->name }}
                                            </h2>
                                            <section class="content-header-link">
                                                <!--<a href="#">مشاهده همه</a>-->
                                            </section>
                                        </section>
                                    </section>
                                    <section class="product-info">
                                        <p class="mb-3 mt-5">
                                            <i class="fa fa-info-circle me-1"></i>{{ $product->introduction }}
                                        </p>
                                    </section>
                                </section>

                                @foreach ($product->discounts()->get() as $productDiscount)
                                    <label for="d-discount-{{ $productDiscount->id }}"
                                           class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                        <input class="discountRadio" type="radio" name="selected_option"
                                               value="{{ $productDiscount->id }}"
                                               id="d-discount-{{ $productDiscount->id }}"/>
                                        <section class="mb-2">
                                            <i class="fa fa-shipping-fast mx-1"></i>
                                            {{ $productDiscount->name }}
                                        </section>
                                        <section class="mb-2">
                                            {{ $productDiscount->percentage }} درصد
                                        </section>
                                    </label>
                                @endforeach

                                @foreach ($product->instalments()->get() as $productInstalment)
                                    <label for="d-instalment-{{ $productInstalment->id }}"
                                           class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                        <input class="instalmentRadio" type="radio" name="selected_option"
                                               value="{{ $productInstalment->id }}"
                                               id="d-instalment-{{ $productInstalment->id }}"/>
                                        <section class="mb-2">
                                            <i class="fa fa-shipping-fast mx-1"></i>
                                            {{ $productInstalment->name }}
                                        </section>
                                        <section class="mb-2">
                                            {{ $productInstalment->percentage }} درصد
                                        </section>
                                    </label>
                                @endforeach

                            </section>
                            <!-- end product info -->

                            <section class="col-md-3">
                                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">

                                    <form action="{{ route('customer.cart.create', $product->id) }}" method="post">
                                        @csrf
                                        <section class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted">قیمت کالا</p>
                                            <p class="text-muted"><span id="product_price" data-product-original-price={{
                                        $product->price }}>{{ $product->price }}</span> <span
                                                    class="small">تومان</span></p>
                                        </section>

                                        @php
                                            $discount = $product->activeDiscounts();
                                        @endphp
                                        @if(!empty($discount))
                                            <section class="d-flex justify-content-between align-items-center discount">
                                                <p class="text-muted">تخفیف کالا</p>
                                                <p name="discount" class="text-danger fw-bolder" id="product-discount-price"
                                                   data-product-discount-price="{{ ($product->price * ($discount->percentage / 100) ) }}">
                                                    {{ $product->price * ($discount->percentage / 100) }} <span
                                                        class="small">تومان</span></p>
                                                <input hidden class="discount_input" name="discount" type="text" value="{{ $product->price * ($discount->percentage / 100) }}">
                                            </section>
                                        @endif

                                        @php
                                            $instalment = $product->activeInstalments();
                                        @endphp

                                        @if(!empty($instalment))
                                            <section class="d-none justify-content-between align-items-center instalment">
                                                <p class="text-muted">وام کالا</p>
                                                <p class="text-danger fw-bolder" id="product-instalment-price"
                                                   data-product-instalment-price="{{ ($product->price * ($instalment->percentage / 100) ) }}">
                                                    {{ $product->price * ($instalment->percentage / 100) }} <span
                                                        class="small">تومان</span></p>
                                                <input hidden class="instalment_input" name="instalment" type="text" value="{{ $product->price * ($instalment->percentage / 100) }}">
                                            </section>
                                        @endif

                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number cart-number-down" type="button">-</button>
                                                <input type="number" id="number" name="number" min="1" max="5" step="1"
                                                       value="1" readonly="readonly">
                                                <button class="cart-number cart-number-up" type="button">+</button>
                                            </section>
                                        </section>

                                        <section class="border-bottom mb-3"></section>

                                        <section class="d-flex justify-content-end align-items-center">
                                            <p class="fw-bolder"><span id="final-price"></span> <span class="small">تومان</span>
                                            </p>
                                            <input hidden name="final_price" class="final-price" type="text">
                                        </section>

                                        <section class="">
                                            <button type="submit" id="next-level" class="btn btn-danger d-block disabled">افزودن
                                                به
                                                سبد خرید
                                            </button>
                                        </section>
                                    </form>

                                </section>
                            </section>


                            @endforeach

                        </section>
                </section>
            </section>

        </section>
    </section>

    <!-- end cart -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            bill();

            //number
            $('.cart-number').click(function () {
                bill();
            })
        })

        function bill() {
            var number = 1;
            var product_discount_price = 0;
            var product_instalment_price = 0;
            var product_original_price = parseFloat($('#product_price').attr('data-product-original-price'));

            if ($('#number').val() > 0) {
                number = parseFloat($('#number').val());
            }

            if ($('#product-discount-price').length != 0) {
                product_discount_price = parseFloat($('#product-discount-price').attr('data-product-discount-price'));
            }

            if ($('#product-instalment-price').length != 0) {
                product_instalment_price = parseFloat($('#product-instalment-price').attr('data-product-instalment-price'));
            }

            var product_price = product_original_price;

            $(".discountRadio").click(function () {
                $(".instalment").removeClass('d-flex').addClass('d-none');
                $(".instalment_input").attr('disabled', true);
                $(".discount").removeClass('d-none').addClass('d-flex');
                $(".discount_input").attr('disabled', false);
                bill();
            });

            $(".instalmentRadio").click(function () {
                $(".instalment").removeClass('d-none').addClass('d-flex');
                $(".instalment_input").attr('disabled', false);
                $(".discount").removeClass('d-flex').addClass('d-none');
                $(".discount_input").attr('disabled', true);
                bill();
            });

            if ($(".discount").hasClass('d-flex')){
                var final_price = number * (product_price - product_discount_price);
            }

            if ($(".instalment").hasClass('d-flex')){
                var final_price = number * (product_price + product_instalment_price);
            }

            $('#final-price').html(toFarsiNumber(final_price));
            $('.final-price').val(final_price);

            $('#product-price').html(toFarsiNumber(product_price));

            if ($(".discountRadio").is(':checked') || $(".instalmentRadio").is(':checked')){
                $("#next-level").removeClass('disabled');
            }
        }

        function toFarsiNumber(number) {
            const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            // add comma
            number = new Intl.NumberFormat().format(number);
            //convert to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }

    </script>


@endsection
