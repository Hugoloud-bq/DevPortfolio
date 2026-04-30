@extends('layouts.main')

@section('title', 'Мои проекты')

@section('content')

<!-- Фильтр по дате -->
<div class="mb-4">
    <div class="btn-group" role="group">
        <a href="{{ route('projects', ['sort' => 'desc']) }}" class="btn btn-sm {{ request('sort') != 'asc' ? 'btn-primary' : 'btn-outline-primary' }}">📅 Сначала новые</a>
        <a href="{{ route('projects', ['sort' => 'asc']) }}" class="btn btn-sm {{ request('sort') == 'asc' ? 'btn-primary' : 'btn-outline-primary' }}">📅 Сначала старые</a>
    </div>
</div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-folder-open me-2"></i>Мои проекты</h2>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i>Добавить проект
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(count($projects) > 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="bg-secondary text-white">Название</th>
                        <th class="bg-secondary text-white">Предмет</th>
                        <th class="bg-secondary text-white">Описание</th>
                        <th class="bg-secondary text-white">Часы</th>
                        <th class="bg-success text-white">ТЗ</th>
                        <th class="bg-info text-white">Отчёт</th>
                        <th class="bg-warning text-dark">Дневник</th>
                        <th class="bg-dark text-white">Файлы</th>
                        <th class="bg-primary text-white">Архив</th>
                        <th class="bg-danger text-white">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td><strong>{{ $project->title }}</strong></td>
                        <td>{{ $project->subject }}</td>
                        <td>{{ $project->description ?? '—' }}</td>
                        <td>{{ $project->hours_spent ?? '—' }} ч</td>
                        <td class="text-center">{{ $project->tz_status ? '✅ Сдано' : '❌ Не сдано' }}</td>
                        <td class="text-center">{{ $project->report_status ? '✅ Сдано' : '❌ Не сдано' }}</td>
                        <td class="text-center">{{ $project->diary_status ? '✅ Сдано' : '❌ Не сдано' }}</td>
                        <td>
                            @if($project->file_tz || $project->file_report || $project->file_diary)
                                <div class="d-flex flex-column gap-1">
                                    @if($project->file_tz)
                                        <a href="{{ asset('storage/' . $project->file_tz) }}" class="btn btn-sm btn-outline-success" target="_blank">📄 ТЗ</a>
                                    @endif
                                    @if($project->file_report)
                                        <a href="{{ asset('storage/' . $project->file_report) }}" class="btn btn-sm btn-outline-info" target="_blank">📊 Отчёт</a>
                                    @endif
                                    @if($project->file_diary)
                                        <a href="{{ asset('storage/' . $project->file_diary) }}" class="btn btn-sm btn-outline-warning" target="_blank">📔 Дневник</a>
                                    @endif
                                </div>
                            @else
                                —
                            @endif
                        </td>
                        <td class="text-center">
                            @if($project->archive_path)
                                <a href="{{ asset('storage/' . $project->archive_path) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                    <i class="fas fa-download me-1"></i>Скачать архив
                                </a>
                            @else
                                —
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit me-1"></i>Ред.
                                </a>
                                <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Удалить проект? Все файлы будут удалены!')">
                                        <i class="fas fa-trash-alt me-1"></i>Удалить
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            <i class="fas fa-inbox me-2"></i>У вас пока нет проектов. Добавьте первый!
        </div>
    @endif
</div>
@endsection