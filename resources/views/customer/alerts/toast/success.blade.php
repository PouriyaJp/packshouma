@if(session('toast-success'))

    <section class="toast" data-delay="3000">

        <section class="toast-body py-3 d-flex bg-success text-white">
            <strong class="ml-auto">{{ session('toast-success') }}</strong>
        </section>
    </section>

    <script>
        $(document).ready(function () {
            $('.toast').toast('show');
        })
    </script>


@endif
