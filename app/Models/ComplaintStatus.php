<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplaintStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];
    protected $dates = ['deleted_at'];

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class,'code');
    }
}
