<div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Selamat Datang, <?php echo e(Auth::user()->name ?? 'Member'); ?>! 🙏</h3>
                    <p class="text-subtitle text-muted">Siap untuk latihan hari ini?</p>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($tomorrowClasses) > 0): ?>
                <div class="col-12 mb-4">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-bell-fill me-2"></i>Reminder Kelas Besok!</strong>
                        <hr class="my-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $tomorrowClasses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mb-2">
                            <strong><?php echo e($class['class_name']); ?></strong><br>
                            <small>
                                <i class="bi bi-calendar-event me-1"></i><?php echo e($class['start_time']->translatedFormat('l, d F Y - H:i')); ?> WIB<br>
                                <i class="bi bi-person me-1"></i>Instruktur: <?php echo e($class['instructor']); ?><br>
                                <i class="bi bi-geo-alt me-1"></i>Lokasi: <?php echo e($class['location']); ?>

                            </small>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!$loop->last): ?>
                        <hr class="my-2">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Booking</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($totalBookings); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldTick-Square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Booking Terkonfirmasi</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($bookingTerkonfirmasi); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldClose-Square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Booking Dibatalkan</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($bookingDibatalkan); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldStar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Booking Selesai</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($bookingSelesai); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldCategory"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Kelas</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($totalKelas); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldTicket"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Tersedia</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($kelasTersedia); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldDanger"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Penuh</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($kelasPenuh); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldTime-Circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Selesai</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($kelasSelesai); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon orange mb-2">
                                        <i class="iconly-boldTime-Circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Daftar Tunggu Aktif</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($daftarTungguAktif); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldStar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Posisi Terbaik</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($posisiTerbaik > 0 ? '#' . $posisiTerbaik : '-'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldCalendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Estimasi Waktu</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($estimasiWaktu > 0 ? $estimasiWaktu . ' hari' : '-'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title"><i class="bi bi-calendar-week me-2"></i>Kalender Booking Saya</h4>
                                <span class="badge bg-primary">
                                    <i class="bi bi-bookmark-check me-1"></i><?php echo e(count($calendarEvents)); ?> Booking
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $__env->startPush('styles'); ?>
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />
<style>
    /* Menyesuaikan dengan Tema Mazer Template */
    #calendar {
        background: #ffffff;
        border-radius: 0.5rem;
    }

    .fc {
        font-family: 'Nunito', sans-serif;
    }

    /* Header Toolbar - Menggunakan warna primary Mazer */
    .fc .fc-toolbar {
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .fc .fc-toolbar-title {
        font-size: 1.25rem !important;
        font-weight: 600 !important;
        color: #25396f !important;
    }

    .fc .fc-button {
        background-color: #435ebe !important;
        border-color: #435ebe !important;
        color: #ffffff !important;
        padding: 0.469rem 0.75rem !important;
        font-size: 0.875rem !important;
        font-weight: 500 !important;
        border-radius: 0.267rem !important;
        transition: all 0.2s ease-in-out !important;
        text-transform: capitalize !important;
    }

    .fc .fc-button:hover {
        background-color: #3650b0 !important;
        border-color: #3650b0 !important;
    }

    .fc .fc-button-primary:not(:disabled).fc-button-active,
    .fc .fc-button-primary:not(:disabled):active {
        background-color: #2e4395 !important;
        border-color: #2e4395 !important;
    }

    .fc .fc-button:disabled {
        opacity: 0.5;
    }

    /* Day Grid */
    .fc .fc-daygrid-day-frame {
        min-height: 90px;
    }

    .fc .fc-daygrid-day-top {
        padding: 0.5rem;
    }

    .fc .fc-daygrid-day-number {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        font-weight: 600;
        color: #25396f;
    }

    .fc .fc-day-today {
        background-color: rgba(67, 94, 190, 0.05) !important;
    }

    .fc .fc-day-today .fc-daygrid-day-number {
        background-color: #435ebe;
        color: #ffffff !important;
        border-radius: 0.267rem;
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    /* Events - Menggunakan palet warna Mazer */
    .fc-event {
        border: none !important;
        border-radius: 0.267rem !important;
        padding: 3px 6px !important;
        margin: 2px !important;
        font-size: 0.75rem !important;
        font-weight: 500 !important;
        cursor: pointer !important;
        transition: all 0.15s ease !important;
    }

    .fc-event:hover {
        opacity: 0.85 !important;
    }

    .fc-event-title {
        font-weight: 500 !important;
    }

    .fc-event-time {
        font-weight: 400 !important;
    }

    /* Grid Lines - Sesuai dengan style Mazer */
    .fc .fc-scrollgrid {
        border-color: #dee2e6;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .fc-theme-standard td,
    .fc-theme-standard th {
        border-color: #dee2e6;
    }

    .fc-col-header-cell {
        background-color: #f3f4f6;
        padding: 0.75rem 0.5rem !important;
        font-weight: 600;
        color: #6c757d;
        text-transform: uppercase;
        font-size: 0.7rem;
        letter-spacing: 0.3px;
    }

    /* Time Grid View */
    .fc .fc-timegrid-slot {
        height: 2.5em;
    }

    .fc .fc-timegrid-slot-label {
        font-weight: 500;
        color: #6c757d;
        font-size: 0.875rem;
    }

    /* List View */
    .fc .fc-list-event:hover td {
        background-color: rgba(67, 94, 190, 0.05);
    }

    .fc-list-event-dot {
        border-width: 4px !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .fc .fc-toolbar {
            flex-direction: column;
            gap: 0.75rem;
        }

        .fc .fc-toolbar-title {
            font-size: 1.1rem !important;
        }

        .fc .fc-button {
            padding: 0.375rem 0.625rem !important;
            font-size: 0.8rem !important;
        }

        .fc .fc-daygrid-day-frame {
            min-height: 70px;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            buttonText: {
                today: 'Hari Ini',
                month: 'Bulan',
                week: 'Minggu',
                day: 'Hari',
                list: 'Daftar'
            },
            locale: 'id',
            firstDay: 1, // Senin sebagai hari pertama
            height: 'auto',
            contentHeight: 600,
            aspectRatio: 1.8,
            events: <?php echo json_encode($calendarEvents, 15, 512) ?>,
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            eventClick: function(info) {
                var event = info.event;
                var props = event.extendedProps;

                // Format tanggal
                var startDate = new Date(event.start);
                var endDate = event.end ? new Date(event.end) : startDate;

                var options = {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                };

                var startStr = startDate.toLocaleDateString('id-ID', options);
                var endTimeStr = endDate.toLocaleTimeString('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit'
                });

                // Buat konten modal
                var modalContent = `
                <div class="modal-body">
                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase" style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px;">Nama Kelas</h6>
                        <h5 class="mb-0 text-primary">${event.title}</h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted text-uppercase" style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px;">
                                <i class="bi bi-person me-1"></i>Instruktur
                            </h6>
                            <p class="mb-0">${props.instructor}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <h6 class="text-muted text-uppercase" style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px;">
                                <i class="bi bi-geo-alt me-1"></i>Lokasi
                            </h6>
                            <p class="mb-0">${props.location}</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase" style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px;">
                            <i class="bi bi-calendar-event me-1"></i>Waktu
                        </h6>
                        <p class="mb-0">${startStr}<br><small class="text-muted">Selesai: ${endTimeStr} WIB</small></p>
                    </div>
                    <div class="mb-3">
                        <h6 class="text-muted text-uppercase" style="font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px;">
                            <i class="bi bi-info-circle me-1"></i>Status
                        </h6>
                        <p class="mb-0">
                            <span class="badge ${props.status === 'Selesai' ? 'bg-secondary' : 'bg-success'}">${props.status}</span>
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x me-1"></i>Tutup
                    </button>
                    <a href="<?php echo e(route('member.booking')); ?>" class="btn btn-primary">
                        <i class="bi bi-list-ul me-1"></i>Lihat Semua Booking
                    </a>
                </div>
            `;

                // Tampilkan modal
                var existingModal = document.getElementById('eventDetailModal');
                if (existingModal) {
                    existingModal.remove();
                }

                var modalHtml = `
                <div class="modal fade" id="eventDetailModal" tabindex="-1" aria-labelledby="eventDetailModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eventDetailModalLabel">
                                    <i class="bi bi-calendar-check me-2"></i>Detail Booking
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            ${modalContent}
                        </div>
                    </div>
                </div>
            `;

                document.body.insertAdjacentHTML('beforeend', modalHtml);
                var modal = new bootstrap.Modal(document.getElementById('eventDetailModal'));
                modal.show();

                // Hapus modal setelah ditutup
                document.getElementById('eventDetailModal').addEventListener('hidden.bs.modal', function() {
                    this.remove();
                });
            },
            eventDidMount: function(info) {
                // Tambahkan tooltip
                info.el.setAttribute('title', info.event.title + ' - ' + info.event.extendedProps.instructor);
            },
            // Responsive
            windowResize: function(view) {
                if (window.innerWidth < 768) {
                    calendar.changeView('timeGridDay');
                } else {
                    calendar.changeView('dayGridMonth');
                }
            }
        });

        calendar.render();
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH D:\bismillah-PJfixyaa\bismillah-PJfix\resources\views/livewire/member/dashboard.blade.php ENDPATH**/ ?>