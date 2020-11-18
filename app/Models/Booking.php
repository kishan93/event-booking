<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public static function bookSlot(Slot $slot, $user_id = null)
    {
        $booking = new self();
        $booking->slot_id = $slot->id;
        $booking->user_id = $user_id ?? auth()->id();
        $booking->save();
        return $booking;
    }
}
