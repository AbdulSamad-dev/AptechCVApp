<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'profession',
        'company',
        'from',
        'to',
        'description',
     
        
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
