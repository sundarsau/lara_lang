@include('layouts.header')
<body>
    @include('layouts.top_menu')
    <div class="container">
        @yield('main-section')
    </div>
@include('layouts.footer')
</body>
</html>
