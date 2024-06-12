<?php

namespace App\Models;

use App\Observers\NewsObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[ObservedBy(NewsObserver::class)]
class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    public function file(): belongsTo
    {
        return $this->belongsTo(Files::class);
    }
}
