<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $fillable = ['room-venue', 'room-location', 'room-capacity', 'room-image', 'room-features'];
    use HasFactory;
}
