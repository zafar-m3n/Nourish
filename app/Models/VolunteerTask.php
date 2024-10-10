<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerTask extends Model
{
    use HasFactory;

    protected $fillable = ['volunteer_id', 'donation_id', 'task_type', 'status', 'due_date'];

    // Relationship: A task belongs to a volunteer (User)
    public function volunteer()
    {
        return $this->belongsTo(User::class, 'volunteer_id');
    }

    // Relationship: A task belongs to a donation
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
