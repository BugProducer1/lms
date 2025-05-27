<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['course_id', 'question'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
