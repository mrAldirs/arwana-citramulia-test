<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link mb-2">
        <img src="{{ asset('assets/img/default.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8; max-width: 48px;">
        <span class="brand-text font-weight-light">Technical Test</span>
    </a>

    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::user()->role == 'admin')
                    <img src="{{ asset('assets/img/user.png') }}" class="img-circle elevation-2" alt="User Image" />
                @else
                    <img src="{{ asset('assets/img/user2.png') }}" class="img-circle elevation-2" alt="User Image" />
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">FEATURES</li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link {{ Route::is('product*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Product
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaction.index') }}"
                        class="nav-link {{ Route::is('transaction*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Transactions
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
