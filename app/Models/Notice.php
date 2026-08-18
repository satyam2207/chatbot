<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'notice_date',
        'expiry_date',
        'is_active',
    ];

    protected $casts = [
        'notice_date' => 'date',
        'expiry_date' => 'date',
        'is_active' => 'boolean',
    ];
}