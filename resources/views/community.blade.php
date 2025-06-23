@php
    use App\Models\Community;
    $communities = Community::latest()->take(4)->get();
@endphp

<!-- Developer Communities Section -->
<section class="py-20 px-6 relative overflow-hidden" data-aos="fade-up" data-aos-duration="800">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 to-transparent"></div>
    <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-10 -left-10 w-40 h-40 rounded-full blur-3xl"></div>

    <div class="max-w-4xl mx-auto text-center relative">
        <h2 class="text-4xl font-extrabold text-[#00ADB5] mb-6">🤝 مجتمعات عربية</h2>
        <p class="text-xl text-[#E0E0E0]/80 mb-12 leading-relaxed">انضم لمجتمعات تدعم المطورين العرب وتشارك الخبرات.</p>

        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($communities as $community)
                <a href="{{ $community->link ?? '#' }}" target="_blank"
                   class="group relative bg-[#2C2C3A]/80 backdrop-blur-xl p-8 rounded-2xl border border-[#00ADB5]/20 hover:border-[#00ADB5]/50 transition-all duration-300 hover:transform hover:-translate-y-1 hover:shadow-xl hover:shadow-[#00ADB5]/10"
                   data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}" data-aos-duration="600">
                    <div class="absolute inset-0 bg-gradient-to-br from-[#00ADB5]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                    <div class="relative z-10">
                        @if ($community->image)
                        <img src="{{ asset('storage/uploads/' . $community->image) }}"
                             alt="{{ $community->name }}"
                             class="w-16 h-16 object-cover rounded-full mx-auto mb-4 border border-[#00ADB5]/40 shadow-sm shadow-[#00ADB5]/10">
                        @else
                            <div class="w-16 h-16 bg-[#00ADB5]/20 rounded-full flex items-center justify-center text-white text-xl font-bold mb-4">
                                {{ mb_substr($community->name, 0, 1) }}
                            </div>
                        @endif

                        <h3 class="text-xl font-bold text-[#E0E0E0] mb-3 group-hover:text-[#00ADB5] transition-colors">
                            {{ $community->name }}
                        </h3>
                        <p class="text-[#E0E0E0]/70">{{ $community->description }}</p>
                    </div>
                </a>
            @endforeach
        </div>

        @if(Community::count() > 4)
            <div class="mt-12">
                <a href="{{ route('communities.index') }}" 
                   class="inline-block px-8 py-3 bg-[#00ADB5] text-white rounded-lg hover:bg-[#00ADB5]/90 transition-colors duration-300">
                    عرض جميع المجتمعات
                </a>
            </div>
        @endif
    </div>
</section>
