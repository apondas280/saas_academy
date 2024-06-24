<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    protected $fillable = [
        'user_id', 'title', 'course_id', 'section_id', 'lesson_type', 'duration', 'lesson_src', 'is_free', 'sort', 'description', 'status',
    ];
}
