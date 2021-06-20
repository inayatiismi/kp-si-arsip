<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-mail-bulk"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIARSIP </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        ADMIN
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.surat-masuk.index') }}">
            <i class="far fa-envelope"></i>
            <span>Surat Masuk</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.surat-keluar.index') }}">
            <i class="far fa-envelope-open"></i>
            <span>Surat Keluar</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.request-surat.index') }}">
            <i class="fas fa-fw fa-hourglass-half"></i>
            <span>Request</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.response-surat.index') }}">
            <i class="fas fa-fw fa-clipboard-check"></i>
            <span>Response</span>
        </a>
    </li>
</ul>
