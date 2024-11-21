<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{

    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'first_name',
        'last_name',
        'email',
        'rental_time',
        'venue',
        'notes',
    ];


    public function customer(): HasMany
    {
        return $this->hasMany(Admin::class);
    }
}
