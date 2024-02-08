<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Relationship With Users One to Many
    public function users() {
        return $this->hasMany(User::class);
    }
}
