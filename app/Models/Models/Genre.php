<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Define a many-to-many relationship with events
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }
}
