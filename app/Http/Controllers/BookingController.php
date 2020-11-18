<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $slot = Slot::find($request->slot_id);
        if (!$slot) {
            return Redirect::back()->withErrors(['Invalid slot!']);
        }

        if ($slot->isFull) {
            return Redirect::back()->withErrors(['All Space full for the Event slot!']);
        }

        Booking::bookSlot($slot);

        return Redirect::back()->with('message', 'Booking done.');
    }

    public function show(Booking $booking)
    {
        //
    }

    public function edit(Booking $booking)
    {
        //
    }

    public function update(Request $request, Booking $booking)
    {
        //
    }

    public function destroy(Booking $booking)
    {
        //
    }
}
