@extends('layouts.main')

@section('title', 'Добавить проект')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4> Добавить проект</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Название *</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Предмет *</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Описание</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Дата начала</label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Дата сдачи</label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Часов затрачено</label>
                            <input type="number" name="hours_spent" class="form-control" min="0">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label d-block">Статусы выполнения</label>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="tz_status" class="form-check-input" value="1">
                            <label class="form-check-label">✅ ТЗ сдано</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="report_status" class="form-check-input" value="1">
                            <label class="form-check-label">📄 Отчёт сдан</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="diary_status" class="form-check-input" value="1">
                            <label class="form-check-label">📔 Дневник сдан</label>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3">📎 Прикреплённые файлы</h5>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Файл ТЗ</label>
                            <input type="file" name="file_tz" class="form-control" accept=".pdf,.doc,.docx">
                            <small class="text-muted">PDF, DOC, DOCX (до 2 МБ)</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Файл отчёта</label>
                            <input type="file" name="file_report" class="form-control" accept=".pdf,.doc,.docx">
                            <small class="text-muted">PDF, DOC, DOCX (до 2 МБ)</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Файл дневника</label>
                            <input type="file" name="file_diary" class="form-control" accept=".pdf,.doc,.docx">
                            <small class="text-muted">PDF, DOC, DOCX (до 2 МБ)</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Архив с проектом</label>
                            <input type="file" name="archive" class="form-control" accept=".zip,.rar">
                            <small class="text-muted">ZIP, RAR (до 10 МБ)</small>
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-success">💾 Сохранить</button>
                        <a href="{{ route('projects') }}" class="btn btn-secondary">❌ Отмена</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection