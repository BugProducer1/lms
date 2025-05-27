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
}
