<div class="regis-page">
    <div class="container">
        <div class="regis-left">
            <div class="regis-title-left">
                <h2>Mulai Perjalanan Keseimbangan Anda!</h2>
                <p class="regis-subtitle-left">Buat Akun Anda Sekarang dan Akses Kelas Eksklusif Gymora Studio.</p>

                <!-- {{-- Form menggunakan wire:submit, bukan action="" --}} -->
                <form wire:submit.prevent="submit">
                    @csrf

                    <!-- {{-- NAMA --}} -->
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-icon">
                            <input type="text" wire:model="name" placeholder="nama" required>
                        </div>
                        @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <!-- {{-- EMAIL --}} -->
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-icon">
                            <!-- {{-- Ganti name="email" jadi wire:model="email" --}} -->
                            <input type="email" wire:model="email" placeholder="nama@gmail.com" required>
                        </div>
                        @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <!-- {{-- GENDER --}} -->
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <div class="input-icon">
                            <select wire:model="gender" required id="gender" class="form-select @error('gender') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="male">Pria</option>
                                <option value="female">Wanita</option>
                            </select>
                        </div>
                        @error('gender') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <div class="input-icon">
                            <input type="phone" wire:model="phone" placeholder="nomor telepon" required>
                        </div>
                        @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <!-- {{-- PASSWORD --}} -->
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-icon">
                            {{-- Ganti name="password" jadi wire:model="password" --}}
                            <input type="password" wire:model="password" placeholder="password" required>
                        </div>
                        @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                    </div>

                    <!-- {{-- KONFIRMASI PASSWORD --}} -->
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <div class="input-icon">
                            {{-- PENTING: Ganti jadi wire:model="password_confirmation" --}}
                            <input type="password" wire:model="password_confirmation" placeholder="konfirmasi password" required>
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