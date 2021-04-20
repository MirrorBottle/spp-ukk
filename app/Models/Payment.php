<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $dates = ['date'];
    protected $fillable = [
        'user_id',
        'student_id',
        'fee_id',
        'date',
        'paid'
    ];

    public function fee() {
        return $this->belongsTo(Fee::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getPaidLabelAttribute() {
        $formatted = number_format($this->paid);
        return "Rp. $formatted"; 
    }

    public function getDateLabelAttribute() {
        return Carbon::parse($this->date)->format('d-m-Y');
    }
}
