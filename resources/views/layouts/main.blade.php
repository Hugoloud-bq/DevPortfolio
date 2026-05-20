<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DevPortfolio')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background 0.3s ease;
        }
        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: background 0.3s ease;
        }
        .footer {
            margin-top: auto;
            background: white;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #dee2e6;
            transition: background 0.3s ease;
        }
        .content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }
        .navbar-nav {
            align-items: center;
        }
        .nav-item .btn-outline-secondary {
            margin-top: 0;
            padding: 5px 10px;
            line-height: 1.5;
        }

        /* ========== ТЁМНАЯ ТЕМА ========== */
        .dark-theme {
            background: #1a1a2e;
        }
        .dark-theme .navbar {
            background: #16213e;
        }
        .dark-theme .navbar .navbar-brand,
        .dark-theme .navbar .nav-link {
            color: #fff;
        }
        .dark-theme .footer {
            background: #16213e;
            border-top-color: #2a2a3a;
        }
        .dark-theme .card,
        .dark-theme .card-header,
        .dark-theme .card-body {
            background: #1e1e2f;
            color: #fff;
            border: 1px solid #2a2a3a;
        }
        .dark-theme .table {
            color: #fff !important;
            background-color: #1e1e2f !important;
        }
        .dark-theme .table-bordered,
        .dark-theme .table-bordered td,
        .dark-theme .table-bordered th {
            border-color: #3a3a4a !important;
        }
        .dark-theme .table td,
        .dark-theme .table th {
            color: #fff !important;
            background-color: transparent !important;
        }
        .dark-theme .form-control,
        .dark-theme .form-select {
            background: #2a2a3a;
            border-color: #3a3a4a;
            color: #fff;
        }
        .dark-theme .form-control:focus {
            background: #2a2a3a;
            color: #fff;
        }
        .dark-theme .alert-success {
            background: #1e3a2e;
            color: #a0ffa0;
            border-color: #2a4a3a;
        }
        .dark-theme .alert-danger {
            background: #3a1e1e;
            color: #ffa0a0;
            border-color: #4a2a2a;
        }
        .dark-theme h1,
        .dark-theme h2,
        .dark-theme h3,
        .dark-theme h4,
        .dark-theme h5,
        .dark-theme .navbar-brand,
        .dark-theme .lead,
        .dark-theme .card-title {
            color: #ffffff !important;
        }
        .dark-theme .text-muted {
            color: #a0a0b0 !important;
        }
        .dark-theme .btn-outline-secondary {
            color: #fff;
            border-color: #fff;
        }
        .dark-theme .btn-outline-secondary:hover {
            background: #fff;
            color: #16213e;
        }
        .dark-theme .btn-outline-success {
            color: #90ee90;
            border-color: #90ee90;
        }
        .dark-theme .btn-outline-success:hover {
            background-color: #90ee90;
            color: #000;
        }
        .dark-theme .btn-outline-info {
            color: #87ceeb;
            border-color: #87ceeb;
        }
        .dark-theme .btn-outline-info:hover {
            background-color: #87ceeb;
            color: #000;
        }
        .dark-theme .btn-outline-warning {
            color: #ffcc80;
            border-color: #ffcc80;
        }
        .dark-theme .btn-outline-warning:hover {
            background-color: #ffcc80;
            color: #000;
        }
        .dark-theme .btn-outline-primary {
            color: #90caf9;
            border-color: #90caf9;
        }
        .dark-theme .btn-outline-primary:hover {
            background-color: #90caf9;
            color: #000;
        }
        .dark-theme .text-primary {
            color: #6ea8fe !important;
        }
        .dark-theme .text-success {
            color: #75b798 !important;
        }
        .dark-theme .text-info {
            color: #6edff6 !important;
        }
        .dark-theme .text-warning {
            color: #ffda6a !important;
        }
        .dark-theme .text-secondary {
            color: #adb5bd !important;
        }
        .dark-theme .text-danger {
            color: #ea868f !important;
        }
        .dark-theme .info-card {
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .dark-theme .info-card i,
        .dark-theme .info-card strong,
        .dark-theme .info-card div {
            color: #fff !important;
        }
        .dark-theme .rounded-circle {
            border: 3px solid #1a1a2e !important;
        }
        /* ===== СВЕТЛЫЙ ТЕКСТ ДЛЯ ФИЛЬТРОВ И СОРТИРОВКИ В ТЁМНОЙ ТЕМЕ ===== */
.dark-theme .mb-3 span,
.dark-theme .mb-3 .btn,
.dark-theme .mb-4 .btn,
.dark-theme .form-control::placeholder {
    color: #fff !important;
}

.dark-theme .form-control {
    background-color: #2a2a3a !important;
    color: #fff !important;
    border-color: #5a5a6e !important;
}

.dark-theme .form-control:focus {
    background-color: #2a2a3a !important;
    color: #fff !important;
}

.dark-theme .btn-secondary {
    background-color: #4a4a5a !important;
    border-color: #4a4a5a !important;
    color: #fff !important;
}

.dark-theme .btn-outline-primary,
.dark-theme .btn-outline-secondary,
.dark-theme .btn-outline-success,
.dark-theme .btn-outline-info,
.dark-theme .btn-outline-warning {
    color: #fff !important;
    border-color: #fff !important;
}

.dark-theme .btn-outline-primary:hover,
.dark-theme .btn-outline-secondary:hover,
.dark-theme .btn-outline-success:hover,
.dark-theme .btn-outline-info:hover,
.dark-theme .btn-outline-warning:hover {
    background-color: #fff !important;
    color: #000 !important;
}

.dark-theme .btn-primary {
    background-color: #667eea !important;
    border-color: #667eea !important;
    color: #fff !important;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-laptop-code me-2"></i>DevPortfolio
            </a>    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Главная</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">О себе</a></li>
                    <li class="nav-item"><a class="nav-link" href="/projects">Мои проекты</a></li>
                    
                    @if(session('user_id'))
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Выйти ({{ session('user_name') }})</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/login">Вход</a></li>
                        <li class="nav-item"><a class="nav-link" href="/register">Регистрация</a></li>
                    @endif
                    
                    <li class="nav-item ms-2">
                        <button id="themeToggle" class="btn btn-sm btn-outline-secondary" style="border-radius: 20px;">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <span class="text-muted">© 2026 DevPortfolio | Чуляков Семён</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const themeToggle = document.getElementById('themeToggle');
        if (themeToggle) {
            const icon = themeToggle.querySelector('i');
            if (localStorage.getItem('theme') === 'dark') {
                document.body.classList.add('dark-theme');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
            themeToggle.addEventListener('click', () => {
                document.body.classList.toggle('dark-theme');
                if (document.body.classList.contains('dark-theme')) {
                    localStorage.setItem('theme', 'dark');
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    localStorage.setItem('theme', 'light');
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            });
        }
    </script>
</body>
</html>