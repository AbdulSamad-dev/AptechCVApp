<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Student extends Model
{
    use HasFactory;

    public function education()
    {
       // return $this->hasMany('Education');
    }
    protected $fillable = [
        'user_id',
        'student_id',
        'batch_id',
        'faculty_name',
        'post_apply',
        'full_name',
        'other_email',
        'primary_number',
        'secondary_number',
        'post_address',
        'img_path',
        'cv_path',
        'is_uploaded',
        'is_build',
        
    ];
    public function user()
    {

        return $this->belongsTo('User');
    }
}
