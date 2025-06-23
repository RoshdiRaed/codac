@php
    use App\Models\Community;
    $communities = Community::latest()->paginate(12);
@endphp

<!DOCTYPE html>
<html lang="ar" dir="rtl" class="bg-[#222831] text-white">
<head>
    <meta charset="UTF-8">
    <title>المجتمعات العربية للمطورين</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('image/logo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/filament/filament/app.css') }}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans">

    <section class="py-20 px-6 relative overflow-hidden">
        <!-- خلفيات زخرفية -->
        <div class="absolute -top-20 -right-20 w-60 h-60 rounded-full bg-[#00ADB5]/20 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-60 h-60 rounded-full bg-[#00ADB5]/20 blur-3xl"></div>

        <div class="max-w-7xl mx-auto text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-[#00ADB5] mb-4">🤝 مجتمعات عربية</h1>
            <p class="text-lg md:text-xl text-[#E0E0E0]/80 mb-12 leading-relaxed">
                استكشف أبرز المجتمعات العربية التي تجمع المطورين والمبرمجين في مكان واحد.
            </p>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($communities as $community)
                    <a href="{{ $community->link ?? '#' }}" target="_blank"
                       class="group relative p-6 bg-[#2C2C3A]/80 rounded-2xl border border-[#00ADB5]/20
                              hover:border-[#00ADB5]/40 hover:shadow-xl hover:shadow-[#00ADB5]/10
                              transition duration-300 backdrop-blur-xl">

                        <div class="flex flex-col items-center text-center z-10 relative">
                            @if ($community->image)
                                <img src="{{ asset('storage/uploads/' . $community->image) }}"
                                     alt="{{ $community->name }}"
                                     class="w-16 h-16 mb-4 rounded-full object-cover border border-[#00ADB5]/40 shadow-md shadow-[#00ADB5]/10">
                            @else
                                <div class="w-16 h-16 mb-4 rounded-full bg-[#00ADB5]/30 flex items-center justify-center text-white text-2xl font-bold">
                                    {{ mb_substr($community->name, 0, 1) }}
                                </div>
                            @endif

                            <h3 class="text-xl font-semibold text-[#E0E0E0] group-hover:text-[#00ADB5] transition-colors mb-2">
                                {{ $community->name }}
                            </h3>

                            <p class="text-sm text-[#E0E0E0]/70 leading-relaxed line-clamp-3">
                                {{ $community->description }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="flex justify-center mt-16 space-x-4 rtl:space-x-reverse">
                <a href="/" class="inline-flex items-center px-6 py-3 bg-[#00ADB5] text-white rounded-lg hover:bg-[#00ADB5]/80 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    العودة للرئيسية
                </a>
            </div>

            <!-- ترقيم الصفحات -->
            <div class="mt-12">
                {{ $communities->links() }}
            </div>
        </div>
    </section>

</body>
</html>
