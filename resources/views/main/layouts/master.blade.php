<!DOCTYPE html>
<html lang="en">

<head>
    @include('main.layouts.head')
</head>
<body>
    <div class="wrapper">
        @include('main.layouts.nav')

        @yield('content')

        @include('main.layouts.footer')

        @yield('custom_script')
    </div>
</body>
</html>
