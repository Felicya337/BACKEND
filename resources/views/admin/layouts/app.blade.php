<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Admin')</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <style>
        :root {
            --primary: #DC2626;
            --primary-dark: #B91C1C;
            --primary-light: #FEE2E2;
            --dark: #1F2937;
            --gray: #F9FAFB;
            --gray-light: #F3F4F6;
            --border: #E5E7EB;
            --text: #374151;
            --text-light: #6B7280;
            --white: #ffffff;
            --shadow: rgba(0, 0, 0, 0.05);
        }

        [data-theme="dark"] {
            --primary: #EF4444;
            --primary-dark: #DC2626;
            --primary-light: #7F1D1D;
            --dark: #F9FAFB;
            --gray: #111827;
            --gray-light: #1F2937;
            --border: #374151;
            --text: #F3F4F6;
            --text-light: #9CA3AF;
            --white: #1F2937;
            --shadow: rgba(0, 0, 0, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray);
            font-size: 14px;
            transition: background 0.3s ease;
        }

        /* ===== NAVBAR ===== */
        .main-header.navbar {
            background: var(--white) !important;
            border-bottom: 1px solid var(--border);
            padding: 0.75rem 1rem;
            box-shadow: 0 1px 3px var(--shadow);
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link {
            color: var(--text) !important;
            font-weight: 500;
            transition: color 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary) !important;
        }

        .navbar .nav-link i {
            font-size: 18px;
        }

        /* Theme Toggle Button */
        .theme-toggle {
            background: var(--gray-light);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 0.4rem 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .theme-toggle:hover {
            background: var(--primary-light);
            border-color: var(--primary);
        }

        .theme-toggle i {
            font-size: 16px;
        }

        /* ===== SIDEBAR ===== */
        .main-sidebar {
            background: var(--white) !important;
            border-right: 1px solid var(--border);
            box-shadow: 2px 0 8px var(--shadow);
            transition: all 0.3s ease;
        }

        .brand-link {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
            border-bottom: none !important;
            padding: 1.25rem 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            position: relative;
            overflow: hidden;
        }

        .brand-link::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(45deg,
                    transparent,
                    transparent 10px,
                    rgba(255, 255, 255, 0.05) 10px,
                    rgba(255, 255, 255, 0.05) 20px);
            animation: slide 20s linear infinite;
        }

        @keyframes slide {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(50%, 50%);
            }
        }

        .brand-icon {
            font-size: 1.5rem;
            color: #ffffff;
            z-index: 1;
        }

        .brand-text {
            color: #ffffff !important;
            font-weight: 700 !important;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
            z-index: 1;
        }

        .sidebar {
            padding: 1rem 0.5rem;
        }

        /* Nav Header */
        .nav-header {
            color: var(--text-light) !important;
            font-weight: 600;
            font-size: 0.7rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 1rem 1rem 0.5rem;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-header i {
            font-size: 0.8rem;
        }

        /* Nav Items */
        .nav-sidebar .nav-item {
            margin: 0.25rem 0;
        }

        .nav-sidebar .nav-link {
            color: var(--text) !important;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
            border: none;
            display: flex;
            align-items: center;
        }

        .nav-sidebar .nav-link:hover {
            background: var(--gray-light) !important;
            color: var(--primary) !important;
            transform: translateX(4px);
        }

        .nav-sidebar .nav-link.active {
            background: var(--primary-light) !important;
            color: var(--primary) !important;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.2);
        }

        .nav-sidebar .nav-link .nav-icon {
            color: var(--text-light);
            margin-right: 0.75rem;
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .nav-sidebar .nav-link.active .nav-icon {
            color: var(--primary);
        }

        .nav-sidebar .nav-link:hover .nav-icon {
            color: var(--primary);
        }

        .nav-sidebar .nav-link p {
            margin: 0;
            font-size: 0.9rem;
            display: inline-block;
        }

        /* Badge for new items */
        .badge-new {
            background: var(--primary);
            color: white;
            font-size: 0.65rem;
            padding: 0.2rem 0.5rem;
            border-radius: 10px;
            margin-left: auto;
            font-weight: 600;
        }

        /* ===== CONTENT ===== */
        .content-wrapper {
            background: var(--gray) !important;
            padding: 1.5rem;
            transition: background 0.3s ease;
        }

        .content-header {
            margin-bottom: 1.5rem;
            padding: 0 !important;
        }

        .content-header h1 {
            color: var(--text);
            font-weight: 700;
            font-size: 1.75rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .content-header h1 i {
            color: var(--primary);
            font-size: 1.5rem;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
            font-size: 0.85rem;
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
        }

        .breadcrumb-item a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb-item a:hover {
            color: var(--primary);
        }

        .breadcrumb-item.active {
            color: var(--text);
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: var(--text-light);
        }

        /* ===== CARDS ===== */
        .card {
            border: 1px solid var(--border);
            border-radius: 12px;
            box-shadow: 0 1px 3px var(--shadow);
            margin-bottom: 1.5rem;
            background: var(--white);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 12px var(--shadow);
        }

        .card-header {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 1.25rem;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-title {
            color: var(--text);
            font-weight: 600;
            font-size: 1rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-body {
            padding: 1.5rem;
            color: var(--text);
        }

        /* ===== ALERTS ===== */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background: #F0FDF4;
            border-left-color: #22C55E;
            color: #166534;
        }

        [data-theme="dark"] .alert-success {
            background: #14532D;
            color: #86EFAC;
        }

        .alert-danger {
            background: #FEF2F2;
            border-left-color: var(--primary);
            color: #991B1B;
        }

        [data-theme="dark"] .alert-danger {
            background: #7F1D1D;
            color: #FCA5A5;
        }

        .alert .btn-close {
            font-size: 0.75rem;
        }

        .alert i {
            font-size: 1.25rem;
        }

        /* ===== SMALL BOXES ===== */
        .small-box {
            border-radius: 12px;
            padding: 1.5rem;
            position: relative;
            overflow: hidden;
            color: white;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .small-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .small-box .inner {
            position: relative;
            z-index: 2;
        }

        .small-box .inner h3 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .small-box .inner p {
            font-size: 0.95rem;
            opacity: 0.9;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .small-box .icon {
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 4rem;
            opacity: 0.15;
            z-index: 1;
        }

        .small-box-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 0.75rem;
            margin-top: 0.75rem;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 0.85rem;
            opacity: 0.9;
        }

        .bg-danger {
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%) !important;
        }

        .bg-dark {
            background: linear-gradient(135deg, #374151 0%, #1F2937 100%) !important;
        }

        .bg-info {
            background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%) !important;
        }

        .bg-warning {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%) !important;
        }

        /* ===== FOOTER ===== */
        .main-footer {
            background: var(--white) !important;
            border-top: 1px solid var(--border);
            color: var(--text-light) !important;
            text-align: center;
            padding: 1rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        /* ===== DROPDOWN ===== */
        .dropdown-menu {
            border: 1px solid var(--border);
            border-radius: 10px;
            box-shadow: 0 4px 12px var(--shadow);
            padding: 0.5rem;
            background: var(--white);
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            transition: all 0.2s;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dropdown-item:hover {
            background: var(--gray-light);
            color: var(--primary);
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        /* ===== SCROLLBAR ===== */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: var(--text-light);
        }

        /* ===== STATS CARDS ===== */
        .stat-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--gray-light);
            border-radius: 10px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            background: var(--primary-light);
            transform: translateX(4px);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary);
            color: white;
            border-radius: 10px;
            font-size: 1.5rem;
        }

        .stat-content h4 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text);
        }

        .stat-content p {
            margin: 0;
            font-size: 0.85rem;
            color: var(--text-light);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 1rem;
            }

            .content-header h1 {
                font-size: 1.5rem;
            }

            .small-box .inner h3 {
                font-size: 2rem;
            }
        }
    </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- NAVBAR -->
    <nav class="main-header navbar navbar-expand navbar-light bg-white border-bottom">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <span class="nav-link">Dashboard Admin</span>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-link nav-link text-danger">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- SIDEBAR -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
            <span class="brand-text font-weight-bold">Budaya Batak</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Navigation -->
            <nav class="mt-3">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    {{-- === DASHBOARD === --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    {{-- === HEADER KONTEN === --}}
                    <li class="nav-header">
                        <i class="fas fa-layer-group mr-1"></i> KONTEN
                    </li>

                    {{-- STORYTELLING --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.storytellings.index') }}"
                        class="nav-link {{ request()->routeIs('admin.storytellings.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book-reader"></i>
                            <p>Storytelling</p>
                        </a>
                    </li>

                    {{-- ENSIKLOPEDI --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.ensiklopedi.index') }}"
                        class="nav-link {{ request()->routeIs('admin.ensiklopedi.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>Ensiklopedi</p>
                        </a>
                    </li>

                    {{-- ENSIKLOPEDI --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.tokohs.index') }}"
                        class="nav-link {{ request()->routeIs('admin.tokohs.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-masks-theater"></i>
                            <p>Tokoh/Maestro</p>
                        </a>
                    </li>

                    {{-- AKUN PENJUAL --}}
                    <li class="nav-item">
                        <a href="{{ route('admin.penjual.index') }}"
                        class="nav-link {{ request()->routeIs('admin.penjua;.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-masks-theater"></i>
                            <p>Akun Penjual</p>
                        </a>
                    </li>

                    {{-- KATEGORI --}}
{{--
<li class="nav-item">
    <a href="{{ route('admin.kategori.index') }}"
    class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-tags"></i>
        <p>Kategori</p>
    </a>
</li>

{{-- BUDAYA
<li class="nav-item">
    <a href="{{ route('admin.budaya.index') }}"
    class="nav-link {{ request()->routeIs('admin.budaya.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-globe-asia"></i>
        <p>Budaya</p>
    </a>
</li>

{{-- === HEADER PENGATURAN ===
<li class="nav-header">
    <i class="fas fa-cog mr-1"></i> PENGATURAN
</li>

{{-- ADMIN USER
<li class="nav-item">
    <a href="{{ route('admin.admins.index') }}"
    class="nav-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Admin</p>
    </a>
</li>
--}}


                </ul>
            </nav>
        </div>
    </aside>

    <!-- CONTENT -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer class="main-footer text-center">
        <strong>© {{ date('Y') }} Budaya Batak.</strong>
    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const themeText = document.getElementById('themeText');
        const html = document.documentElement;

        // Load saved theme
        const savedTheme = localStorage.getItem('theme') || 'light';
        html.setAttribute('data-theme', savedTheme);
        updateThemeUI(savedTheme);

        themeToggle.addEventListener('click', function(e) {
            e.preventDefault();
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';

            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeUI(newTheme);
        });

        function updateThemeUI(theme) {
            if (theme === 'dark') {
                themeIcon.className = 'fas fa-moon';
                themeText.textContent = 'Gelap';
            } else {
                themeIcon.className = 'fas fa-sun';
                themeText.textContent = 'Terang';
            }
        }
    </script>

</body>
</html>
