<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class College extends Model
{
    use HasFactory;

    protected $table = 'colleges';
    protected $primaryKey = 'collid';
    protected $fillable = [
        'collfullname',
        'collshortname',
    ];

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class, 'deptcollid');
    }

    public function programs(): HasMany
    {
        return $this->hasMany(Program::class, 'progcollid');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'studcollid');
    }
}
