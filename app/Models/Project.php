<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'main_features',
        'technologies_used',
        'github_link',
        'demo_link',
        'image_url',
        'order',
    ];

    protected $casts = [
        'main_features' => 'array',
        'technologies_used' => 'array',
    ];
}
