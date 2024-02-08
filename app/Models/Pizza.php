<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public $timestamps = false;
    use HasFactory;

    // Relationship With Favorites One to Many
    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
}
