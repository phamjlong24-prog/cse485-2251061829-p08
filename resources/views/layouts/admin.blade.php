<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - CSE485</title>
    <style>
        :root {
            --bg: #f3f4f6;
            --sidebar: #111827;
            --text: #111827;
            --muted: #6b7280;
            --accent: #2563eb;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: var(--bg);
            color: var(--text);
        }
        .app { display: flex; min-height: 100vh; }
        .sidebar {
            width: 240px;
            background: var(--sidebar);
            color: #fff;
            padding: 1.25rem;
        }
        .sidebar a {
            display: block;
            color: #d1d5db;
            text-decoration: none;
            padding: .5rem .75rem;
            border-radius: 6px;
            margin-bottom: .25rem;
        }
        .sidebar a:hover { color: #fff; background: #1f2937; }
        .sidebar a.active { color: #fff; background: var(--accent); }
        .main { flex: 1; display: flex; flex-direction: column; }
        .topbar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 1.5rem;
            font-weight: 600;
        }
        .content { padding: 1.5rem; }
        .card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        table { width: 100%; border-collapse: collapse; }
        th, td { border-bottom: 1px solid #e5e7eb; padding: .75rem; text-align: left; }
        .btn {
            display: inline-block;
            background: var(--accent);
            color: #fff;
            padding: .5rem .9rem;
            border-radius: 6px;
            text-decoration: none;
            border: 0;
            cursor: pointer;
        }
        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
            padding: .75rem 1rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        .skeleton {
            background: linear-gradient(90deg, #e5e7eb 25%, #f3f4f6 37%, #e5e7eb 63%);
            background-size: 400% 100%;
            animation: skeleton-loading 1.4s ease infinite;
            border-radius: 4px;
            height: 14px;
        }
        @keyframes skeleton-loading {
            0% { background-position: 100% 50%; }
            100% { background-position: 0 50%; }
        }
        @media (max-width: 768px) {
            .app { flex-direction: column; }
            .sidebar { width: 100%; }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="app">
    <aside class="sidebar">
        <h2>CSE485 Admin</h2>
        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.products.index') }}"
           class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">San pham</a>
        <a href="{{ route('admin.categories.index') }}"
           class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Danh muc</a>
        <a href="{{ route('admin.settings') }}"
           class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">Cai dat</a>
    </aside>
    <div class="main">
        <header class="topbar">@yield('page_heading', 'Dashboard')</header>
        <main class="content">
            @include('partials.alert')
            @yield('content')
        </main>
    </div>
</div>
@stack('scripts')
</body>
</html>