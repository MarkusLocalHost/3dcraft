<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/front.css') }}">
</head>

<body>

<div class="main-wrapper main-wrapper-3" id="main-wrapper">
    @include('layouts.include.header')
    <!-- mini cart start -->
    @include('layouts.include.sidebar_cart_active')
    <!-- Mobile menu start -->
    @include('layouts.include.mobile_menu_active')

    @yield('content')

    @include('layouts.include.footer')

    @yield('modal')
</div>

<script src="{{ asset('assets/front/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/front/js/plugins.min.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('a#removeFromSidebarCart').click( function () {
            let product_id = $(this).data('id');
            let url = '/cart/remove';
            let price = Number($('span#sidebarProduct' + product_id + 'Price').text().split(' ').splice(3, 1));
            let qty = Number($('span#sidebarProduct' + product_id + 'Price').text().split(' ').splice(1, 1));
            let oldTotal = Number($('h4#sidebarCartTotal').text().split(' ').splice(1, 1));

            $.ajax({
                type: "POST",
                url: url,
                data: {_token: '{{ csrf_token() }}', product_id: product_id},
                success: function () {
                    $('li[data-id=' + product_id + ']').remove();
                    $('h4#sidebarCartTotal').html('Сумма: <span>' + (oldTotal-qty*price) + ' ₽</span>');
                },
                error: function () {

                },
            })
        })
    })
</script>

@yield('script')

</body>

</html>
