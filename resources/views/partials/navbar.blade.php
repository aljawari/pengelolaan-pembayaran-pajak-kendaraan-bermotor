<!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper flex max-sm:px-[15px] px-[25px] grow">
    <!-- Sidebar Toggle & Menu -->
    <div class="me-auto pc-mob-drp">
      <ul class="inline-flex *:min-h-header-height *:inline-flex *:items-center gap-3">
        <li class="pc-h-item pc-sidebar-collapse max-lg:hidden lg:inline-flex">
          <a href="#" class="pc-head-link" id="sidebar-hide">
            <i data-feather="menu"></i>
          </a>
        </li>
        <li class="pc-h-item pc-sidebar-popup lg:hidden">
          <a href="#" class="pc-head-link" id="mobile-collapse">
            <i data-feather="menu"></i>
          </a>
        </li>
        <li class="pc-h-item">
          <a href="{{ url('/') }}" class="pc-head-link">Dashboard</a>
        </li>
        <li class="pc-h-item">
          <a href="{{ route('pajak.index') }}" class="pc-head-link">Pajak</a>
        </li>
        <li class="pc-h-item">
          <a href="{{ route('pembayaran.index') }}" class="pc-head-link">Pembayaran</a>
        </li>
        <li class="pc-h-item">
          <a href="#" class="pc-head-link text-muted" style="pointer-events: none;">Kendaraan</a>
        </li>
        <li class="pc-h-item">
          <a href="#" class="pc-head-link text-muted" style="pointer-events: none;">Staff/Admin</a>
        </li>
      </ul>
    </div>

    <!-- User Profile -->
    <div class="ms-auto">
      <ul class="inline-flex *:min-h-header-height *:inline-flex *:items-center">
        <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-pc-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-pc-auto-close="outside" aria-expanded="false">
            <i data-feather="user"></i>
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown p-2 overflow-hidden">
            <div class="dropdown-header flex items-center justify-between py-4 px-5 bg-primary-500">
              <div class="flex mb-1 items-center">
                <div class="shrink-0">
                  <img src="{{ asset('dist/assets/images/user/avatar-1.jpg') }}" alt="user-image" class="w-10 rounded-full" />
                </div>
                <div class="grow ms-3 text-white">
                  <h6 class="mb-1">Admin User</h6>
                  <span>Administrator</span>
                </div>
              </div>
            </div>
            <div class="dropdown-body py-4 px-5">
              <a href="#" class="dropdown-item">
                <i data-feather="settings" class="me-2"></i> Profil
              </a>
              <form method="POST" action="#">
                @csrf
                <button type="submit" class="dropdown-item text-left w-full">
                  <i data-feather="log-out" class="me-2"></i> Logout
                </button>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- [ Header Topbar ] end -->
