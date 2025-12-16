<div class="login-page">
    <div class="container">
        <div class="login-left">
            <div class="login-title">
                <h2>GYMORA STUDIO</h2>
                <p>Ruang Latihan Eksklusif Anda</p>
            </div>
            <div class="login-image">
                <img src="https://i.pinimg.com/736x/2a/a4/99/2aa49909137da136b259bf66c1b79ebe.jpg" alt="">
            </div>
        </div>
        <div class="login-right">
            <div class="login-title-right">
                <h2>Selamat Datang di Gymora Studio!</h2>
                <p class="login-subtitle-right">Silakan Masuk untuk Memulai Sesi Yoga Anda.</p>

                <form wire:submit.prevent="submit">
                    @csrf

                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-icon">
                            <span>📧</span>
                            <input type="email" wire:model.defer="email" placeholder="nama@gmail.com" required>
                        </div>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-icon">
                            <span>🔐</span>
                            <input type="password" wire:model.defer="password" placeholder="••••••••" required>
                        </div>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-logis">Masuk</button>

                    <div class="login-divider"><span>atau</span></div>

                    <p class="register-link">
                        Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang, Yuk!</a>
                    </p>
                </form>

            </div>
        </div>
    </div>
</div>