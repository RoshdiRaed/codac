@extends('layouts.admin')

@section('title', 'إضافة أداة جديدة')

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
        <a href="{{ route('admin.dev-tools.index') }}" style="color: var(--text-muted); font-size: 1.5rem;"><i class="fa-solid fa-arrow-right"></i></a>
        <h1 class="page-title mb-0">إضافة أداة جديدة</h1>
    </div>

    <div class="form-container">
        <form action="{{ route('admin.dev-tools.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title" class="form-label">اسم الأداة</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="image" class="form-label">أيقونة / صورة الأداة</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="link" class="form-label">الرابط المباشر للموقع</label>
                <input type="url" id="link" name="link" class="form-control" value="{{ old('link') }}" placeholder="https://...">
                @error('link')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            
            <div class="form-group">
                <label for="order" class="form-label">ترتيب العرض (0 هو الأعلى)</label>
                <input type="number" id="order" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
                @error('order')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label for="description" class="form-label">وصف الأداة</label>
                <textarea id="description" name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
            </div>

            <div style="margin-top: 2rem; text-align: left;">
                <button type="submit" class="btn-submit">حفظ الأداة</button>
            </div>
        </form>
    </div>
@endsection
