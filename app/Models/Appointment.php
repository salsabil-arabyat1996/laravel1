<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }
    // Define the many-to-many relationship with the Farm model
    public function farms()
    {
        return $this->belongsToMany(Farm::class);
    }

    // Define the many-to-many relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Define the one-to-one relationship with the Payment model
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    protected $fillable = [
        'user_id',
        'farm_id',
        'check_in',
        'check_out',
    ];
}
