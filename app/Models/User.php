<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'fname', 'lname', 'img', 'email', 'phone','password',
    ];

    protected $hidden = [
        'password',

        'remember_token',
    ];
//////////
protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        'img' => 'default_image.jpg',
    ];
    // Define the many-to-one relationship with the Role model
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Define the one-to-many relationship with the Farms model
    public function farms()
    {
        return $this->hasMany(Farm::class);
    }

    // Define the many-to-many relationship with the Appointment model
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class);
    }

    // Define the many-to-many relationship with the Comments model
    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }

    // Define the one-to-many relationship with the Payment model
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
