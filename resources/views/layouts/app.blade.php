@include('layouts.app_head')

<body>
    @include('layouts.app_header')
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>