<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Codac'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Tajawal:wght@400;500;700;800&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    
    <!-- DevIcons & FontAwesome (optional depending on content) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/css/frontend.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    @stack('styles')
</head>
<body x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
    <!-- Decorative Orbs -->
    <div class="bg-blob blob-cyan"></div>
    <div class="bg-blob blob-purple"></div>

    <div class="min-h-screen">
        <!-- Modern Glassmorphism Navigation -->
        <nav :class="{ 'scrolled': scrolled }" class="navbar">
            <div class="container flex-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('image/logo.png') }}" alt="Codac.arabe" style="width: 45px; height: 45px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.1);">
                    <span class="heading-md gradient-text" style="margin-bottom: 0;">Codac</span>
                </a>

                <!-- Navigation Links (Desktop) -->
                <div class="nav-links hidden md:flex">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">الرئيسية</a>
                    <a href="#tracks" class="nav-link">المسارات</a>
                    <a href="#tools" class="nav-link">الأدوات</a>
                </div>

                <!-- Auth/Actions -->
                <div class="flex items-center gap-4">
                    @auth
                        @if(auth()->user()->hasRole('super-admin'))
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline" style="padding: 0.5rem 1.25rem;">لوحة التحكم</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                            @csrf
                            <button type="submit" class="text-secondary hover:text-white transition">تسجيل خروج</button>
                        </form>
                    @else
                        <!-- Public CTA or Login -->
                        <a href="https://instagram.com/codac.arabe" target="_blank" class="btn btn-primary" style="padding: 0.5rem 1.5rem;">
                            <i class="fa-brands fa-instagram"></i> تابعنا
                        </a>
                    @endauth

                    <!-- Hamburger -->
                    <button class="md:hidden text-white" aria-label="Menu">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main style="padding-top: 80px;">
            @yield('content')
        </main>
        
        <!-- Premium Footer -->
        <footer class="footer">
            <div class="container grid-cols-4">
                <div style="grid-column: span 2;">
                    <h3 class="heading-lg gradient-text font-en">Codac.arabe</h3>
                    <p class="text-secondary mt-4 max-w-md">نحن هنا لنأخذ بيدك في رحلتك البرمجية من الصفر إلى الاحتراف بأسلوب عملي، مباشر، وشيق.</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">روابط هامة</h4>
                    <ul style="display: flex; flex-direction: column; gap: 0.5rem; color: var(--text-secondary);">
                        <li><a href="#tracks" class="hover:text-cyan transition">مسارات التعلم</a></li>
                        <li><a href="#tools" class="hover:text-cyan transition">أدوات المطورين</a></li>
                        <li><a href="#open-source" class="hover:text-cyan transition">مشاريع مفتوحة المصدر</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">تواصل معنا</h4>
                    <div style="display: flex; gap: 1rem; font-size: 1.5rem; color: var(--text-secondary);">
                        <a href="https://instagram.com/codac.arabe" class="hover:text-purple transition"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://github.com/codac" class="hover:text-cyan transition"><i class="fa-brands fa-github"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="container">
                <div class="custom-hr"></div>
                <div class="flex-between text-muted text-sm">
                    <p>&copy; {{ date('Y') }} Codac.arabe - جميع الحقوق محفوظة.</p>
                    <p>صنع بحب للمطورين العرب ❤️</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 50
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
