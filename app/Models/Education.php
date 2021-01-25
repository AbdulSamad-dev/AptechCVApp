<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    public function student()
    {
        //return $this->belongsTo('Student')
    }
    protected $fillable = [
        'user_id',
        'objective',
        'certificate',
        'institute',
        'passing_year',
    ];
}

