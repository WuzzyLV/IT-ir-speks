<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'website',
        // 'file_id',
        'city',
        'workload',
        'salary',
        'deadline'
    ];
}
