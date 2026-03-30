@extends('layouts.admin')

@section('title', 'إدارة المسارات')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="page-title mb-0">المسارات</h1>
        <a href="{{ route('admin.tracks.create') }}" class="action-btn" style="background-color: var(--accent-secondary); color: white;">
            <i class="fa-solid fa-plus ml-2"></i> إضافة مسار جديد
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg" style="background-color: rgba(16, 185, 129, 0.2); border: 1px solid #10B981; color: #10B981;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-6 p-4 rounded-lg" style="background-color: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #ef4444;">
            {{ session('error') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-header">
            <h2>جميع المسارات</h2>
            <div class="header-search">
                <input type="text" placeholder="بحث عن مسار...">
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>أيقونة</th>
                    <th>العنوان</th>
                    <th>التصنيف</th>
                    <th>الوحدات الفرعية</th>
                    <th>تاريخ الإضافة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tracks as $track)
                <tr>
                    <td>
                        <div style="background-color: rgba(14, 165, 233, 0.1); color: var(--accent-primary); width: 40px; height: 40px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem;">
                            <i class="{{ $track->icon ?? 'fa-solid fa-route' }}"></i>
                        </div>
                    </td>
                    <td class="font-medium text-white">{{ $track->title }}</td>
                    <td style="color: var(--text-secondary);">
                        <span style="background-color: rgba(139, 92, 246, 0.1); color: #8B5CF6; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;">
                            {{ $track->category ?? 'عام' }}
                        </span>
                    </td>
                    <td style="color: var(--text-secondary);">{{ $track->subTracks()->count() }} وحدة</td>
                    <td style="color: var(--text-secondary);">{{ $track->created_at->format('Y-m-d') }}</td>
                    <td style="display: flex; gap: 8px;">
                        <a href="{{ route('admin.tracks.edit', $track) }}" class="action-btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        
                        <form action="{{ route('admin.tracks.destroy', $track) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المسار؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 2rem; color: var(--text-muted);">
                        لا توجد مسارات حالياً.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($tracks->hasPages())
        <div style="padding: 1.5rem; border-top: 1px solid var(--border-color);">
            {{ $tracks->links() }}
        </div>
        @endif
    </div>
@endsection
