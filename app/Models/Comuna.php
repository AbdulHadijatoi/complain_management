<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comuna extends Model
{
    use HasFactory;

    protected $table = "comuna";

    protected $guarded = [];

    public function sectors(){
        return $this->hasMany(Sector::class,'comuna_id');
    }
    
    public function complaints(){
        return $this->hasMany(Complaint::class,'comuna');
    }

    public function complaint(){
        return $this->hasOne(Complaint::class,'comuna');
    }

    
}
