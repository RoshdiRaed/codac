@extends('layouts.admin')

@section('title', 'إدارة النصائح')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="page-title mb-0">النصائح (Tips)</h1>
        <a href="{{ route('admin.tips.create') }}" class="action-btn" style="background-color: var(--accent-secondary); color: white;">
            <i class="fa-solid fa-plus ml-2"></i> إضافة نصيحة جديدة
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg" style="background-color: rgba(16, 185, 129, 0.2); border: 1px solid #10B981; color: #10B981;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-header">
            <h2>جميع النصائح</h2>
            <div class="header-search">
                <input type="text" placeholder="بحث عن نصيحة...">
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>صورة</th>
                    <th>العنوان</th>
                    <th>التصنيف</th>
                    <th>المستوى</th>
                    <th>تاريخ الإضافة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tips as $tip)
                <tr>
                    <td>
                        @if($tip->image)
                            <img src="{{ asset('storage/' . $tip->image) }}" alt="{{ $tip->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                        @else
                            <div style="width: 50px; height: 50px; background-color: rgba(255,255,255,0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--text-muted);">
                                <i class="fa-solid fa-image"></i>
                            </div>
                        @endif
                    </td>
                    <td class="font-medium text-white">{{ $tip->title }}</td>
                    <td style="color: var(--text-secondary);">
                        <span style="background-color: rgba(14, 165, 233, 0.1); color: var(--accent-primary); padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;">
                            {{ $tip->category ?? 'عام' }}
                        </span>
                    </td>
                    <td style="color: var(--text-secondary);">{{ $tip->level ?? 'مبتدئ' }}</td>
                    <td style="color: var(--text-secondary);">{{ $tip->created_at->format('Y-m-d') }}</td>
                    <td style="display: flex; gap: 8px;">
                        <a href="{{ route('admin.tips.edit', $tip) }}" class="action-btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        
                        <form action="{{ route('admin.tips.destroy', $tip) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه النصيحة؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 2rem; color: var(--text-muted);">
                        لا توجد نصائح حالياً.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($tips->hasPages())
        <div style="padding: 1.5rem; border-top: 1px solid var(--border-color);">
            {{ $tips->links() }}
        </div>
        @endif
    </div>
@endsection
