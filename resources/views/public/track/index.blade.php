<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codac | انطلق في رحلتك البرمجية</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Almarai', system-ui, -apple-system, sans-serif;
        }

        .modal-enter {
            opacity: 0;
            transform: scale(0.95);
        }

        .modal-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: opacity 300ms ease-in-out, transform 300ms ease-in-out;
        }

        .modal-exit {
            opacity: 1;
            transform: scale(1);
        }

        .modal-exit-active {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 300ms ease-in-out, transform 300ms ease-in-out;
        }

        .backdrop-enter {
            opacity: 0;
        }

        .backdrop-enter-active {
            opacity: 1;
            transition: opacity 300ms ease-in-out;
        }

        .backdrop-exit {
            opacity: 1;
        }

        .backdrop-exit-active {
            opacity: 0;
            transition: opacity 300ms ease-in-out;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#0F0F1E] to-[#1a1a2e] text-[#F5F5F5] min-h-screen">
    @if ($track->subTracks->isEmpty())
        <div class="flex items-center justify-center min-h-screen">
            <div class="text-center">
                <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-[#00ADB5] mx-auto mb-6">
                </div>
                <h2 class="text-2xl font-bold text-[#F5F5F5] mb-3">لا توجد مقالات حتى الآن</h2>
                <p class="text-[#E0E0E0]/80 leading-relaxed">نحن نعمل على إضافة المزيد من المحتوى قريبًا. تابعنا للحصول
                    على التحديثات!</p>
                <a href="{{ url()->previous() }}"
                    class="mt-6 inline-block bg-[#00ADB5]/10 text-[#00ADB5] px-6 py-2 rounded-lg font-medium hover:bg-[#00ADB5]/20 hover:text-[#00fff0] transition-all duration-300">
                    العودة
                </a>
            </div>
        </div>
    @else
        <section class="py-20 px-6 max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($track->subTracks as $sub)
                <!-- البطاقة -->
                <div
                    class="bg-[#2c2f3f]/80 backdrop-blur-md p-6 rounded-2xl border border-[#00ADB5]/20 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="text-4xl mb-4 text-[#00ADB5]">{{ $sub->icon }}</div>
                    <h3 class="text-2xl font-bold mb-3 text-[#F5F5F5]">{{ $sub->title }}</h3>
                    <p class="text-[#E0E0E0]/80 mb-6 leading-relaxed">{{ $sub->description }}</p>
                    <button onclick="openModal({{ $sub->id }})"
                        class="relative bg-[#00ADB5]/10 text-[#00ADB5] px-6 py-2 rounded-lg font-medium hover:bg-[#00ADB5]/20 hover:text-[#00fff0] transition-all duration-300 group">
                        <span class="relative z-10">عرض التفاصيل</span>
                        <span
                            class="absolute inset-0 bg-gradient-to-r from-[#00ADB5]/0 to-[#00ADB5]/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </button>
                </div>

                <!-- المودال -->
                <div id="modal-{{ $sub->id }}"
                    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center transition-opacity duration-300"
                    data-modal>
                    <div
                        class="bg-[#1a1a2e]/95 backdrop-blur-md w-[95%] sm:w-[80%] md:w-[60%] max-w-3xl p-8 rounded-2xl relative max-h-[90vh] overflow-y-auto border border-[#00ADB5]/20 shadow-2xl modal-content">
                        <button onclick="closeModal({{ $sub->id }})"
                            class="absolute top-4 left-4 text-2xl text-[#E0E0E0] hover:text-red-400 transition-colors duration-200">
                            ×
                        </button>
                        <h2 class="text-3xl font-bold text-[#00ADB5] mb-6 flex items-center gap-3">
                            <span>{{ $sub->icon }}</span>
                            <span>{{ $sub->title }}</span>
                        </h2>
                        <div class="text-[#E0E0E0] prose prose-invert max-w-none leading-relaxed">
                            {!! $sub->content !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    @endif

    @if (!$track->subTracks->isEmpty())
        <div class="fixed bottom-8 left-1/2 transform -translate-x-1/2">
            <a href="/"
                class="bg-[#00ADB5]/10 text-[#00ADB5] px-8 py-3 rounded-lg font-medium hover:bg-[#00ADB5]/20 hover:text-[#00fff0] transition-all duration-300 shadow-lg">
                العودة
            </a>
        </div>
    @endif

    <script>
        function openModal(id) {
            const modal = document.getElementById(`modal-${id}`);
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                const content = modal.querySelector('.modal-content');
                content.classList.add('modal-enter');
                setTimeout(() => {
                    content.classList.remove('modal-enter');
                    content.classList.add('modal-enter-active');
                }, 10);
            }
        }

        function closeModal(id) {
            const modal = document.getElementById(`modal-${id}`);
            if (modal) {
                const content = modal.querySelector('.modal-content');
                content.classList.remove('modal-enter-active');
                content.classList.add('modal-exit');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    content.classList.remove('modal-exit');
                }, 300);
            }
        }

        // إغلاق عند الضغط خارج النافذة
        document.addEventListener('click', function(e) {
            if (e.target.hasAttribute('data-modal')) {
                const modal = e.target;
                const content = modal.querySelector('.modal-content');
                content.classList.remove('modal-enter-active');
                content.classList.add('modal-exit');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    content.classList.remove('modal-exit');
                }, 300);
            }
        });
    </script>
</body>

</html>
