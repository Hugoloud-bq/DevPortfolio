@extends('layouts.main')

@section('title', 'Редактировать профиль')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4><i class="fas fa-edit me-2"></i>Редактировать профиль</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('about.update') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Имя</label>
                            <input type="text" name="name" class="form-control" value="{{ $about->name }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Группа</label>
                            <input type="text" name="group" class="form-control" value="{{ $about->group }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Курс</label>
                            <input type="number" name="course" class="form-control" value="{{ $about->course }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Специальность</label>
                            <input type="text" name="specialty" class="form-control" value="{{ $about->specialty }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Учебное заведение</label>
                            <input type="text" name="university" class="form-control" value="{{ $about->university }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $about->email }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">GitHub</label>
                            <input type="url" name="github" class="form-control" value="{{ $about->github }}" placeholder="https://github.com/username">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telegram</label>
                            <input type="text" name="telegram" class="form-control" value="{{ $about->telegram }}" placeholder="@username">
                        </div>
                    </div>

                    <div class="row">
    <div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">ВКонтакте (VK)</label>
        <input type="url" name="vk" class="form-control" value="{{ $about->vk }}" placeholder="https://vk.com/username">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">YouTube</label>
        <input type="url" name="youtube" class="form-control" value="{{ $about->youtube }}" placeholder="https://youtube.com/@username">
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Discord</label>
        <input type="url" name="discord" class="form-control" value="{{ $about->discord }}" placeholder="https://discord.gg/invite">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Сайт/Портфолио</label>
        <input type="url" name="website" class="form-control" value="{{ $about->website }}" placeholder="https://example.com">
    </div>
</div>

                    <div class="mb-3">
                        <label class="form-label">Стек технологий (через запятую)</label>
                        <textarea name="skills" class="form-control" rows="2" placeholder="PHP, Laravel, SQL, Bootstrap">@if($about->skills){{ implode(', ', $about->skills) }}@endif</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Аватар</label>
                        <input type="file" name="avatar" class="form-control">
                        @if($about->avatar)
                            <small class="text-muted">Текущий: <a href="{{ asset('storage/' . $about->avatar) }}" target="_blank">Фото</a></small>
                        @endif
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">💾 Сохранить</button>
                        <a href="/about" class="btn btn-secondary">❌ Отмена</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection