<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Collegare i tipi
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // Collegare le tecnologie
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
