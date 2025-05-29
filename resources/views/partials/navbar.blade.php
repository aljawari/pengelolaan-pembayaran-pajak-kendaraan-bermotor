<!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper flex max-sm:px-[15px] px-[25px] grow">
    <!-- Sidebar Toggle -->
    <div class="me-auto pc-mob-drp">
      <ul class="inline-flex *:min-h-header-height *:inline-flex *:items-center">
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
        <!-- Search -->
        <li class="dropdown pc-h-item">
          <a class="pc-head-link dropdown-toggle" data-pc-toggle="dropdown" href="#">
            <i data-feather="search"></i>
          </a>
          <div class="dropdown-menu pc-h-dropdown drp-search">
            <form method="GET" action="{{ route('pajak.index') }}" class="px-2 py-1">
              <input type="search" name="search" class="form-control !border-0 !shadow-none" placeholder="Cari data pajak..." />
            </form>
          </div>
        </li>
      </ul>
    </div>

    <!-- User Menu -->
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
                  <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="user-image" class="w-10 rounded-full" />
                </div>
                <div class="grow ms-3 text-white">
                  <h6 class="mb-1">#</h6>
                  <span>#</span>
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
