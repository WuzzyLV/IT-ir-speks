<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone'
    ];

    public function file(): belongsTo
    {
        return $this->belongsTo(Files::class);
    }

    public function vacancy(): belongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }
}
