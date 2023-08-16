<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>
<body>

@include('customer.layouts.header')

    <main id="main-body-one-col" class="main-body">

    @yield('content')

    </main>



    @include('customer.layouts.script')
    @yield('script')

<section class="toast-wrapper flex-row-reverse">

    @include('customer.alerts.toast.success')
    @include('customer.alerts.toast.error')

</section>
</body>
</html>
