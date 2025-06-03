@extends('layouts.app')

@section('title', 'التقنيات المتقدمة')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold text-[#00ADB5] mb-6">🧠 تقنيات متقدمة</h1>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($advancedTechniques as $technique)
            <div class="bg-[#2C2C3A] p-6 rounded-xl shadow hover:shadow-[#00ADB5]/20 transition-all">
                <h2 class="text-xl font-bold text-white mb-2">{{ $technique->title }}</h2>
                <p class="text-[#FFFFFF]/70">{{ Str::limit($technique->content, 100) }}</p>
                <a href="{{ route('advanced.show', $technique->id) }}"
                   class="text-[#00ADB5] hover:text-white mt-3 inline-block transition-colors">
                    اقرأ المزيد →
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
