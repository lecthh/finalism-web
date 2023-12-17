<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'studid', 'studfirstname', 'studlastname', 'studmidname', 'studprogid', 'studcollid', 'studyear'
    ];

    public function college(): BelongsTo
    {
        return $this->belongsTo(College::class, 'studcollid');
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class, 'studprogid');
    }
}
