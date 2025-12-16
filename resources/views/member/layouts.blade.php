<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Member - Gymora Studio')</title>

    <link rel="shortcut icon" href="{{ asset('mazer/assets/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAA..." type="image/png">
    <link rel="stylesheet" href="{{ asset('mazer/assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('mazer/assets/compiled/css/iconly.css') }}">

    @livewireStyles
    @stack('styles')
</head>

<body>
    <div id="app">
        <div id="sidebar">
            @livewire('partials.sidebar')
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-content">
                {{ $slot }}
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2025 &copy; Gymora Studio</p>
                    </div>
                    <div class="float-end">
                        <p>Stay Healthy, Stay Happy <span class="text-danger"><i class="bi bi-heart-fill"></i></span></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="{{ asset('mazer/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('mazer/assets/compiled/js/app.js') }}"></script>

    @livewireScripts
    @stack('scripts')
</body>

</html>