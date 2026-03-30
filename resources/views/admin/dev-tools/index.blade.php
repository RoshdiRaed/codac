@extends('layouts.admin')

@section('title', 'إدارة أدوات المطورين')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="page-title mb-0">أدوات المطورين</h1>
        <a href="{{ route('admin.dev-tools.create') }}" class="action-btn" style="background-color: var(--accent-secondary); color: white;">
            <i class="fa-solid fa-plus ml-2"></i> إضافة أداة جديدة
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg" style="background-color: rgba(16, 185, 129, 0.2); border: 1px solid #10B981; color: #10B981;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-header">
            <h2>جميع الأدوات</h2>
            <div class="header-search">
                <input type="text" placeholder="بحث عن أداة...">
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>الترتيب</th>
                    <th>أيقونة</th>
                    <th>الاسم</th>
                    <th>الرابط</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($devTools as $tool)
                <tr>
                    <td class="text-muted">{{ $tool->order }}</td>
                    <td>
                        @if($tool->image)
                            <img src="{{ asset('storage/' . $tool->image) }}" alt="{{ $tool->title }}" style="width: 40px; height: 40px; object-fit: contain; background: white; border-radius: 8px; padding: 2px;">
                        @else
                            <div style="width: 40px; height: 40px; background-color: rgba(255,255,255,0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                                <i class="fa-solid fa-tools"></i>
                            </div>
                        @endif
                    </td>
                    <td class="font-medium text-white">{{ $tool->title }}</td>
                    <td style="color: var(--text-secondary);">
                        @if($tool->link)
                            <a href="{{ $tool->link }}" target="_blank" class="text-blue-400 hover:underline">زيارة الرابط</a>
                        @else
                            <span class="text-muted">لا يوجد</span>
                        @endif
                    </td>
                    <td style="display: flex; gap: 8px;">
                        <a href="{{ route('admin.dev-tools.edit', $tool) }}" class="action-btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        
                        <form action="{{ route('admin.dev-tools.destroy', $tool) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الأداة؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 2rem; color: var(--text-muted);">
                        لا توجد أدوات حالياً.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($devTools->hasPages())
        <div style="padding: 1.5rem; border-top: 1px solid var(--border-color);">
            {{ $devTools->links() }}
        </div>
        @endif
    </div>
@endsection
