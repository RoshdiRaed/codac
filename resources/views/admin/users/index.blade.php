@extends('layouts.admin')

@section('title', 'إدارة المستخدمين')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="page-title mb-0">المستخدمين</h1>
        <a href="{{ route('admin.users.create') }}" class="action-btn" style="background-color: var(--accent-secondary); color: white;">
            <i class="fa-solid fa-plus ml-2"></i> إضافة مستخدم جديد
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg" style="background-color: rgba(16, 185, 129, 0.2); border: 1px solid #10B981; color: #10B981;">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <div class="table-header">
            <h2>جميع المستخدمين</h2>
            <div class="header-search">
                <input type="text" placeholder="بحث عن مستخدم..." id="userSearch">
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الدور</th>
                    <th>تاريخ التسجيل</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td class="text-muted">{{ $user->id }}</td>
                    <td class="font-medium text-white">{{ $user->name }}</td>
                    <td style="color: var(--text-secondary);">{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span style="background-color: rgba(14, 165, 233, 0.2); color: var(--accent-primary); padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;">
                                {{ $role->name }}
                            </span>
                        @endforeach
                    </td>
                    <td style="color: var(--text-secondary);">{{ $user->created_at->format('Y-m-d') }}</td>
                    <td style="display: flex; gap: 8px;">
                        <a href="{{ route('admin.users.edit', $user) }}" class="action-btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 2rem; color: var(--text-muted);">
                        لا يوجد مستخدمين حالياً.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        @if($users->hasPages())
        <div style="padding: 1.5rem; border-top: 1px solid var(--border-color);">
            {{ $users->links() }}
        </div>
        @endif
    </div>
@endsection
