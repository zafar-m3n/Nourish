<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function volunteerTasks()
    {
        return $this->hasMany(VolunteerTask::class, 'volunteer_id');
    }

    public function recipientRequests()
    {
        return $this->hasMany(RecipientRequest::class, 'recipient_id');
    }

    public function recipientOrders()
    {
        return $this->hasMany(Order::class, 'recipient_id');
    }

    public function volunteerOrders()
    {
        return $this->hasMany(Order::class, 'volunteer_id');
    }
}
