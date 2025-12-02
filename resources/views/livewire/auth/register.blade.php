<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gymora-regis</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('scss/style.css') }}">

    @livewireStyles

</head>

<body>
    <div class="regis-page">
        <div class="container">
            <div class="regis-left">
                <div class="regis-title-left">
                    <h2>Mulai Perjalanan Keseimbangan Anda!</h2>
                    <p class="regis-subtitle-left">Buat Akun Anda Sekarang dan Akses Kelas Eksklusif Gymora Studio.</p>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <div class="input-icon">
                                <input type="text" name="name" placeholder="nama" required id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <div class="input-icon">
                                <input type="email" name="email" placeholder="win@gmail.com" required id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <div class="input-icon">
                                <select wire:model.defer="gender" required id="gender" class="form-select @error('gender') is-invalid @enderror">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="male">Pria</option>
                                    <option value="female">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <div class="input-icon">
                                <input type="password" name="password" placeholder="password" required id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Konfirmasi Password</label>
                            <div class="input-icon">
                                <input type="password" name="password" placeholder="konfirmasi password" required id="">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-logis">Daftar Sekarang</button>

                        <div class="regis-divider">
                            <span>atau</span>
                        </div>

                        <p class="register-link">
                            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini.</a>
                        </p>
                    </form>
                </div>
            </div>

            <div class="regis-right">
                <div class="regis-title">
                    <h2>GYMORA STUDIO</h2>
                    <p>Ruang Latihan Eksklusif Anda</p>
                </div>
                <div class="regis-image">
                    <img src="https://i.pinimg.com/736x/2a/a4/99/2aa49909137da136b259bf66c1b79ebe.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

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