<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
protected $fillable = [
    'user_id', 'name', 'group', 'course', 'specialty', 
    'university', 'email', 'github', 'telegram', 
    'vk', 'youtube', 'instagram', 'discord', 'website',
    'skills', 'avatar'
];

    protected $casts = [
        'skills' => 'array'
    ];
}