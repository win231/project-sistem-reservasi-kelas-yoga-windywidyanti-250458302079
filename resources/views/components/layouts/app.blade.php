<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gymora Studio</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="scss/style.css" />

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet" />

    @livewireStyles
</head>

<body>
    <!-- navbar -->
    <header>
        <nav>
            <div class="container">
                <div class="nav-brand">
                    <h1>Gymora Studio</h1>
                </div>

                <ul class="nav-menu">
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#kelas">Kelas</a></li>
                    <li><a href="#jadwal">Jadwal</a></li>
                    <li><a href="#instructor">Instruktur</a></li>
                </ul>

                <div class="nav-auth">
                    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- end navbar -->
    @yield('content')
    <!-- hero section -->

    <!-- footer -->
    <footer class="text-center py-5">
        <div class="container">
            <h2>Siap memulai perjalanan Anda?</h2>
            <p>Buat akun hari ini dan utamakan kesehatan jiwa raga Anda.</p>
            <a href="{{ route('register') }}" class="btn btn-light">Buat Akun</a>

            <div class="mt-5 border-top border-light pt-4 opacity-50">
                <small>&copy; 2025 Gymora Yoga Studio. Hak Cipta Dilindungi.</small>
            </div>
        </div>
    </footer>
    <!-- footer -->


    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
        integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
        crossorigin="anonymous"></script>

    @livewireScripts
</body>

</html>