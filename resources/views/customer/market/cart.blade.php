@extends('customer.layouts.master-two-col')

@section('head-tag')
<title>سبد خرید شما</title>
@endsection


@section('content')

<!-- start cart -->
<section class="mb-4">
    <section class="container-xxl" >
        <section class="row">
            <section class="col">
                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>سبد خرید شما</span>
                        </h2>
                        <section class="content-header-link">
                            <!--<a href="#">مشاهده همه</a>-->
                        </section>
                    </section>
                </section>

                <section class="row mt-4">
                    <section class="col-md-9 mb-3">

                        @foreach($orders as $order)
                            <form action="{{ route('customer.payment.create', $order->id) }}" id="cart_items" method="post" class="content-wrapper bg-white p-3 rounded-2">
                                @csrf



                                    <section class="cart-item d-md-flex py-3">
                                        <section class="cart-img align-self-start flex-shrink-1"><img src="{{ asset($order->product->image) }}" alt=""></section>
                                        <section class="align-self-start w-100">
                                            <p class="fw-bold">{{ $order->product->name }}</p>
                                        </section>
                                        <section class="align-self-end flex-shrink-1">
                                            @if(!empty($order->product->activeDiscounts()))
                                                <section class="cart-item-discount text-danger text-nowrap mb-1">{{ $order->order_discount_amount }} تخفیف</section>
                                            @endif

                                            <section class="text-nowrap fw-bold">{{ $order->order_total_products_amount }} تومان</section>
                                        </section>
                                    </section>

                                    <section class="">
                                        <button onclick="document.getElementById('cart_items').submit();"
                                                class="btn btn-danger d-block w-100">تکمیل فرآیند خرید
                                        </button>
                                    </section>



                            </form>

                        @endforeach


                    </section>

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

            $('.cart-number').click(function () {
                bill();
            });


            function bill() {

                let total_product_price = 0;
                let total_discount = 0;
                let total_price = 0;

                $('.number').each(function () {
                    let productPrice = parseFloat($(this).data('product-price'));
                    let productDiscount = parseFloat($(this).data('product-discount'));
                    let number = parseFloat($(this).val());

                    total_product_price += productPrice * number;
                    total_discount += productDiscount * number;
                })

                total_price = total_product_price - total_discount;

                $('#total_product_price').html(toFarsiNumber(total_product_price));
                $('#total_discount').html(toFarsiNumber(total_discount));
                $('#total_price').html(toFarsiNumber(total_price));

                function toFarsiNumber(number)
                {
                    const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                    // add comma
                    number = new Intl.NumberFormat().format(number);
                    //convert to persian
                    return number.toString().replace(/\d/g, x => farsiDigits[x]);
                }
            }
        })


    </script>

@endsection
