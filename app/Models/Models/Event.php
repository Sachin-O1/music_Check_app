<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre',
        'image',
        'short_description',
        'amount',
        'date',
        'venue',
    ];

    // Define a many-to-one relationship with artist
    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    // Define a many-to-many relationship with genres
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    // Define a many-to-many relationship with venues
    public function venues()
    {
        return $this->belongsToMany(Venue::class);
    }
}
