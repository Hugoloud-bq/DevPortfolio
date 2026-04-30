@extends('layouts.main')

@section('title', 'Главная')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 text-center">
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <h1 class="display-4 mb-4">
        <i class="fas fa-laptop-code me-3"></i>DevPortfolio
        </h1>
        <p class="lead mb-4">Личный дневник практики и портфолио разработчика</p>
        
        @if(session('user_id'))
            <div class="mt-4">
                <p class="text-muted mb-3">Добро пожаловать, {{ session('user_name') }}! 👋</p>
                <a href="/projects" class="btn btn-primary btn-lg px-5">Мои проекты</a>
            </div>
            
            @php
                $stats = App\Http\Controllers\ProjectController::getStats();
            @endphp
            
            @include('components.stats')
            
        @else
            <div class="d-flex justify-content-center gap-3">
                <a href="/login" class="btn btn-primary px-4">Войти</a>
                <a href="/register" class="btn btn-outline-primary px-4">Регистрация</a>
            </div>
        @endif
    </div>
</div>
@endsection