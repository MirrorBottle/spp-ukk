<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $fillable = [
        'fee',
        'year'
    ];
    public function getFeeLabelAttribute() {
        $formatted = number_format($this->fee);
        return "Rp. $formatted";
    }

    public function getYearLabelAttribute() {
        return Carbon::parse($this->year)->format('Y');
    }

    public function setYearAttribute($value) {
        $this->attributes['year'] = Carbon::parse($value)->toDateString();
    }

    public function getYearFullAttribute($value) {
        return Carbon::parse($value)->translatedFormat('d/m/Y');
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }
}
