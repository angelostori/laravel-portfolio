<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Collegare i progetti
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
