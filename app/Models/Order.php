<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['donation_id', 'recipient_id', 'volunteer_id', 'status', 'delivery_date'];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }
}
