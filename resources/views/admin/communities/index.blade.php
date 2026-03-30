@extends('layouts.admin')

@section('title', 'إدارة المجتمعات')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="page-title mb-0">المجتمعات</h1>
        <a href="{{ route('admin.communities.create') }}" class="action-btn" style="background-color: var(--accent-secondary); color: white;">
            <i class="fa-solid fa-plus ml-2"></i> إضافة مجتمع جديد
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg" style="background-color: rgba(16, 185, 129, 0.2); border: 1px solid #10B981; color: #10B981;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-header">
            <h2>جميع المجتمعات</h2>
            <div class="header-search">
                <input type="text" placeholder="بحث عن مجتمع...">
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>شعار</th>
                    <th>الاسم</th>
                    <th>الرابط</th>
                    <th>تاريخ الإضافة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($communities as $community)
                <tr>
                    <td>
                        @if($community->image)
                            <img src="{{ asset('storage/' . $community->image) }}" alt="{{ $community->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                        @else
                            <div style="width: 50px; height: 50px; background-color: rgba(255,255,255,0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        @endif
                    </td>
                    <td class="font-medium text-white">{{ $community->name }}</td>
                    <td style="color: var(--text-secondary);">
                        @if($community->link)
                            <a href="{{ $community->link }}" target="_blank" class="text-blue-400 hover:underline">زيارة الرابط</a>
                        @else
                            <span class="text-muted">لا يوجد</span>
                        @endif
                    </td>
                    <td style="color: var(--text-secondary);">{{ $community->created_at->format('Y-m-d') }}</td>
                    <td style="display: flex; gap: 8px;">
                        <a href="{{ route('admin.communities.edit', $community) }}" class="action-btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        
                        <form action="{{ route('admin.communities.destroy', $community) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المجتمع؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 2rem; color: var(--text-muted);">
                        لا توجد مجتمعات حالياً.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($communities->hasPages())
        <div style="padding: 1.5rem; border-top: 1px solid var(--border-color);">
            {{ $communities->links() }}
        </div>
        @endif
    </div>
@endsection
