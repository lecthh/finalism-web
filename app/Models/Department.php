<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = [
        'deptid', 'deptfullname', 'deptshortname', 'deptcollid'
    ];
    
    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'deptcollid');
    }

    public function program(): HasMany
    {
        return $this->hasMany(Program::class, 'progcolldeptid');
    }
}
