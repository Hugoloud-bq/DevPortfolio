<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::where('user_id', session('user_id'))->first();
        
        if (!$about) {
            $about = new About();
            $about->name = session('user_name');
            $about->group = '11/2-РПО-24/2';
            $about->course = 2;
            $about->specialty = 'РПО';
            $about->university = 'Колледж';
            $about->email = session('user_email');
        }
        
        return view('about', compact('about'));
    }

    public function edit()
    {
        $about = About::where('user_id', session('user_id'))->first();
        
        if (!$about) {
            $about = new About();
            $about->name = session('user_name');
            $about->group = '11/2-РПО-24/2';
            $about->course = 2;
            $about->specialty = 'РПО';
            $about->university = 'Колледж';
            $about->email = session('user_email');
        }
        
        return view('about-edit', compact('about'));
    }

    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'group' => 'nullable|string',
        'course' => 'nullable|integer',
        'specialty' => 'nullable|string',
        'university' => 'nullable|string',
        'email' => 'nullable|email',
        'github' => 'nullable|url',
        'telegram' => 'nullable|string',
        'vk' => 'nullable|url',
        'youtube' => 'nullable|url',
        'discord' => 'nullable|url',
        'website' => 'nullable|url',
        'skills' => 'nullable|string',
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $about = About::updateOrCreate(
        ['user_id' => session('user_id')],
        [
            'name' => $request->name,
            'group' => $request->group,
            'course' => $request->course,
            'specialty' => $request->specialty,
            'university' => $request->university,
            'email' => $request->email,
            'github' => $request->github,
            'telegram' => $request->telegram,
            'vk' => $request->vk,
            'youtube' => $request->youtube,
            'discord' => $request->discord,
            'website' => $request->website,
            'skills' => $request->skills ? explode(',', $request->skills) : null,
        ]
    );

    if ($request->hasFile('avatar')) {
        if ($about->avatar) {
            \Storage::disk('public')->delete($about->avatar);
        }
        $path = $request->file('avatar')->store('avatars', 'public');
        $about->avatar = $path;
        $about->save();
    }

    return redirect('/about')->with('success', 'Профиль обновлён!');
}
}