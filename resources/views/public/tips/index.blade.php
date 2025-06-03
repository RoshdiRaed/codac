<!-- resources/views/public/tips/index.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نصائح برمجية</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans p-6">

    <h1 class="text-3xl font-bold mb-6 text-center">📚 نصائح برمجية</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($tips as $tip)
        <div class="bg-white rounded-2xl shadow p-4 w-full sm:w-80 transition hover:scale-105 duration-300">
            @if ($tip->image)
                <img src="{{ asset('storage/' . $tip->image) }}" alt="tip image" class="w-full h-40 object-cover rounded-lg mb-3">
            @endif
            <h2 class="text-xl font-bold text-blue-700 mb-1">{{ $tip->title }}</h2>
            <p class="text-sm text-gray-600 mb-2">{{ Str::limit($tip->content, 100) }}</p>
            <a href="#" class="text-blue-500 text-sm hover:underline">اقرأ المزيد →</a>
        </div>
    @endforeach

    </div>

    <div class="mt-8">
        {{ $tips->links() }}
    </div>

</body>
</html>
