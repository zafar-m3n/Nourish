<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipientRequest extends Model
{
    use HasFactory;

    protected $fillable = ['recipient_id', 'donation_id', 'food_type', 'quantity_requested', 'status'];
    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
