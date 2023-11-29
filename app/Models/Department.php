<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'm_departments';

    protected $primaryKey = 'id';    
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'unit_id',
        'slug'
    ];

    public function unit(): BelongsTo {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
