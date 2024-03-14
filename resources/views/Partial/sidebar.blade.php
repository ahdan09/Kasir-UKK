<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="" style="background: #fafafa">
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img mt-3 mx-2">
                <img src="{{ asset('src/assets/images/logos/logo-kasir.png') }}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu"></span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu fw-semibold">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role === 'admin')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu fw-semibold">User</span>
                        </a>
                    </li>
                @endif
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('pelanggan.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu fw-semibold">Pelanggan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('category.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-category"></i>
                        </span>
                        <span class="hide-menu fw-semibold">Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-shopping-cart"></i>
                        </span>
                        <span class="hide-menu fw-semibold">Produk</span>
                    </a>
                </li>
                @if (Auth::user()->role === 'petugas')
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('transaksi.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-cash"></i>
                            </span>
                            <span class="hide-menu fw-semibold">Transaksi</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
