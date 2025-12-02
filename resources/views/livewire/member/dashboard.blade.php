<section class="row">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-12 mb-4">
                <h3>Selamat Datang, {{ Auth::user()->name ?? 'Member' }}! 🙏</h3>
                <p class="text-subtitle text-muted">Siap untuk latihan hari ini?</p>
            </div>

            <div class="col-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="bi bi-card-checklist"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Sisa Kredit</h6>
                                <h6 class="font-extrabold mb-0">8 Sesi</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-6 col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body px-3 py-4-5">
                        <h6 class="text-white">Kelas Berikutnya</h6>
                        <h4 class="text-white">Vinyasa Flow</h4>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span><i class="bi bi-clock"></i> Besok 07:00</span>
                            <button class="btn btn-sm btn-light text-primary">Tiket</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Riwayat Booking Saya</h4>
            </div>
            <div class="card-body">
                @livewire('member.booking-history')
            </div>
        </div>
    </div>
</section>

