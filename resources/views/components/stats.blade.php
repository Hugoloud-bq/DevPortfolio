<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">📊 Ваша статистика</h5>
                <div class="row text-center">
                    <div class="col-md-2 col-6 mb-3">
                        <h3 class="text-primary">{{ $stats['total_projects'] }}</h3>
                        <p class="text-muted small">Всего проектов</p>
                    </div>
                    <div class="col-md-2 col-6 mb-3">
                        <h3 class="text-success">{{ $stats['tz_done'] }}</h3>
                        <p class="text-muted small">ТЗ сдано</p>
                    </div>
                    <div class="col-md-2 col-6 mb-3">
                        <h3 class="text-info">{{ $stats['report_done'] }}</h3>
                        <p class="text-muted small">Отчётов</p>
                    </div>
                    <div class="col-md-2 col-6 mb-3">
                        <h3 class="text-warning">{{ $stats['diary_done'] }}</h3>
                        <p class="text-muted small">Дневников</p>
                    </div>
                    <div class="col-md-2 col-6 mb-3">
                        <h3 class="text-secondary">{{ $stats['total_files'] }}</h3>
                        <p class="text-muted small">Всего файлов</p>
                    </div>
                    <div class="col-md-2 col-6 mb-3">
                        <h3 class="text-danger">{{ $stats['total_archives'] }}</h3>
                        <p class="text-muted small">Всего архивов</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>