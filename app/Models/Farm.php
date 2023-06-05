<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $table = 'farms';
    protected $fillable = [
        'title',
        'description',
        'address',
        'price',
        'num_guests',
        'num_bedrooms',
        'num_beds',
        'user_id',
        'status',
        // Add other fields here
    ];
    protected $attributes = [
        'user_id' => 1, // Set the default value for user_id should change when login be ready
    ];
    // Define the many-to-one relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define the one-to-many relationship with the Images model
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // Define the many-to-many relationship with the Appointment model
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class);
    }

    // Define the one-to-many relationship with the Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Define the many-to-many relationship with the Payment model
    public function payments()
    {
        return $this->belongsToMany(Payment::class);
    }
}
