<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Hasroles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'birthdate',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function getGenderLabelAttribute()
    {
        return $this->gender == 0 ? 'Perempuan' : 'Pria';
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = Carbon::parse($value)->toDateString();
    }

    public function getBirthdateLabelAttribute($value) {
        return Carbon::parse($this->birthdate)->translatedFormat('d F, Y');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
