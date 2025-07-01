<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="navbar-content">
            <!-- User Card -->
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('dist/assets/images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="dropdown">
                                <a href="#" class="arrow-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="0,20">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 me-2">
                                            <h6 class="mb-0">{{ Auth::user()->nama ?? 'Admin User' }}</h6>
                                            <small>{{ Auth::user()->jabatan ?? 'Administrator' }}</small>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="btn btn-icon btn-link-secondary avtar">
                                                <i class="ph-duotone ph-windows-logo"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit" class="pc-user-links w-100 text-start border-0 bg-transparent">
                                                    <i class="ph-duotone ph-power"></i>
                                                    <span>Logout</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Menu -->
            <ul class="pc-navbar">

                <!-- Navigation Section -->
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph-duotone ph-gauge"></i></span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>

                <!-- Data Management Section -->
                <li class="pc-item pc-caption">
                    <label>Data Management</label>
                </li>

                <li class="pc-item {{ request()->routeIs('pajak.*') ? 'active' : '' }}">
                    <a href="{{ route('pajak.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph-duotone ph-file-text"></i></span>
                        <span class="pc-mtext">Pajak</span>
                    </a>
                </li>

                <li class="pc-item {{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                    <a href="{{ route('pembayaran.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph-duotone ph-credit-card"></i></span>
                        <span class="pc-mtext">Pembayaran</span>
                    </a>
                </li>

                <li class="pc-item {{ request()->routeIs('kendaraan.*') ? 'active' : '' }}">
                    <a href="{{ route('kendaraan.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph-duotone ph-truck"></i></span>
                        <span class="pc-mtext">Kendaraan</span>
                    </a>
                </li>

                <li class="pc-item {{ request()->routeIs('staff.*') ? 'active' : '' }}">
                    <a href="{{ route('staff.index') }}" class="pc-link">
                        <span class="pc-micon"><i class="ph-duotone ph-users-three"></i></span>
                        <span class="pc-mtext">Staff/Admin</span>
                    </a>
                </li>

                <!-- System Section -->
                <li class="pc-item pc-caption">
                    <label>System</label>
                </li>
                <li class="pc-item">
                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf
                        <button type="submit" class="pc-link w-100 text-start border-0 bg-transparent">
                            <span class="pc-micon"><i class="ph-duotone ph-power"></i></span>
                            <span class="pc-mtext">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
