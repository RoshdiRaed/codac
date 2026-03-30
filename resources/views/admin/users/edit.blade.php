@extends('layouts.admin')

@section('title', 'تعديل المستخدم')

@push('styles')
<style>
    .form-container {
        background-color: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: var(--shadow-md);
        max-width: 800px;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--text-secondary);
    }
    
    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        background-color: rgba(0, 0, 0, 0.2);
        border: 1px solid var(--border-color);
        border-radius: 8px;
        color: var(--text-primary);
        font-family: inherit;
        transition: all 0.2s;
    }
    
    .form-control:focus {
        outline: none;
        border-color: var(--accent-primary);
        box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
    }
    
    .text-danger {
        color: #ef4444;
        font-size: 0.75rem;
        margin-top: 0.5rem;
        display: block;
    }

    .btn-submit {
        background-color: var(--accent-primary);
        color: white;
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-submit:hover {
        background-color: var(--accent-hover);
        box-shadow: var(--shadow-glow);
    }
</style>
@endpush

@section('content')
    <div class="flex items-center mb-6" style="gap: 15px;">
        <a href="{{ route('admin.users.index') }}" style="color: var(--text-muted); font-size: 1.5rem;"><i class="fa-solid fa-arrow-right"></i></a>
        <h1 class="page-title mb-0">تعديل المستخدم: {{ $user->name }}</h1>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name" class="form-label">الاسم الكامل</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">كلمة المرور (اتركها فارغة إذا لم ترد التغيير)</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <label for="role" class="form-label">الدور (الصلاحيات)</label>
                <select id="role" name="role" class="form-control">
                    <option value="">مستخدم عادي</option>
                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                        <option value="{{ $role->name }}" {{ (old('role') ?? ($user->roles->first()->name ?? '')) == $role->name ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
                @error('role')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div style="margin-top: 2rem; text-align: left;">
                <button type="submit" class="btn-submit">حفظ التغييرات</button>
            </div>
        </form>
    </div>
@endsection
