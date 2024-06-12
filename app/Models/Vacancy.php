<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function file(): belongsTo
    {
        return $this->belongsTo(Files::class);
    }
}
