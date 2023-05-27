<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Define a one-to-many relationship with events
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
