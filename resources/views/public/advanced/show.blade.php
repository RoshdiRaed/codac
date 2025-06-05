<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>{{ $technique->title }}</title>
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

<body class="bg-gradient-to-br from-[#0F0F1E] to-[#1a1a2e] text-[#F5F5F5] min-h-screen">
    <div class="py-20 px-6 max-w-7xl mx-auto">
        <div class="bg-[#2c2f3f]/80 backdrop-blur-md p-8 rounded-2xl border border-[#00ADB5]/20 shadow-lg">
            <h1 class="text-3xl font-bold text-[#00ADB5] mb-6 flex items-center gap-3">
                {{ $technique->title }}
            </h1>

            <div class="flex flex-wrap gap-4 mb-6">
                <span class="bg-[#00ADB5]/10 text-[#00ADB5] px-4 py-1 rounded-lg text-sm">
                    🎯 {{ $technique->level }}
                </span>
            </div>

            <div class="text-[#E0E0E0] prose prose-invert max-w-none leading-relaxed">
                <div class="prose-lg prose-headings:text-[#00ADB5] prose-p:text-gray-300 prose-strong:text-white prose-em:text-[#00ADB5]/80 prose-ul:text-gray-300 prose-ol:text-gray-300 prose-li:marker:text-[#00ADB5] prose-a:text-[#00ADB5] hover:prose-a:text-[#00fff0] prose-code:text-[#00ADB5] prose-pre:bg-[#1a1a2e] prose-pre:border prose-pre:border-[#00ADB5]/20 max-w-none">
                    {!! $technique->content !!}
                </div>
            </div>

            <a href="/"
                class="mt-8 inline-block bg-[#00ADB5]/10 text-[#00ADB5] px-6 py-2 rounded-lg font-medium hover:bg-[#00ADB5]/20 hover:text-[#00fff0] transition-all duration-300">
                العودة إلى كل النصائح
            </a>
        </div>
    </div>

    <footer class="text-center text-[#E0E0E0]/40 py-8">
        © {{ date('Y') }} Codac.arabe — جميع الحقوق محفوظة.
    </footer>
</body>
</html>
