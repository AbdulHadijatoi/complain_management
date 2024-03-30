<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfFault extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function complaints(){
        return $this->hasMany(Complaint::class,'comuna');
    }

    public function complaint(){
        return $this->hasOne(Complaint::class,'comuna');
    }
}
