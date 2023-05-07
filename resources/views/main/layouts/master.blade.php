<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.layouts.head')
</head>

<body>

{{--<!-- Page Loader потом сделать -->--}}
{{--<div class="page-loader-wrapper">--}}
{{--    <div class="loader">--}}
{{--        <div class="m-t-30"><img src="{{asset('backend/assets/images/loading.gif')}}" width="48" height="48" alt="Lucid"></div>--}}
{{--        <p>Please wait...</p>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Overlay For Sidebars -->--}}

<!-- Шапка -->
@include('main.layouts.nav')

@yield('content')

@include('main.layouts.footer')
</body>

</html>
