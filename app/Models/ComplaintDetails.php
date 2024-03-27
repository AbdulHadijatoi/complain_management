<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class ComplaintDetails extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];
    
    public function complaint(): BelongsTo
    {
        return $this->belongsTo(Complaint::class,'complaint_id');
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
