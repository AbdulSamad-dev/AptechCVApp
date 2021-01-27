<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    public $table = "educations";
    
    protected $fillable = [
        'user_id',
        'objective',
        'certificate',
        'institute',
        'passing_year',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

