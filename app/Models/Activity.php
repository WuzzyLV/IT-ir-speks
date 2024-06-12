<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    protected $fillable = [
        'who', 'desc', 'action', 'role_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'who', 'id');
    }
}
