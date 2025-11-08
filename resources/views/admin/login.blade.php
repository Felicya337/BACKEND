<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Budaya Batak</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Login Box */
        .login-box {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        /* Card Styling */
        .card {
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(220, 38, 38, 0.1);
            overflow: hidden;
            background: var(--white);
        }

        /* Card Header */
        .card-header {
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 25%, #991B1B 50%, #7F1D1D 75%, #450A0A 100%);
            padding: 2.5rem 2rem;
            border: none;
            position: relative;
        }

        .card-header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg,
                transparent 0%,
                rgba(255, 255, 255, 0.05) 25%,
                transparent 50%,
                rgba(255, 255, 255, 0.05) 75%,
                transparent 100%);
        }

        .brand-logo {
            text-align: center;
            position: relative;
            z-index: 2;
        }

        .brand-logo i {
            font-size: 3rem;
            color: white;
            margin-bottom: 0.75rem;
            display: block;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
        }

        .brand-text {
            font-weight: 700;
            font-size: 1.75rem;
            color: white;
            margin: 0;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            position: relative;
            z-index: 2;
        }

        /* Card Body */
        .card-body {
            padding: 2.5rem 2rem;
            background: var(--white);
        }

        .login-box-msg {
            text-align: center;
            font-size: 1rem;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 2rem;
        }

        /* Alert Styling */
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

        .alert-danger {
            background: #FEF2F2;
            border-left-color: var(--primary);
            color: #991B1B;
        }

        .alert i {
            font-size: 1.25rem;
        }

        /* Input Groups */
        .input-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-control {
            border: 2px solid var(--border);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            padding-right: 3rem;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.2s ease;
            background: var(--gray);
        }

        .form-control:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1);
            outline: none;
        }

        .input-group-append {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            z-index: 10;
            pointer-events: none;
        }

        .input-group-text {
            background: transparent;
            border: none;
            padding: 0 1rem;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .input-group-text span {
            color: var(--text-light);
            font-size: 1rem;
        }

        .form-control:focus ~ .input-group-append .input-group-text span {
            color: var(--primary);
        }

        /* Button */
        .btn-primary {
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 50%, #991B1B 100%);
            border: none;
            border-radius: 10px;
            padding: 0.85rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(255, 255, 255, 0.1) 50%, transparent 100%);
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #B91C1C 0%, #991B1B 50%, #7F1D1D 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary i {
            margin-right: 0.5rem;
        }

        /* Footer Text */
        .card-footer-text {
            text-align: center;
            padding-top: 1.5rem;
            color: var(--text-light);
            font-size: 0.85rem;
            font-weight: 500;
            border-top: 1px solid var(--border);
            margin-top: 1.5rem;
        }

        /* Loading State */
        .btn-primary.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .login-box {
                padding: 15px;
            }

            .card-header {
                padding: 2rem 1.5rem;
            }

            .brand-logo i {
                font-size: 2.5rem;
            }

            .brand-text {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 2rem 1.5rem;
            }

            .btn-primary {
                padding: 0.75rem 1.5rem;
                font-size: 0.95rem;
            }
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-header text-center">
                <div class="brand-logo">
                    <i class="fas fa-mountain"></i>
                    <h1 class="brand-text">Budaya Batak</h1>
                </div>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Login untuk mengelola konten</p>

                <!-- Alert Error (jika ada) -->
                @if (session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div> @endif

                <form method="POST"
        action="{{ route('admin.login') }}" id="loginForm">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" id="loginBtn">
                <i class="fas fa-sign-in-alt"></i> Masuk
            </button>
        </div>
    </div>
    </form>

    <div class="card-footer-text">
        © 2025 Budaya Batak · Melestarikan Warisan Leluhur
    </div>
    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        // Loading state on form submit
        document.getElementById('loginForm').addEventListener('submit', function() {
            const btn = document.getElementById('loginBtn');
            btn.classList.add('loading');
        });
    </script>
    </body>

</html>
