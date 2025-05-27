<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
    'Title',
    'Category',
    'ShortDescription',
    'CourseDescription',
    'user_id',
    'CourseMedia',
    'CourseVideo'
    // Add all other fields you expect from the form
    ];

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function learningOutcomes()
    {
        return $this->hasMany(LearningOutcome::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments')->withTimestamps();
    }

}
