<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Population extends Model
{
    use HasFactory;

    protected $table = "population";
    protected $guarded = [];

    public function sector(){
        return $this->belongsTo(Sector::class,'sector_id');
    }
}
