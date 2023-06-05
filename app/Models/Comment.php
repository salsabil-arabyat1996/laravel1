<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'farm_id',
        'feedback',

    ];

    // Define the many-to-one relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the many-to-many relationship with the Farm model
    public function farms()
    {
        return $this->belongsToMany(Farm::class);
    }

    public function ReviewData()
    {
    return $this->hasMany('App\Models\ReviewRating','post_id');
    }
}
