<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onboarding extends Model
{
    use HasFactory;

    public $table = 'onboarding';

    protected $fillable = [
        'step_name',
        'status',
        'sequence',
    ];
}
