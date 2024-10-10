<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'food_type', 'quantity', 'expiration_date', 'status'];

    // Cast expiration_date as a date
    protected $casts = [
        'expiration_date' => 'date',
    ];

    // Relationship: A donation belongs to a donor (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
