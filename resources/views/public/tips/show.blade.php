<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ $tip->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Almarai Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Almarai', sans-serif;
        }

        @keyframes gradient-xy {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }

        .animate-gradient-xy {
            background-size: 400% 400%;
            animation: gradient-xy 15s ease infinite;
        }

        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in { animation: fade-in 0.6s ease-out; }
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out; }
    </style>
</head>

<body class="bg-[#222831] min-h-screen text-white relative overflow-x-hidden">

    {{-- ✅ خلفية متحركة --}}
    {{-- <div class="absolute inset-0 -z-10 animate-gradient-xy bg-gradient-to-br from-[#222831] via-[#00ADB5] to-[#393E46]"></div> --}}

    {{-- ✅ محتوى النصيحة --}}
    <main class="w-full max-w-3xl mx-auto px-6 py-12">
        <div class="bg-white/5 backdrop-blur-xl p-10 rounded-3xl shadow-2xl border border-[#00ADB5]/30 animate-fade-in-up">

            <h1 class="text-4xl font-extrabold mb-6 text-white">{{ $tip->title }}</h1>

            <div class="flex flex-wrap gap-4 mb-8">
                <span class="px-4 py-1 rounded-full bg-[#00ADB5]/10 text-[#00ADB5] text-sm">
                    🧠 {{ $tip->category }}
                </span>
                <span class="px-4 py-1 rounded-full bg-[#00ADB5]/10 text-[#00ADB5] text-sm">
                    🎯 {{ $tip->level }}
                </span>
            </div>

            <div class="prose prose-invert prose-lg text-white/90 leading-loose animate-fade-in-up max-w-none">
                {!! nl2br(e($tip->content)) !!}
            </div>

            <a href="/"
               class="group mt-10 inline-flex items-center gap-2 text-[#00ADB5] hover:text-white transition-all duration-300">
                <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                العودة إلى كل النصائح
            </a>
        </div>
    </main>

    {{-- ✅ فوتر خفيف --}}
    <footer class="text-center text-sm text-white/40 py-12">
        © {{ date('Y') }} Codac.arabe — جميع الحقوق محفوظة.
    </footer>
</body>
</html>
