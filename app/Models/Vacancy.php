<?php

namespace App\Models;

use App\Observers\VacancyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(VacancyObserver::class)]
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
        'salary_min',
        'salary_max',
        'deadline'
        'visible'
    ];

    public function file(): belongsTo
    {
        return $this->belongsTo(Files::class);
    }
}
