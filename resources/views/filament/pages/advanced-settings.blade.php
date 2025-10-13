<x-filament::page>
    <!-- Page Header -->
    <div class="mb-6">
        <h2 class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">
            إعدادات متقدمة
        </h2>
        <p class="mt-2 text-sm text-gray-400">
            تخصيص الإعدادات المتقدمة لتحسين تجربة المستخدم
        </p>
    </div>

    <!-- Card Container -->
    <div
        class="p-6 bg-gradient-to-br from-gray-800 to-gray-900 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
        <!-- Visitor Count -->
        <div class="flex items-center justify-between">
            <p class="text-lg font-medium text-gray-200">
                عدد الزوّار:
                <strong class="text-xl text-indigo-400 font-bold">
                    {{ $this->getVisitorCount() }}
                </strong>
            </p>
            <div class="text-gray-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a2 2 0 00-2-2h-3m-4 4H3v-2a2 2 0 012-2h3m4-6a4 4 0 100-8 4 4 0 000 8z"></path>
                </svg>
            </div>
        </div>

        <!-- Additional Info (Optional) -->
        <div class="mt-4 text-sm text-gray-500">
            آخر تحديث: {{ now()->format('d M Y, h:i A') }}
        </div>
    </div>

</x-filament::page>
