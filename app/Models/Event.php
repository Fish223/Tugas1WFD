<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'venue', 
        'date', 
        'start_time', 
        'description', 
        'booking_url', 
        'tags', 
        'organizer_id', 
        'event_category_id', 
        'active'
    ];

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }
    protected $casts = [
        'date' => 'datetime',  // This ensures 'date' is treated as a Carbon instance
        'start_time' => 'datetime', // If you need this as well
    ];
}


