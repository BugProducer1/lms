<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['course_id', 'question','topic_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'topic_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function choices()
    {
        return $this->hasMany(Choice::class, 'question_id');
    }


}
