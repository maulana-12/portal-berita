@include('front.includes.header')

  <body>
    @include('front.includes.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('front.includes.footer')

    @include('front.includes.js')
    </body>
</html>