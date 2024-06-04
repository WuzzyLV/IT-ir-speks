<?php

namespace App\Models;

use App\Roles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function getEnum(): Roles
    {
        return Roles::from($this->name);
    }
}
