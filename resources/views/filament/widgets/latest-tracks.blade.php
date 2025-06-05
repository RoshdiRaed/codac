<x-filament::card class="bg-[#2c2f3f]/80 backdrop-blur-md border border-[#00ADB5]/20 shadow-xl rounded-2xl p-6 max-w-2xl mx-auto ">
    <section class="font-['Almarai']">
        <h3 class="text-2xl font-bold mb-8 text-[#00ADB5] flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
            أحدث المسارات
        </h3>
        <ul class="space-y-4">
            @foreach($this->tracks() as $track)
                <li class="border-b border-[#00ADB5]/10 pb-4 hover:bg-[#1a1a2e]/50 transition-all duration-300 rounded-lg p-4 group">
                    <div class="flex justify-between items-center">
                        <a href="{{ route('track.show', $track->id) }}"
                           class="text-lg font-semibold text-[#F5F5F5] group-hover:text-[#00fff0] transition-colors duration-200">
                            {{ $track->title }}
                        </a>
                        <span class="text-sm text-[#E0E0E0]/80 bg-[#00ADB5]/10 px-4 py-1 rounded-full group-hover:bg-[#00ADB5]/20 transition-colors duration-200">
                            {{ $track->created_at->diffForHumans() }}
                        </span>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</x-filament::card>
