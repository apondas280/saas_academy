<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamTrainingPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'course_privacy',
        'course_id',
        'allocation',
        'pricing_type',
        'price',
        'expiry_type',
        'start_date',
        'expiry_date',
        'features',
        'thumbnail',
        'status',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function members()
    {
        return $this->hasMany(TeamPackageMember::class, 'package_id');
    }

    public function purchases()
    {
        return $this->hasMany(TeamPackagePurchase::class, 'package_id');
    }

}
