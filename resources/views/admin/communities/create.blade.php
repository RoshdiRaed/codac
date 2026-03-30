@extends('layouts.admin')

@section('title', 'إضافة مجتمع جديد')

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
        <a href="{{ route('admin.communities.index') }}" style="color: var(--text-muted); font-size: 1.5rem;"><i class="fa-solid fa-arrow-right"></i></a>
        <h1 class="page-title mb-0">إضافة مجتمع جديد</h1>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.communities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">اسم المجتمع</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="image" class="form-label">شعار / صورة المجتمع</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="link" class="form-label">الرابط (رابط الديسكورد، تليجرام، الخ)</label>
                <input type="url" id="link" name="link" class="form-control" value="{{ old('link') }}" placeholder="https://...">
                @error('link')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">وصف المجتمع</label>
                <textarea id="description" name="description" class="form-control" rows="6" required>{{ old('description') }}</textarea>
                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div style="margin-top: 2rem; text-align: left;">
                <button type="submit" class="btn-submit">حفظ المجتمع</button>
            </div>
        </form>
    </div>
@endsection
