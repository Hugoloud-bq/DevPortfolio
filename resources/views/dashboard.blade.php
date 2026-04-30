@extends('layouts.main')

@section('title', 'Кабинет')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-body p-5 text-center">
                <h2 class="mb-4"> Привет, {{ session('user_name') }}!</h2>
                <p class="lead mb-4">Добро пожаловать в личный кабинет</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="/projects" class="btn btn-primary">Мои проекты</a>
                    <a href="/about" class="btn btn-outline-secondary">О себе</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection