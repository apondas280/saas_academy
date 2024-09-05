<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'status',
    ];

    public function members()
    {
        return $this->hasMany(GroupMember::class, 'group_id');
    }

    public function training()
    {
        return $this->hasMany(GroupTraining::class, 'group_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id', 'course_id');
    }
}