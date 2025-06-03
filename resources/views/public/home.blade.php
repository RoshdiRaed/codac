<!DOCTYPE html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap');

    * {
        font-family: 'Almarai', sans-serif;
    }

    .animate-gradient {
        background: linear-gradient(270deg, #222831, #00ADB5);
        background-size: 400% 400%;
        animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>Codac | انطلق في رحلتك البرمجية</title>
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <!-- إضافة مكتبة AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-[#222831] text-white font-['Almarai']">

    <a href="http://localhost:8000/admin/login" target="_blank"
    class="fixed top-6 right-6 z-50 bg-gray-900 text-white p-3 rounded-full shadow-lg hover:bg-gray-700 transition duration-300"
    title="الدخول إلى لوحة الإدارة">
    🔑
</a>
    <!-- ✅ الهوية -->
    <section
        class="animate-gradient text-center py-32 relative overflow-hidden rounded-3xl border-4 border-white/20 shadow-2xl"
        data-aos="fade-down" data-aos-duration="1000">

        <!-- الأيقونات العائمة -->
        <div class="floating-icons pointer-events-none z-0">
            <!-- تقدر تضيف/تكرّر المزيد منالأيقونات -->
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/javascript.svg" class="floating-icon"
                style="top:5%; left:10%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/python.svg" class="floating-icon"
                style="top:8%; left:30%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/java.svg" class="floating-icon"
                style="top:10%; left:60%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/cplusplus.svg" class="floating-icon"
                style="top:12%; left:80%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/csharp.svg" class="floating-icon"
                style="top:15%; left:20%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/php.svg" class="floating-icon"
                style="top:18%; left:40%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/html5.svg" class="floating-icon"
                style="top:20%; left:70%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/css3.svg" class="floating-icon"
                style="top:22%; left:90%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/typescript.svg" class="floating-icon"
                style="top:25%; left:10%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/react.svg" class="floating-icon"
                style="top:27%; left:35%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/vue-dot-js.svg" class="floating-icon"
                style="top:30%; left:55%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/angular.svg" class="floating-icon"
                style="top:32%; left:75%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/node-dot-js.svg" class="floating-icon"
                style="top:35%; left:95%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/express.svg" class="floating-icon"
                style="top:38%; left:5%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/next-dot-js.svg" class="floating-icon"
                style="top:40%; left:25%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/nuxt-dot-js.svg" class="floating-icon"
                style="top:43%; left:45%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/docker.svg" class="floating-icon"
                style="top:45%; left:65%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/kubernetes.svg" class="floating-icon"
                style="top:47%; left:85%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/git.svg" class="floating-icon"
                style="top:50%; left:15%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/github.svg" class="floating-icon"
                style="top:52%; left:35%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/gitlab.svg" class="floating-icon"
                style="top:55%; left:55%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/bitbucket.svg" class="floating-icon"
                style="top:58%; left:75%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/linux.svg" class="floating-icon"
                style="top:60%; left:95%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/bash.svg" class="floating-icon"
                style="top:62%; left:5%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/vim.svg" class="floating-icon"
                style="top:65%; left:25%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/visualstudiocode.svg" class="floating-icon"
                style="top:67%; left:45%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/intellijidea.svg" class="floating-icon"
                style="top:70%; left:65%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/androidstudio.svg" class="floating-icon"
                style="top:72%; left:85%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/firebase.svg" class="floating-icon"
                style="top:75%; left:15%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/mongodb.svg" class="floating-icon"
                style="top:78%; left:35%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/mysql.svg" class="floating-icon"
                style="top:80%; left:55%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/postgresql.svg" class="floating-icon"
                style="top:82%; left:75%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/sqlite.svg" class="floating-icon"
                style="top:85%; left:95%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/redis.svg" class="floating-icon"
                style="top:87%; left:5%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/nginx.svg" class="floating-icon"
                style="top:90%; left:25%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/apache.svg" class="floating-icon"
                style="top:92%; left:45%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/wordpress.svg" class="floating-icon"
                style="top:95%; left:65%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/laravel.svg" class="floating-icon"
                style="top:97%; left:85%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/symfony.svg" class="floating-icon"
                style="top:5%; left:45%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/flutter.svg" class="floating-icon"
                style="top:7%; left:65%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/dart.svg" class="floating-icon"
                style="top:9%; left:85%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/unity.svg" class="floating-icon"
                style="top:11%; left:5%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/blender.svg" class="floating-icon"
                style="top:13%; left:25%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/godotengine.svg" class="floating-icon"
                style="top:16%; left:55%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/netlify.svg" class="floating-icon"
                style="top:19%; left:75%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/vercel.svg" class="floating-icon"
                style="top:22%; left:95%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/astro.svg" class="floating-icon"
                style="top:26%; left:15%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/svelte.svg" class="floating-icon"
                style="top:29%; left:35%;" />
            <img src="https://cdn.jsdelivr.net/npm/simple-icons@v11/icons/bootstrap.svg" class="floating-icon"
                style="top:33%; left:55%;" />

        </div>

        <!-- فقاعات ناعمة -->
        <div
            class="absolute -top-10 -left-10 w-40 h-40 bg-pink-500 opacity-30 rounded-full blur-3xl animate-pulse-slow z-0">
        </div>
        <div
            class="absolute -bottom-10 -right-10 w-60 h-60 bg-cyan-400 opacity-20 rounded-full blur-2xl animate-pulse-fast z-0">
        </div>

        <!-- المحتوى -->
        <div class="relative z-10">
            <h1 class="text-6xl font-black mb-6 text-white glow-text">Codac.arabe</h1>
            <p class="text-2xl text-white/80 mb-10 font-medium">
                مصدر موثوق لنصائح ودروس البرمجة للمبتدئين والمطورين
            </p>
            <a href="https://www.instagram.com/codac.arabe" target="_blank"
                class="inline-block px-10 py-4 bg-white text-gray-900 font-extrabold text-lg rounded-full shadow-xl hover:bg-gradient-to-r hover:from-pink-500 hover:to-cyan-400 hover:text-white hover:shadow-2xl hover:scale-110 transform transition-all duration-500 ease-out">
                🚀 تابعنا على إنستقرام للتعلم والتواصل
            </a>
            {{-- <br><br>
            <a href="http://localhost:8000/admin/login" target="_blank"
                class="inline-block px-8 py-3 bg-gray-900 text-white font-bold text-base rounded-full shadow-lg hover:bg-gray-700 hover:shadow-xl hover:scale-105 transition-transform duration-300">
                🎛️ الدخول إلى لوحة الإدارة
            </a> --}}

        </div>
    </section>

    <!-- 🔮 CSS -->
    <style>
        .animate-gradient {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4, #45b7d1, #96c93d);
            background-size: 400%;
            animation: gradientAnimation 20s ease infinite;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .glow-text {
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.5),
                0 0 30px rgba(255, 255, 255, 0.3);
        }

        .animate-pulse-slow {
            animation: pulse 6s ease-in-out infinite;
        }

        .animate-pulse-fast {
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.3;
                transform: scale(1);
            }

            50% {
                opacity: 0.6;
                transform: scale(1.2);
            }
        }

        .floating-icons {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .floating-icon {
            position: absolute;
            width: 40px;
            opacity: 0.08;
            animation: floatIcon 10s ease-in-out infinite;
            filter: drop-shadow(0 0 5px rgba(255, 255, 255, 0.3));
            transition: transform 0.3s, opacity 0.3s;
        }

        .floating-icon:hover {
            opacity: 0.5;
            transform: scale(1.5);
            z-index: 50;
        }

        @keyframes floatIcon {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-10px) rotate(2deg);
            }

            50% {
                transform: translateY(-20px) rotate(-2deg);
            }

            75% {
                transform: translateY(-10px) rotate(1deg);
            }

            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }
    </style>

    <!-- ✅ أحدث النصائح -->
    <section class="py-16 max-w-6xl mx-auto px-6" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl font-bold mb-8 text-[#00ADB5]">🧠 أحدث النصائح</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach ($tips as $tip)
                <div class="bg-[#2C2C3A] rounded-xl p-6 shadow-lg hover:shadow-[#00ADB5]/50 transition-all duration-300 border border-white/10"
                    data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-aos-duration="800">
                    <h3 class="text-xl font-bold mb-3">
                        <a href="{{ route('tips.show', $tip->id) }}"
                            class="text-[#00ADB5] hover:text-white transition-colors">
                            {{ $tip->title }}
                        </a>
                    </h3>
                    <p class="text-white/70 mb-4">{{ Str::limit($tip->content, 100) }}</p>
                    <a href="{{ route('tips.show', $tip->id) }}"
                        class="text-[#00ADB5] hover:text-white transition-colors inline-flex items-center">
                        اقرأ المزيد
                        <svg class="w-4 h-4 mr-2 rotate-180" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- ✅ ابدأ رحلتك -->
    <section class="py-16 px-6 bg-[#222831]" data-aos="fade-right" data-aos-duration="1000">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6 text-white">🚀 ابدأ رحلتك مع البرمجة</h2>
            <p class="text-white/80 mb-8 text-lg">إذا كنت مبتدئ، ابدأ من هنا. مسارات وأدوات تساعدك تبدأ صح.</p>
            <a href="#"
                class="bg-[#00ADB5] text-white px-8 py-3 rounded-full hover:bg-[#00ADB5]/80 transition-colors duration-300 font-bold inline-block"
                data-aos="zoom-in" data-aos-delay="200" data-aos-duration="800">
                تصفح الموارد للمبتدئين
            </a>
        </div>
    </section>

    <!-- ✅ تقنيات متقدمة -->
    <section class="py-16 bg-[#2C2C3A] px-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-[#00ADB5] mb-8">💡 تقنيات متقدمة</h2>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($advancedTechniques as $technique)
                    <div class="p-6 bg-[#222831] rounded-xl shadow-lg hover:shadow-[#00ADB5]/50 transition-all duration-300 border border-white/10"
                        data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-aos-duration="800">
                        <h3 class="text-xl font-bold text-white mb-3">{{ $technique->title }}</h3>
                        <p class="text-white/70 mb-4">{{ Str::limit($technique->content, 100) }}</p>
                        <a href="{{ route('advanced.show', $technique->id) }}"
                            class="text-[#00ADB5] hover:text-white transition-colors inline-flex items-center">
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
    </section>

    <!-- ✅ أفضل الأدوات للمطورين -->
    <section class="py-16 bg-[#222831] px-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-[#00ADB5] mb-6">🛠️ أفضل الأدوات للمطورين</h2>
            <p class="text-white/80 mb-10">مجموعة من الأدوات التي تسهّل حياتك كمطور: إنتاجية، اختبارات، بيئات عمل.</p>
            <ul class="grid md:grid-cols-3 gap-6 text-left">
                <li class="bg-[#2C2C3A] p-4 rounded-lg" data-aos="fade-up" data-aos-delay="0"
                    data-aos-duration="800">
                    💻 <strong>Ray.so:</strong> لالتقاط كود برمجي أنيق للنشر.</li>
                <li class="bg-[#2C2C3A] p-4 rounded-lg" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="800">
                    📊 <strong>Postman:</strong> لاختبار الـ APIs بشكل سريع ومنظم.</li>
                <li class="bg-[#2C2C3A] p-4 rounded-lg" data-aos="fade-up" data-aos-delay="200"
                    data-aos-duration="800">
                    🧪 <strong>Vitest:</strong> أداة اختبار حديثة وسريعة لمشاريع Vite.</li>
            </ul>
        </div>
    </section>

    <!-- ✅ المشاريع المتميزة -->
    <section class="py-16 px-6 bg-[#222831]" data-aos="fade-right" data-aos-duration="1000">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-[#00ADB5] mb-6">🚧 مشاريع مفتوحة المصدر</h2>
            <p class="text-white/80 mb-10">شارك أو استلهم من هذه المشاريع المجتمعية المفيدة.</p>
            <div class="grid md:grid-cols-2 gap-6 text-left">
                <div class="bg-[#2C2C3A] p-6 rounded-xl" data-aos="fade-up" data-aos-delay="0"
                    data-aos-duration="800">
                    <h3 class="text-white font-bold text-xl mb-2">🔗 DevLinks</h3>
                    <p class="text-white/70">مشروع لعرض روابط حساباتك البرمجية في صفحة واحدة.</p>
                </div>
                <div class="bg-[#2C2C3A] p-6 rounded-xl" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="800">
                    <h3 class="text-white font-bold text-xl mb-2">📚 RoadMap Codac</h3>
                    <p class="text-white/70">خريطة تعلم تفاعلية موجهة للمطورين العرب.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ✅ تحديات برمجية -->
    <section class="py-16 bg-[#222831] px-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-[#00ADB5] mb-6">🎯 تحديات برمجية</h2>
            <p class="text-white/80 mb-10">اختبر مهاراتك بحل تحديات متنوعة أسبوعياً.</p>
            <a href="#"
                class="inline-block px-8 py-3 bg-[#00ADB5] text-white rounded-full hover:bg-[#00ADB5]/80 transition"
                data-aos="zoom-in" data-aos-duration="800">قريبا</a>
        </div>
    </section>

    <!-- ✅ مجتمعات للمطورين -->
    <section class="py-16 bg-[#2C2C3A] px-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-[#00ADB5] mb-6">🤝 مجتمعات عربية</h2>
            <p class="text-white/80 mb-8">انضم لمجتمعات تدعم المطورين العرب وتشارك الخبرات.</p>
            <ul class="grid md:grid-cols-2 gap-6 text-left">
                <li class="bg-[#222831] p-5 rounded-lg" data-aos="fade-up" data-aos-delay="0"
                    data-aos-duration="800">
                    💬 <strong>Coders Cafe</strong> – دردشات أسبوعية ومساعدة جماعية.</li>
                <li class="bg-[#222831] p-5 rounded-lg" data-aos="fade-up" data-aos-delay="100"
                    data-aos-duration="800">
                    📢 <strong>Telegram Devs</strong> – قناة لمشاركة التحديثات والمصادر.</li>
            </ul>
        </div>
    </section>

    <!-- ✅ اشترك في ورشة -->
    <section class="py-16 px-6 bg-[#222831] text-center" data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl font-bold text-[#00ADB5] mb-6">🧠 اشترك في ورشة عمل</h2>
        <p class="text-white/80 mb-6">ورشة مباشرة تشرح تطبيق مشروع عملي من الصفر.</p>
        <a href="#" class="bg-[#00ADB5] text-white px-6 py-3 rounded-full hover:bg-[#00ADB5]/80 transition-all"
            data-aos="zoom-in" data-aos-duration="800">قريبا ⏰</a>
    </section>

    <!-- ✅ آراء المطورين -->
    <section class="py-16 bg-[#222831] px-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-[#00ADB5] mb-10">💬 آراء المطورين</h2>
            <div class="grid md:grid-cols-2 gap-6 text-left">
                <blockquote class="bg-[#2C2C3A] p-6 rounded-xl border border-white/10" data-aos="fade-up"
                    data-aos-delay="0" data-aos-duration="800">
                    <p class="text-white mb-2">"مصدر عربي رائع، أخيرًا وجدت مكان ألجأ له لما أضيع في مشاريعي!"</p>
                    <footer class="text-white/60">— أحمد، مطور Laravel</footer>
                </blockquote>
                <blockquote class="bg-[#2C2C3A] p-6 rounded-xl border border-white/10" data-aos="fade-up"
                    data-aos-delay="100" data-aos-duration="800">
                    <p class="text-white mb-2">"أنصح أي مبرمج مبتدئ أو متقدم يتابع Codac.arabe بدون تردد."</p>
                    <footer class="text-white/60">— سارة، مطورة React</footer>
                </blockquote>
            </div>
        </div>
    </section>

    <!-- ✅ الفوتر -->
    <footer class="bg-[#2C2C3A] text-white/80 py-16 px-6 border-t border-white/10" data-aos="fade-up"
        data-aos-duration="1000">
        <div class="max-w-6xl mx-auto grid md:grid-cols-4 gap-10 text-sm">
            <!-- شعار وروابط التواصل -->
            <div>
                <h3 class="text-3xl font-black mb-4 animated-glow-text">
                    Codac.arabe
                </h3>
                <style>
                    .animated-glow-text {
                        background: linear-gradient(120deg, #00ADB5, #ffffff, #00ADB5);
                        background-size: 200% auto;
                        background-clip: text;
                        -webkit-background-clip: text;
                        color: transparent;
                        -webkit-text-fill-color: transparent;
                        animation: waterGlow 4s ease-in-out infinite;
                    }

                    @keyframes waterGlow {
                        0% {
                            background-position: 0% center;
                        }

                        50% {
                            background-position: 100% center;
                        }

                        100% {
                            background-position: 0% center;
                        }
                    }
                </style>

                <p class="mb-6 text-white/70 leading-relaxed">رحلتك البرمجية تبدأ من هنا. محتوى موثوق، مبسط واحترافي.
                </p>
                <div class="flex gap-6 mt-6">
                    <a href="https://instagram.com/codac.arabe"
                        class="flex items-center gap-2 hover:text-[#00ADB5] transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                        <span class="font-medium">إنستغرام</span>
                    </a>
                    {{-- <a href="#" class="flex items-center gap-2 hover:text-[#00ADB5] transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                        <span class="font-medium">يوتيوب</span>
                    </a>
                    <a href="#" class="flex items-center gap-2 hover:text-[#00ADB5] transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                        <span class="font-medium">لينكدإن</span>
                    </a> --}}
                </div>
            </div>

            <!-- روابط مفيدة -->
            <div>
                <h4 class="text-white font-bold mb-4">روابط سريعة</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-[#00ADB5] transition">ابدأ هنا</a></li>
                    <li><a href="#" class="hover:text-[#00ADB5] transition">مسارات التعلم</a></li>
                    <li><a href="#" class="hover:text-[#00ADB5] transition">أدوات المطورين</a></li>
                    <li><a href="#" class="hover:text-[#00ADB5] transition">تحديات أسبوعية</a></li>
                </ul>
            </div>

            <!-- النشرة البريدية -->
            <div class="md:col-span-2">
                <h4 class="text-white font-bold mb-4">📩 اشترك في النشرة</h4>
                <p class="mb-4">تصلك أفضل النصائح والمصادر البرمجية أسبوعيًا.</p>
                <form action="#" method="POST" class="flex flex-col sm:flex-row gap-4">
                    <input type="email" name="email" placeholder="ادخل بريدك الإلكتروني" required
                        class="w-full p-3 rounded-lg bg-[#222831] text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-[#00ADB5]">
                    <button type="submit"
                        class="bg-[#00ADB5] text-white px-6 py-3 rounded-lg hover:bg-[#00ADB5]/80 transition"
                        data-aos="zoom-in" data-aos-duration="800">اشترك</button>
                </form>
            </div>
        </div>

        <div class="border-t border-white/10 mt-12 pt-6 text-center text-xs text-white/50">
            &copy; {{ date('Y') }} Codac.arabe - جميع الحقوق محفوظة.
        </div>
    </footer>

    <!-- إضافة سكربت AOS وتهيئته -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // مدة التأثير الافتراضية
            easing: 'ease-in-out', // نوع الانتقال
            once: true, // التأثير يحدث مرة واحدة فقط عند التمرير
            offset: 100 // مسافة التمرير قبل تفعيل التأثير
        });
    </script>

</body>

</html>
