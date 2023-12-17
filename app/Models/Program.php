<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs';
    protected $primaryKey = 'progid';
    protected $fillable = [
        'progid', 'progfullname', 'progshortname', 'progcollid', 'progcolldeptid'
    ];

    public function colleges(): BelongsTo
    {
        return $this->belongsTo(College::class, 'progcollid');
    }

    public function departments(): BelongsTo
    {
        return $this->belongsTo(College::class, 'progcolldeptid');
    }
}
