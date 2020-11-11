<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class EventController extends Controller
{

    public function index()
    {
        $data = Event::all();
        return Inertia::render('Event/Events', compact('data'));
    }

    public function show(Event $event)
    {
        $event->slots = $event->slots()
            ->get();
        return Inertia::render('Event/Event', compact('event'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'title' => ['required'],
            'description' => ['required']
        ])->validate();

        Event::create($request->all());

        return Redirect::back()
            ->with('message','Event Created Successfully.');
    }

    public function update(Request $request, Event $event)
    {
        Validator::make($request->all(),[
            'title' => ['required'],
            'description' => ['required']
        ])->validate();

        $event->update($request->all());

        return Redirect::back()
            ->with('message', 'Post Updated Successfully.');
    }

    public function destroy(Request $request, Event $event)
    {
        $event->delete();
        return Redirect::back();
    }

}
