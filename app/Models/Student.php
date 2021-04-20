<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nis',
        'name',
        'address',
        'gender',
        'birthdate',
        'phone_number',
        'fee_id',
        'class_id',
        'password',
    ];
    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = Carbon::parse($value)->toDateString();
    }

    public function getBirthdateLabelAttribute($value) {
        return Carbon::parse($this->birthdate)->translatedFormat('d F, Y');
    }
    public function getGenderLabelAttribute()
    {
        return $this->gender == 0 ? 'Perempuan' : 'Pria';
    }

    public function class() {
        return $this->belongsTo(Classes::class);
    }

    public function fee() {
        return $this->belongsTo(Fee::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
