<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Winner extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['contest_id', 'participant_id', 'is_winner', 'is_runner_up'];
    protected $dates = ['deleted_at'];

    public function contest(): BelongsTo
    {
        return $this->belongsTo(Contest::class);
    }

    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }
}
