<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = ['user_id', 'course_id', 'result','score', 'passed'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
