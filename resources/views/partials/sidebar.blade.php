<!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        
        <div class="navbar-content">
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
                                            <h6 class="mb-0">Admin User</h6>
                                            <small>Administrator</small>
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
                                        <li><a class="pc-user-links" href="#"><i class="ph-duotone ph-user"></i><span>My Account</span></a></li>
                                        <li><a class="pc-user-links" href="#"><i class="ph-duotone ph-gear"></i><span>Settings</span></a></li>
                                        <li><a class="pc-user-links" href="#"><i class="ph-duotone ph-lock-key"></i><span>Lock Screen</span></a></li>
                                        <li>
                                            <form method="POST" action="#">
                                                @csrf
                                                <button type="submit" class="pc-user-links w-100 text-start border-0 bg-transparent">
                                                    <i class="ph-duotone ph-power"></i><span>Logout</span>
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

            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item">
                    <a href="{{ url('/') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-gauge"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Data Management</label>
                    <i class="ph-duotone ph-chart-pie"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route('pajak.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-file-text"></i>
                        </span>
                        <span class="pc-mtext">Data Pajak</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-users"></i>
                        </span>
                        <span class="pc-mtext">Pengguna</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>System</label>
                    <i class="ph-duotone ph-gear-six"></i>
                </li>
                <li class="pc-item">
                    <a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph-duotone ph-gear"></i>
                        </span>
                        <span class="pc-mtext">Pengaturan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->