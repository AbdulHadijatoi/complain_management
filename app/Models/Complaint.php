<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Complaint extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];
    
    public function contractor(): BelongsTo
    {
        return $this->belongsTo(Contractor::class,'contractor_id');
    }

    public function complaintDetails(): HasOne
    {
        return $this->hasOne(ComplaintDetails::class,'complaint_id')->latest('id');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ComplaintStatus::class,'code');
    }

    // Accessor for image attribute
    public function getImageAttribute($value): string
    {
        // Check if the image path is not empty and prepend base URL
        if ($value) {
            // Generate the complete URL for the image path
            return Storage::url($value);
        }

        return $value??'';
    }
}
