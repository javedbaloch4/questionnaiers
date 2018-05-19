<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <title>Document</title>
</head>
<body>

    @include('layouts.navbar')

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    @yield('script')

</body>
</html>