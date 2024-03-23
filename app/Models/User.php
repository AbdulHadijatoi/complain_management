<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes, HasFactory, HasRoles;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'email', 'phone', 'password'];

    public function contractor(): HasOne
    {
        return $this->hasOne(Contractor::class,'user_id');
    }

    public function isContractor()
    {
        return $this->hasRole('contractor');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
