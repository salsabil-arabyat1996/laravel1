<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Define the many-to-one relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the one-to-one relationship with the Appointment model
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
