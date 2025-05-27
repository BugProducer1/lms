<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')->withTimestamps();
    }
}
