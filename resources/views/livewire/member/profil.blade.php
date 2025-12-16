<div>
    <section class="row">
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        {{-- Avatar dengan Inisial --}}
                        <div class="avatar avatar-xl mb-3">
                            <div class="avatar-content" style="background-color: #435ebe; color: white; font-size: 2rem; width: 120px; height: 120px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">
                                {{ $this->getInitials() }}
                            </div>
                        </div>

                        <h3 class="mt-3">{{ $name }}</h3>
                        <p class="text-small">Member</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-8">
            {{-- Alert Messages --}}
            @if (session()->has('message'))
                <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Form Edit Profil --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Informasi Profil</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateProfile">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" wire:model="name" placeholder="Masukkan nama lengkap">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" wire:model="email" placeholder="Masukkan email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                   id="phone" wire:model="phone" placeholder="Masukkan nomor telepon">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select class="form-select @error('gender') is-invalid @enderror" 
                                    id="gender" wire:model="gender">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="male">Laki-laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Form Ubah Password --}}
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="card-title">Ubah Password</h4>
                </div>
                <div class="card-body">
                    @if (session()->has('password_message'))
                        <div class="alert alert-{{ session('password-alert-type') }} alert-dismissible fade show" role="alert">
                            {{ session('password_message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('password_error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('password_error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form wire:submit.prevent="updatePassword">
                        <div class="form-group mb-3">
                            <label for="current_password" class="form-label">Password Saat Ini</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                   id="current_password" wire:model="current_password" 
                                   placeholder="Masukkan password saat ini">
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                                   id="new_password" wire:model="new_password" 
                                   placeholder="Masukkan password baru (minimal 8 karakter)">
                            @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" 
                                   id="new_password_confirmation" wire:model="new_password_confirmation" 
                                   placeholder="Konfirmasi password baru">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-shield-check"></i> Ubah Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
