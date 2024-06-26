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
    
    public function comuna(): BelongsTo
    {
        return $this->belongsTo(Comuna::class,'comuna');
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class,'sector');
    }

    public function population(): BelongsTo
    {
        return $this->belongsTo(Population::class,'population');
    }
    
    public function getComuna(): BelongsTo
    {
        return $this->belongsTo(Comuna::class,'comuna');
    }

    public function getSector(): BelongsTo
    {
        return $this->belongsTo(Sector::class,'sector');
    }

    public function getPopulation(): BelongsTo
    {
        return $this->belongsTo(Population::class,'population');
    }

    public function typeOfFault(): BelongsTo
    {
        return $this->belongsTo(TypeOfFault::class,'type_of_fault');
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
    
    protected $appends = ['google_map_link'];

    public function getGoogleMapLinkAttribute()
    {
        if ($this->lat && $this->long) {
            return 'https://maps.google.com/maps?q=' . $this->lat . ',' . $this->long;
        } else {
            return null;
        }
    }
}
