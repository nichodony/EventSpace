
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'EventSpace') - EventSpace</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --slate-dark: #334155;
            --slate-medium: #64748B;
            --slate-light: #E2E8F0;
            --page-bg: #F1F5F9;
            --text-dark: #1E293B;
            --text-muted: #64748B;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--page-bg);
            color: var(--text-dark);
            font-family: Inter, "Segoe UI", sans-serif;
        }

        .sidebar {
            position: fixed;
            inset: 0 auto 0 0;
            width: 250px;
            padding: 28px 18px;
            background: var(--slate-dark);
            color: white;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 32px;
            color: white;
            text-decoration: none;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: rgba(255,255,255,.14);
            border-radius: 12px;
            font-size: 21px;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -.5px;
        }

        .menu-label {
            padding: 0 12px;
            margin-bottom: 12px;
            color: #CBD5E1;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            margin-bottom: 7px;
            color: #CBD5E1;
            text-decoration: none;
            border-radius: 10px;
            font-size: 14px;
            transition: .2s;
        }

        .sidebar-link i {
            font-size: 18px;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            color: white;
            background: #475569;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px 12px 0;
            border-top: 1px solid rgba(255,255,255,.15);
            color: #CBD5E1;
            font-size: 12px;
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
            padding: 32px 38px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .page-heading {
            margin: 0;
            font-size: 25px;
            font-weight: 700;
            letter-spacing: -.6px;
        }

        .page-subtitle {
            margin: 6px 0 0;
            color: var(--text-muted);
            font-size: 14px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--slate-dark);
            font-size: 13px;
            font-weight: 600;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #E2E8F0;
            color: var(--slate-dark);
            font-weight: 700;
        }

        .content-card {
            padding: 24px;
            background: var(--white);
            border: 1px solid #E2E8F0;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(15, 23, 42, .03);
        }

        .stat-card {
            padding: 22px;
            background: white;
            border: 1px solid #E2E8F0;
            border-radius: 14px;
            height: 100%;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #E2E8F0;
            color: var(--slate-dark);
            font-size: 20px;
        }

        .stat-label {
            margin-top: 18px;
            color: var(--text-muted);
            font-size: 13px;
        }

        .stat-number {
            margin-top: 4px;
            font-size: 27px;
            font-weight: 700;
        }

        .btn-slate {
            background: var(--slate-dark);
            border: 1px solid var(--slate-dark);
            color: white;
            border-radius: 9px;
            padding: 10px 16px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-slate:hover {
            background: #1E293B;
            border-color: #1E293B;
            color: white;
        }

        .btn-outline-slate {
            color: var(--slate-dark);
            border: 1px solid #CBD5E1;
            border-radius: 9px;
            padding: 9px 14px;
            font-size: 13px;
            font-weight: 600;
        }

        .btn-outline-slate:hover {
            background: #F1F5F9;
            color: var(--slate-dark);
        }

        .table {
            vertical-align: middle;
            margin-bottom: 0;
        }

        .table thead th {
            padding: 14px 12px;
            background: #F8FAFC;
            color: #64748B;
            border-bottom: 1px solid #E2E8F0;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .5px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px 12px;
            border-bottom: 1px solid #F1F5F9;
            font-size: 13px;
        }

        .table tbody tr:last-child td {
            border-bottom: 0;
        }

        .form-label {
            margin-bottom: 8px;
            color: #334155;
            font-size: 13px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            min-height: 43px;
            border-color: #CBD5E1;
            border-radius: 9px;
            font-size: 13px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #64748B;
            box-shadow: 0 0 0 .2rem rgba(100,116,139,.15);
        }

        .badge-status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .status-direncanakan {
            background: #E2E8F0;
            color: #334155;
        }

        .status-berlangsung {
            background: #DBEAFE;
            color: #1D4ED8;
        }

        .status-selesai {
            background: #DCFCE7;
            color: #166534;
        }

        .action-btn {
            width: 31px;
            height: 31px;
            display: inline-grid;
            place-items: center;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            color: #475569;
            background: white;
            text-decoration: none;
        }

        .action-btn:hover {
            background: #F1F5F9;
            color: #1E293B;
        }

        .pagination {
            margin-bottom: 0;
            gap: 5px;
        }

        .pagination .page-link {
            border: 1px solid #E2E8F0;
            border-radius: 7px !important;
            color: #475569;
            font-size: 12px;
        }

        .pagination .active .page-link {
            background: var(--slate-dark);
            border-color: var(--slate-dark);
            color: white;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: static;
                width: 100%;
                padding: 16px;
            }

            .brand {
                padding-bottom: 15px;
            }

            .sidebar-footer {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 22px 16px;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
            }

            .page-heading {
                font-size: 21px;
            }

            .user-profile span {
                display: none;
            }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <a href="{{ route('kegiatans.index') }}" class="brand">
            <div class="brand-icon">
                <i class="bi bi-calendar-event"></i>
            </div>
            <span class="brand-name">EventSpace</span>
        </a>

        <div class="menu-label">Menu Utama</div>

        <a href="{{ route('kegiatans.index') }}"
           class="sidebar-link {{ request()->routeIs('kegiatans.index') ? 'active' : '' }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('kegiatans.create') }}"
           class="sidebar-link {{ request()->routeIs('kegiatans.create') ? 'active' : '' }}">
            <i class="bi bi-plus-circle"></i>
            <span>Tambah Kegiatan</span>
        </a>

        <div class="sidebar-footer">
            <div class="fw-semibold text-white mb-1">EventSpace</div>
            <div>Manajemen Kegiatan</div>
            <div class="mt-2">© {{ date('Y') }} EventSpace</div>
        </div>
    </aside>

    <main class="main-content">
        <div class="topbar">
            <div>
                <h1 class="page-heading">@yield('page-title', 'Dashboard')</h1>
                <p class="page-subtitle">@yield('page-description', 'Kelola kegiatan dengan lebih mudah.')</p>
            </div>

            <div class="user-profile">
                <div class="user-avatar">ES</div>
                <span>EventSpace Admin</span>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show small" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger small" role="alert">
                <div class="fw-semibold mb-1">Ada data yang perlu diperbaiki:</div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
