<div class="header-top">
    <div class="container">
        <div class="logo">
            <img src="{{asset('img/assets/pemas.png')}}" width="100%" height="30%;" alt="">
        </div>
        <div class="header-top-right">
            <div class="dropdown">
                <a href="#" id="topbarUserDropdown"
                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-md2">
                        <img src="{{ asset('assets/images/faces/1.jpg') }}" alt="Avatar" />
                    </div>
                    <div class="text">
                        <h6 class="user-dropdown-name">{{Auth::user()->nama}}</h6>
                        <p class="user-dropdown-status text-sm text-muted">
                            Masyarakat
                        </p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                    aria-labelledby="topbarUserDropdown">
                    <li>
                        <a class="dropdown-item" href="{{route('masyarakat.my-profile')}}">Akun saya</a>
                        <a class="dropdown-item" href="{{route('masyarakat.my-activity')}}">Aktivitas saya</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>

            <!-- Burger button responsive -->
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </div>
    </div>
</div>
<nav class="main-navbar">
    <div class="container">
        <ul>
            <li class="menu-item {{Route::is('masyarakat.dashboard') ? 'actived' : ''}}">
                <a href="{{route('masyarakat.dashboard')}}" class="menu-link">
                    <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                </a>
            </li>
            <li class="menu-item {{Route::is('masyarakat.pengaduan*') ? 'actived' : ''}}">
                <a href="{{route('masyarakat.pengaduan.index')}}" class="menu-link">
                    <span><i class="bi bi-list"></i> Pengaduanku</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

