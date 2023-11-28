<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'm_departments';

    protected $fillable = [
        'name',
        'unit_id',
        'slug'
    ];
}
