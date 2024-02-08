<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;
    use HasFactory;

    // Relationship with Users One to One(Inverse)
    public function user() {
        return $this->belongsTo(User::class);
    }
}
