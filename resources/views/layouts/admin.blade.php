<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Budaya Batak</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

        @include('admin.partials.navbar')
        @include('admin.partials.sidebar')

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link theme-toggle" href="#" id="themeToggle">
                        <i class="fas fa-sun" id="themeIcon"></i>
                        <span id="themeText">Terang</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="far fa-user-circle"></i>
                        <span class="d-none d-md-inline">Admin User</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-cog"></i> Profil
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="#">
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar elevation-1">
            <a href="#" class="brand-link">
                <i class="fas fa-mountain brand-icon"></i>
                <span class="brand-text">Budaya Batak</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-header">
                            <i class="fas fa-layer-group"></i> Konten
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.storytellings.index') }}"
                                class="nav-link {{ request()->routeIs('admin.storytellings.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p>Storytelling</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book-open"></i>
                                <p>Ensiklopedi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Kategori</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-globe-asia"></i>
                                <p>Budaya</p>
                            </a>
                        </li>

                        <li class="nav-header">
                            <i class="fas fa-cog"></i> Pengaturan
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 align-items-center">
                        <div class="col-sm-6">
                            <h1>
                                <i class="fas fa-chart-line"></i>
                                Dashboard
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="fas fa-home"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <!-- Alert -->
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <strong>Selamat datang!</strong>
                            Anda berhasil masuk ke Admin Panel Budaya Batak
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>

                    <!-- Stats -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>24</h3>
                                    <p><i class="fas fa-book-reader"></i> Storytelling</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="small-box-footer">
                                    <span>Total Artikel</span>
                                    <i class="fas fa-arrow-circle-right"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="small-box bg-dark">
                                <div class="inner">
                                    <h3>38</h3>
                                    <p><i class="fas fa-book-open"></i> Ensiklopedi</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="small-box-footer">
                                    <span>Total Entri</span>
                                    <i class="fas fa-arrow-circle-right"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>12</h3>
                                    <p><i class="fas fa-tags"></i> Kategori</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-folder-open"></i>
                                </div>
                                <div class="small-box-footer">
                                    <span>Total Kategori</span>
                                    <i class="fas fa-arrow-circle-right"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>18</h3>
                                    <p><i class="fas fa-globe-asia"></i> Budaya</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="small-box-footer">
                                    <span>Total Budaya</span>
                                    <i class="fas fa-arrow-circle-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Card -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-history"></i>
                                        Aktivitas Terbaru
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                        <div class="stat-content">
                                            <h4>5 Artikel Baru</h4>
                                            <p>Ditambahkan minggu ini</p>
                                        </div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-icon">
                                            <i class="fas fa-edit"></i>
                                        </div>
                                        <div class="stat-content">
                                            <h4>12 Artikel</h4>
                                            <p>Diperbarui bulan ini</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-info-circle"></i>
                                        Info Sistem
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <p><i class="fas fa-server text-danger"></i> <strong>Server:</strong> Online</p>
                                    <p><i class="fas fa-database text-success"></i> <strong>Database:</strong>
                                        Terhubung</p>
                                    <p><i class="fas fa-clock text-info"></i> <strong>Update:</strong> 2 jam lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <footer class="main-footer">
            <strong>© 2025 Budaya Batak</strong> · Melestarikan Warisan Leluhur
        </footer>
    </div>

    <!-- Scripts -->
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
