<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'identifier', 'status'];

    public function hooks()
    {
        return $this->hasMany(AddonHook::class, 'addon_id');
    }
}
