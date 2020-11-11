<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'capacity',
    ];

    protected $dates = [
        'start',
        'end'
    ];

    protected $appends = [
        'startDate',
        'startTime',
        'endDate',
        'endTime',
    ];

    public function getStartDateAttribute()
    {
        return $this->start->format('l m/d/Y');
    }

    public function getStartTimeAttribute()
    {
        return $this->start->format('g:i A');
    }

    public function getEndDateAttribute()
    {
        return $this->end->format('l m/d/Y');
    }

    public function getEndTimeAttribute()
    {
        return $this->end->format('g:i A');
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
