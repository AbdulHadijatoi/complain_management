<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'contest_id','status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contest(): BelongsTo
    {
        return $this->belongsTo(Contest::class,'contest_id');
    }
}
