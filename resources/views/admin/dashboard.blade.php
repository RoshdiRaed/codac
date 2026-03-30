@extends('layouts.admin')

@section('title', 'لوحة القيادة')

@section('content')
    <div class="page-title">نظرة عامة على النظام</div>

    <!-- Stats Grid -->
    <div class="card-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="stat-details mr-4">
                <h3>إجمالي المستخدمين</h3>
                <div class="amount">{{ \App\Models\User::count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: rgba(16, 185, 129, 0.1); color: #10B981;">
                <i class="fa-solid fa-lightbulb"></i>
            </div>
            <div class="stat-details mr-4">
                <h3>إجمالي النصائح</h3>
                <div class="amount">{{ \App\Models\Tip::count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: rgba(245, 158, 11, 0.1); color: #F59E0B;">
                <i class="fa-solid fa-route"></i>
            </div>
            <div class="stat-details mr-4">
                <h3>المسارات</h3>
                <div class="amount">{{ \App\Models\Track::count() }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon" style="background-color: rgba(139, 92, 246, 0.1); color: #8B5CF6;">
                <i class="fa-brands fa-github"></i>
            </div>
            <div class="stat-details mr-4">
                <h3>المشاريع المجتمعية</h3>
                <div class="amount">{{ \App\Models\OpenSourceProject::count() }}</div>
            </div>
        </div>
    </div>

    <!-- Quick Actions / Recent Activity Table Example -->
    <div class="table-container mt-8">
        <div class="table-header">
            <h2>أحدث المستخدمين المسجلين</h2>
            <button class="action-btn btn-edit">عرض الكل</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>تاريخ التسجيل</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\User::latest()->take(5)->get() as $user)
                <tr>
                    <td class="font-medium text-white">{{ $user->name }}</td>
                    <td class="text-gray-400">{{ $user->email }}</td>
                    <td class="text-gray-400">{{ $user->created_at->format('Y-m-d') }}</td>
                    <td>
                        <button class="action-btn btn-edit"><i class="fa-solid fa-pen"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
