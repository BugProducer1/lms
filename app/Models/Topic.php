<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['course_id', 'title', 'topicStatus'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'topic_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'topic_id');
    }
}
