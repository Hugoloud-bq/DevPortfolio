@extends('layouts.main')

@section('title', 'О себе')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
            <div class="card-header text-center py-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <h2 class="mb-0 text-white fw-bold"><i class="fas fa-user-circle me-2"></i>О себе</h2>
            </div>
            <div class="card-body p-4">
                
                <div class="text-center mb-4">
                    <a href="/about/edit" class="btn btn-outline-primary btn-sm mb-3">
                        <i class="fas fa-edit me-1"></i>Редактировать профиль
                    </a>
                </div>

                @if($about->avatar)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/' . $about->avatar) }}" class="rounded-circle shadow" style="width: 130px; height: 130px; object-fit: cover; border: 3px solid #fff;">
                    </div>
                @else
                    <div class="text-center mb-3 display-1 text-primary">
                        <i class="fas fa-user-circle"></i>
                    </div>
                @endif

                <div class="info-card p-3 rounded-3 mb-3" style="background: rgba(102, 126, 234, 0.05);">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-user fa-fw text-primary me-2"></i>
                                <div><strong>Имя:</strong> {{ $about->name ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-users fa-fw text-info me-2"></i>
                                <div><strong>Группа:</strong> {{ $about->group ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-graduation-cap fa-fw text-success me-2"></i>
                                <div><strong>Курс:</strong> {{ $about->course ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-code fa-fw text-warning me-2"></i>
                                <div><strong>Специальность:</strong> {{ $about->specialty ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-university fa-fw text-secondary me-2"></i>
                                <div><strong>Учебное заведение:</strong> {{ $about->university ?? '—' }}</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-envelope fa-fw text-danger me-2"></i>
                                <div><strong>Email:</strong> {{ $about->email ?? '—' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

@if($about->github)
    <a href="{{ $about->github }}" target="_blank" class="btn btn-dark btn-sm"><i class="fab fa-github me-1"></i> GitHub</a>
@endif
@if($about->telegram)
    <a href="https://t.me/{{ ltrim($about->telegram, '@') }}" target="_blank" class="btn btn-primary btn-sm"><i class="fab fa-telegram me-1"></i> Telegram</a>
@endif
@if($about->vk)
    <a href="{{ $about->vk }}" target="_blank" class="btn btn-info btn-sm text-white"><i class="fab fa-vk me-1"></i> VK</a>
@endif
@if($about->youtube)
    <a href="{{ $about->youtube }}" target="_blank" class="btn btn-danger btn-sm"><i class="fab fa-youtube me-1"></i> YouTube</a>
@endif
@if($about->discord)
    <a href="{{ $about->discord }}" target="_blank" class="btn btn-secondary btn-sm" style="background: #5865F2;"><i class="fab fa-discord me-1"></i> Discord</a>
@endif
@if($about->website)
    <a href="{{ $about->website }}" target="_blank" class="btn btn-secondary btn-sm"><i class="fas fa-globe me-1"></i> Сайт</a>
@endif

                @if($about->skills)
                <div class="info-card p-3 rounded-3" style="background: rgba(102, 126, 234, 0.05);">
                    <label class="fw-bold mb-2"><i class="fas fa-microchip me-2"></i>Стек технологий:</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($about->skills as $skill)
                            <span class="badge bg-primary p-2">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="text-center mt-4">
                    <a href="/" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>На главную</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection