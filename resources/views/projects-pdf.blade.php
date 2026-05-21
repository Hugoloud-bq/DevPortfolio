<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мои проекты - DevPortfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.5;
            transition: all 0.3s ease;
        }
        body.light {
            background: #ffffff;
            color: #000000;
        }
        body.dark {
            background: #1a1a2e;
            color: #ffffff;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
        }
        body.light .header {
            border-bottom: 1px solid #ccc;
        }
        body.dark .header {
            border-bottom: 1px solid #2a2a3a;
        }
        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
            font-weight: normal;
        }
        body.light .header h1 {
            color: #667eea;
        }
        body.dark .header h1 {
            color: #6ea8fe;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid;
            padding: 8px;
            text-align: left;
        }
        body.light th, body.light td {
            border-color: #ddd;
        }
        body.dark th, body.dark td {
            border-color: #3a3a4a;
        }
        th {
            font-weight: bold;
        }
        body.light th {
            background-color: #f2f2f2;
        }
        body.dark th {
            background-color: #16213e;
        }
        .text-center {
            text-align: center;
        }
        .print-btn {
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        button {
            padding: 8px 20px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button.print {
            background-color: #28a745;
            color: white;
        }
        button.dark-toggle {
            background-color: #667eea;
            color: white;
        }
        button.light-toggle {
            background-color: #6c757d;
            color: white;
        }
        @media print {
            .print-btn {
                display: none;
            }
            body {
                background: white !important;
                color: black !important;
            }
            th {
                background-color: #f2f2f2 !important;
                color: black !important;
            }
            .header h1 {
                color: #667eea !important;
            }
        }
    </style>
</head>
<body class="light">
    <div class="print-btn">
        <button class="print" onclick="window.print();">Печать / Сохранить как PDF</button>
        <button class="dark-toggle" onclick="document.body.classList.remove('light'); document.body.classList.add('dark');"> Тёмная тема</button>
        <button class="light-toggle" onclick="document.body.classList.remove('dark'); document.body.classList.add('light');"> Светлая тема</button>
    </div>

    <div class="header">
        <h1>DevPortfolio</h1>
        <p>Список проектов | {{ date('d.m.Y') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Название</th>
                <th>Предмет</th>
                <th>ТЗ</th>
                <th>Отчёт</th>
                <th>Дневник</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ $project->subject }}</td>
                <td class="text-center">{{ $project->tz_status ? '✅' : '❌' }}</td>
                <td class="text-center">{{ $project->report_status ? '✅' : '❌' }}</td>
                <td class="text-center">{{ $project->diary_status ? '✅' : '❌' }}</td>
                <td>{{ date('d.m.Y', strtotime($project->created_at)) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Нет проектов</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>