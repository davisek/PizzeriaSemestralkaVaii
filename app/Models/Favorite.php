<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public $timestamps = false;
    use HasFactory;

    // Relationship With Users One to Many(Inverse)
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relationship With Pizzas One to Many(Inverse)
    public function pizza() {
        return $this->belongsTo(Pizza::class);
    }
}
