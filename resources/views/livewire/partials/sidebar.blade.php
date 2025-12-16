<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('member.dashboard') }}">
                    <h3 style="color: #6c9a76;">Gymora Studio.</h3>
                </a>
            </div>
            <div class="sidebar-toggler x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>

    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu Utama</li>

            <li class="sidebar-item {{ Request::routeIs('member.dashboard') ? 'active' : '' }}">
                <a href="{{ route('member.dashboard') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Beranda</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('member.kelas') ? 'active' : '' }}">
                <a href="{{ route('member.kelas') }}" class='sidebar-link'>
                    <i class="bi bi-book"></i>
                    <span>Kelas</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('member.jadwal') ? 'active' : '' }}">
                <a href="{{ route('member.jadwal') }}" class='sidebar-link'>
                    <i class="bi bi-calendar-event"></i>
                    <span>Jadwal</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('member.booking') ? 'active' : '' }}">
                <a href="{{ route('member.booking') }}" class='sidebar-link'>
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <span>Booking</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('member.daftar-tunggu') ? 'active' : '' }}">
                <a href="{{ route('member.daftar-tunggu') }}" class='sidebar-link'>
                    <i class="bi bi-hourglass-split"></i>
                    <span>Daftar Tunggu</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs('member.ulasan') ? 'active' : '' }}">
                <a href="{{ route('member.ulasan') }}" class='sidebar-link'>
                    <i class="bi bi-star-fill"></i>
                    <span>Ulasan</span>
                </a>
            </li>

            <li class="sidebar-title">Akun</li>

            <li class="sidebar-item {{ Request::routeIs('member.profil') ? 'active' : '' }}">
                <a href="{{ route('member.profil') }}" class='sidebar-link'>
                    <i class="bi bi-person-circle"></i>
                    <span>Profil</span>
                </a>
            </li>

            <li class="sidebar-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class='sidebar-link text-danger'
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="bi bi-box-arrow-left text-danger"></i>
                        <span>Keluar</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>