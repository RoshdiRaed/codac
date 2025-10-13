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

    {{-- Filament Styles for Rich Text Editor Formatting --}}
    <link rel="stylesheet" href="{{ asset('css/filament/filament/app.css') }}">

    {{-- Highlight.js for Code Syntax Highlighting --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    
    {{-- دعم لغات برمجة إضافية --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/python.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/sql.min.js"></script>

    <style>
        body {
            font-family: 'Almarai', sans-serif;
        }

        /* RTL Support for Content */
        .content-rtl {
            direction: rtl;
            text-align: right;
        }

        /* Code Block Styling */
        pre {
            direction: ltr !important;
            text-align: left !important;
            border-radius: 12px;
            padding: 1.5rem;
            margin: 1.5rem 0;
            overflow-x: auto;
            background: #282c34 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3), 0 2px 4px -1px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        pre code {
            direction: ltr !important;
            font-family: 'Courier New', Courier, monospace;
            font-size: 0.95rem;
            line-height: 1.6;
            display: block;
            padding: 0;
        }

        /* زر نسخ الكود */
        .copy-button {
            position: absolute;
            top: 0.75rem;
            left: 0.75rem;
            background: #00ADB5;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.875rem;
            font-family: 'Almarai', sans-serif;
            transition: all 0.3s ease;
            opacity: 0;
            z-index: 10;
        }

        pre:hover .copy-button {
            opacity: 1;
        }

        .copy-button:hover {
            background: #009299;
            transform: scale(1.05);
        }

        .copy-button.copied {
            background: #4ade80;
        }

        /* Inline code */
        p code, li code, h1 code, h2 code, h3 code {
            background: #222831;
            color: #00ADB5;
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-size: 0.9em;
            font-family: 'Courier New', Courier, monospace;
            direction: ltr;
            display: inline-block;
        }

        /* تحسين عرض القوائم */
        .content-rtl ul, .content-rtl ol {
            padding-right: 2rem;
            padding-left: 0;
        }

        .content-rtl li {
            margin-bottom: 0.5rem;
        }

        /* تحسين عرض العناوين */
        .content-rtl h2 {
            color: #00ADB5;
            font-size: 1.875rem;
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .content-rtl h3 {
            color: #00ADB5;
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }

        /* تحسين عرض الفقرات */
        .content-rtl p {
            margin-bottom: 1rem;
            line-height: 1.8;
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

        /* تحسين Scrollbar */
        pre::-webkit-scrollbar {
            height: 8px;
        }

        pre::-webkit-scrollbar-track {
            background: #1e2228;
            border-radius: 10px;
        }

        pre::-webkit-scrollbar-thumb {
            background: #00ADB5;
            border-radius: 10px;
        }

        pre::-webkit-scrollbar-thumb:hover {
            background: #009299;
        }
    </style>
</head>

<body class="bg-[#222831] text-white min-h-screen">
    <div class="py-20 px-6 max-w-7xl mx-auto">
        <div class="bg-[#393E46] p-8 rounded-2xl border border-[#00ADB5]/30 shadow-2xl animate-fade-in-up">
            <h1 class="text-4xl font-bold text-white mb-6 flex items-center gap-3">
                {{ $technique->title }}
            </h1>

            <div class="flex flex-wrap gap-4 mb-6">
                <span class="bg-[#00ADB5] text-white px-4 py-2 rounded-lg text-sm font-semibold">
                    🎯 {{ $technique->level }}
                </span>
            </div>

            <div class="text-white prose prose-invert max-w-none leading-relaxed content-rtl">
                <div class="prose-lg prose-headings:text-[#00ADB5] prose-p:text-white prose-strong:text-[#00ADB5] prose-em:text-[#00ADB5] prose-ul:text-white prose-ol:text-white prose-li:marker:text-[#00ADB5] prose-a:text-[#00ADB5] hover:prose-a:text-white prose-code:text-[#00ADB5] prose-code:bg-[#222831] prose-code:px-2 prose-code:py-1 prose-code:rounded prose-pre:bg-[#222831] prose-pre:border prose-pre:border-[#00ADB5]/30 max-w-none">
                    {!! $technique->content !!}
                </div>
            </div>

            <a href="/"
                class="mt-8 inline-block bg-[#00ADB5] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#00ADB5]/80 transition-all duration-300 hover:scale-105">
                العودة إلى الصفحة الرئيسية
            </a>
        </div>
    </div>

    <footer class="text-center text-white/60 py-8">
        © {{ date('Y') }} Codac.arabe — جميع الحقوق محفوظة.
    </footer>

    {{-- Filament Scripts --}}
    <script src="{{ asset('js/filament/filament/app.js') }}"></script>

    {{-- Initialize Highlight.js --}}
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            // إعداد Highlight.js
            hljs.configure({
                languages: ['php', 'javascript', 'python', 'css', 'html', 'sql', 'bash', 'json', 'xml'],
                ignoreUnescapedHTML: true
            });

            // تطبيق التلوين على جميع أكواد البرمجة
            document.querySelectorAll('pre code').forEach((block) => {
                // إضافة زر النسخ
                const button = document.createElement('button');
                button.className = 'copy-button';
                button.textContent = 'نسخ';
                button.onclick = function() {
                    const code = block.textContent;
                    navigator.clipboard.writeText(code).then(() => {
                        button.textContent = 'تم النسخ ✓';
                        button.classList.add('copied');
                        setTimeout(() => {
                            button.textContent = 'نسخ';
                            button.classList.remove('copied');
                        }, 2000);
                    });
                };
                block.parentElement.appendChild(button);

                // تطبيق التلوين
                hljs.highlightElement(block);
            });

            // التعامل مع الأكواد التي تأتي بدون تحديد اللغة
            document.querySelectorAll('pre code:not([class])').forEach((block) => {
                hljs.highlightElement(block);
            });
        });
    </script>
</body>
</html>