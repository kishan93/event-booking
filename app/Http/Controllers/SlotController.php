<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SlotController extends Controller
{
    public function index()
    {
        $data = Slot::all();

        //return Inertia::render('Slot/Slots');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'start' => ['required'],
            'end' => ['required'],
            'capacity' => ['required']
        ])->validate();

        $slot = new Slot($request->all());
        $slot->event_id = $request->event_id;
        $slot->save();

        return Redirect::back()
            ->with('message','Slot Created Successfully.');
    }
}
