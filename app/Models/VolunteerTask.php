<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerTask extends Model
{
    use HasFactory;

    protected $fillable = ['volunteer_id', 'donation_id', 'task_type', 'status', 'due_date'];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
