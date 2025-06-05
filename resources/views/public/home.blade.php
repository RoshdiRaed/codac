<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Codac | انطلق في رحلتك البرمجية</title>
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/filament/filament/app.css') }}">
</head>

<body class="bg-[#222831] text-[#E0E0E0] font-['Almarai']">
    <!-- Logo Section -->
    <div class="absolute top-6 left-6 z-40 group hidden md:flex flex-col items-center">
        <img src="{{ asset('image/logo.png') }}" alt="Codac Logo"
            class="w-15 h-15 md:w-20 md:h-20 rounded-full shadow-xl transition-all duration-300 group-hover:scale-105 group-hover:-rotate-3">
        <div
            class="absolute left-full ml-4 opacity-0 translate-x-[-10px] transition-all duration-300 group-hover:opacity-100 group-hover:translate-x-0 flex flex-col items-center">
            <img src="{{ asset('image/watermelonlogo.png') }}" alt="Free Palestine Watermelon Logo"
                class="w-auto h-auto max-w-[100px] max-h-[100px] md:w-20 md:h-40 rounded-full">
            <span class="mt-2 text-[#E0E0E0] text-xs opacity-70 font-semibold tracking-wide whitespace-nowrap">Free
                Palestine 🇵🇸</span>
        </div>
    </div>

    <a href="http://localhost:8000/admin/login" target="_blank" aria-label="Admin Login"
        class="fixed top-6 right-6 z-50 bg-gray-900 text-[#E0E0E0] p-3 rounded-full shadow-lg hover:bg-gray-700 focus:ring-2 focus:ring-[#00ADB5] transition duration-300">🔑</a>

    <!-- Hero Section -->
    <section
        class="animate-gradient text-center py-32 relative overflow-hidden rounded-3xl border-4 border-white/20 shadow-2xl"
        data-aos="fade-down" data-aos-duration="800">
        <div class="floating-icons pointer-events-none z-0">
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/javascript.svg"
                class="floating-icon w-12 h-12" style="top:10%; left:15%; animation-duration: 8s;" alt="" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/python.svg" class="floating-icon w-14 h-14"
                style="top:20%; left:75%; animation-duration: 12s;" alt="" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/react.svg" class="floating-icon w-16 h-16"
                style="top:60%; left:20%; animation-duration: 15s;" alt="" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/nodejs.svg" class="floating-icon w-10 h-10"
                style="top:70%; left:80%; animation-duration: 10s;" alt="" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/php.svg" class="floating-icon w-12 h-12"
                style="top:40%; left:60%; animation-duration: 14s;" alt="" />
        </div>
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-pink-500/20 rounded-full blur-3xl animate-pulse-slow z-0">
        </div>
        <div
            class="absolute -bottom-10 -right-10 w-60 h-60 bg-cyan-400/20 rounded-full blur-2xl animate-pulse-fast z-0">
        </div>
        <div class="relative z-10">
            <h1 class="text-5xl md:text-6xl font-black mb-6 text-[#E0E0E0] glow-text">Codac.arabe</h1>
            <p class="text-xl md:text-2xl text-[#E0E0E0]/80 mb-10 font-medium leading-relaxed">مصدر موثوق لنصائح ودروس
                البرمجة للمبتدئين والمطورين</p>
            <a href="https://www.instagram.com/codac.arabe" target="_blank"
                class="inline-block px-10 py-4 bg-[#E0E0E0] text-gray-900 font-extrabold text-lg rounded-full shadow-xl hover:bg-[#00ADB5] hover:text-[#E0E0E0] hover:shadow-2xl hover:scale-105 transform transition-all duration-300 focus:ring-2 focus:ring-[#00ADB5]">🚀
                تابعنا على إنستقرام للتعلم والتواصل</a>
        </div>
    </section>

    <!-- Tips Section -->
    <section class="py-20 px-6" data-aos="fade-up" data-aos-duration="800">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-extrabold text-[#E0E0E0] mb-12 text-center">🧠 أحدث النصائح</h2>
            <div class="grid md:grid-cols-3 gap-10">
                @foreach ($tips as $tip)
                    <div class="group bg-[#2C2C3A]/60 backdrop-blur-lg rounded-2xl p-6 border border-white/10 shadow-lg hover:shadow-2xl hover:shadow-[#00ADB5]/20 transition-all duration-300"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-aos-duration="600">
                        <div
                            class="w-16 h-16 mb-4 bg-[#00ADB5]/10 rounded-full flex items-center justify-center text-2xl text-[#00ADB5]">
                            <i class="devicon-github-original"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-[#E0E0E0] group-hover:text-[#00ADB5] transition-colors">
                            <a href="{{ route('tips.show', $tip->id) }}">{{ $tip->title }}</a>
                        </h3>
                        <p class="text-[#E0E0E0]/70 mb-4 leading-relaxed">{{ Str::limit($tip->content, 100) }}</p>
                        <a href="{{ route('tips.show', $tip->id) }}"
                            class="inline-flex items-center text-[#00ADB5] hover:text-[#E0E0E0] font-medium transition-all duration-300 focus:ring-2 focus:ring-[#00ADB5]">
                            اقرأ المزيد
                            <svg class="w-4 h-4 mr-2 rotate-180 transition-transform group-hover:translate-x-1"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-12 text-center">
                <button id="openTipsModalBtn"
                    class="px-8 py-3 text-lg bg-[#00ADB5] text-[#E0E0E0] font-semibold rounded-full shadow-xl hover:bg-[#E0E0E0] hover:text-[#00ADB5] border-2 border-[#00ADB5] transition-all duration-300 focus:ring-2 focus:ring-[#00ADB5]">عرض
                    جميع النصائح</button>
            </div>
        </div>
    </section>

    <!-- Tips Modal -->
    <div id="tipsModal" class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center hidden" role="dialog"
        aria-labelledby="tipsModalTitle" aria-modal="true">
        <div class="bg-[#222831] w-full max-w-5xl max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl transform scale-90 opacity-0 transition-all duration-300 ease-out"
            id="tipsModalContent">
            <div class="p-6 relative">
                <button id="closeTipsModalBtn"
                    class="absolute top-4 left-4 text-[#E0E0E0] hover:text-[#00ADB5] transition focus:ring-2 focus:ring-[#00ADB5]"
                    aria-label="Close modal">✕</button>
                <h2 id="tipsModalTitle" class="text-2xl font-bold text-[#00ADB5] mb-6">🧠 جميع النصائح</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach ($allTips as $tip)
                        <div class="bg-[#2C2C3A] p-4 rounded-xl shadow border border-white/10">
                            <h3 class="text-[#E0E0E0] font-semibold text-lg mb-2">{{ $tip->title }}</h3>
                            <p class="text-[#E0E0E0]/70 mb-3">{{ Str::limit($tip->content, 150) }}</p>
                            <a href="{{ route('tips.show', $tip->id) }}"
                                class="text-[#00ADB5] hover:text-[#E0E0E0] transition inline-flex items-center focus:ring-2 focus:ring-[#00ADB5]">
                                اقرأ المزيد
                                <svg class="w-4 h-4 mr-2 rotate-180" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- HR -->
    <div class="relative py-12 px-6" data-aos="fade-up" data-aos-duration="800">
        <div class="flex items-center justify-center">
            <div class="w-full max-w-4xl flex items-center gap-4">
                <div class="h-[2px] flex-1 bg-gradient-to-r from-transparent via-[#00ADB5] to-transparent opacity-50">
                </div>
                <div class="w-3 h-3 rounded-full bg-[#00ADB5] animate-pulse"></div>
                <div class="h-[2px] flex-1 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-transparent opacity-50">
                </div>
            </div>
        </div>
    </div>

    <!-- Start Your Journey Section -->
    <section class="py-20 px-6" data-aos="fade-right" data-aos-duration="800">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-extrabold text-[#E0E0E0] mb-6">🚀 ابدأ رحلتك مع البرمجة</h2>
            <p class="text-[#E0E0E0]/80 text-lg mb-10 leading-relaxed">إذا كنت مبتدئ، فهذه هي بوابتك الأولى. مسارات
                وأدوات مختارة تساعدك على الانطلاق بشكل صحيح واحترافي.</p>
            <a href="#"
                class="px-8 py-3 text-lg bg-[#00ADB5] text-[#E0E0E0] font-semibold rounded-full shadow-lg hover:bg-[#E0E0E0] hover:text-[#00ADB5] border-2 border-[#00ADB5] transition-all duration-300 inline-block focus:ring-2 focus:ring-[#00ADB5]"
                data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600">تصفح الموارد للمبتدئين</a>
        </div>
    </section>

        <!-- HR -->
        <div class="relative py-12 px-6" data-aos="fade-up" data-aos-duration="800">
            <div class="flex items-center justify-center">
                <div class="w-full max-w-4xl flex items-center gap-4">
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-transparent via-[#00ADB5] to-transparent opacity-50">
                    </div>
                    <div class="w-3 h-3 rounded-full bg-[#00ADB5] animate-pulse"></div>
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-transparent opacity-50">
                    </div>
                </div>
            </div>
        </div>

    <!-- Advanced Techniques Section -->
    <section class="relative py-20 px-6 overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23FFFFFF\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30v-4h-2v4h-4v2h4v4h2v-4h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]">
        </div>
        <div class="relative max-w-7xl mx-auto">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#E0E0E0] mb-12 text-center tracking-tight">💡 التقنيات
                المتقدمة</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($advancedTechniques as $technique)
                    <div class="relative group bg-[#2C2C3A]/80 backdrop-blur-sm rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/10"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-aos-duration="800">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-[#00ADB5]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                        <div class="relative p-8">
                            <h3
                                class="text-2xl font-bold text-[#E0E0E0] mb-4 group-hover:text-[#00ADB5] transition-colors duration-300">
                                {{ $technique->title }}</h3>
                            <p class="text-[#E0E0E0]/70 mb-6 leading-relaxed line-clamp-3">
                                {{ Str::limit($technique->content, 120) }}</p>
                            <a href="{{ route('advanced.show', $technique->id) }}"
                                class="inline-flex items-center text-[#00ADB5] font-semibold group-hover:text-[#E0E0E0] transition-colors duration-300 focus:ring-2 focus:ring-[#00ADB5]">
                                اقرأ المزيد
                                <svg class="w-5 h-5 mr-2 rotate-180 transform group-hover:scale-110 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-12 text-center">
                <button id="openModalBtn"
                    class="relative inline-block px-8 py-4 bg-[#00ADB5] text-[#E0E0E0] font-semibold rounded-full shadow-lg hover:bg-[#E0E0E0] hover:text-[#00ADB5] border-2 border-[#00ADB5] transition-all duration-300 focus:ring-2 focus:ring-[#00ADB5]">
                    <span class="relative z-10">عرض جميع المقالات</ span>
                        <div
                            class="absolute inset-0 bg-[#00ADB5]/50 opacity-0 hover:opacity-100 transition-opacity duration-300 rounded-full">
                        </div>
                </button>
            </div>
        </div>
    </section>

    <!-- Articles Modal -->
    <div id="articlesModal" class="fixed inset-0 bg-black/70 z-50 flex items-center justify-center hidden"
        role="dialog" aria-labelledby="articlesModalTitle" aria-modal="true">
        <div class="bg-[#222831] w-full max-w-5xl max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl transform scale-90 opacity-0 transition-all duration-300 ease-out"
            id="modalContent">
            <div class="p-6 relative">
                <button id="closeModalBtn"
                    class="absolute top-4 left-4 text-[#E0E0E0] hover:text-[#00ADB5] transition focus:ring-2 focus:ring-[#00ADB5]"
                    aria-label="Close modal">✕</button>
                <h2 id="articlesModalTitle" class="text-2xl font-bold text-[#00ADB5] mb-6">📚 جميع المقالات</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach ($allArticles as $technique)
                        <div class="bg-[#2C2C3A] p-4 rounded-xl shadow border border-white/10">
                            <h3 class="text-[#E0E0E0] font-semibold text-lg mb-2">{{ $technique->title }}</h3>
                            <p class="text-[#E0E0E0]/70 mb-3">{{ Str::limit($technique->content, 150) }}</p>
                            <a href="{{ route('advanced.show', $technique->id) }}"
                                class="text-[#00ADB5] hover:text-[#E0E0E0] transition inline-flex items-center focus:ring-2 focus:ring-[#00ADB5]">
                                اقرأ المزيد
                                <svg class="w-4 h-4 mr-2 rotate-180" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

        <!-- HR -->
        <div class="relative py-12 px-6" data-aos="fade-up" data-aos-duration="800">
            <div class="flex items-center justify-center">
                <div class="w-full max-w-4xl flex items-center gap-4">
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-transparent via-[#00ADB5] to-transparent opacity-50">
                    </div>
                    <div class="w-3 h-3 rounded-full bg-[#00ADB5] animate-pulse"></div>
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-transparent opacity-50">
                    </div>
                </div>
            </div>
        </div>

    <!-- Developer Tools Section -->
    <section class="py-20 px-6" data-aos="fade-up" data-aos-duration="800">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-extrabold text-[#E0E0E0] mb-6">🛠️ أدوات احترافية للمطورين</h2>
                <p class="text-lg text-[#E0E0E0]/80 max-w-2xl mx-auto">مجموعة منتقاة من أفضل الأدوات التي تجعل رحلة
                    التطوير أسهل وأكثر احترافية</p>
            </div>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="group bg-[#2C2C3A]/60 backdrop-blur-xl rounded-2xl p-6 border border-white/10 hover:border-[#00ADB5] hover:shadow-2xl hover:shadow-[#00ADB5]/10 transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="0">
                    <div class="relative w-full h-36 overflow-hidden rounded-xl mb-4">
                        <img src="{{ asset('image/Ray.so.png') }}" alt="Ray.so"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105 group-hover:-translate-y-1" />
                    </div>
                    <h3 class="text-xl font-bold text-[#E0E0E0] mb-2 group-hover:text-[#00ADB5] transition-colors">
                        Ray.so</h3>
                    <p class="text-[#E0E0E0]/70 leading-relaxed">أداة مميزة لتحويل الكود البرمجي إلى صور جذابة قابلة
                        للمشاركة، مع دعم كامل للغة العربية.</p>
                </div>
                <div class="group bg-[#2C2C3A]/60 backdrop-blur-xl rounded-2xl p-6 border border-white/10 hover:border-[#00ADB5] hover:shadow-2xl hover:shadow-[#00ADB5]/10 transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div class="relative w-full h-36 overflow-hidden rounded-xl mb-4">
                        <img src="https://seeklogo.com/images/P/postman-logo-0087CA0D15-seeklogo.com.png"
                            alt="Postman"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105 group-hover:-translate-y-1" />
                    </div>
                    <h3 class="text-xl font-bold text-[#E0E0E0] mb-2 group-hover:text-[#00ADB5] transition-colors">
                        Postman</h3>
                    <p class="text-[#E0E0E0]/70 leading-relaxed">منصة متكاملة لاختبار وتوثيق واجهات API بكفاءة عالية،
                        مع ميزات تعاون الفريق.</p>
                </div>
                <div class="group bg-[#2C2C3A]/60 backdrop-blur-xl rounded-2xl p-6 border border-white/10 hover:border-[#00ADB5] hover:shadow-2xl hover:shadow-[#00ADB5]/10 transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="relative w-full h-36 overflow-hidden rounded-xl mb-4">
                        <img src="https://vitest.dev/logo-shadow.svg" alt="Vitest"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-105 group-hover:-translate-y-1" />
                    </div>
                    <h3 class="text-xl font-bold text-[#E0E0E0] mb-2 group-hover:text-[#00ADB5] transition-colors">
                        Vitest</h3>
                    <p class="text-[#E0E0E0]/70 leading-relaxed">إطار اختبار حديث وسريع لمشاريع Vite، يوفر تجربة مطور
                        استثنائية مع دعم TypeScript.</p>
                </div>
            </div>
        </div>
    </section>

        <!-- HR -->
        <div class="relative py-12 px-6" data-aos="fade-up" data-aos-duration="800">
            <div class="flex items-center justify-center">
                <div class="w-full max-w-4xl flex items-center gap-4">
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-transparent via-[#00ADB5] to-transparent opacity-50">
                    </div>
                    <div class="w-3 h-3 rounded-full bg-[#00ADB5] animate-pulse"></div>
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-transparent opacity-50">
                    </div>
                </div>
            </div>
        </div>

    <!-- Open Source Projects Section -->
    <section class="relative py-20 px-6 overflow-hidden" data-aos="fade-right" data-aos-duration="1000">
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"80\" height=\"80\" viewBox=\"0 0 80 80\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23FFFFFF\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M50 50c0-5.52-4.48-10-10-10s-10 4.48-10 10 4.48 10 10 10 10-4.48 10-10zm-30-30c0-5.52-4.48-10-10-10S0 14.48 0 20s4.48 10 10 10 10-4.48 10-10zm60 0c0-5.52-4.48-10-10-10s-10 4.48-10 10 4.48 10 10 10 10-4.48 10-10z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')]">
        </div>
        <div class="relative max-w-7xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#E0E0E0] mb-8 tracking-tight">🚧 مشاريع مفتوحة المصدر
            </h2>
            <p class="text-[#E0E0E0]/80 mb-12 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">شارك أو استلهم من
                هذه المشاريع المجتمعية المبتكرة التي تدعم المطورين العرب.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="relative group bg-[#2C2C3A]/90 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/10"
                    data-aos="fade-up" data-aos-delay="0" data-aos-duration="800">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#00ADB5]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="relative">
                        <h3
                            class="text-2xl font-bold text-[#E0E0E0] mb-3 group-hover:text-[#00ADB5] transition-colors duration-300">
                            🔗 DevLinks</h3>
                        <p class="text-[#E0E0E0]/70 leading-relaxed">مشروع لعرض روابط حساباتك البرمجية في صفحة واحدة
                            أنيقة وسهلة التخصيص.</p>
                    </div>
                </div>
                <div class="relative group bg-[#2C2C3A]/90 backdrop-blur-sm p-8 rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 border border-white/10"
                    data-aos="fade-up" data-aos-delay="150" data-aos-duration="800">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-[#00ADB5]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                    <div class="relative">
                        <h3
                            class="text-2xl font-bold text-[#E0E0E0] mb-3 group-hover:text-[#00ADB5] transition-colors duration-300">
                            📚 RoadMap Codac</h3>
                        <p class="text-[#E0E0E0]/70 leading-relaxed">خريطة تعلم تفاعلية مصممة خصيصًا للمطورين العرب
                            لتسريع رحلة التعلم.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- HR -->
        <div class="relative py-12 px-6" data-aos="fade-up" data-aos-duration="800">
            <div class="flex items-center justify-center">
                <div class="w-full max-w-4xl flex items-center gap-4">
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-transparent via-[#00ADB5] to-transparent opacity-50">
                    </div>
                    <div class="w-3 h-3 rounded-full bg-[#00ADB5] animate-pulse"></div>
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-transparent opacity-50">
                    </div>
                </div>
            </div>
        </div>

    <!-- Coding Challenges Section -->
    <section class="py-16 px-6" data-aos="fade-up" data-aos-duration="800">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-[#00ADB5] mb-6">🎯 تحديات برمجية</h2>
            <p class="text-[#E0E0E0]/80 mb-10">اختبر مهاراتك بحل تحديات متنوعة أسبوعياً.</p>
            <a href="#"
                class="inline-block px-8 py-3 bg-[#00ADB5] text-[#E0E0E0] rounded-full hover:bg-[#00ADB5]/80 transition focus:ring-2 focus:ring-[#00ADB5]"
                data-aos="zoom-in" data-aos-duration="600">قريبا</a>
        </div>
    </section>

        <!-- HR -->
        <div class="relative py-12 px-6" data-aos="fade-up" data-aos-duration="800">
            <div class="flex items-center justify-center">
                <div class="w-full max-w-4xl flex items-center gap-4">
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-transparent via-[#00ADB5] to-transparent opacity-50">
                    </div>
                    <div class="w-3 h-3 rounded-full bg-[#00ADB5] animate-pulse"></div>
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-transparent opacity-50">
                    </div>
                </div>
            </div>
        </div>

    <!-- Developer Communities Section -->
    <section class="py-16 px-6" data-aos="fade-up" data-aos-duration="800">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-[#00ADB5] mb-6">🤝 مجتمعات عربية</h2>
            <p class="text-[#E0E0E0]/80 mb-8">انضم لمجتمعات تدعم المطورين العرب وتشارك الخبرات.</p>
            <ul class="grid md:grid-cols-2 gap-6 text-right">
                <li class="bg-[#2C2C3A] p-5 rounded-lg" data-aos="fade-up" data-aos-delay="0"
                    data-aos-duration="600">💬 <strong>Coders Cafe</strong> – دردشات أسبوعية ومساعدة جماعية.</li>
                <li class="bg-[#2C2C3A] p-5 rounded-lg" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="600">📢 <strong>Telegram Devs</strong> – قناة لمشاركة التحديثات والمصادر.</li>
            </ul>
        </div>
    </section>

        <!-- HR -->
        <div class="relative py-12 px-6" data-aos="fade-up" data-aos-duration="800">
            <div class="flex items-center justify-center">
                <div class="w-full max-w-4xl flex items-center gap-4">
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-transparent via-[#00ADB5] to-transparent opacity-50">
                    </div>
                    <div class="w-3 h-3 rounded-full bg-[#00ADB5] animate-pulse"></div>
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-transparent opacity-50">
                    </div>
                </div>
            </div>
        </div>

    <!-- Workshop Section -->
    <section class="py-16 px-6 text-center" data-aos="fade-up" data-aos-duration="800">
        <h2 class="text-3xl font-bold text-[#00ADB5] mb-6">🧠 اشترك في ورشة عمل</h2>
        <p class="text-[#E0E0E0]/80 mb-6">ورشة مباشرة تشرح تطبيق مشروع عملي من الصفر.</p>
        <a href="#"
            class="bg-[#00ADB5] text-[#E0E0E0] px-6 py-3 rounded-full hover:bg-[#00ADB5]/80 transition-all focus:ring-2 focus:ring-[#00ADB5]"
            data-aos="zoom-in" data-aos-duration="600">قريبا ⏰</a>
    </section>

        <!-- HR -->
        <div class="relative py-12 px-6" data-aos="fade-up" data-aos-duration="800">
            <div class="flex items-center justify-center">
                <div class="w-full max-w-4xl flex items-center gap-4">
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-transparent via-[#00ADB5] to-transparent opacity-50">
                    </div>
                    <div class="w-3 h-3 rounded-full bg-[#00ADB5] animate-pulse"></div>
                    <div class="h-[2px] flex-1 bg-gradient-to-r from-[#00ADB5] via-[#00ADB5] to-transparent opacity-50">
                    </div>
                </div>
            </div>
        </div>

    <!-- Developer Testimonials Section -->
    <section class="relative py-20 px-6 overflow-hidden" data-aos="fade-up" data-aos-duration="1000"
        aria-label="Developer Testimonials">
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22100%22 height=%22100%22 viewBox=%220 0 100 100%22%3E%3Cg fill=%22none%22 stroke=%22%2300ADB5%22 stroke-width=%222%22 stroke-opacity=%220.1%22%3E%3Cpath d=%22M0 50h25v50M75 50h25v50M50 0v25M50 75v25M25 25l50 50M75 25l-50 50%22/%3E%3C/g%3E%3C/svg%3E')] opacity-50">
        </div>
        <div class="absolute top-10 left-10 w-20 h-20 rounded-full bg-[#00ADB5]/30 blur-xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 rounded-full bg-[#4ECDC4]/30 blur-xl animate-pulse"
            style="animation-delay: 1s;"></div>
        <div class="relative max-w-7xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-[#E0E0E0] mb-12 tracking-tight">💬 آراء المطورين</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <blockquote
                    class="relative bg-[#2C2C3A]/80 backdrop-blur-md p-8 rounded-2xl shadow-2xl border border-[#00ADB5]/20 group hover:scale-105 transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="0" data-aos-duration="800">
                    <div
                        class="absolute inset-0 border-2 border-[#00ADB5]/50 rounded-2xl group-hover:animate-holo-border">
                    </div>
                    <div class="absolute inset-0 pointer-events-none">
                        <div class="w-2 h-2 bg-[#00ADB5] rounded-full absolute top-4 left-4 animate-float"></div>
                        <div class="w-3 h-3 bg-[#4ECDC4] rounded-full absolute bottom-6 right-6 animate-float"
                            style="animation-delay: 0.5s;"></div>
                    </div>
                    <p class="relative text-[#E0E0E0] text-lg mb-4 font-medium leading-relaxed z-10">"مصدر عربي رائع،
                        كأنني أتنقل في مجرة من المعرفة البرمجية!"</p>
                    <footer class="relative text-[#E0E0E0]/60 font-semibold z-10">— أحمد، مهندس Laravel المستقبلي
                    </footer>
                </blockquote>
                <blockquote
                    class="relative bg-[#2C2C3A]/80 backdrop-blur-md p-8 rounded-2xl shadow-2xl border border-[#00ADB5]/20 group hover:scale-105 transition-all duration-300"
                    data-aos="fade-up" data-aos-delay="150" data-aos-duration="800">
                    <div
                        class="absolute inset-0 border-2 border-[#00ADB5]/50 rounded-2xl group-hover:animate-holo-border">
                    </div>
                    <div class="absolute inset-0 pointer-events-none">
                        <div class="w-2 h-2 bg-[#00ADB5] rounded-full absolute top-6 left-6 animate-float"></div>
                        <div class="w-3 h-3 bg-[#4ECDC4] rounded-full absolute bottom-4 right-4 animate-float"
                            style="animation-delay: 0.7s;"></div>
                    </div>
                    <p class="relative text-[#E0E0E0] text-lg mb-4 font-medium leading-relaxed z-10">"Codac.arabe بوابة
                        إلى عالم البرمجة، تنقلك من مبتدئ إلى ساحر تقني!"</p>
                    <footer class="relative text-[#E0E0E0]/60 font-semibold z-10">— سارة، ساحرة React</footer>
                </blockquote>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#2C2C3A] text-[#E0E0E0]/80 py-16 px-6 border-t border-white/10" data-aos="fade-up"
        data-aos-duration="800">
        <div class="max-w-6xl mx-auto grid md:grid-cols-4 gap-10 text-sm">
            <div>
                <h3 class="text-3xl font-black mb-4 animated-glow-text">Codac.arabe</h3>
                <p class="mb-6 text-[#E0E0E0]/70 leading-relaxed">رحلتك البرمجية تبدأ من هنا. محتوى موثوق، مبسط
                    واحترافي.</p>
                <div class="flex gap-6 mt-6">
                    <a href="https://instagram.com/codac.arabe"
                        class="flex items-center gap-2 hover:text-[#00ADB5] transition-all duration-300 group focus:ring-2 focus:ring-[#00ADB5]">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                        <span class="font-medium">إنستغرام</span>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="text-[#E0E0E0] font-bold mb-4">روابط سريعة</h4>
                <ul class="space-y-2">
                    <li><a href="#"
                            class="hover:text-[#00ADB5] transition focus:ring-2 focus:ring-[#00ADB5]">ابدأ هنا</a></li>
                    <li><a href="#"
                            class="hover:text-[#00ADB5] transition focus:ring-2 focus:ring-[#00ADB5]">مسارات التعلم</a>
                    </li>
                    <li><a href="#"
                            class="hover:text-[#00ADB5] transition focus:ring-2 focus:ring-[#00ADB5]">أدوات
                            المطورين</a></li>
                    <li><a href="#"
                            class="hover:text-[#00ADB5] transition focus:ring-2 focus:ring-[#00ADB5]">تحديات
                            أسبوعية</a></li>
                </ul>
            </div>
            <div class="md:col-span-2">
                <h4 class="text-[#E0E0E0] font-bold mb-4">📩 اشترك في النشرة</h4>
                <p class="mb-4">تصلك أفضل النصائح والمصادر البرمجية أسبوعيًا.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <input type="email" name="email" placeholder="ادخل بريدك الإلكتروني" required
                        class="w-full p-3 rounded-lg bg-[#222831] text-[#E0E0E0] placeholder-[#E0E0E0]/50 focus:outline-none focus:ring-2 focus:ring-[#00ADB5]">
                    <button type="submit"
                        class="bg-[#00ADB5] text-[#E0E0E0] px-6 py-3 rounded-lg hover:bg-[#00ADB5]/80 transition focus:ring-2 focus:ring-[#00ADB5]"
                        data-aos="zoom-in" data-aos-duration="600">اشترك</button>
                </div>
            </div>
        </div>
        <div class="border-t border-white/10 mt-12 pt-6 text-center text-xs text-[#E0E0E0]/50">© {{ date('Y') }}
            Codac.arabe - جميع الحقوق محفوظة.</div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Tips Modal
        const openTipsModalBtn = document.getElementById('openTipsModalBtn');
        const closeTipsModalBtn = document.getElementById('closeTipsModalBtn');
        const tipsModal = document.getElementById('tipsModal');
        const tipsModalContent = document.getElementById('tipsModalContent');

        openTipsModalBtn.addEventListener('click', () => {
            tipsModal.classList.remove('hidden');
            tipsModalContent.focus();
            setTimeout(() => {
                tipsModalContent.classList.remove('scale-90', 'opacity-0');
            }, 50);
        });

        closeTipsModalBtn.addEventListener('click', () => {
            tipsModalContent.classList.add('scale-90', 'opacity-0');
            setTimeout(() => {
                tipsModal.classList.add('hidden');
                openTipsModalBtn.focus();
            }, 300);
        });

        tipsModal.addEventListener('click', (e) => {
            if (e.target === tipsModal) {
                closeTipsModalBtn.click();
            }
        });

        tipsModal.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeTipsModalBtn.click();
            }
        });

        // Articles Modal
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const modal = document.getElementById('articlesModal');
        const modalContent = document.getElementById('modalContent');

        openBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modalContent.focus();
            setTimeout(() => {
                modalContent.classList.remove('scale-90', 'opacity-0');
            }, 50);
        });

        closeBtn.addEventListener('click', () => {
            modalContent.classList.add('scale-90', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                openBtn.focus();
            }, 300);
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeBtn.click();
            }
        });

        modal.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeBtn.click();
            }
        });
    </script>
</body>

</html>
