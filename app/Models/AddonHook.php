<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddonHook extends Model
{
    use HasFactory;

    protected $fillable = ['addon_id', 'app_route', 'addon_route', 'dom'];

    public function addon()
    {
        return $this->belongsTo(Addon::class, 'addon_id', 'id');
    }
}
