<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(Request $request)
{
    $query = DB::table('projects')
        ->where('user_id', session('user_id'));
    

    $sort = $request->get('sort', 'desc');
    $query->orderBy('created_at', $sort);
    
    $projects = $query->get();
    
    return view('projects', compact('projects'));
}

    public function create()
    {
        return view('create-project');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|min:3',
        'subject' => 'required',
        'description' => 'nullable',
        'hours_spent' => 'nullable|integer',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'tz_status' => 'nullable|boolean',
        'report_status' => 'nullable|boolean',
        'diary_status' => 'nullable|boolean',
        'file_tz' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'file_report' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'file_diary' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'archive' => 'nullable|file|mimes:zip,rar|max:10240',
    ]);
    $data = [
        'user_id' => session('user_id'),
        'title' => $request->title,
        'subject' => $request->subject,
        'description' => $request->description,
        'hours_spent' => $request->hours_spent,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'tz_status' => $request->has('tz_status'),
        'report_status' => $request->has('report_status'),
        'diary_status' => $request->has('diary_status'),
        'created_at' => now(),
        'updated_at' => now(),
    ];
    if ($request->hasFile('file_tz')) {
        $data['file_tz'] = $request->file('file_tz')->store('projects/tz', 'public');
    }
    if ($request->hasFile('file_report')) {
        $data['file_report'] = $request->file('file_report')->store('projects/reports', 'public');
    }
    if ($request->hasFile('file_diary')) {
        $data['file_diary'] = $request->file('file_diary')->store('projects/diaries', 'public');
    }
    if ($request->hasFile('archive')) {
        $data['archive_path'] = $request->file('archive')->store('projects/archives', 'public');
    }
    DB::table('projects')->insert($data);
    return redirect('/projects')->with('success', 'Новый проект добавлен!');
}


    public function edit($id)
    {
        $project = DB::table('projects')
            ->where('id', $id)
            ->where('user_id', session('user_id'))
            ->first();
        
        if (!$project) {
            return redirect('/projects')->with('error', 'Проект не найден');
        }
        
        return view('edit-project', ['project' => $project]);
    }

public function update(Request $request, $id)
{

    $request->validate([
        'title' => 'required|min:3',
        'subject' => 'required',
        'description' => 'nullable',
        'hours_spent' => 'nullable|integer',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'tz_status' => 'nullable|boolean',
        'report_status' => 'nullable|boolean',
        'diary_status' => 'nullable|boolean',
        'file_tz' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'file_report' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'file_diary' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'archive' => 'nullable|file|mimes:zip,rar|max:10240',
    ]);

    $project = DB::table('projects')
        ->where('id', $id)
        ->where('user_id', session('user_id'))
        ->first();

    if (!$project) {
        return redirect('/projects')->with('error', 'Проект не найден');
    }


    $data = [
        'title' => $request->title,
        'subject' => $request->subject,
        'description' => $request->description,
        'hours_spent' => $request->hours_spent,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'tz_status' => $request->has('tz_status'),
        'report_status' => $request->has('report_status'),
        'diary_status' => $request->has('diary_status'),
        'updated_at' => now(),
    ];


    if ($request->hasFile('file_tz')) {
        if ($project->file_tz) {
            Storage::disk('public')->delete($project->file_tz);
        }
        $data['file_tz'] = $request->file('file_tz')->store('projects/tz', 'public');
    }

    if ($request->hasFile('file_report')) {
        if ($project->file_report) {
            Storage::disk('public')->delete($project->file_report);
        }
        $data['file_report'] = $request->file('file_report')->store('projects/reports', 'public');
    }

    if ($request->hasFile('file_diary')) {
        if ($project->file_diary) {
            Storage::disk('public')->delete($project->file_diary);
        }
        $data['file_diary'] = $request->file('file_diary')->store('projects/diaries', 'public');
    }

    if ($request->hasFile('archive')) {
        if ($project->archive_path) {
            Storage::disk('public')->delete($project->archive_path);
        }
        $data['archive_path'] = $request->file('archive')->store('projects/archives', 'public');
    }

 
    DB::table('projects')
        ->where('id', $id)
        ->where('user_id', session('user_id'))
        ->update($data);

    return redirect('/projects')->with('success', 'Проект обновлён!');
}


   public function destroy($id)
{
    $project = DB::table('projects')
        ->where('id', $id)
        ->where('user_id', session('user_id'))
        ->first();

    if ($project) {
        foreach (['file_tz', 'file_report', 'file_diary', 'archive_path'] as $field) {
            if ($project->$field) {
                \Storage::disk('public')->delete($project->$field);
            }
        }
        
        DB::table('projects')
            ->where('id', $id)
            ->where('user_id', session('user_id'))
            ->delete();
    }

    return redirect('/projects')->with('success', 'Проект удалён!');
}
    public static function getStats()
{
    $userId = session('user_id');
    if (!$userId) {
        return [
            'total_projects' => 0,
            'tz_done' => 0,
            'report_done' => 0,
            'diary_done' => 0,
            'total_files' => 0,
            'total_archives' => 0,
        ];
    }

    $projects = DB::table('projects')->where('user_id', $userId)->get();
    
    $total_projects = $projects->count();
    $tz_done = $projects->where('tz_status', true)->count();
    $report_done = $projects->where('report_status', true)->count();
    $diary_done = $projects->where('diary_status', true)->count();
    
    $total_files = 0;
    $total_archives = 0;
    
    foreach ($projects as $project) {
        if ($project->file_tz) $total_files++;
        if ($project->file_report) $total_files++;
        if ($project->file_diary) $total_files++;
        if ($project->archive_path) $total_archives++;
    }
    
    return [
        'total_projects' => $total_projects,
        'tz_done' => $tz_done,
        'report_done' => $report_done,
        'diary_done' => $diary_done,
        'total_files' => $total_files,
        'total_archives' => $total_archives,
    ];
}
}