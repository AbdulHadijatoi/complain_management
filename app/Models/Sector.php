<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comuna(){
        return $this->belongsTo(Comuna::class,'comuna_id');
    }

    public function populations(){
        return $this->hasMany(Population::class,'sector_id');
    }
}
