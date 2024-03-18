<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContestDetails extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['contest_id', 'total_winners', 'total_runner_ups', 'participants_limit', 'start_date', 'end_date', 'entry_fee'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function contest(): BelongsTo
    {
        return $this->belongsTo(Contest::class);
    }
}
