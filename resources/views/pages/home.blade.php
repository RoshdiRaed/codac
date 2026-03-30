@extends('layouts.app')

@section('title', 'Codac | انطلق في رحلتك البرمجية')

@section('content')

    <!-- Hero Section -->
    <section id="start" class="section-padding flex-center" style="min-height: 80vh; position: relative;" data-aos="fade-down">
        <!-- Background Orbs -->
        <div class="bg-blob blob-purple" style="width: 50vw; height: 50vw; opacity: 0.2; top: -10vh; right: -10vw;"></div>
        
        <!-- Floating Dev Icons -->
        <div style="position: absolute; inset: 0; pointer-events: none; z-index: 0; opacity: 0.3;">
            <i class="devicon-javascript-plain text-cyan" style="position: absolute; font-size: 3rem; top: 20%; left: 15%; animation: floating 8s infinite;"></i>
            <i class="devicon-python-plain text-purple" style="position: absolute; font-size: 4rem; top: 30%; right: 20%; animation: floating 12s infinite reverse;"></i>
            <i class="devicon-react-original text-cyan" style="position: absolute; font-size: 3.5rem; bottom: 20%; left: 25%; animation: floating 10s infinite;"></i>
            <i class="devicon-laravel-original text-pink" style="position: absolute; font-size: 4.5rem; bottom: 30%; right: 15%; animation: floating 14s infinite reverse;"></i>
        </div>

        <div class="container" style="text-align: center; position: relative; z-index: 10;">
            <div class="glass-panel" style="padding: 4rem 2rem; border-color: rgba(34, 211, 238, 0.2);">
                <h1 class="heading-xl font-en gradient-text" style="margin-bottom: 1.5rem; text-shadow: var(--shadow-glow);">Codac.arabe</h1>
                <p class="text-lg text-secondary" style="max-width: 600px; margin: 0 auto 2.5rem; line-height: 1.8;">
                    مصدر موثوق لنصائح ودروس البرمجة للمبتدئين والمطورين. انطلق في رحلتك من الصفر وحتى الاحتراف.
                </p>
                <a href="https://www.instagram.com/codac.arabe" target="_blank" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 3rem;">
                    <i class="fa-brands fa-instagram text-xl"></i> تابعنا للبدء 🚀
                </a>
            </div>
        </div>
    </section>

    <!-- Custom HR -->
    <div class="container"><div class="custom-hr"></div></div>

    <!-- Introduction Features -->
    <section class="section-padding" data-aos="fade-up">
        <div class="container text-center">
            <h2 class="heading-lg mb-4">من <span class="gradient-text">إنستقرام</span> إلى منصة تعليمية 🎓</h2>
            <p class="text-lg text-secondary mb-10 max-w-2xl mx-auto">بدأنا بتغيير حياة المئات عبر إنستقرام، والآن نوفر لك بيئة أكاديمية متكاملة بأسلوب حديث ومبسط.</p>
            
            <div class="grid-cols-3">
                <div class="feature-card glass-panel" data-aos="zoom-in" data-aos-delay="0">
                    <div class="feature-icon"><i class="fa-solid fa-bolt"></i></div>
                    <h3 class="text-xl font-bold">نصائح مختصرة</h3>
                    <p class="text-secondary text-sm leading-relaxed">محتوى سريع وسهل الفهم يبقيك دائمًا متقدّمًا وبدون حشو أو تعقيد.</p>
                </div>
                <div class="feature-card glass-panel" data-aos="zoom-in" data-aos-delay="100">
                    <div class="feature-icon"><i class="fa-solid fa-route"></i></div>
                    <h3 class="text-xl font-bold">مسارات واضحة</h3>
                    <p class="text-secondary text-sm leading-relaxed">خُطط تعليمية مدروسة تأخذ بيدك من الأساسيات حتى بناء مشاريع حقيقية.</p>
                </div>
                <div class="feature-card glass-panel" data-aos="zoom-in" data-aos-delay="200">
                    <div class="feature-icon"><i class="fa-solid fa-users"></i></div>
                    <h3 class="text-xl font-bold">مجتمع داعم</h3>
                    <p class="text-secondary text-sm leading-relaxed">تواصل معنا وتعلم ضمن مجتمع عربي شغوف يشاركك نفس الهدف والطموح.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom HR -->
    <div class="container"><div class="custom-hr"></div></div>

    <!-- Daily Tips Section -->
    <section class="section-padding" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-10">
                <h2 class="heading-lg">الجرعة البرمجية <span class="text-cyan text-4xl">💡</span></h2>
                <p class="text-secondary">أحدث النصائح المباشرة من خبرة المطورين</p>
            </div>
            
            <div class="grid-cols-3">
                @foreach($tips->take(3) as $tip)
                <div class="glass-panel" style="padding: 2rem; position: relative;" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    @if($tip->image)
                        <img src="{{ asset('storage/' . $tip->image) }}" class="rounded-t-lg mb-4 object-cover h-32 w-full" style="border-radius: var(--radius-sm); border: 1px solid var(--border-light);">
                    @endif
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <span class="text-cyan font-bold text-sm bg-cyan-900/30 px-3 py-1 rounded-full"><i class="fa-solid fa-hashtag"></i> {{ $tip->category ?? 'عام' }}</span>
                        <span class="text-secondary text-xs">{{ $tip->created_at->diffForHumans() }}</span>
                    </div>
                    <h3 class="text-xl font-bold mb-3 hover:text-cyan transition">{{ $tip->title }}</h3>
                    <p class="text-secondary text-sm leading-relaxed mb-4" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $tip->content }}
                    </p>
                    <button class="btn btn-outline" style="width: 100%; border-radius: var(--radius-sm); padding: 0.5rem;" onclick="alert('تفاصيل النصيحة ستعرض هنا قريباً!')">اقرأ المزيد <i class="fa-solid fa-arrow-left mt-1 ms-2"></i></button>
                </div>
                @endforeach
            </div>
            
            <div class="flex-center mt-10">
                <button class="btn btn-primary" onclick="alert('سيتم فتح جميع النصائح')">تصفح المكتبة الكاملة</button>
            </div>
        </div>
    </section>

    <!-- Custom HR -->
    <div class="container"><div class="custom-hr"></div></div>

    <!-- Dev Tools Section -->
    <section id="tools" class="section-padding" data-aos="fade-up">
        <div class="container">
            <div class="text-center mb-10">
                <h2 class="heading-lg">ترسانة <span class="gradient-text">المطور</span> 🛠️</h2>
                <p class="text-secondary">أدوات نستخدمها يومياً لتسريع وإتقان العمل</p>
            </div>
            
            <div class="grid-cols-4">
                @foreach($tools ?? collect([]) as $tool)
                <a href="{{ $tool->link }}" target="_blank" class="glass-panel" style="padding: 1.5rem; text-align: center;" data-aos="zoom-in">
                    @if($tool->image)
                        <div style="width: 70px; height: 70px; margin: 0 auto 1.5rem; background: rgba(255,255,255,0.05); border-radius: 16px; display: flex; align-items: center; justify-content: center; padding: 10px;">
                            <img src="{{ asset('storage/' . $tool->image) }}" alt="{{ $tool->title }}" style="object-fit: contain;">
                        </div>
                    @else
                        <div class="feature-icon" style="margin: 0 auto 1.5rem; border-radius: 50%;">
                            <i class="fa-solid fa-code"></i>
                        </div>
                    @endif
                    <h3 class="text-lg font-bold mb-2">{{ $tool->title }}</h3>
                    <p class="text-secondary text-sm" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                        {{ $tool->description }}
                    </p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Custom HR -->
    <div class="container"><div class="custom-hr"></div></div>

    <!-- Tracks & Learning -->
    <section id="tracks" class="section-padding" data-aos="fade-up">
        <div class="container">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 class="heading-lg">مسارات <span class="gradient-text">التعلم</span> 🗺️</h2>
                <p class="text-secondary">المعرفة المنظمة هي الطريق الأقصر للاحتراف</p>
            </div>
            
            <div class="grid-cols-3">
                @foreach($tracks ?? collect([]) as $track)
                <div class="glass-panel feature-card" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-2">
                        <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(168, 85, 247, 0.1); color: var(--accent-purple); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                            <i class="{{ $track->icon ?? 'fa-solid fa-route' }}"></i>
                        </div>
                        <h3 class="text-xl font-bold">{{ $track->title }}</h3>
                    </div>
                    <p class="text-secondary text-sm leading-relaxed">{{ $track->description }}</p>
                    <div style="margin-top: auto; padding-top: 1rem; width: 100%;">
                        <a href="#" class="text-purple hover:text-cyan transition flex items-center gap-2 font-bold text-sm">
                            استكشف المسار <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
