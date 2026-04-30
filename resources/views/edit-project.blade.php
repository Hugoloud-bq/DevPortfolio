@extends('layouts.main')

@section('title', 'Редактировать проект')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Редактировать: {{ $project->title }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('projects.update', $project->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Название *</label>
                            <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Предмет *</label>
                            <input type="text" name="subject" class="form-control" value="{{ $project->subject }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <textarea name="description" class="form-control" rows="3">{{ $project->description }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Дата начала</label>
                            <input type="date" name="start_date" class="form-control" value="{{ $project->start_date }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Дата сдачи</label>
                            <input type="date" name="end_date" class="form-control" value="{{ $project->end_date }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Часов затрачено</label>
                            <input type="number" name="hours_spent" class="form-control" value="{{ $project->hours_spent }}" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Статусы выполнения</label>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="tz_status" class="form-check-input" value="1" {{ $project->tz_status ? 'checked' : '' }}>
                            <label class="form-check-label">✅ ТЗ сдано</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="report_status" class="form-check-input" value="1" {{ $project->report_status ? 'checked' : '' }}>
                            <label class="form-check-label">📄 Отчёт сдан</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="diary_status" class="form-check-input" value="1" {{ $project->diary_status ? 'checked' : '' }}>
                            <label class="form-check-label">📔 Дневник сдан</label>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3">📎 Прикреплённые файлы</h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Файл ТЗ</label>
                            <input type="file" name="file_tz" class="form-control" accept=".pdf,.doc,.docx">
                            @if($project->file_tz)
                                <small class="text-muted">
                                    Текущий: <a href="{{ asset('storage/' . $project->file_tz) }}" target="_blank">Скачать</a>
                                </small>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Файл отчёта</label>
                            <input type="file" name="file_report" class="form-control" accept=".pdf,.doc,.docx">
                            @if($project->file_report)
                                <small class="text-muted">
                                    Текущий: <a href="{{ asset('storage/' . $project->file_report) }}" target="_blank">Скачать</a>
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Файл дневника</label>
                            <input type="file" name="file_diary" class="form-control" accept=".pdf,.doc,.docx">
                            @if($project->file_diary)
                                <small class="text-muted">
                                    Текущий: <a href="{{ asset('storage/' . $project->file_diary) }}" target="_blank">Скачать</a>
                                </small>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Архив с проектом</label>
                            <input type="file" name="archive" class="form-control" accept=".zip,.rar">
                            @if($project->archive_path)
                                <small class="text-muted">
                                    Текущий: <a href="{{ asset('storage/' . $project->archive_path) }}" target="_blank" class="archive-link">Скачать архив</a>
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">💾 Сохранить изменения</button>
                        <a href="{{ route('projects') }}" class="btn btn-secondary">❌ Отмена</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection