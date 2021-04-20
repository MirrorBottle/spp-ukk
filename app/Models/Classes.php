<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $fillable = [
        'name',
        'competition_id'
    ];

    public function students() {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function competition() {
        return $this->belongsTo(Competition::class);
    }
}
