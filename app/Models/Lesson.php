<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['topic_id', 'title', 'lessonDescription', 'lessonVideo'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function progressForUser($userId)
    {
        return $this->progress()
            ->where('user_id', $userId)
            ->value('progress') ?? 0;
    }

    public function progress()
    {
        return $this->hasMany(LessonProgress::class);
    }
}
