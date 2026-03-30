<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') | Codac</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Icons (FontAwesome for quick implementation) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    @vite(['resources/css/admin.css'])
    @stack('styles')
</head>
<body>
    <div class="admin-layout">
        
        <!-- Sidebar -->
        <aside class="admin-sidebar shadow-lg">
            <div class="sidebar-brand">
                <i class="fa-solid fa-code mx-2"></i>
                Codac<span>.arabe</span>
            </div>
            
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i>
                    لوحة القيادة
                </a>

                <div class="nav-section">إدارة المحتوى</div>
                
                <a href="{{ route('admin.tips.index') }}" class="nav-item {{ request()->routeIs('admin.tips.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-lightbulb"></i>
                    النصائح (Tips)
                </a>
                <a href="{{ route('admin.communities.index') }}" class="nav-item {{ request()->routeIs('admin.communities.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    المجتمعات
                </a>
                <a href="{{ route('admin.tracks.index') }}" class="nav-item {{ request()->routeIs('admin.tracks.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-route"></i>
                    المسارات
                </a>
                
                <div class="nav-section">أدوات ومشاريع</div>
                
                <a href="{{ route('admin.dev-tools.index') }}" class="nav-item {{ request()->routeIs('admin.dev-tools.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tools"></i>
                    أدوات المطورين
                </a>
                <a href="{{ route('admin.open-source-projects.index') }}" class="nav-item {{ request()->routeIs('admin.open-source-projects.*') ? 'active' : '' }}">
                    <i class="fa-brands fa-github"></i>
                    مشاريع مفتوحة المصدر
                </a>
                <a href="{{ route('admin.advanced-techniques.index') }}" class="nav-item {{ request()->routeIs('admin.advanced-techniques.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-laptop-code"></i>
                    تقنيات متقدمة
                </a>

                <div class="nav-section">إعدادات النظام</div>
                <a href="{{ route('admin.users.index') }}" class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-user-shield"></i>
                    المستخدمين
                </a>
            </nav>
        </aside>

        <!-- Main Wrapper -->
        <main class="admin-main">
            <!-- Header -->
            <header class="admin-header">
                <div>
                    <!-- Mobile toggle could go here -->
                </div>
                
                <div class="header-profile">
                    <div class="text-sm">
                        <div class="font-bold text-white">{{ Auth::user()->name ?? 'Admin' }}</div>
                    </div>
                    <div class="profile-avatar">
                        {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <button type="submit" class="action-btn btn-delete ml-4" title="تسجيل الخروج">
                            <i class="fa-solid fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <div class="admin-content">
                @yield('content')
            </div>
        </main>
    </div>

    @stack('scripts')
</body>
</html>
