<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningOutcome extends Model
{
    protected $table = 'learning_outcome';

    protected $fillable = [
    'course_id',
    'title',
    ];
}
